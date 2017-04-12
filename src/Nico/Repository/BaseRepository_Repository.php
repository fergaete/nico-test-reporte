<?php

namespace Nico\Repository;

/**
 * Class BaseRepository_Repository
 * @package Repository
 */
abstract class BaseRepository_Repository {

    /**
     * @var EntityManager_Repository
     */
    private $entityManager;

    /**
     * BaseRepository_Repository constructor.
     */
    public function __construct() {
        $this->entityManager = new EntityManager_Repository();
    }

    /**
     * @param string $query
     * @param array $argumentos
     * @return array
     */
    public function fetchAll($query, array $argumentos = array()) {
        $statement = $this->entityManager->getPdo()->prepare($query);
        $statement->execute($argumentos);
        return $statement->fetchAll();
    }

    /**
     * @return EntityManager_Repository
     */
    public function getEntityManager() {
        return $this->entityManager;
    }
}