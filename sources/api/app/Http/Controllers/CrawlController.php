<?php

namespace App\Http\Controllers;

use App\Crawlers\MediaCrawler;
use App\Http\Responses\ApiResponse;
use App\Media;
use App\Playlist;
use Illuminate\Http\Request;

class CrawlController extends Controller
{
    use ApiResponse;

    public function postCrawl(Request $request)
    {
        try {
            $item = MediaCrawler::run($request->get('url'));
            if ($item instanceof Playlist) {
                $countMedia = $item->medias()->count();
                return $this->response('Crawl playlist with ' . $countMedia . ' medias successfully!');
            }
            if ($item instanceof Media) {
                return $this->response('Crawl media successfully!');
            }
        } catch (\Exception $e) {
            return $this->responseFail('No Results.');
        }
    }


}
