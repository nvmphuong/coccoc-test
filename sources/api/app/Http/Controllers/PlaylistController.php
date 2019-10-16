<?php

namespace App\Http\Controllers;

use App\Crawlers\MediaCrawler;
use App\Http\Responses\ApiResponse;
use App\Media;
use App\Playlist;

class PlaylistController extends Controller
{
    use ApiResponse;

    public function index()
    {
        $data = Playlist::orderByDesc('id')->paginate(20);
        return $this->response($data);
    }

    public function show($id)
    {
        $data = Playlist::with('medias')->find($id);
        return $this->response($data);

    }


}
