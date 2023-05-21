<?php


class Categoria
{

    private $id;
    private $first_name;
    private $icono;
    private $descripcion;

    /**
     * Categoria constructor.
     * @param $id
     * @param $first_name
     * @param $icono
     * @param $descripcion
     */
    public function __construct($id="", $first_name="", $icono="", $descripcion="")
    {
        $this->id = $id;
        $this->first_name = $first_name;
        $this->icono = $icono;
        $this->descripcion = $descripcion;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getfirst_name()
    {
        return $this->first_name;
    }

    /**
     * @param string $first_name
     */
    public function setfirst_name($first_name)
    {
        $this->first_name = $first_name;
    }

    /**
     * @return string
     */
    public function getIcono()
    {
        return $this->icono;
    }

    /**
     * @param string $icono
     */
    public function setIcono($icono)
    {
        $this->icono = $icono;
    }

    /**
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param string $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }


}