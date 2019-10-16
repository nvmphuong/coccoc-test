<?php

namespace App\Crawlers\Helpers;

/**
 * Created by PhpStorm.
 * User: Phuong Nguyen
 * Date: 12/10/2019
 * Time: 3:42 PM
 */
abstract class CrawlerHelper
{
    /**
     * Custom curl request
     *
     * @param $url
     * @param string $ref
     * @return mixed
     */
    public static function getUrlContent($url, $ref = '')
    {
        $user_agent = "Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Mobile Safari/537.36";
// pull down the content that the url pointing to
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_VERBOSE, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_BINARYTRANSFER, true);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_AUTOREFERER, true);
        curl_setopt($curl, CURLOPT_USERAGENT, $user_agent);
        curl_setopt($curl, CURLOPT_REFERER, $ref);
        $cookie = base_path('cookie.txt');
        curl_setopt($curl, CURLOPT_COOKIEJAR, $cookie);
        curl_setopt($curl, CURLOPT_COOKIEFILE, $cookie);
        curl_setopt($curl, CURLOPT_FAILONERROR, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_ENCODING, '');
        $content = curl_exec($curl);
        curl_close($curl);
        return $content;
    }

    /**
     * find a string from regex and content
     *
     * @param string $regex
     * @param string $string
     * @param null $index
     * @return null|string
     */
    public static function findStringByRegex(string $regex,string $string, $index = null)
    {
        preg_match_all($regex, $string, $results, PREG_SET_ORDER);
        if (!count($results)) {
            return null;
        }
        if ($index) {
            if (isset($results[0][$index])) {
                return trim($results[0][$index]);
            }else{
                return null;
            }
        }
        unset($results[0][0]);
        return trim($results[0]);
    }
    public static function getDomainByUrl($url)
    {
        return str_ireplace('www.', '', parse_url($url, PHP_URL_HOST));
    }

    /**
     * Parse xml to array
     * NEED_IMPROVE
     *
     * @param $xmlString
     * @return mixed
     */
    public static function xmlStringToArray($xmlString){
        $xml = simplexml_load_string($xmlString, "SimpleXMLElement", LIBXML_NOCDATA);
        $json = json_encode($xml);
        $array = json_decode($json,TRUE);
        return $array;
    }
}