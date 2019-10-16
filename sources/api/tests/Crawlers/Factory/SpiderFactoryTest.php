<?php

/**
 * Created by PhpStorm.
 * User: Phuong Nguyen
 * Date: 12/10/2019
 * Time: 12:39 AM
 */
 class SpiderFactoryTest extends TestCase
{

    public function testFactory()
    {
        $url = 'https://www.nhaccuatui.com/playlist/chung-36-nguyen-van-chung.87nO9Iqw1F29.html?st=7';
        $result = \App\Crawlers\Factory\SpiderFactory::factory($url);
        $this->assertInstanceOf(\App\Crawlers\Spiders\NhacCuaTui\NhacCuaTuiSpider::class , $result);

    }


}