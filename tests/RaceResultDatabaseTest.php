<?php

require __DIR__ . '/../vendor/autoload.php';

/**
 * @author shimomo
 */
class RaceResultDatabaseTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Boatrace\RaceResultCrawler
     */
    protected $crawler;

    /**
     * @var \Boatrace\RaceResultDatabase
     */
    protected $database;

    /**
     * @var array
     */
    protected $config = [
        'driver'    => 'pgsql',
        'host'      => 'localhost',
        'database'  => 'boatrace',
        'username'  => 'postgres',
        'password'  => '',
        'charset'   => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix'    => '',
    ];

    /**
     * @return void
     */
    public function setUp()
    {
        $this->crawler  = new \Boatrace\RaceResultCrawler();
        $this->database = new \Boatrace\RaceResultDatabase();
        $this->database->setConfig($this->config);
    }

    /**
     * @return void
     */
    public function testCreate()
    {
        $this->database->create();
        $this->assertTrue(true);
    }

    /**
     * @return void
     */
    public function testStore()
    {
        $this->database->store($this->crawler->crawl([], 20140101, 6, 1));
        $this->assertTrue(true);
    }

    /**
     * @return void
     */
    public function testGet()
    {
        $response = $this->database->get(['date' => 20140101, 'place_id' => 6, 'race_id' => 1]);
        $this->assertSame(20140101, $response[0]['date']);
        $this->assertSame(6, $response[0]['place_id']);
        $this->assertSame(1, $response[0]['race_id']);
        $this->assertSame(3156, $response[0]['arrival_1_racer_id']);
        $this->assertSame(3987, $response[0]['arrival_2_racer_id']);
        $this->assertSame(4342, $response[0]['arrival_3_racer_id']);
        $this->assertSame(4625, $response[0]['arrival_4_racer_id']);
        $this->assertSame(4417, $response[0]['arrival_5_racer_id']);
        $this->assertSame(4740, $response[0]['arrival_6_racer_id']);
    }
}
