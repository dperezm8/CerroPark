<?php


class Bd{

    private $server = "localhost";
    private $usuario = "root";
    private $pass = "";
    private $basedatos = "cerro_park";

    private $conexion;
    private $resultado;



    public function __construct(){

        $this->conexion = new mysqli($this->server, $this->usuario, $this->pass , $this->basedatos);
        $this->conexion->select_db($this->basedatos);
        $this->conexion->query("SET NAMES 'utf8'");


    }


    public function insertarElemento($tabla, $datos,$carpeta=""){

        $claves  = array();
        $valores = array();

        foreach ($datos as $clave => $valor){
            if($clave != "id") {
                $claves[] = $clave;
                $valores[] = "'" . $valor . "'";
            }
        }

        $sql = "INSERT INTO ".$tabla." (".implode(',', $claves).") VALUES  (".implode(',', $valores).")";
        //INSERT figuras (nombre,unidades,pintada,desscripcion....) VALUES ('figura1','43',.....)
     echo $sql;
        $this->resultado =   $this->conexion->query($sql);
        $res = $this->resultado;
        return $res;
    }

    public function uppdateBD($id, $tabla, $datos, $foto = "", $directorio = ""){

        $sentencias = array();

        foreach ($datos as $campo => $valor) {
            if ($campo != "id" && $campo != "x" && $campo != "y") {
                $sentencias[] = $campo . "='".addslashes($valor)."'";
                //UPDATE tabla SET nombreCampo = 'valor1', nombreCampo='valor'....
            }
        }



        $campos = implode(",", $sentencias);
        $sql = "UPDATE " . $tabla . " SET " . $campos . " WHERE id=" . $id;
        $conexion = new Bd();
        //echo $sql;
        $conexion->consulta($sql);
    }


    // implode -> array [a][b][c][d] -> implode(",",array) -> String -> a,b,c,d...

    public function consulta($consulta){
        // echo $consulta;
        $this->resultado =   $this->conexion->query($consulta);
        $res = $this->resultado ;
        return $res;
    }
    public function numeroElementosConSql($sql){

        $this->resultado = $this->conexion->query($sql);
        $num = $this->numeroElementos();
        return $num;

    }

    public function numeroElementos(){

        $num = $this->resultado->num_rows;
        return $num;

    }

}