<?php

namespace Boatrace;

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
        $this->capsule = new \Illuminate\Database\Capsule\Manager();
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
     * @return array
     */
    public function getConfig()
    {
        return $this->config;
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
     * @param  array $data
     * @return array
     */
    protected function toArray($data)
    {
        return json_decode(json_encode($data), true);
    }

    /**
     * @return void
     */
    abstract public function create();

    /**
     * @param  array $conditions
     * @return array
     */
    abstract public function get(array $conditions);

    /**
     * @param  array $data
     * @return void
     */
    abstract public function store(array $data);
}
