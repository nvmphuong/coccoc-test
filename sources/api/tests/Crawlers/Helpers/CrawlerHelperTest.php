<?php
use App\Crawlers\Helpers\CrawlerHelper;


/**
 * Created by PhpStorm.
 * User: Phuong Nguyen
 * Date: 12/10/2019
 * Time: 3:42 PM
 */
class CrawlerHelperTest extends TestCase
{

    public function testGetUrlContent()
    {
        $url = 'https://www.test.com/';
        $result = CrawlerHelper::getUrlContent($url);
        $this->assertNotNull($result);
    }

    public function testFindStringByRegex()
    {
        $string = '<h1>Test 1</h1><h2>Test 2</h2>';
        //find xml link
        $regex = '#<h1>(.+?)</h1><h2>(.+?)</h2>#is';
        $text1 = CrawlerHelper::findStringByRegex($regex, $string, 1);
        $this->assertEquals($text1, 'Test 1');
        $text2 = CrawlerHelper::findStringByRegex($regex, $string, 2);
        $this->assertEquals($text2, 'Test 2');

    }

    public function testGetDomainByUrl()
    {
        $url = 'https://github.com';
        $this->assertEquals(CrawlerHelper::getDomainByUrl($url), 'github.com');
        $url = 'https://www.google.com';
        $this->assertEquals(CrawlerHelper::getDomainByUrl($url), 'google.com');

    }

    public function testXmlStringToArray()
    {
        $xmlContent = '
<tracklist>
    <type>playlist</type>
    
    <track>
    <title>
        <![CDATA[Bồ Câu Ơi]]>
    </title>
    <time>
        <![CDATA[0:00]]>
    </time>
    <creator>
        <![CDATA[Hồ Trung Dũng]]>
    </creator>
    <location>
        <![CDATA[https://aredir.nixcdn.com/NhacCuaTui991/BoCauOi-NguyenVanChung-6111860.mp3?st=qA2t4Mjq_PewvgjqJVpiQg&e=1571284553]]>
    </location>
    <info>
        <![CDATA[https://www.nhaccuatui.com/bai-hat/bo-cau-oi-ho-trung-dung.0NQ5Tw8Tk2XW.html]]>
    </info>
    <lyric><![CDATA[https://lrc-nct.nixcdn.com/2019/10/11/c/d/7/0/1570779638972.lrc]]></lyric>
    <bgimage><![CDATA[https://avatar-nct.nixcdn.com/singer/avatar/2018/11/13/8/a/8/4/1542084672769_600.jpg]]></bgimage>
    <avatar><![CDATA[https://avatar-nct.nixcdn.com/song/2019/10/09/c/e/3/f/1570590189404.jpg]]></avatar>
    <coverimage><![CDATA[https://avatar-nct.nixcdn.com/playlist/2019/10/09/9/2/c/d/1570591659937_500.jpg]]></coverimage>
    <newtab><![CDATA[https://www.nhaccuatui.com/nghe-si-ho-trung-dung.html]]></newtab>
    <kbit><![CDATA[320]]></kbit>
    <key><![CDATA[0NQ5Tw8Tk2XW]]></key>
    <locationHQ>
        <![CDATA[]]>
    </locationHQ>
    <hasHQ>
        <![CDATA[true]]>
    </hasHQ>
    <seeking><![CDATA[]]></seeking>
    <isStream><![CDATA[]]></isStream>
    </track>
    
    <track>
    <title>
        <![CDATA[Chiều Nay Xuống Phố]]>
    </title>
    <time>
        <![CDATA[0:00]]>
    </time>
    <creator>
        <![CDATA[Nguyễn Hồng Ân]]>
    </creator>
    <location>
        <![CDATA[https://aredir.nixcdn.com/NhacCuaTui991/ChieuNayXuongPho-NguyenVanChung-6111861.mp3?st=2huGgAQUQypInhzcfK6mcw&e=1571284553]]>
    </location>
    <info>
        <![CDATA[https://www.nhaccuatui.com/bai-hat/chieu-nay-xuong-pho-nguyen-hong-an.QyqK97UOsOz3.html]]>
    </info>
    <lyric><![CDATA[https://lrc-nct.nixcdn.com/2019/10/11/c/d/7/0/1570779256778.lrc]]></lyric>
    <bgimage><![CDATA[https://avatar-nct.nixcdn.com/singer/avatar/2016/12/12/8/4/1/9/1481526628353_600.jpg]]></bgimage>
    <avatar><![CDATA[https://avatar-nct.nixcdn.com/song/2019/10/09/c/e/3/f/1570590268607.jpg]]></avatar>
    <coverimage><![CDATA[https://avatar-nct.nixcdn.com/playlist/2019/10/09/9/2/c/d/1570591659937_500.jpg]]></coverimage>
    <newtab><![CDATA[https://www.nhaccuatui.com/nghe-si-nguyen-hong-an.html]]></newtab>
    <kbit><![CDATA[320]]></kbit>
    <key><![CDATA[QyqK97UOsOz3]]></key>
    <locationHQ>
        <![CDATA[]]>
    </locationHQ>
    <hasHQ>
        <![CDATA[true]]>
    </hasHQ>
    <seeking><![CDATA[]]></seeking>
    <isStream><![CDATA[]]></isStream>
    </track>
    
    <track>
    <title>
        <![CDATA[Con Đường Ngày Đó]]>
    </title>
    <time>
        <![CDATA[0:00]]>
    </time>
    <creator>
        <![CDATA[Hoàng Bách]]>
    </creator>
    <location>
        <![CDATA[https://aredir.nixcdn.com/NhacCuaTui991/ConDuongNgayDo-NguyenVanChung-6111864.mp3?st=GD5phha6ZEtGb_X1U7vUiw&e=1571284553]]>
    </location>
    <info>
        <![CDATA[https://www.nhaccuatui.com/bai-hat/con-duong-ngay-do-hoang-bach.Wt5jYEW1nzGG.html]]>
    </info>
    <lyric><![CDATA[https://lrc-nct.nixcdn.com/2019/10/11/c/d/7/0/1570778867128.lrc]]></lyric>
    <bgimage><![CDATA[https://avatar-nct.nixcdn.com/singer/avatar/2018/05/25/3/7/2/0/1527232362200_600.jpg]]></bgimage>
    <avatar><![CDATA[https://avatar-nct.nixcdn.com/song/2019/10/09/c/e/3/f/1570590368920.jpg]]></avatar>
    <coverimage><![CDATA[https://avatar-nct.nixcdn.com/playlist/2019/10/09/9/2/c/d/1570591659937_500.jpg]]></coverimage>
    <newtab><![CDATA[https://www.nhaccuatui.com/nghe-si-hoang-bach.html]]></newtab>
    <kbit><![CDATA[320]]></kbit>
    <key><![CDATA[Wt5jYEW1nzGG]]></key>
    <locationHQ>
        <![CDATA[]]>
    </locationHQ>
    <hasHQ>
        <![CDATA[true]]>
    </hasHQ>
    <seeking><![CDATA[]]></seeking>
    <isStream><![CDATA[]]></isStream>
    </track>
    
    <track>
    <title>
        <![CDATA[Hay Là Chia Tay]]>
    </title>
    <time>
        <![CDATA[0:00]]>
    </time>
    <creator>
        <![CDATA[Phạm Anh Duy]]>
    </creator>
    <location>
        <![CDATA[https://aredir.nixcdn.com/NhacCuaTui991/HayLaChiaTay-NguyenVanChung-6111866.mp3?st=-9Q0C96TjBpDNO1hyvWvFw&e=1571284553]]>
    </location>
    <info>
        <![CDATA[https://www.nhaccuatui.com/bai-hat/hay-la-chia-tay-pham-anh-duy.HEpkGtAf5lJ1.html]]>
    </info>
    <lyric><![CDATA[https://lrc-nct.nixcdn.com/2019/10/11/c/d/7/0/1570778281727.lrc]]></lyric>
    <bgimage><![CDATA[https://avatar-nct.nixcdn.com/singer/avatar/2019/07/05/5/8/b/f/1562294032590_600.jpg]]></bgimage>
    <avatar><![CDATA[https://avatar-nct.nixcdn.com/song/2019/10/09/c/e/3/f/1570590434442.jpg]]></avatar>
    <coverimage><![CDATA[https://avatar-nct.nixcdn.com/playlist/2019/10/09/9/2/c/d/1570591659937_500.jpg]]></coverimage>
    <newtab><![CDATA[https://www.nhaccuatui.com/nghe-si-pham-anh-duy.html]]></newtab>
    <kbit><![CDATA[320]]></kbit>
    <key><![CDATA[HEpkGtAf5lJ1]]></key>
    <locationHQ>
        <![CDATA[]]>
    </locationHQ>
    <hasHQ>
        <![CDATA[true]]>
    </hasHQ>
    <seeking><![CDATA[]]></seeking>
    <isStream><![CDATA[]]></isStream>
    </track>
    
    <track>
    <title>
        <![CDATA[Kẻ Đứng Ngoài Tình Yêu]]>
    </title>
    <time>
        <![CDATA[0:00]]>
    </time>
    <creator>
        <![CDATA[Phạm Anh Duy]]>
    </creator>
    <location>
        <![CDATA[https://aredir.nixcdn.com/NhacCuaTui991/KeDungNgoaiTinhYeu-NguyenVanChung-6111871.mp3?st=A3b5FKRCmYL-iFuPRaIlYg&e=1571284553]]>
    </location>
    <info>
        <![CDATA[https://www.nhaccuatui.com/bai-hat/ke-dung-ngoai-tinh-yeu-pham-anh-duy.IZLHpKQvRGUt.html]]>
    </info>
    <lyric><![CDATA[https://lrc-nct.nixcdn.com/2019/10/11/c/d/7/0/1570777961047.lrc]]></lyric>
    <bgimage><![CDATA[https://avatar-nct.nixcdn.com/singer/avatar/2019/07/05/5/8/b/f/1562294032590_600.jpg]]></bgimage>
    <avatar><![CDATA[https://avatar-nct.nixcdn.com/song/2019/10/09/c/e/3/f/1570590530605.jpg]]></avatar>
    <coverimage><![CDATA[https://avatar-nct.nixcdn.com/playlist/2019/10/09/9/2/c/d/1570591659937_500.jpg]]></coverimage>
    <newtab><![CDATA[https://www.nhaccuatui.com/nghe-si-pham-anh-duy.html]]></newtab>
    <kbit><![CDATA[320]]></kbit>
    <key><![CDATA[IZLHpKQvRGUt]]></key>
    <locationHQ>
        <![CDATA[]]>
    </locationHQ>
    <hasHQ>
        <![CDATA[true]]>
    </hasHQ>
    <seeking><![CDATA[]]></seeking>
    <isStream><![CDATA[]]></isStream>
    </track>
    
    <track>
    <title>
        <![CDATA[Mùa Thu Năm Ấy]]>
    </title>
    <time>
        <![CDATA[0:00]]>
    </time>
    <creator>
        <![CDATA[Hồ Trung Dũng]]>
    </creator>
    <location>
        <![CDATA[https://aredir.nixcdn.com/NhacCuaTui991/MuaThuNamAy-NguyenVanChung-6111873.mp3?st=mCn1Tqzo9fHFrxS9Iw3N4g&e=1571284553]]>
    </location>
    <info>
        <![CDATA[https://www.nhaccuatui.com/bai-hat/mua-thu-nam-ay-ho-trung-dung.C9dkgtWSlhaa.html]]>
    </info>
    <lyric><![CDATA[https://lrc-nct.nixcdn.com/2019/10/11/c/d/7/0/1570777638934.lrc]]></lyric>
    <bgimage><![CDATA[https://avatar-nct.nixcdn.com/singer/avatar/2018/11/13/8/a/8/4/1542084672769_600.jpg]]></bgimage>
    <avatar><![CDATA[https://avatar-nct.nixcdn.com/song/2019/10/09/c/e/3/f/1570590601416.jpg]]></avatar>
    <coverimage><![CDATA[https://avatar-nct.nixcdn.com/playlist/2019/10/09/9/2/c/d/1570591659937_500.jpg]]></coverimage>
    <newtab><![CDATA[https://www.nhaccuatui.com/nghe-si-ho-trung-dung.html]]></newtab>
    <kbit><![CDATA[320]]></kbit>
    <key><![CDATA[C9dkgtWSlhaa]]></key>
    <locationHQ>
        <![CDATA[]]>
    </locationHQ>
    <hasHQ>
        <![CDATA[true]]>
    </hasHQ>
    <seeking><![CDATA[]]></seeking>
    <isStream><![CDATA[]]></isStream>
    </track>
    
    <track>
    <title>
        <![CDATA[Sài Gòn Không Em]]>
    </title>
    <time>
        <![CDATA[0:00]]>
    </time>
    <creator>
        <![CDATA[Đức Tuấn]]>
    </creator>
    <location>
        <![CDATA[https://aredir.nixcdn.com/NhacCuaTui991/SaiGonKhongEm-NguyenVanChung-6111876.mp3?st=tPrcC1xZxBkHwq6wHyg03A&e=1571284553]]>
    </location>
    <info>
        <![CDATA[https://www.nhaccuatui.com/bai-hat/sai-gon-khong-em-duc-tuan.nu6VUcnwK11O.html]]>
    </info>
    <lyric><![CDATA[https://lrc-nct.nixcdn.com/2019/10/11/c/d/7/0/1570777119584.lrc]]></lyric>
    <bgimage><![CDATA[https://avatar-nct.nixcdn.com/singer/avatar/2016/01/25/4/1/1/7/1453717088592_600.jpg]]></bgimage>
    <avatar><![CDATA[https://avatar-nct.nixcdn.com/song/2019/10/09/c/e/3/f/1570590677524.jpg]]></avatar>
    <coverimage><![CDATA[https://avatar-nct.nixcdn.com/playlist/2019/10/09/9/2/c/d/1570591659937_500.jpg]]></coverimage>
    <newtab><![CDATA[https://www.nhaccuatui.com/nghe-si-duc-tuan.html]]></newtab>
    <kbit><![CDATA[320]]></kbit>
    <key><![CDATA[nu6VUcnwK11O]]></key>
    <locationHQ>
        <![CDATA[]]>
    </locationHQ>
    <hasHQ>
        <![CDATA[true]]>
    </hasHQ>
    <seeking><![CDATA[]]></seeking>
    <isStream><![CDATA[]]></isStream>
    </track>
    
    <track>
    <title>
        <![CDATA[Tình Sao Cay Đắng]]>
    </title>
    <time>
        <![CDATA[0:00]]>
    </time>
    <creator>
        <![CDATA[Lân Nhã]]>
    </creator>
    <location>
        <![CDATA[https://aredir.nixcdn.com/NhacCuaTui991/TinhSaoCayDang-NguyenVanChung-6111877.mp3?st=s3AYP0_OtTES7UizdJn4Mg&e=1571284553]]>
    </location>
    <info>
        <![CDATA[https://www.nhaccuatui.com/bai-hat/tinh-sao-cay-dang-lan-nha.oFkKmD0lE7Fl.html]]>
    </info>
    <lyric><![CDATA[https://lrc-nct.nixcdn.com/2019/10/11/c/d/7/0/1570776727899.lrc]]></lyric>
    <bgimage><![CDATA[https://avatar-nct.nixcdn.com/singer/avatar/2017/01/16/9/0/d/e/1484536783882_600.jpg]]></bgimage>
    <avatar><![CDATA[https://avatar-nct.nixcdn.com/song/2019/10/09/c/e/3/f/1570590733154.jpg]]></avatar>
    <coverimage><![CDATA[https://avatar-nct.nixcdn.com/playlist/2019/10/09/9/2/c/d/1570591659937_500.jpg]]></coverimage>
    <newtab><![CDATA[https://www.nhaccuatui.com/nghe-si-lan-nha.html]]></newtab>
    <kbit><![CDATA[320]]></kbit>
    <key><![CDATA[oFkKmD0lE7Fl]]></key>
    <locationHQ>
        <![CDATA[]]>
    </locationHQ>
    <hasHQ>
        <![CDATA[true]]>
    </hasHQ>
    <seeking><![CDATA[]]></seeking>
    <isStream><![CDATA[]]></isStream>
    </track>
    
    <track>
    <title>
        <![CDATA[Về Đi Em]]>
    </title>
    <time>
        <![CDATA[0:00]]>
    </time>
    <creator>
        <![CDATA[Đức Tuấn]]>
    </creator>
    <location>
        <![CDATA[https://aredir.nixcdn.com/NhacCuaTui991/VeDiEm-NguyenVanChung-6111879.mp3?st=269DcdUZ-PlNL4hKC8gBjA&e=1571284553]]>
    </location>
    <info>
        <![CDATA[https://www.nhaccuatui.com/bai-hat/ve-di-em-duc-tuan.qh5AA9c8LLGn.html]]>
    </info>
    <lyric><![CDATA[https://lrc-nct.nixcdn.com/2019/10/11/c/d/7/0/1570776288094.lrc]]></lyric>
    <bgimage><![CDATA[https://avatar-nct.nixcdn.com/singer/avatar/2016/01/25/4/1/1/7/1453717088592_600.jpg]]></bgimage>
    <avatar><![CDATA[https://avatar-nct.nixcdn.com/song/2019/10/09/c/e/3/f/1570590798351.jpg]]></avatar>
    <coverimage><![CDATA[https://avatar-nct.nixcdn.com/playlist/2019/10/09/9/2/c/d/1570591659937_500.jpg]]></coverimage>
    <newtab><![CDATA[https://www.nhaccuatui.com/nghe-si-duc-tuan.html]]></newtab>
    <kbit><![CDATA[320]]></kbit>
    <key><![CDATA[qh5AA9c8LLGn]]></key>
    <locationHQ>
        <![CDATA[]]>
    </locationHQ>
    <hasHQ>
        <![CDATA[true]]>
    </hasHQ>
    <seeking><![CDATA[]]></seeking>
    <isStream><![CDATA[]]></isStream>
    </track>
    
    <track>
    <title>
        <![CDATA[Xa Lạ]]>
    </title>
    <time>
        <![CDATA[0:00]]>
    </time>
    <creator>
        <![CDATA[Nguyễn Hồng Ân]]>
    </creator>
    <location>
        <![CDATA[https://aredir.nixcdn.com/NhacCuaTui991/XaLa-NguyenVanChung-6111881.mp3?st=PhF634BiGfVtSIg6HiJLnA&e=1571284553]]>
    </location>
    <info>
        <![CDATA[https://www.nhaccuatui.com/bai-hat/xa-la-nguyen-hong-an.bEBJy2I8mUHl.html]]>
    </info>
    <lyric><![CDATA[https://lrc-nct.nixcdn.com/2019/10/11/c/d/7/0/1570775961057.lrc]]></lyric>
    <bgimage><![CDATA[https://avatar-nct.nixcdn.com/singer/avatar/2016/12/12/8/4/1/9/1481526628353_600.jpg]]></bgimage>
    <avatar><![CDATA[https://avatar-nct.nixcdn.com/song/2019/10/09/c/e/3/f/1570590856999.jpg]]></avatar>
    <coverimage><![CDATA[https://avatar-nct.nixcdn.com/playlist/2019/10/09/9/2/c/d/1570591659937_500.jpg]]></coverimage>
    <newtab><![CDATA[https://www.nhaccuatui.com/nghe-si-nguyen-hong-an.html]]></newtab>
    <kbit><![CDATA[320]]></kbit>
    <key><![CDATA[bEBJy2I8mUHl]]></key>
    <locationHQ>
        <![CDATA[]]>
    </locationHQ>
    <hasHQ>
        <![CDATA[true]]>
    </hasHQ>
    <seeking><![CDATA[]]></seeking>
    <isStream><![CDATA[]]></isStream>
    </track>
    
    <track>
    <title>
        <![CDATA[Bồ Câu Ơi Beat]]>
    </title>
    <time>
        <![CDATA[0:00]]>
    </time>
    <creator>
        <![CDATA[Hồ Trung Dũng]]>
    </creator>
    <location>
        <![CDATA[https://aredir.nixcdn.com/NhacCuaTui991/BoCauOiBeat-NguyenVanChung-6111858.mp3?st=Vl8ndGzd_McGKwfFEYDiEA&e=1571284553]]>
    </location>
    <info>
        <![CDATA[https://www.nhaccuatui.com/bai-hat/bo-cau-oi-beat-ho-trung-dung.Vlm8ytQb9wJ0.html]]>
    </info>
    <lyric><![CDATA[https://lrc-nct.nixcdn.com/2019/10/15/4/b/4/4/1571121861033.lrc]]></lyric>
    <bgimage><![CDATA[https://avatar-nct.nixcdn.com/singer/avatar/2018/11/13/8/a/8/4/1542084672769_600.jpg]]></bgimage>
    <avatar><![CDATA[https://avatar-nct.nixcdn.com/song/2019/10/09/c/e/3/f/1570590181466.jpg]]></avatar>
    <coverimage><![CDATA[https://avatar-nct.nixcdn.com/playlist/2019/10/09/9/2/c/d/1570591659937_500.jpg]]></coverimage>
    <newtab><![CDATA[https://www.nhaccuatui.com/nghe-si-ho-trung-dung.html]]></newtab>
    <kbit><![CDATA[320]]></kbit>
    <key><![CDATA[Vlm8ytQb9wJ0]]></key>
    <locationHQ>
        <![CDATA[]]>
    </locationHQ>
    <hasHQ>
        <![CDATA[true]]>
    </hasHQ>
    <seeking><![CDATA[]]></seeking>
    <isStream><![CDATA[]]></isStream>
    </track>
    
    <track>
    <title>
        <![CDATA[Chiều Nay Xuống Phố Beat]]>
    </title>
    <time>
        <![CDATA[0:00]]>
    </time>
    <creator>
        <![CDATA[Nguyễn Hồng Ân]]>
    </creator>
    <location>
        <![CDATA[https://aredir.nixcdn.com/NhacCuaTui991/ChieuNayXuongPhoBeat-NguyenVanChung-6111862.mp3?st=Rb2ptXnGn7c8BRqodd6DxQ&e=1571284553]]>
    </location>
    <info>
        <![CDATA[https://www.nhaccuatui.com/bai-hat/chieu-nay-xuong-pho-beat-nguyen-hong-an.gjNTXysNitqQ.html]]>
    </info>
    <lyric><![CDATA[https://lrc-nct.nixcdn.com/2019/10/15/4/b/4/4/1571121876585.lrc]]></lyric>
    <bgimage><![CDATA[https://avatar-nct.nixcdn.com/singer/avatar/2016/12/12/8/4/1/9/1481526628353_600.jpg]]></bgimage>
    <avatar><![CDATA[https://avatar-nct.nixcdn.com/song/2019/10/09/c/e/3/f/1570590268583.jpg]]></avatar>
    <coverimage><![CDATA[https://avatar-nct.nixcdn.com/playlist/2019/10/09/9/2/c/d/1570591659937_500.jpg]]></coverimage>
    <newtab><![CDATA[https://www.nhaccuatui.com/nghe-si-nguyen-hong-an.html]]></newtab>
    <kbit><![CDATA[320]]></kbit>
    <key><![CDATA[gjNTXysNitqQ]]></key>
    <locationHQ>
        <![CDATA[]]>
    </locationHQ>
    <hasHQ>
        <![CDATA[true]]>
    </hasHQ>
    <seeking><![CDATA[]]></seeking>
    <isStream><![CDATA[]]></isStream>
    </track>
    
    <track>
    <title>
        <![CDATA[Con Đường Ngày Đó Beat]]>
    </title>
    <time>
        <![CDATA[0:00]]>
    </time>
    <creator>
        <![CDATA[Hoàng Bách]]>
    </creator>
    <location>
        <![CDATA[https://aredir.nixcdn.com/NhacCuaTui991/ConDuongNgayDoBeat-NguyenVanChung-6111863.mp3?st=ffaTME09VYPOStSyUclOBw&e=1571284553]]>
    </location>
    <info>
        <![CDATA[https://www.nhaccuatui.com/bai-hat/con-duong-ngay-do-beat-hoang-bach.Um5E5L96N1m3.html]]>
    </info>
    <lyric><![CDATA[https://lrc-nct.nixcdn.com/2019/10/11/c/d/7/0/1570778970756.lrc]]></lyric>
    <bgimage><![CDATA[https://avatar-nct.nixcdn.com/singer/avatar/2018/05/25/3/7/2/0/1527232362200_600.jpg]]></bgimage>
    <avatar><![CDATA[https://avatar-nct.nixcdn.com/song/2019/10/09/c/e/3/f/1570590365919.jpg]]></avatar>
    <coverimage><![CDATA[https://avatar-nct.nixcdn.com/playlist/2019/10/09/9/2/c/d/1570591659937_500.jpg]]></coverimage>
    <newtab><![CDATA[https://www.nhaccuatui.com/nghe-si-hoang-bach.html]]></newtab>
    <kbit><![CDATA[320]]></kbit>
    <key><![CDATA[Um5E5L96N1m3]]></key>
    <locationHQ>
        <![CDATA[]]>
    </locationHQ>
    <hasHQ>
        <![CDATA[true]]>
    </hasHQ>
    <seeking><![CDATA[]]></seeking>
    <isStream><![CDATA[]]></isStream>
    </track>
    
    <track>
    <title>
        <![CDATA[Hay Là Chia Tay Beat]]>
    </title>
    <time>
        <![CDATA[0:00]]>
    </time>
    <creator>
        <![CDATA[Phạm Anh Duy]]>
    </creator>
    <location>
        <![CDATA[https://aredir.nixcdn.com/NhacCuaTui991/HayLaChiaTayBeat-NguyenVanChung-6111867.mp3?st=W3UuIUU7EGaR2JSd816AYA&e=1571284553]]>
    </location>
    <info>
        <![CDATA[https://www.nhaccuatui.com/bai-hat/hay-la-chia-tay-beat-pham-anh-duy.snuEWij7QINq.html]]>
    </info>
    <lyric><![CDATA[https://lrc-nct.nixcdn.com/2019/10/11/c/d/7/0/1570778978881.lrc]]></lyric>
    <bgimage><![CDATA[https://avatar-nct.nixcdn.com/singer/avatar/2019/07/05/5/8/b/f/1562294032590_600.jpg]]></bgimage>
    <avatar><![CDATA[https://avatar-nct.nixcdn.com/song/2019/10/09/c/e/3/f/1570590442767.jpg]]></avatar>
    <coverimage><![CDATA[https://avatar-nct.nixcdn.com/playlist/2019/10/09/9/2/c/d/1570591659937_500.jpg]]></coverimage>
    <newtab><![CDATA[https://www.nhaccuatui.com/nghe-si-pham-anh-duy.html]]></newtab>
    <kbit><![CDATA[320]]></kbit>
    <key><![CDATA[snuEWij7QINq]]></key>
    <locationHQ>
        <![CDATA[]]>
    </locationHQ>
    <hasHQ>
        <![CDATA[true]]>
    </hasHQ>
    <seeking><![CDATA[]]></seeking>
    <isStream><![CDATA[]]></isStream>
    </track>
    
    <track>
    <title>
        <![CDATA[Kẻ Đứng Ngoài Tình Yêu Beat]]>
    </title>
    <time>
        <![CDATA[0:00]]>
    </time>
    <creator>
        <![CDATA[Phạm Anh Duy]]>
    </creator>
    <location>
        <![CDATA[https://aredir.nixcdn.com/NhacCuaTui991/KeDungNgoaiTinhYeuBeat-NguyenVanChung-6111870.mp3?st=HVIfV0fnEAfMIe0zoalUnw&e=1571284553]]>
    </location>
    <info>
        <![CDATA[https://www.nhaccuatui.com/bai-hat/ke-dung-ngoai-tinh-yeu-beat-pham-anh-duy.B7F4pXEDyrDW.html]]>
    </info>
    <lyric><![CDATA[https://lrc-nct.nixcdn.com/2019/10/11/c/d/7/0/1570778987648.lrc]]></lyric>
    <bgimage><![CDATA[https://avatar-nct.nixcdn.com/singer/avatar/2019/07/05/5/8/b/f/1562294032590_600.jpg]]></bgimage>
    <avatar><![CDATA[https://avatar-nct.nixcdn.com/song/2019/10/09/c/e/3/f/1570590524771.jpg]]></avatar>
    <coverimage><![CDATA[https://avatar-nct.nixcdn.com/playlist/2019/10/09/9/2/c/d/1570591659937_500.jpg]]></coverimage>
    <newtab><![CDATA[https://www.nhaccuatui.com/nghe-si-pham-anh-duy.html]]></newtab>
    <kbit><![CDATA[320]]></kbit>
    <key><![CDATA[B7F4pXEDyrDW]]></key>
    <locationHQ>
        <![CDATA[]]>
    </locationHQ>
    <hasHQ>
        <![CDATA[true]]>
    </hasHQ>
    <seeking><![CDATA[]]></seeking>
    <isStream><![CDATA[]]></isStream>
    </track>
    
    <track>
    <title>
        <![CDATA[Sài Gòn Không Em Beat]]>
    </title>
    <time>
        <![CDATA[0:00]]>
    </time>
    <creator>
        <![CDATA[Đức Tuấn]]>
    </creator>
    <location>
        <![CDATA[https://aredir.nixcdn.com/NhacCuaTui991/SaiGonKhongEmBeat-NguyenVanChung-6111875.mp3?st=2V8i5FtYNmFQgG3fLK5V6Q&e=1571284553]]>
    </location>
    <info>
        <![CDATA[https://www.nhaccuatui.com/bai-hat/sai-gon-khong-em-beat-duc-tuan.UHchJ449DtpR.html]]>
    </info>
    <lyric><![CDATA[https://lrc-nct.nixcdn.com/2019/10/11/c/d/7/0/1570779002377.lrc]]></lyric>
    <bgimage><![CDATA[https://avatar-nct.nixcdn.com/singer/avatar/2016/01/25/4/1/1/7/1453717088592_600.jpg]]></bgimage>
    <avatar><![CDATA[https://avatar-nct.nixcdn.com/song/2019/10/09/c/e/3/f/1570590671031.jpg]]></avatar>
    <coverimage><![CDATA[https://avatar-nct.nixcdn.com/playlist/2019/10/09/9/2/c/d/1570591659937_500.jpg]]></coverimage>
    <newtab><![CDATA[https://www.nhaccuatui.com/nghe-si-duc-tuan.html]]></newtab>
    <kbit><![CDATA[320]]></kbit>
    <key><![CDATA[UHchJ449DtpR]]></key>
    <locationHQ>
        <![CDATA[]]>
    </locationHQ>
    <hasHQ>
        <![CDATA[true]]>
    </hasHQ>
    <seeking><![CDATA[]]></seeking>
    <isStream><![CDATA[]]></isStream>
    </track>
    
    <track>
    <title>
        <![CDATA[Tình Sao Cay Đắng Beat]]>
    </title>
    <time>
        <![CDATA[0:00]]>
    </time>
    <creator>
        <![CDATA[Lân Nhã]]>
    </creator>
    <location>
        <![CDATA[https://aredir.nixcdn.com/NhacCuaTui991/TinhSaoCayDangBeat-NguyenVanChung-6111878.mp3?st=e67m-XoFOmEUGj8-zervUw&e=1571284553]]>
    </location>
    <info>
        <![CDATA[https://www.nhaccuatui.com/bai-hat/tinh-sao-cay-dang-beat-lan-nha.QINYOReNeCvu.html]]>
    </info>
    <lyric><![CDATA[https://lrc-nct.nixcdn.com/2019/10/11/c/d/7/0/1570779010730.lrc]]></lyric>
    <bgimage><![CDATA[https://avatar-nct.nixcdn.com/singer/avatar/2017/01/16/9/0/d/e/1484536783882_600.jpg]]></bgimage>
    <avatar><![CDATA[https://avatar-nct.nixcdn.com/song/2019/10/09/c/e/3/f/1570590739169.jpg]]></avatar>
    <coverimage><![CDATA[https://avatar-nct.nixcdn.com/playlist/2019/10/09/9/2/c/d/1570591659937_500.jpg]]></coverimage>
    <newtab><![CDATA[https://www.nhaccuatui.com/nghe-si-lan-nha.html]]></newtab>
    <kbit><![CDATA[320]]></kbit>
    <key><![CDATA[QINYOReNeCvu]]></key>
    <locationHQ>
        <![CDATA[]]>
    </locationHQ>
    <hasHQ>
        <![CDATA[true]]>
    </hasHQ>
    <seeking><![CDATA[]]></seeking>
    <isStream><![CDATA[]]></isStream>
    </track>
    
    <track>
    <title>
        <![CDATA[Về Đi Em Beat]]>
    </title>
    <time>
        <![CDATA[0:00]]>
    </time>
    <creator>
        <![CDATA[Đức Tuấn]]>
    </creator>
    <location>
        <![CDATA[https://aredir.nixcdn.com/NhacCuaTui991/VeDiEmBeat-NguyenVanChung-6111880.mp3?st=L0l16TT8bGXHzLElAyN8qQ&e=1571284553]]>
    </location>
    <info>
        <![CDATA[https://www.nhaccuatui.com/bai-hat/ve-di-em-beat-duc-tuan.yWLFsE0ae1fx.html]]>
    </info>
    <lyric><![CDATA[https://lrc-nct.nixcdn.com/2019/10/11/c/d/7/0/1570779018101.lrc]]></lyric>
    <bgimage><![CDATA[https://avatar-nct.nixcdn.com/singer/avatar/2016/01/25/4/1/1/7/1453717088592_600.jpg]]></bgimage>
    <avatar><![CDATA[https://avatar-nct.nixcdn.com/song/2019/10/09/c/e/3/f/1570590803220.jpg]]></avatar>
    <coverimage><![CDATA[https://avatar-nct.nixcdn.com/playlist/2019/10/09/9/2/c/d/1570591659937_500.jpg]]></coverimage>
    <newtab><![CDATA[https://www.nhaccuatui.com/nghe-si-duc-tuan.html]]></newtab>
    <kbit><![CDATA[320]]></kbit>
    <key><![CDATA[yWLFsE0ae1fx]]></key>
    <locationHQ>
        <![CDATA[]]>
    </locationHQ>
    <hasHQ>
        <![CDATA[true]]>
    </hasHQ>
    <seeking><![CDATA[]]></seeking>
    <isStream><![CDATA[]]></isStream>
    </track>
    
    <track>
    <title>
        <![CDATA[Xa Lạ Beat]]>
    </title>
    <time>
        <![CDATA[0:00]]>
    </time>
    <creator>
        <![CDATA[Nguyễn Hồng Ân]]>
    </creator>
    <location>
        <![CDATA[https://aredir.nixcdn.com/NhacCuaTui991/XaLaBeat-NguyenVanChung-6111882.mp3?st=BSarw1eckVXc_kqz4ebuyA&e=1571284553]]>
    </location>
    <info>
        <![CDATA[https://www.nhaccuatui.com/bai-hat/xa-la-beat-nguyen-hong-an.zJWbKxiQkIlS.html]]>
    </info>
    <lyric><![CDATA[https://lrc-nct.nixcdn.com/2019/10/11/c/d/7/0/1570778954923.lrc]]></lyric>
    <bgimage><![CDATA[https://avatar-nct.nixcdn.com/singer/avatar/2016/12/12/8/4/1/9/1481526628353_600.jpg]]></bgimage>
    <avatar><![CDATA[https://avatar-nct.nixcdn.com/song/2019/10/09/c/e/3/f/1570590862643.jpg]]></avatar>
    <coverimage><![CDATA[https://avatar-nct.nixcdn.com/playlist/2019/10/09/9/2/c/d/1570591659937_500.jpg]]></coverimage>
    <newtab><![CDATA[https://www.nhaccuatui.com/nghe-si-nguyen-hong-an.html]]></newtab>
    <kbit><![CDATA[320]]></kbit>
    <key><![CDATA[zJWbKxiQkIlS]]></key>
    <locationHQ>
        <![CDATA[]]>
    </locationHQ>
    <hasHQ>
        <![CDATA[true]]>
    </hasHQ>
    <seeking><![CDATA[]]></seeking>
    <isStream><![CDATA[]]></isStream>
    </track>
    
    
</tracklist>
';
        $data = CrawlerHelper::xmlStringToArray($xmlContent);
        $this->assertIsArray( $data);
    }
}