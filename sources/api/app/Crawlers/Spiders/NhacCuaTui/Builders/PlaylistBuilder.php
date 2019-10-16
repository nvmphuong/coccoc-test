<?php

namespace App\Crawlers\Spiders\NhacCuaTui\Builder;

use App\Crawlers\Classes\ArtistMapper;
use App\Crawlers\Classes\MediaMapper;
use App\Crawlers\Classes\PlaylistMapper;
use App\Crawlers\Helpers\CrawlerHelper;
use App\Crawlers\Interfaces\CrawlerMapper;
use App\Crawlers\Interfaces\Spider\Builder;

/**
 * Created by PhpStorm.
 * User: Phuong Nguyen
 * Date: 15/10/2019
 * Time: 9:18 PM
 */
class PlaylistBuilder implements Builder
{
    protected $mediaPrefixKey = 'NCT_';

    /**
     * Init mapper and data for playlist page
     *
     * @param string $url
     * @param string $content
     * @return CrawlerMapper
     */
    public function build(string $url, string $content): CrawlerMapper
    {
        $playListMapper = new PlaylistMapper();
        $playlistName = $this->getPlaylistName($content);
        if (!$playlistName) {
            return null;
        }
        $mediaMappers = $this->getPlaylistMediaMappers($content);
        if (!count($mediaMappers)) {
            return null;
        }
        $playListMapper->setName($playlistName)
            ->setSource($url)
            ->addMediaMappers($mediaMappers);
        return $playListMapper;
    }

    /**
     * @param string $content
     * @return null|string
     */
    protected function getPlaylistName(string $content): string
    {
        $regex = '#<h1 itemprop="name">(.+?)</h1>#is';
        return CrawlerHelper::findStringByRegex($regex, $content, 1);
    }

    /**
     * @param string $content
     * @return array|null
     */
    protected function getPlaylistMediaMappers(string $content): array
    {
        //find xml link
        $regex = '#player.peConfig.xmlURL = "(.+?)"#is';
        $playListXmlUrl = CrawlerHelper::findStringByRegex($regex, $content, 1);
        //Parse xml data to array
        $xmlstring = CrawlerHelper::getUrlContent($playListXmlUrl);

        $data = CrawlerHelper::xmlStringToArray($xmlstring);
        if (!isset($data['track'])) {
            return null;
        }
        $tracks = $data['track'];
        $mediaMappers = [];
        //Fill all media to mapper
        foreach ($tracks as $track) {
            $mediaMapper = new MediaMapper();
            $url = null;
            if (is_string($track['location'])) {
                $url = trim($track['location']);
            }
            $mediaMapper->setKey($this->mediaPrefixKey . trim($track['key']))
                ->setType($this->getMediaType($url))
                ->setName(trim($track['title']))
                ->setUrl($url)
                ->setImage(trim($track['coverimage']??$track['bgimage']))
                ->setSource(trim($track['info']));
            $artistNames = explode(',', trim($track['creator']));
            foreach ($artistNames as $artistName) {
                $artistMapper = new ArtistMapper();
                $artistMapper->setName(trim($artistName));
                $mediaMapper->addArtistMapper($artistMapper);
            }
            $mediaMappers[] = $mediaMapper;

        }
        return $mediaMappers;
    }

    /**
     * Get type for media
     *
     * @param $url
     * @return string
     */
    protected function getMediaType($url): string
    {
        if (strpos($url, '.mp4')) {
            return 'video';
        }
        return 'audio';

    }
}