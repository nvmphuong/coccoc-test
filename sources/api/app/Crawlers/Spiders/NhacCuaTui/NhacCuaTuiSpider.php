<?php

namespace App\Crawlers\Spiders\NhacCuaTui;

use App\Crawlers\Helpers\CrawlerHelper;
use App\Crawlers\Interfaces\MediaSpider;
use App\Crawlers\Spiders\NhacCuaTui\Builder\PlaylistBuilder;
use App\Crawlers\Spiders\NhacCuaTui\Builders\AudioBuilder;
use App\Crawlers\Spiders\NhacCuaTui\Builders\VideoBuilder;

/**
 * Created by PhpStorm.
 * User: Phuong Nguyen
 * Date: 12/10/2019
 * Time: 12:35 AM
 */
class NhacCuaTuiSpider implements MediaSpider
{
    protected $mediaPrefixKey = 'NCT_';

    /**
     * NhacCuaTuiSpider constructor.
     * @param $url
     */
    public function __construct()
    {
    }

    /**
     * Init all mapper data from crawler
     *
     * @param $url
     * @param $content
     * @return
     */
    public function run($url, $content)
    {
        if ($this->isPlayListPage($url, $content)) {
            $builder = new PlaylistBuilder();
            return $builder->build($url, $content);
        }
        if ($this->isVideoPage($url, $content)) {
            $builder = new VideoBuilder();
            return $builder->build($url, $content);
        }
        if ($this->isAudioPage($url, $content)) {
            $builder = new AudioBuilder();
            return $builder->build($url, $content);
        }
        return false;
    }





    /**
     * Check page is playlist
     * @param string $url
     * @return bool|int
     */
    protected function isPlayListPage(string $url)
    {
        return strpos($url, '/playlist/');
    }

    /**
     * Check page is video
     *
     * @param string $url
     * @return bool|int
     */
    protected function isVideoPage(string $url)
    {
        return strpos($url, '/video/');
    }

    /**
     * Check page is audio
     *
     * @param string $url
     * @return bool|int
     */
    protected function isAudioPage(string $url)
    {
        return strpos($url, '/bai-hat/');
    }



    /**
     * @param string $content
     * @return null|string
     */
    protected function getMediaName(string $content)
    {
        $regex = '#<h1 itemprop="name">(.+?)</h1>#is';
        return CrawlerHelper::findStringByRegex($regex, $content, 1);
    }



    /**
     * Get type for media
     *
     * @param $url
     * @return string
     */
    protected function getMediaType($url)
    {
        if (strpos($url, '.mp4')) {
            return 'video';
        }
        return 'audio';

    }
}
