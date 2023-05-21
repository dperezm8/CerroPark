<?php


class Usuario{

    private $id;
    private $email;
    private $password;
    private $first_name;
    private $last_name;
    private $permiso;
    private $tabla;

    /**
     * Usuario constructor.
     * @param $id
     * @param $email
     * @param $password
     * @param $first_name
     * @param $last_name
     * @param $permiso
     */
    public function __construct($id="", $email="", $first_name='', $last_name='', $permiso="",$password=""){
        $this->id = $id;
        $this->email = $email;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->password = $password;
        $this->permiso = $permiso;
        $this->tabla = "usuarios";
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
    public function getMail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setMail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPass()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPass($password)
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getFirst_Name()
    {
        return $this->first_name;
    }

    /**
     * @param string $first_name
     */
    public function setFirst_Name($first_name)
    {
        $this->first_name = $first_name;
    }

    /**
     * @return string
     */
    public function getLast_Name()
    {
        return $this->last_name;
    }

    /**
     * @param string $last_name
     */
    public function setLast_Name($last_name)
    {
        $this->last_name = $last_name;
    }

    /**
     * @return string
     */
    public function getPermiso()
    {
        return $this->permiso;
    }

    /**
     * @param string $permiso
     */
    public function setPermiso($permiso)
    {
        $this->permiso = $permiso;
    }

}