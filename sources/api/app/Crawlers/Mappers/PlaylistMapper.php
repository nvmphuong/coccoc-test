<?php

namespace App\Crawlers\Classes;

use App\Crawlers\Interfaces\CrawlerMapper;
use App\Playlist;

/**
 * Created by PhpStorm.
 * User: Phuong Nguyen
 * Date: 12/10/2019
 * Time: 4:13 PM
 */
class PlaylistMapper implements CrawlerMapper
{
    /**
     * @var MediaMapper[]
     */
    private $mediaMappers = [];
    private $name;
    private $source;

    /**
     * @param MediaMapper $mediaMapper
     */
    public function addMediaMapper(MediaMapper $mediaMapper)
    {
        $this->mediaMappers[] = $mediaMapper;
        return $this;

    }

    /**
     * @param  $element
     */
    public function addMediaMappers(array $mediaMappers)
    {
        foreach ($mediaMappers as $mediaMapper) {
            $this->addMediaMapper($mediaMapper);
        }
        return $this;

    }

    /**
     * @param mixed $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param mixed $source
     */
    public function setSource(string $source)
    {
        $this->source = $source;
        return $this;

    }

    protected function sync()
    {
        return Playlist::updateOrCreate(
            ['name' => $this->name],
            ['source' => $this->source]
        );
    }

    protected function isCanSave()
    {
        return $this->name && $this->source;
    }

    public function save()
    {
        if (!$this->isCanSave()) {
            throw new \Exception('Can\' save Playlist.');
        }
        $playlist = $this->sync();
        foreach ($this->mediaMappers as $mediaMapper) {
            $media = $mediaMapper->save();
            $media->playlists()->syncWithoutDetaching($playlist);
        }
        return $playlist;
    }
}