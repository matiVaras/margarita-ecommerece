<?php
    class Prenda {
        protected $id;
        protected $nombre;
        protected $imagen;
        
    public function lista_completa() : array {
        $resultado = [];

        $query = "SELECT * FROM prenda";
        $conexion = (new Conexion())->getConexion();
        
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $resultado = $PDOStatement->fetchAll();

        return $resultado;
    }

    public function get_por_id(int $id) : ? Prenda {
        $conexion = (new Conexion())->getConexion();
        $query = "SELECT * FROM prenda WHERE id = $id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $resultado = $PDOStatement->fetch();

        if (!$resultado) {
            return null;
        }
        return $resultado;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function insert($nombre, $imagen) {
        $conexion = (new Conexion())->getConexion();
        $query = "INSERT INTO prenda VALUES(NULL, :nombre, :imagen)";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            'nombre' => $nombre,
            'imagen' => $imagen,
        ]);
    }

    public function edit($nombre, $imagen) {

        $conexion = (new Conexion())->getConexion();
        $query = "UPDATE prenda SET nombre = :nombre WHERE id = :id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(
            [
                'id' => $id,
                'nombre' => $nombre,
            ]
        );
    }

    public function reemplazar_imagen($imagen, $id) {
        $conexion = (new Conexion())->getConexion();
        $query = "UPDATE prenda SET imagen = :imagen WHERE id = :id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(
            [
                'id' => $id,
                'imagen' => $imagen
            ]
        );
    }

    /*
      Elimina esta instancia de la base de datos
     */
    public function delete() {
        $conexion = (new Conexion())->getConexion();
        $query = "DELETE FROM prenda WHERE id = ?;";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([$this->id]);
    }

    public function getId() {
        return $this->id;
    }
    
    public function getImagen() {
        return $this->imagen;
    }
}
?>
