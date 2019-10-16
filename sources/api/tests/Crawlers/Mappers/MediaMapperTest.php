<?php

use App\Media;
use Laravel\Lumen\Testing\DatabaseTransactions;

/**
 * Created by PhpStorm.
 * User: Phuong Nguyen
 * Date: 12/10/2019
 * Time: 4:13 PM
 */
class MediaMapperTest extends TestCase
{
    use DatabaseTransactions;

    public function testCreateMedia()
    {
        $mapper = new \App\Crawlers\Classes\MediaMapper();
        $mapper->setName('Test media')
            ->setKey('testkey')
        ->setType('audio')
        ->setUrl('https://google.com')
        ->setImage('https://google.com/image.jpg')
        ->setSource('https://google.com/song.mp3');
        $media = $mapper->save();
        $this->assertInstanceOf(\App\Media::class , $media);
        $this->assertEquals('Test media' , $media->name);
        $this->assertEquals('testkey' , $media->key);
        $this->assertEquals('https://google.com' , $media->url);
        $this->assertEquals('https://google.com/image.jpg' , $media->image);
        $this->assertEquals('https://google.com/song.mp3' , $media->source);
    }

}