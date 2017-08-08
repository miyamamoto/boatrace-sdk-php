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
    protected $boatrace;

    /**
     * @return void
     */
    public function setUp()
    {
        $this->boatrace = new \Boatrace\RaceResultCrawler();
    }

    /**
     * @return void
     */
    public function testCrawl()
    {
        $response = $this->boatrace->crawl([], 20140101, 6, 1);
        $this->assertSame(20140101, $response[6][1]['basic']['date']);
        $this->assertSame(1, $response[6][1]['basic']['technique']);
        $this->assertSame(1, $response[6][1]['arrival'][0]['arrival']);
        $this->assertSame(1, $response[6][1]['arrival'][0]['frame']);
        $this->assertSame(3156, $response[6][1]['arrival'][0]['racerId']);
        $this->assertSame('金子 良昭', $response[6][1]['arrival'][0]['racerName']);
        $this->assertSame(1, $response[6][1]['course'][0]['frame']);
        $this->assertSame(0.05, $response[6][1]['course'][0]['startTiming']);
        $this->assertSame(1, $response[6][1]['course'][0]['technique']);
        $this->assertSame(1, $response[6][1]['weather']['weather']);
        $this->assertSame(1, $response[6][1]['weather']['wind']);
        $this->assertSame(1, $response[6][1]['weather']['wave']);
        $this->assertSame(12.0, $response[6][1]['weather']['temperature']);
        $this->assertSame(8.0, $response[6][1]['weather']['waterTemperature']);
    }
}
