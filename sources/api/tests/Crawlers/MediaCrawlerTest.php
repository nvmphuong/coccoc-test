<?php

use App\Crawlers\MediaCrawler;
use App\Media;
use App\Playlist;
use Laravel\Lumen\Testing\DatabaseTransactions;

/**
 * Created by PhpStorm.
 * User: Phuong Nguyen
 * Date: 12/10/2019
 * Time: 12:34 AM
 */
class MediaCrawlerTest extends TestCase
{
    use DatabaseTransactions;

    public function testRunPlaylist()
    {
        $url = 'https://www.nhaccuatui.com/playlist/chung-36-nguyen-van-chung.87nO9Iqw1F29.html';
        $result = MediaCrawler::run($url);
        $this->assertInstanceOf(Playlist::class, $result);
    }

    public function testRunVideo()
    {
        $url = 'https://www.nhaccuatui.com/video/em-gi-oi-k-icm-ft-jack-g5r.wvrJcyyIt2poh.html';
        $result = MediaCrawler::run($url);
        $this->assertInstanceOf(Media::class, $result);
    }

    public function testRunAudio()
    {
        $url = 'https://www.nhaccuatui.com/bai-hat/em-dung-hoi-ung-hoang-phuc.rCeDa4bA9mMz.html';
        $result = MediaCrawler::run($url);
        $this->assertInstanceOf(Media::class, $result);
    }


}