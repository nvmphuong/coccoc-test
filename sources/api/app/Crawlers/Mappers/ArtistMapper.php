<?php

namespace App\Crawlers\Classes;

use App\Artist;
use App\Crawlers\Interfaces\CrawlerMapper;

/**
 * Created by PhpStorm.
 * User: Phuong Nguyen
 * Date: 12/10/2019
 * Time: 4:13 PM
 */
class ArtistMapper implements CrawlerMapper
{

    private $name;

    /**
     * @param mixed $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }


    /**
     * Sync mapper data with eloquent model
     *
     * @return mixed
     */
    protected function sync()
    {
        return Artist::updateOrCreate(
            ['name' => $this->name]
        );
    }

    /**
     * @return mixed
     */
    protected function isCanSave()
    {
        return $this->name ;
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function save()
    {
        if (!$this->isCanSave()) {
            throw new \Exception('Can\' save Artist.',$this);
        }
        $artist = $this->sync();
        return $artist;
    }
}