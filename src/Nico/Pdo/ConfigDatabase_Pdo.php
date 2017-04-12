<?php

namespace Nico\Pdo;

use PDO;

/**
 * Class ConfigDatabase_Pdo
 * @package Pdo
 */
class ConfigDatabase_Pdo extends PDO {

    /**
     * @var string
     */
    private $engine;

    /**
     * @var string
     */
    private $host;

    /**
     * @var string
     */
    private $database;

    /**
     * @var string
     */
    private $user;

    /**
     * @var string
     */
    private $pass;

    /**
     * ConfigDatabase_Pdo constructor.
     * @param string $engine
     * @param string $host
     * @param string $database
     * @param string $user
     * @param string $pass
     */
    public function __construct($engine, $host, $database, $user, $pass) {
        $this->engine   = (string) $engine;
        $this->host     = (string) $host;
        $this->database = (string) $database;
        $this->user     = (string) $user;
        $this->pass     = (string) $pass;
        $dsn            = $this->engine . ':dbname=' . $this->database . ';host=' . $this->host;
        parent::__construct($dsn, $this->user, $this->pass);
    }
}