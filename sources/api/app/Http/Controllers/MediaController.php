<?php

namespace App\Http\Controllers;

use App\Crawlers\MediaCrawler;
use App\Http\Responses\ApiResponse;
use App\Media;
use App\Playlist;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    use ApiResponse;

    public function index(Request $request)
    {
        $query=Media::orderByDesc('id');
        if($search = $request->get('search')){
            $query->where('name','like' ,'%'.$search.'%')->orWhereHas('artists' ,function ($query) use ($search){
               $query->where('name','like' ,'%'.$search.'%');
            });
        }
        $data = $query->paginate(20);
        return $this->response($data);
    }

    public function download($id, $recheck = true)
    {
        $media = Media::find($id);
        if (!$media) {
            return $this->responseFail('Invalid media.');

        }
        //Some media don't have url when crawl playlist
        if (!$media->url) {
            $headers = [];
        } else {
            // Get the headers.
            $headers = get_headers($media->url);
        }
        if (empty($headers) && !in_array('HTTP/1.0 200 OK', $headers)) {
            if ($recheck) {
                MediaCrawler::run($media->source);
                return $this->download($id, false);
            } else {
                $media->delete();
                return $this->responseFail('This download is unavailable now.');
            }
        }

        return $this->response($media->url);
    }
}
