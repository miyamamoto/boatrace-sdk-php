<?php

require __DIR__ . '/../vendor/autoload.php';

/**
 * @author shimomo
 */
class RaceProgramCrawlerTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Boatrace\RaceProgramCrawler
     */
    protected $crawler;

    /**
     * @return void
     */
    public function setUp()
    {
        $this->crawler = new \Boatrace\RaceProgramCrawler();
    }

    /**
     * @return void
     */
    public function testCrawl()
    {
        $response = $this->crawler->crawl([], 20140101, 6, 1);
        $this->assertSame(20140101, $response[6][1]['date']);
        $this->assertSame(6, $response[6][1]['place']);
        $this->assertSame('静岡新聞社・静岡放送 New Year’s Cup', $response[6][1]['title']);
        $this->assertSame('予 選', $response[6][1]['class']);
        $this->assertSame(1800, $response[6][1]['distance']);
        $this->assertSame(1041, $response[6][1]['deadline']);
        $this->assertSame(1, $response[6][1]['racers'][0]['frame']);
        $this->assertSame(2, $response[6][1]['racers'][1]['frame']);
        $this->assertSame(3, $response[6][1]['racers'][2]['frame']);
        $this->assertSame(4, $response[6][1]['racers'][3]['frame']);
        $this->assertSame(5, $response[6][1]['racers'][4]['frame']);
        $this->assertSame(6, $response[6][1]['racers'][5]['frame']);
        $this->assertSame('/racerphoto/3156.jpg', $response[6][1]['racers'][0]['photo']);
        $this->assertSame('/racerphoto/3987.jpg', $response[6][1]['racers'][1]['photo']);
        $this->assertSame('/racerphoto/4625.jpg', $response[6][1]['racers'][2]['photo']);
        $this->assertSame('/racerphoto/4417.jpg', $response[6][1]['racers'][3]['photo']);
        $this->assertSame('/racerphoto/4740.jpg', $response[6][1]['racers'][4]['photo']);
        $this->assertSame('/racerphoto/4342.jpg', $response[6][1]['racers'][5]['photo']);
        $this->assertSame(3156, $response[6][1]['racers'][0]['id']);
        $this->assertSame(3987, $response[6][1]['racers'][1]['id']);
        $this->assertSame(4625, $response[6][1]['racers'][2]['id']);
        $this->assertSame(4417, $response[6][1]['racers'][3]['id']);
        $this->assertSame(4740, $response[6][1]['racers'][4]['id']);
        $this->assertSame(4342, $response[6][1]['racers'][5]['id']);
        $this->assertSame('A1', $response[6][1]['racers'][0]['rank']);
        $this->assertSame('A2', $response[6][1]['racers'][1]['rank']);
        $this->assertSame('B1', $response[6][1]['racers'][2]['rank']);
        $this->assertSame('A2', $response[6][1]['racers'][3]['rank']);
        $this->assertSame('B2', $response[6][1]['racers'][4]['rank']);
        $this->assertSame('A1', $response[6][1]['racers'][5]['rank']);
        $this->assertSame('金子 良昭', $response[6][1]['racers'][0]['name']);
        $this->assertSame('後藤 正宗', $response[6][1]['racers'][1]['name']);
        $this->assertSame('渡邊 裕貴', $response[6][1]['racers'][2]['name']);
        $this->assertSame('服部 剛', $response[6][1]['racers'][3]['name']);
        $this->assertSame('齋藤 達希', $response[6][1]['racers'][4]['name']);
        $this->assertSame('谷野 錬志', $response[6][1]['racers'][5]['name']);
        $this->assertSame('静岡', $response[6][1]['racers'][0]['branch']);
        $this->assertSame('静岡', $response[6][1]['racers'][1]['branch']);
        $this->assertSame('静岡', $response[6][1]['racers'][2]['branch']);
        $this->assertSame('静岡', $response[6][1]['racers'][3]['branch']);
        $this->assertSame('静岡', $response[6][1]['racers'][4]['branch']);
        $this->assertSame('静岡', $response[6][1]['racers'][5]['branch']);
        $this->assertSame('静岡', $response[6][1]['racers'][0]['graduate']);
        $this->assertSame('静岡', $response[6][1]['racers'][1]['graduate']);
        $this->assertSame('静岡', $response[6][1]['racers'][2]['graduate']);
        $this->assertSame('静岡', $response[6][1]['racers'][3]['graduate']);
        $this->assertSame('静岡', $response[6][1]['racers'][4]['graduate']);
        $this->assertSame('静岡', $response[6][1]['racers'][5]['graduate']);
        $this->assertSame(49, $response[6][1]['racers'][0]['age']);
        $this->assertSame(35, $response[6][1]['racers'][1]['age']);
        $this->assertSame(27, $response[6][1]['racers'][2]['age']);
        $this->assertSame(26, $response[6][1]['racers'][3]['age']);
        $this->assertSame(21, $response[6][1]['racers'][4]['age']);
        $this->assertSame(29, $response[6][1]['racers'][5]['age']);
        $this->assertSame(50.8, $response[6][1]['racers'][0]['weight']);
        $this->assertSame(51.2, $response[6][1]['racers'][1]['weight']);
        $this->assertSame(50.6, $response[6][1]['racers'][2]['weight']);
        $this->assertSame(51.0, $response[6][1]['racers'][3]['weight']);
        $this->assertSame(50.1, $response[6][1]['racers'][4]['weight']);
        $this->assertSame(50.3, $response[6][1]['racers'][5]['weight']);
        $this->assertSame(0, $response[6][1]['racers'][0]['flying']);
        $this->assertSame(0, $response[6][1]['racers'][1]['flying']);
        $this->assertSame(0, $response[6][1]['racers'][2]['flying']);
        $this->assertSame(0, $response[6][1]['racers'][3]['flying']);
        $this->assertSame(0, $response[6][1]['racers'][4]['flying']);
        $this->assertSame(0, $response[6][1]['racers'][5]['flying']);
        $this->assertSame(0, $response[6][1]['racers'][0]['late']);
        $this->assertSame(0, $response[6][1]['racers'][1]['late']);
        $this->assertSame(0, $response[6][1]['racers'][2]['late']);
        $this->assertSame(0, $response[6][1]['racers'][3]['late']);
        $this->assertSame(0, $response[6][1]['racers'][4]['late']);
        $this->assertSame(0, $response[6][1]['racers'][5]['late']);
        $this->assertSame(0.14, $response[6][1]['racers'][0]['startTiming']);
        $this->assertSame(0.17, $response[6][1]['racers'][1]['startTiming']);
        $this->assertSame(0.16, $response[6][1]['racers'][2]['startTiming']);
        $this->assertSame(0.19, $response[6][1]['racers'][3]['startTiming']);
        $this->assertSame(0.22, $response[6][1]['racers'][4]['startTiming']);
        $this->assertSame(0.14, $response[6][1]['racers'][5]['startTiming']);
        $this->assertSame(6.26, $response[6][1]['racers'][0]['nationwideRate1']);
        $this->assertSame(6.60, $response[6][1]['racers'][1]['nationwideRate1']);
        $this->assertSame(4.72, $response[6][1]['racers'][2]['nationwideRate1']);
        $this->assertSame(5.60, $response[6][1]['racers'][3]['nationwideRate1']);
        $this->assertSame(2.33, $response[6][1]['racers'][4]['nationwideRate1']);
        $this->assertSame(6.12, $response[6][1]['racers'][5]['nationwideRate1']);
        $this->assertSame(47.00, $response[6][1]['racers'][0]['nationwideRate2']);
        $this->assertSame(48.60, $response[6][1]['racers'][1]['nationwideRate2']);
        $this->assertSame(25.50, $response[6][1]['racers'][2]['nationwideRate2']);
        $this->assertSame(35.30, $response[6][1]['racers'][3]['nationwideRate2']);
        $this->assertSame(0.00, $response[6][1]['racers'][4]['nationwideRate2']);
        $this->assertSame(43.20, $response[6][1]['racers'][5]['nationwideRate2']);
        $this->assertSame(63.20, $response[6][1]['racers'][0]['nationwideRate3']);
        $this->assertSame(66.30, $response[6][1]['racers'][1]['nationwideRate3']);
        $this->assertSame(46.50, $response[6][1]['racers'][2]['nationwideRate3']);
        $this->assertSame(57.30, $response[6][1]['racers'][3]['nationwideRate3']);
        $this->assertSame(11.70, $response[6][1]['racers'][4]['nationwideRate3']);
        $this->assertSame(59.40, $response[6][1]['racers'][5]['nationwideRate3']);
        $this->assertSame(6.32, $response[6][1]['racers'][0]['localRate1']);
        $this->assertSame(6.73, $response[6][1]['racers'][1]['localRate1']);
        $this->assertSame(3.77, $response[6][1]['racers'][2]['localRate1']);
        $this->assertSame(5.30, $response[6][1]['racers'][3]['localRate1']);
        $this->assertSame(2.66, $response[6][1]['racers'][4]['localRate1']);
        $this->assertSame(6.34, $response[6][1]['racers'][5]['localRate1']);
        $this->assertSame(47.30, $response[6][1]['racers'][0]['localRate2']);
        $this->assertSame(52.70, $response[6][1]['racers'][1]['localRate2']);
        $this->assertSame(14.20, $response[6][1]['racers'][2]['localRate2']);
        $this->assertSame(30.00, $response[6][1]['racers'][3]['localRate2']);
        $this->assertSame(8.60, $response[6][1]['racers'][4]['localRate2']);
        $this->assertSame(46.20, $response[6][1]['racers'][5]['localRate2']);
        $this->assertSame(65.10, $response[6][1]['racers'][0]['localRate3']);
        $this->assertSame(71.60, $response[6][1]['racers'][1]['localRate3']);
        $this->assertSame(33.70, $response[6][1]['racers'][2]['localRate3']);
        $this->assertSame(52.50, $response[6][1]['racers'][3]['localRate3']);
        $this->assertSame(17.20, $response[6][1]['racers'][4]['localRate3']);
        $this->assertSame(67.70, $response[6][1]['racers'][5]['localRate3']);
        $this->assertSame(29, $response[6][1]['racers'][0]['motorNumber']);
        $this->assertSame(10, $response[6][1]['racers'][1]['motorNumber']);
        $this->assertSame(46, $response[6][1]['racers'][2]['motorNumber']);
        $this->assertSame(59, $response[6][1]['racers'][3]['motorNumber']);
        $this->assertSame(47, $response[6][1]['racers'][4]['motorNumber']);
        $this->assertSame(26, $response[6][1]['racers'][5]['motorNumber']);
        $this->assertSame(35.90, $response[6][1]['racers'][0]['motorRate2']);
        $this->assertSame(37.50, $response[6][1]['racers'][1]['motorRate2']);
        $this->assertSame(34.80, $response[6][1]['racers'][2]['motorRate2']);
        $this->assertSame(32.20, $response[6][1]['racers'][3]['motorRate2']);
        $this->assertSame(34.80, $response[6][1]['racers'][4]['motorRate2']);
        $this->assertSame(36.60, $response[6][1]['racers'][5]['motorRate2']);
        $this->assertSame(0.00, $response[6][1]['racers'][0]['motorRate3']);
        $this->assertSame(0.00, $response[6][1]['racers'][1]['motorRate3']);
        $this->assertSame(0.00, $response[6][1]['racers'][2]['motorRate3']);
        $this->assertSame(0.00, $response[6][1]['racers'][3]['motorRate3']);
        $this->assertSame(0.00, $response[6][1]['racers'][4]['motorRate3']);
        $this->assertSame(0.00, $response[6][1]['racers'][5]['motorRate3']);
        $this->assertSame(63, $response[6][1]['racers'][0]['boatNumber']);
        $this->assertSame(13, $response[6][1]['racers'][1]['boatNumber']);
        $this->assertSame(34, $response[6][1]['racers'][2]['boatNumber']);
        $this->assertSame(68, $response[6][1]['racers'][3]['boatNumber']);
        $this->assertSame(40, $response[6][1]['racers'][4]['boatNumber']);
        $this->assertSame(28, $response[6][1]['racers'][5]['boatNumber']);
        $this->assertSame(43.90, $response[6][1]['racers'][0]['boatRate2']);
        $this->assertSame(46.50, $response[6][1]['racers'][1]['boatRate2']);
        $this->assertSame(35.70, $response[6][1]['racers'][2]['boatRate2']);
        $this->assertSame(50.00, $response[6][1]['racers'][3]['boatRate2']);
        $this->assertSame(40.40, $response[6][1]['racers'][4]['boatRate2']);
        $this->assertSame(60.40, $response[6][1]['racers'][5]['boatRate2']);
        $this->assertSame(0.00, $response[6][1]['racers'][0]['boatRate3']);
        $this->assertSame(0.00, $response[6][1]['racers'][1]['boatRate3']);
        $this->assertSame(0.00, $response[6][1]['racers'][2]['boatRate3']);
        $this->assertSame(0.00, $response[6][1]['racers'][3]['boatRate3']);
        $this->assertSame(0.00, $response[6][1]['racers'][4]['boatRate3']);
        $this->assertSame(0.00, $response[6][1]['racers'][5]['boatRate3']);
    }
}
