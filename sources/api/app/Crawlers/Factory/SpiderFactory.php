<?php

namespace App\Crawlers\Factory;

use App\Crawlers\Helpers\CrawlerHelper;

/**
 * Created by PhpStorm.
 * User: Phuong Nguyen
 * Date: 12/10/2019
 * Time: 12:39 AM
 */
final class SpiderFactory
{

    /**
     * @param string $url
     * @return CrawlerSpider
     */
    public static function factory(string $url)
    {
        $domain = CrawlerHelper::getDomainByUrl($url);
        /**
         * NEED_IMPROVE
         * implement config to map a domain with Spider class
         */
        $spiders = config('spiders');

        if (isset($spiders[$domain])) {
            $class = $spiders[$domain];
            return new $class;
        }

        return null;
    }


}