<?php

require __DIR__ . '/../vendor/autoload.php';

/**
 * @author shimomo
 */
class RaceResultCrawlerTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Boatrace\RaceResultCrawler
     */
    protected $crawler;

    /**
     * @return void
     */
    public function setUp()
    {
        $this->crawler = new \Boatrace\RaceResultCrawler();
    }

    /**
     * @return void
     */
    public function testCrawl()
    {
        $response = $this->crawler->crawl([], 20140101, 6, 1);
        $this->assertSame(20140101, $response[6][1]['date']);
        $this->assertSame(1, $response[6][1]['technique']);
        $this->assertSame(1, $response[6][1]['weather']);
        $this->assertSame(1, $response[6][1]['wind']);
        $this->assertSame(1, $response[6][1]['wave']);
        $this->assertSame(12.0, $response[6][1]['temperature']);
        $this->assertSame(8.0, $response[6][1]['waterTemperature']);
        $this->assertSame(1, $response[6][1]['arrivals'][0]['id']);
        $this->assertSame(1, $response[6][1]['arrivals'][0]['frame']);
        $this->assertSame(3156, $response[6][1]['arrivals'][0]['racerId']);
        $this->assertSame('金子 良昭', $response[6][1]['arrivals'][0]['racerName']);
        $this->assertSame(1, $response[6][1]['courses'][0]['frame']);
        $this->assertSame(0.05, $response[6][1]['courses'][0]['startTiming']);
    }
}
