<?php
class Database{

    private $conexion;
    private $error = "";

    public function __construct(){
        try{
            $this->conexion = new mysqli(
                "localhost",
                "root",
                "",
                "pokedex");
        }catch (Exception $e){
            $this->error = "Falló la conexión a la base de datos.";
        }
    }

    // esta seria una func generica donde le paso la query por parametro (OJO con los insert, NO usar esta funcion hacer otra pq
    // el "MYSQLI_ASSOC" te tira error si le haces un insert)
    public function getPorQuery($sql){
        return $this->conexion->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function saberSiExisteElUsuario($usuario, $password){
        $stmt = $this->conexion->prepare("SELECT * FROM usuario WHERE nombre_usuario = ? and password_usuario = ?");
        $stmt->bind_param("ss", $usuario, $password);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function dameTodosLosPokemones(){
        return $this->conexion->query("SELECT * FROM `pokemon` INNER JOIN `tipo` ON `pokemon`.`id_tipo` = `tipo`.`id_tipo`")->fetch_all(MYSQLI_ASSOC);
    }

    public function getError(){
        return $this->error;
    }
    public function __destruct(){
        if ($this->error == ""){
            $this->conexion->close();
        }
    }

    public function eliminarPokemonPorId($idPokemonAEliminar){
        $stmt = $this->conexion->prepare("DELETE FROM `pokemon` where `id_pokemon` = ?");
        $stmt->bind_param("s",$idPokemonAEliminar);
        $stmt->execute();
    }

    public function buscarPokemonPorId($idRecibido){
        $stmt = $this->conexion->prepare("SELECT * FROM `pokemon` JOIN `tipo` ON `tipo`.`id_tipo` = `pokemon`.`id_tipo` where `pokemon`.`id_pokemon` = ?");
        $stmt->bind_param("i",$idRecibido);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function buscarPokemonPorNumeroIdentificador($idUnicoPokemon){
        $stmt = $this->conexion->prepare("SELECT * FROM `pokemon` where `numero_identificador` = ?");
        $stmt->bind_param("i",$idUnicoPokemon);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function editarPokemon($nombre, $descripcion, $idUnicoPokemon, $tipoPokemon, $imagen,$idPokemonAEditar){
        $stmt = $this->conexion->prepare("UPDATE `pokemon` SET `numero_identificador`= ? ,`imagen`= ? ,`nombre`= ? ,`id_tipo`= ? ,`descripcion`= ? WHERE `id_pokemon` = ? ");
        $stmt->bind_param("issisi",$idUnicoPokemon,$imagen,$nombre,$tipoPokemon,$descripcion,$idPokemonAEditar);
        $stmt->execute();
    }

    public function bucarPokemonPorNombre($nombre){
        $stmt = $this->conexion->prepare("SELECT * FROM `pokemon` where `nombre` LIKE ?");
        $stmt->bind_param("s",$nombre);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
}