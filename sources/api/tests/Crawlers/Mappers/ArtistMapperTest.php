<?php
use Laravel\Lumen\Testing\DatabaseTransactions;


/**
 * Created by PhpStorm.
 * User: Phuong Nguyen
 * Date: 12/10/2019
 * Time: 4:13 PM
 */
class ArtistMapperTest extends TestCase
{
    use DatabaseTransactions;


    public function testCreateArtist()
    {
        $mapper = new \App\Crawlers\Classes\ArtistMapper();
        $mapper->setName('Test artist');
        $artist = $mapper->save();
        $this->assertInstanceOf(\App\Artist::class , $artist);
        $this->assertEquals('Test artist' , $artist->name);
    }

}