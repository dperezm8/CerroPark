<?php
class Figura{

    private $idCoches;
    private $paisDeMatricula;
    private $matricula;
    private $marca;
    private $modelo;
    private $color;
    private $validoHasta;
    private $cocheTemporal;
    private $fechaAlta;
    private $deBaja;
    private $fechaBaja;
    private $tabla;

    /**
     * Figura constructor.
     * @param $idCoches
     * @param $paisDeMatricula
     * @param $matricula
     * @param $marca
     * @param $modelo
     * @param $color
     * @param $validoHasta
     * @param $cocheTemporal
     * @param $fechaAlta 
     * @param $deBaja
     * @param $fechaBaja
     * @param $tabla
     */
    public function __construct($idCoches="", $paisDeMatricula="", $matricula="", $marca="", $modelo="",
                                $color="", $validoHasta="", $cocheTemporal="", $fechaAlta="", $deBaja="",
                                $fechaBaja="")
    {
        $this->idCoches = $idCoches;
        $this->paisDeMatricula = $paisDeMatricula;
        $this->matricula = $matricula;
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->color = $color;
        $this->validoHasta = $validoHasta;
        $this->cocheTemporal = $cocheTemporal;
        $this->fechaAlta = $fechaAlta;
        $this->deBaja = $deBaja;
        $this->fechaBaja = $fechaBaja;
        $this->tabla = "coches";
    }
    private function llenar($idCoches, $paisDeMatricula, $matricula, $marca, $modelo,
                            $color, $validoHasta, $cocheTemporal, $fechaAlta, $deBaja,
                            $fechaBaja)
    {
        $this->idCoches = $idCoches;
        $this->paisDeMatricula = $paisDeMatricula;
        $this->matricula = $matricula;
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->color = $color;
        $this->validoHasta = $validoHasta;
        $this->cocheTemporal = $cocheTemporal;
        $this->fechaAlta = $fechaAlta;
        $this->deBaja = $deBaja;
        $this->fechaBaja = $fechaBaja;
        $this->validoHasta = $validoHasta;

    }
    /**
     * @return string
     */
    public function getId()
    {
        return $this->idCoches;
    }

    /**
     * @param string $idCoches
     */
    public function setId($idCoches)
    {
        $this->idCoches = $idCoches;
    }

    /**
     * @return string
     */
    public function getUnidades()
    {
        return $this->paisDeMatricula;
    }

    /**
     * @param string $paisDeMatricula
     */
    public function setUnidades($paisDeMatricula)
    {
        $this->paisDeMatricula = $paisDeMatricula;
    }

    /**
     * @return string
     */
    public function getMatricula()
    {
        return $this->matricula;
    }

    /**
     * @param string $matricula
     */
    public function setMatricula($matricula)
    {
        $this->matricula = $matricula;
    }

    /**
     * @return string
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * @param string $marca
     */
    public function setMarca($marca)
    {
        $this->marca = $marca;
    }

    /**
     * @return string
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * @param string $modelo
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
    }

    /**
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param string $color
     */
    public function setColor($color)
    {
        $this->color = $color;
    }

    /**
     * @return string
     */
    public function getValidoHasta()
    {
        return $this->validoHasta;
    }

    /**
     * @param string $cocheTemporal
     */
    public function setValidoHasta($validoHasta)
    {
        $this->validoHasta = $validoHasta;
    }

    /**
     * @return string
     */
    public function getCocheTemporal()
    {
        return $this->cocheTemporal;
    }

    /**
     * @param string $cocheTemporal
     */
    public function setCocheTemporal($cocheTemporal)
    {
        $this->cocheTemporal = $cocheTemporal;
    }

     /**
     * @return string
     */
    public function getFechaAlta()
    {
        return $this->fechaAlta;
    }

    /**
     * @param string $fechaAlta
     */
    public function setFechaAlta($fechaAlta)
    {
        $this->fechaAlta = $fechaAlta;
    }

     /**
     * @return string
     */
    public function getDeBaja()
    {
        return $this->deBaja;
    }

    /**
     * @param string $deBaja
     */
    public function setDeBaja($deBaja)
    {
        $this->deBaja = $deBaja;
    }

    /**
     * @return string
     */
    public function getFechaBaja()
    {
        return $this->fechaBaja;
    }

    /**
     * @param string $fechaBaja
     */
    public function setFechaBaja($fechaBaja)
    {
        $this->fechaBaja = $fechaBaja;
    }

    public function insertar($datos){

        if(!isset($datos['marca'])){
            $datos['marca'] = 0;
        }

        $conexion = new Bd();
        $conexion->insertarElemento($this->tabla,$datos);
    }

    public function update($idCoches, $datos){

            $conexion = new Bd();
            $conexion->uppdateBD($idCoches, $this->tabla, $datos);
    }

    /**
     * Version larga
     * @param $idCoches
     */
    public function obtenerPorId($idCoches){

        $sql = "SELECT idCoches, paisDeMatricula, matricula, marca, modelo,
                       color, validoHasta, cocheTemporal, fechaAlta, deBaja,
                       fechaBaja FROM ".$this->tabla." WHERE idCoches=".$idCoches;

        $conexion = new Bd();
        $res = $conexion->consulta($sql);
        list($idCoches, $paisDeMatricula, $matricula, $marca, $modelo, $color, 
             $validoHasta, $cocheTemporal, $fechaAlta, $deBaja, $fechaBaja) = mysqli_fetch_array($res);
        /*
        $this->idCoches = $idCoches;
        $this->paisDeMatricula = $paisDeMatricula;
        ...
        */
        $this->llenar($idCoches, $paisDeMatricula, $matricula, $marca, $modelo,
                      $color, $validoHasta, $cocheTemporal, $fechaAlta, $deBaja, 
                      $fechaBaja);

    }
    public function borrarFigura($idCoches){

        $conexion = new Bd();
        $sql = "DELETE FROM ".$this->tabla ." WHERE idCoches=".$idCoches;
        $conexion->consulta($sql);

    }
    public function obtencionPorIdVersionCorta($idCoches){

        $sql = "SELECT idCoches, paisDeMatricula, matricula, marca, modelo,
                       color, validoHasta, cocheTemporal, fechaAlta, deBaja,
                       fechaBaja FROM ".$this->tabla." WHERE idCoches=".$idCoches;

        $conexion = new Bd();
        $res = $conexion->consulta($sql);

    }

    /**
     * Método que retorna una fila para la insercion en una tabla de la clase lista.
     * @return string
     */
    public function imprimeteEnTr(){

            $html = "<tr><td>".$this->idCoches."</td>
                        <td>".$this->matricula."</td>
                        <td>".$this->marca."</td>
                        <td>".$this->modelo."</td>
                        <td>".$this->color."</td>
                        <td><a href='verFigura.php?idCoches=".$this->idCoches."'>Ver</a> </td>";

                     if($_SESSION['permiso']>1) {

                        $html.= "<td ><a href = 'ed_figura.php?idCoches=".$this->idCoches."' > Editar</a > </td >
                        <td ><a href = 'javascript:borrarFigura(".$this->idCoches.")' > Borrar</a > </td >";
                     }

                       $html .= "</tr>";

            return $html;

    }

    public function imprimirEnFicha() {

        $html = "<table border='1'>";

            $html .= "<tr><th>idCoches</th>
                        <th>Matricula</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Color</th>
                        <th>Fecha de Validez</th>
                       </tr>";
            $html .="  <tr><td>".$this->idCoches."</td>
                        <td>".$this->matricula."</td>
                        <td>".$this->marca."</td>
                        <td>".$this->modelo."</td>
                        <td>".$this->color."></td>
                        <td>".$this->validoHasta."></td>
                        </tr></table>";

        return $html;

    }

}