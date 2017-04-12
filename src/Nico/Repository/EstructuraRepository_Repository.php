<?php

namespace Nico\Repository;

use Nico\Dao\Collection\EstructuraCollection_Collection;
use Nico\Dao\Estructura_Dao;

/**
 * Class EstructuraRepository_Repository
 * @package Nico\Repository
 */
class EstructuraRepository_Repository extends BaseRepository_Repository {

    /**
     * @return EstructuraCollection_Collection
     */
    public function findPadres() {
        $query                  = 'SELECT * FROM unidad u;';
        $estructuraCollection   = new EstructuraCollection_Collection();
        foreach ($this->fetchAll($query) as $data) {
            $estructura = new Estructura_Dao(
                $data['id_estructura'],
                $data['nombre_estructura']
            );
            $estructuraCollection->add($estructura);
        }
        return $estructuraCollection;
    }
}