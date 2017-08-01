<?php

namespace Boatrace;

use Illuminate\Database\Capsule\Manager as Capsule;

/**
 * @author shimomo
 */
abstract class Database
{
    /**
     * @var \Illuminate\Database\Capsule\Manager
     */
    protected $capsule;

    /**
     * @var array
     */
    protected $config;

    /**
     * @return void
     */
    public function __construct()
    {
        $this->capsule = new Capsule();
    }

    /**
     * @param  array $config
     * @return void
     */
    public function setConfig(array $config)
    {
        $this->config = $config;
    }

    /**
     * @return \Illuminate\Database\Connection
     */
    public function connect()
    {
        $this->capsule->addConnection($this->config);
        $this->capsule->setAsGlobal();

        return $this->capsule->connection();
    }

    /**
     * @param  array $array
     * @return array
     */
    protected function toArray($array)
    {
        return json_decode(json_encode($array), true);
    }

    /**
     * @return void
     */
    abstract public function create();

    /**
     * @return array
     */
    abstract public function get();

    /**
     * @param  array $data
     * @return void
     */
    abstract public function store(array $data);
}
