<?php

namespace Nico\Dao;

/**
 * Class Estructura_Dao
 * @package Dao
 */
class Estructura_Dao {

    /**
     * @var int
     */
    private $idEstructura;

    /**
     * @var string
     */
    private $nombre;

    /**
     * @var int
     */
    private $idPadre;

    /**
     * @var int
     */
    private $primerPadre;

    /**
     * @var int
     */
    private $nivel;

    /**
     * Estructura_Dao constructor.
     * @param int $idEstructura
     * @param string $nombre
     */
    public function __construct($idEstructura, $nombre) {
        $this->idEstructura = (int) $idEstructura;
        $this->nombre       = (string) $nombre;
    }

    /**
     * @return int
     */
    public function getIdEstructura() {
        return $this->idEstructura;
    }

    /**
     * @param int $idEstructura
     */
    public function setIdEstructura($idEstructura) {
        $this->idEstructura = (int) $idEstructura;
    }

    /**
     * @return string
     */
    public function getNombre() {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     */
    public function setNombre($nombre) {
        $this->nombre = (string) $nombre;
    }

    /**
     * @return int
     */
    public function getIdPadre() {
        return $this->idPadre;
    }

    /**
     * @param int $idPadre
     */
    public function setIdPadre($idPadre) {
        $this->idPadre = (int) $idPadre;
    }

    /**
     * @return int
     */
    public function getPrimerPadre() {
        return $this->primerPadre;
    }

    /**
     * @param int $primerPadre
     */
    public function setPrimerPadre($primerPadre) {
        $this->primerPadre = (int) $primerPadre;
    }

    /**
     * @return int
     */
    public function getNivel() {
        return $this->nivel;
    }

    /**
     * @param int $nivel
     */
    public function setNivel($nivel) {
        $this->nivel = (int) $nivel;
    }
}