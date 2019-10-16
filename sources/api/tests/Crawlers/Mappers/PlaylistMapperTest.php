<?php
use Laravel\Lumen\Testing\DatabaseTransactions;

/**
 * Created by PhpStorm.
 * User: Phuong Nguyen
 * Date: 12/10/2019
 * Time: 4:13 PM
 */
class PlaylistMapperTest extends TestCase
{
    use DatabaseTransactions;

    public function testCreatePlaylist()
    {
        $mapper = new \App\Crawlers\Classes\PlaylistMapper();
        $mapper->setName('Test playlist')->setSource('https://google.com');
        $playlist = $mapper->save();
        $this->assertInstanceOf(\App\Playlist::class , $playlist);
        $this->assertEquals('Test playlist' , $playlist->name);
        $this->assertEquals('https://google.com' , $playlist->source);
    }
}