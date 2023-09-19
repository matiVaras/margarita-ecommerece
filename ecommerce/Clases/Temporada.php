<?php
    class Temporada {
        protected $id;
        protected $nombre;

        public function lista_completa() : array {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM temporada";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $result = $PDOStatement->fetchAll();

        return $result;
    }

    public function get_por_id(int $id) {
        $resultado = [];
        $query = "SELECT * FROM temporada WHERE id = $id";
        $conexion = (new Conexion())->getConexion();
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute();
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $resultado = $PDOStatement->fetch();
        return $resultado;
    }

    public function getNombre() {
        return $this->nombre;
    }
};
?>
