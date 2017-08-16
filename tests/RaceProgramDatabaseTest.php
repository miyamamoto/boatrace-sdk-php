<?php

require __DIR__ . '/../vendor/autoload.php';

/**
 * @author shimomo
 */
class RaceProgramDatabaseTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Boatrace\RaceProgramCrawler
     */
    protected $crawler;

    /**
     * @var \Boatrace\RaceProgramDatabase
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
        $this->crawler  = new \Boatrace\RaceProgramCrawler();
        $this->database = new \Boatrace\RaceProgramDatabase();
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
        $response = $this->database->get(['date' => 20140101, 'place' => 6, 'race' => 1]);
        $this->assertSame(20140101, $response[0]['date']);
        $this->assertSame(6, $response[0]['place']);
        $this->assertSame('静岡新聞社・静岡放送 New Year’s Cup', $response[0]['title']);
        $this->assertSame('予 選', $response[0]['class']);
        $this->assertSame(1800, $response[0]['distance']);
        $this->assertSame(1041, $response[0]['deadline']);
        $this->assertSame(3156, $response[0]['frame_1_racer_id']);
        $this->assertSame(3987, $response[0]['frame_2_racer_id']);
        $this->assertSame(4625, $response[0]['frame_3_racer_id']);
        $this->assertSame(4417, $response[0]['frame_4_racer_id']);
        $this->assertSame(4740, $response[0]['frame_5_racer_id']);
        $this->assertSame(4342, $response[0]['frame_6_racer_id']);
    }
}
