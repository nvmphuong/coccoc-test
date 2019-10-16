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
class VideoBuilder implements Builder
{
    protected $mediaPrefixKey = 'NCT_';
    /**
     * Init mapper and data for video page
     *
     * @param string $url
     * @param string $content
     * @return MediaMapper|null
     */
    public function build(string $url, string $content):CrawlerMapper
    {
        $mediaMapper = new MediaMapper();
        //Find xml link
        $regex = '#player.peConfig.xmlURL = "(.+?)"#is';
        $playListXmlUrl = CrawlerHelper::findStringByRegex($regex, $content, 1);

        //Get Xml content and parse to array
        $xmlstring = CrawlerHelper::getUrlContent($playListXmlUrl);
        $data = CrawlerHelper::xmlStringToArray($xmlstring);

        if (!isset($data['track']) || !isset($data['track']['item']) || !count($data['track']['item'])) {
            return null;
        }

        $mediaData = $data['track']['item'][0];

        $mediaMapper->setKey($this->mediaPrefixKey . trim($mediaData['key']))
            ->setType('video')
            ->setName(trim($mediaData['title']))
            ->setUrl(trim($mediaData['location']))
            ->setImage(trim($mediaData['image']??$mediaData['bgimage']))
            ->setSource(trim($mediaData['info']));
        $artistNames = explode(',', trim($mediaData['singer']));
        foreach ($artistNames as $artistName) {
            $artistMapper = new ArtistMapper();
            $artistMapper->setName(trim($artistName));
            $mediaMapper->addArtistMapper($artistMapper);
        }
        return $mediaMapper;
    }
}