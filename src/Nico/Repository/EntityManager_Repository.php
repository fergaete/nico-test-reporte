<?php

namespace Nico\Repository;

use PDO;
use Nico\Pdo\ConfigDatabase_Pdo;

/**
 * Class EntityManager_Repository
 * @package Repository
 */
class EntityManager_Repository {

    /**
     * @var PDO
     */
    private $pdo;

    /**
     * EntityManager_Repository constructor.
     */
    public function __construct() {
        $this->pdo = new ConfigDatabase_Pdo('mysql', '127.0.0.1', 'pa', 'root', '');
    }

    /**
     * @return PDO
     */
    public function getPdo() {
        return $this->pdo;
    }
}