<?php
class Database{

    private $conexion;
    public function __construct(){
        $this->conexion = new mysqli(
            "localhost",
            "root",
            "",
            "pokedex");
    }

    // esta seria una func generica donde le paso la query por parametro (OJO con los insert, NO usar esta funcion hacer otra pq
    // el "MYSQLI_ASSOC" te tira error si le haces un insert)
    public function getPorQuery($sql){
        return $this->conexion->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function __destruct(){
        $this->conexion->close();
    }
}