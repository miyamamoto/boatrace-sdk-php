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
        $this->instances['RaceProgramCrawler']  = new RaceProgramCrawler();
        $this->instances['RaceResultCrawler']   = new RaceResultCrawler();
        $this->instances['RaceProgramDatabase'] = new RaceProgramDatabase();
        $this->instances['RaceResultDatabase']  = new RaceResultDatabase();
    }

    /**
     * @param  array $config
     * @return void
     */
    public function setConfig(array $config)
    {
        $this->instances['RaceProgramDatabase']->setConfig($config);
        $this->instances['RaceResultDatabase']->setConfig($config);
    }

    /**
     * @param  int|null $date
     * @param  int|null $place
     * @param  int|null $race
     * @param  int|null $seconds
     * @return array
     */
    public function getRaceProgram(int $date = null, int $place = null, int $race = null, int $seconds = null)
    {
        return $this->crawl('RaceProgramCrawler', $date, $place, $race, $seconds);
    }

    /**
     * @param  int|null $date
     * @param  int|null $place
     * @param  int|null $race
     * @param  int|null $seconds
     * @return array
     */
    public function getRaceResult(int $date = null, int $place = null, int $race = null, int $seconds = null)
    {
        return $this->crawl('RaceResultCrawler', $date, $place, $race, $seconds);
    }

    /**
     * @param  arrat $conditions
     * @return array
     */
    public function getRaceProgramViaDatabase(array $conditions = [])
    {
        return $this->instances['RaceProgramDatabase']->get($conditions);
    }

    /**
     * @param  arrat $conditions
     * @return array
     */
    public function getRaceResultViaDatabase(array $conditions = [])
    {
        return $this->instances['RaceResultDatabase']->get($conditions);
    }

    /**
     * @param  int|null $date
     * @param  int|null $place
     * @param  int|null $race
     * @param  int|null $seconds
     * @return void
     */
    public function storeRaceProgramInDatabase(int $date = null, int $place = null, int $race = null, int $seconds = null)
    {
        $response = $this->getRaceProgram($date, $place, $race, $seconds);
        $this->instances['RaceProgramDatabase']->create();
        $this->instances['RaceProgramDatabase']->store($response);
    }

    /**
     * @param  int|null $date
     * @param  int|null $place
     * @param  int|null $race
     * @param  int|null $seconds
     * @return void
     */
    public function storeRaceResultInDatabase(int $date = null, int $place = null, int $race = null, int $seconds = null)
    {
        $response = $this->getRaceResult($date, $place, $race, $seconds);
        $this->instances['RaceResultDatabase']->create();
        $this->instances['RaceResultDatabase']->store($response);
    }

    /**
     * @param  string   $className
     * @param  int|null $date
     * @param  int|null $place
     * @param  int|null $race
     * @param  int|null $seconds
     * @return array
     */
    protected function crawl(string $className, int $date = null, int $place = null, int $race = null, int $seconds = null)
    {
        if (is_null($seconds) || $seconds < 0) {
            $seconds = 1;
        }

        if (is_null($place) && is_null($race)) {
            return $this->crawlWithoutPlaceRace($className, $date, $seconds);
        }

        if (is_null($place)) {
            return $this->crawlWithoutPlace($className, $date, $race, $seconds);
        }

        if (is_null($race)) {
            return $this->crawlWithoutRace($className, $date, $place, $seconds);
        }

        return $this->instances[$className]->crawl([], $date, $place, $race);
    }

    /**
     * @param  string $className
     * @param  int    $date
     * @param  int    $seconds
     * @return array
     */
    protected function crawlWithoutPlaceRace(string $className, int $date, int $seconds)
    {
        $response = [];
        for ($i = 1; $i <= 24; $i++) {
            for ($h = 1; $h <= 12; $h++) {
                $response = $this->instances[$className]->crawl($response, $date, $i, $h);
                sleep($seconds);
            }
        }

        return $response;
    }

    /**
     * @param  string $className
     * @param  int    $date
     * @param  int    $race
     * @param  int    $seconds
     * @return array
     */
    protected function crawlWithoutPlace(string $className, int $date, int $race, int $seconds)
    {
        $response = [];
        for ($i = 1; $i <= 24; $i++) {
            $response = $this->instances[$className]->crawl($response, $date, $i, $race);
            sleep($seconds);
        }

        return $response;
    }

    /**
     * @param  string $className
     * @param  int    $date
     * @param  int    $place
     * @param  int    $seconds
     * @return array
     */
    protected function crawlWithoutRace(string $className, int $date, int $place, int $seconds)
    {
        $response = [];
        for ($h = 1; $h <= 12; $h++) {
            $response = $this->instances[$className]->crawl($response, $date, $place, $h);
            sleep($seconds);
        }

        return $response;
    }
}
