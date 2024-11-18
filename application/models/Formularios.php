<?php
class Formularios extends CI_Model {

    public function getusuarios() {
        $sql    = "SELECT * FROM usuarios u JOIN perfiles p 
                   ON u.id_perfil = p.id_perfil
                   WHERE estado != '2'";
        $query  = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    /*
    public function getLogin($usuario,$password){

        $sql = "SELECT nombre, apellido,usuario 
      FROM usuarios WHERE usuario = '$usuario' 
    AND password = '$password' AND estado = 1 LIMIT 0,1";

        $query  = $this->db->query($sql);
        $result = $query->result();
        return $result;


    }*/




}