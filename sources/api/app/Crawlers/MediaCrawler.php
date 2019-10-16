<?php

namespace App\Crawlers;

use App\Crawlers\Factory\SpiderFactory;
use App\Crawlers\Helpers\CrawlerHelper;
use App\Crawlers\Interfaces\MediaSpider;
use Illuminate\Database\Eloquent\Model;

/**
 * Created by PhpStorm.
 * User: Phuong Nguyen
 * Date: 12/10/2019
 * Time: 12:34 AM
 */
class MediaCrawler
{

    /**
     *A facade for handle crawler process
     *
     * @param $url
     * @return Model
     * @throws \Exception
     */
    public static function run($url):Model
    {
        /*
         * Call factory for create dynamic spider
         */
        $spider = SpiderFactory::factory($url);
        if (!$spider || !$spider instanceof MediaSpider) {
            throw new \Exception('Crawler is not support this domain');
        }
        $content = CrawlerHelper::getUrlContent($url);
        /**
         * CrawlerMapper
         */
        $mapper = $spider->run($url, $content);
        if (!$mapper) {
            throw new \Exception('Crawler is not support this page');
        }
        return $mapper->save();
    }


}