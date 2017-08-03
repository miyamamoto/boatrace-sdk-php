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
        $response = $this->database->get(['date' => 20140101, 'place_id' => 6, 'race_id' => 1]);
        $this->assertSame(20140101, $response[0]['date']);
        $this->assertSame(6, $response[0]['place_id']);
        $this->assertSame('浜名湖', $response[0]['place_name']);
        $this->assertSame('静岡新聞社・静岡放送 Ｎｅｗ Ｙｅａｒ’ｓ Ｃｕｐ', $response[0]['race_name']);
        $this->assertSame('予 選', $response[0]['race_type']);
        $this->assertSame('1800m', $response[0]['race_distance']);
        $this->assertSame(3156, $response[0]['racer_id_frame_1']);
        $this->assertSame(3987, $response[0]['racer_id_frame_2']);
        $this->assertSame(4625, $response[0]['racer_id_frame_3']);
        $this->assertSame(4417, $response[0]['racer_id_frame_4']);
        $this->assertSame(4740, $response[0]['racer_id_frame_5']);
        $this->assertSame(4342, $response[0]['racer_id_frame_6']);
    }
}
