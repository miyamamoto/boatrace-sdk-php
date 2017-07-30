<?php

namespace Boatrace;

/**
 * @author shimomo
 */
class Client
{
    /**
     * @var array
     */
    protected $instances = [];

    /**
     * @return void
     */
    public function __construct()
    {
        $this->instances['Database']    = new Database();
        $this->instances['RaceProgram'] = new RaceProgramCrawler();
        $this->instances['RaceResult']  = new RaceResultCrawler();
    }

    /**
     * @param  array $config
     * @return void
     */
    public function setConfig(array $config)
    {
        $this->instances['Database']->setConfig($config);
    }

    /**
     * @param  int|null $date
     * @param  int|null $place
     * @param  int|null $race
     * @param  int|null $sleep
     * @return array
     */
    public function getRaceProgram(int $date = null, int $place = null, int $race = null, int $sleep = null)
    {
        return $this->crawl('RaceProgram', $date, $place, $race, $sleep);
    }

    /**
     * @param  int|null $date
     * @param  int|null $place
     * @param  int|null $race
     * @param  int|null $sleep
     * @return array
     */
    public function getRaceResult(int $date = null, int $place = null, int $race = null, int $sleep = null)
    {
        return $this->crawl('RaceResult', $date, $place, $race, $sleep);
    }

    /**
     * @return array
     */
    public function getRaceProgramViaDatabase()
    {
        return $this->instances['Database']->getRaceProgram();
    }

    /**
     * @return array
     */
    public function getRaceResultViaDatabase()
    {
        return $this->instances['Database']->getRaceResult();
    }

    /**
     * @param  int|null $date
     * @param  int|null $place
     * @param  int|null $race
     * @param  int|null $sleep
     * @return void
     */
    public function storeRaceProgramInDatabase(int $date = null, int $place = null, int $race = null, int $sleep = null)
    {
        $response = $this->getRaceProgram($date, $place, $race, $sleep);
        $this->instances['Database']->createTable('programs');
        $this->instances['Database']->storeRaceProgram($response);
    }

    /**
     * @param  int|null $date
     * @param  int|null $place
     * @param  int|null $race
     * @param  int|null $sleep
     * @return void
     */
    public function storeRaceResultInDatabase(int $date = null, int $place = null, int $race = null, int $sleep = null)
    {
        $response = $this->getRaceResult($date, $place, $race, $sleep);
        $this->instances['Database']->createTable('results');
        $this->instances['Database']->storeRaceResult($response);
    }

    /**
     * @param  string   $name
     * @param  int|null $date
     * @param  int|null $place
     * @param  int|null $race
     * @param  int|null $sleep
     * @return array
     */
    protected function crawl(string $name, int $date = null, int $place = null, int $race = null, int $sleep = null)
    {
        $response = [];

        if (is_null($date)) {
            $date = $this->instances['datetime']->format('Ymd');
        }

        if (is_null($sleep) || $sleep < 0) {
            $sleep = 1;
        }

        if (is_null($place) && is_null($race)) {
            for ($i = 1; $i <= 24; $i++) {
                for ($h = 1; $h <= 12; $h++) {
                    $response = $this->instances[$name]->crawl($response, $date, $i, $h);
                    sleep($sleep);
                }
            }
        } elseif (is_null($place)) {
            for ($i = 1; $i <= 24; $i++) {
                $response = $this->instances[$name]->crawl($response, $date, $i, $race);
                sleep($sleep);
            }
        } elseif (is_null($race)) {
            for ($h = 1; $h <= 12; $h++) {
                $response = $this->instances[$name]->crawl($response, $date, $place, $h);
                sleep($sleep);
            }
        } else {
            $response = $this->instances[$name]->crawl($response, $date, $place, $race);
        }

        return $response;
    }
}
