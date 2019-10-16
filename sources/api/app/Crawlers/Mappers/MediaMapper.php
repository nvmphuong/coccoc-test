<?php

namespace App\Crawlers\Classes;

use App\Crawlers\Interfaces\CrawlerMapper;
use App\Media;

/**
 * Created by PhpStorm.
 * User: Phuong Nguyen
 * Date: 12/10/2019
 * Time: 4:13 PM
 */
class MediaMapper implements CrawlerMapper
{
    private $key;
    private $type;
    private $name;
    private $image;
    private $url;
    private $source;
    private $artistMapers = [];

    public function __construct()
    {
    }

    /**
     * @param mixed $source
     */
    public function setUrl($source)
    {
        $this->url = $source;
        return $this;

    }

    public function addArtistMapper(ArtistMapper $artistMapper)
    {
        $this->artistMapers[] = $artistMapper;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
        return $this;

    }

    /**
     * @param mixed $key
     */
    public function setKey($key)
    {
        $this->key = $key;
        return $this;

    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;

    }

    /**
     * @param mixed $source
     */
    public function setSource($source)
    {
        $this->source = $source;
        return $this;

    }

    /**
     * @return mixed
     */
    public function getArtist()
    {
        return $this->artist;

    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @return mixed
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @return mixed
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Sync mapper data with eloquent model
     *
     * @return mixed
     */
    protected function sync()
    {
        $data = [
            'name' => $this->name
            , 'source' => $this->source
            , 'type' => $this->type
            , 'url' => $this->url
            , 'image' => $this->image
        ];
        $media = Media::updateOrCreate(['key' => $this->key], $data);
        if (count($this->artistMapers)) {
            foreach ($this->artistMapers as $artistMaper) {
                $artist = $artistMaper->save();
                $media->artists()->syncWithoutDetaching($artist);
            }
        }
        $media->save();
        return $media;
    }

    /**
     * Check mapper data before sync
     *
     * @return bool
     */
    protected function isCanSave()
    {
        return $this->key
            && $this->type
            && $this->name
            && $this->source;
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function save()
    {
        if (!$this->isCanSave()) {
            throw new \Exception('Can\' save Media.');
        }
        return $this->sync();
    }
}