<?php

namespace App\Crawlers\Spiders\NhacCuaTui\Builders;

use App\Crawlers\Classes\ArtistMapper;
use App\Crawlers\Classes\MediaMapper;
use App\Crawlers\Helpers\CrawlerHelper;
use App\Crawlers\Interfaces\CrawlerMapper;
use App\Crawlers\Interfaces\Spider\Builder;

/**
 * Created by PhpStorm.
 * User: Phuong Nguyen
 * Date: 15/10/2019
 * Time: 9:18 PM
 */
class AudioBuilder implements Builder
{
    protected $mediaPrefixKey = 'NCT_';
    /**
     * Init mapper and data for audio page
     *
     * @param string $url
     * @param string $content
     * @return CrawlerMapper
     */
    public function build(string $url, string $content): CrawlerMapper
    {
        $mediaMapper = new MediaMapper();
        $regex = '#player.peConfig.xmlURL = "(.+?)"#is';
        $playListXmlUrl = CrawlerHelper::findStringByRegex($regex, $content, 1);
        $xmlstring = CrawlerHelper::getUrlContent($playListXmlUrl);
        $data = CrawlerHelper::xmlStringToArray($xmlstring);
        if (!isset($data['track']) || !count($data['track'])) {
            return null;
        }

        $mediaData = $data['track'];
        $mediaMapper->setKey($this->mediaPrefixKey . trim($mediaData['key']))
            ->setType('audio')
            ->setName(trim($mediaData['title']))
            ->setUrl(trim($mediaData['location']))
            ->setImage(trim($mediaData['bgimage']))
            ->setSource(trim($mediaData['info']));

        $artistNames = explode(',', trim($mediaData['creator']));

        foreach ($artistNames as $artistName) {
            $artistMapper = new ArtistMapper();
            $artistMapper->setName(trim($artistName));
            $mediaMapper->addArtistMapper($artistMapper);
        }
        return $mediaMapper;
    }
}