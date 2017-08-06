<?php

namespace Boatrace;

/**
 * @author shimomo
 */
abstract class Crawler
{
    /**
     * @var string
     */
    protected $baseUrl = 'https://www.boatrace.jp';

    /**
     * @var array
     */
    protected $instances = [];

    /**
     * @return void
     */
    protected function __construct()
    {
        $this->instances['datetime'] = new \DateTimeImmutable();
        $this->instances['goutte']   = new \Goutte\Client();
    }

    /**
     * @param  string $name
     * @return array
     */
    protected function splitName(string $name)
    {
        return preg_split("/[\\x0-\x20\x7f\xc2\xa0\xe3\x80\x80]++/u", $name, -1, PREG_SPLIT_NO_EMPTY) + [1 => ''];
    }

    /**
     * @param array $response
     */
    abstract protected function crawl(array $response, int $date, int $place, int $race);
}
