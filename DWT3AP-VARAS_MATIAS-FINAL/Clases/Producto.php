<?php
class Producto {
    protected $id;
    protected $titulo;
    protected $prenda_id;
    protected $talle;
    protected $temporada_id;
    protected $material_id;
    protected $marca_id;
    protected $descripcion;
    protected $portada;
    protected $precio;

    protected static $createValues = [
        'id',
        'titulo',
        'prenda_id',
        'talle',
        'temporada_id',
        'material_id',
        'marca_id',
        'descripcion',
        'portada',
        'precio'
    ];

    public function insert($titulo, $prenda_id, $temporada_id, $material_id, $marca_id, $talle, $descripcion, $portada, $precio) {

        $conexion = Conexion::getConexion();
        // $query = "INSERT INTO producto VALUES (NULL, :titulo, :prenda_id, :temporada_id, :material_id, :marca_id, :talle, :descripcion, :portada, :precio)";
        $query = "INSERT INTO `producto` (`id`, `titulo`, `prenda_id`, `talle`, `temporada_id`, `material_id`, `marca_id`, `descripcion`, `portada`, `precio`) VALUES (NULL, '$titulo', $prenda_id, $talle, $temporada_id, $material_id, $marca_id, $descripcion, '$portada', $precio)";

        $PDOStatement = $conexion->prepare($query);
        // $PDOStatement->execute(
        //     [
        //         'titulo' => $titulo,
        //         'prenda_id' => $prenda_id,
        //         'temporada_id' => $temporada_id,
        //         'material_id' => $material_id,
        //         'marca_id' => $marca_id,
        //         'talle' => $talle,
        //         'descripcion' => $descripcion,
        //         'portada' => $portada,
        //         'precio' => $precio,
        //     ]
        // );
        $PDOStatement->execute();
        return $conexion->lastInsertId();
    }

    // public function insert($titulo, $prenda_id, $temporada_id, $material_id, $marca_id, $talle, $descripcion, $portada, $precio) {
    //     $conexion = Conexion::getConexion();
    //     $query = "INSERT INTO `producto` (`id`, `titulo`, `prenda_id`, `talle`, `temporada_id`, `material_id`, `marca_id`, `descripcion`, `portada`, `precio`) VALUES (NULL, :titulo, :prenda_id, :talle, :temporada_id, :material_id, :marca_id, :descripcion, :portada, :precio)";
    
    //     $PDOStatement = $conexion->prepare($query);
    //     $PDOStatement->execute([
    //         'titulo' => $titulo,
    //         'prenda_id' => $prenda_id,
    //         'temporada_id' => $temporada_id,
    //         'material_id' => $material_id,
    //         'marca_id' => $marca_id,
    //         'talle' => $talle,
    //         'descripcion' => $descripcion,
    //         'portada' => $portada,
    //         'precio' => $precio,
    //     ]);
    //     return $conexion->lastInsertId();
    // }

    public function edit($titulo, $descripcion, $precio, $id) {
        $conexion = Conexion::getConexion();
        $query = "UPDATE `producto` SET `titulo` = :titulo, `descripcion` = :descripcion, `precio` = :precio WHERE `producto`.`id` = :id";
        
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            'titulo' => $titulo,
            'descripcion' => $descripcion,
            'precio' => $precio,
            'id' => $id
        ]);
    }

    public function mapear($productoArray): Producto {
        $producto = new self();
        foreach (self::$createValues as $atributo) {
            $producto->{$atributo} = $productoArray[strval($atributo)];
        }
        $producto->material = (new Material())->get_por_id(intval($productoArray['material_id']));
        $producto->artista = (new Marca())->get_por_id(intval($productoArray['marca_id']));
        $producto->serie = (new Temporada())->get_por_id(intval($productoArray['temporada_id']));
        $producto->prenda = (new Prenda())->get_por_id(intval($productoArray['prenda_id']));

        return $producto;
    }

    public function traer_catalogo_completo(): array {
        $catalogo = [];

        $conexion = (new Conexion())->getConexion();
        $query = "SELECT p.*, GROUP_CONCAT(DISTINCT m.nombre) as materiales, GROUP_CONCAT(DISTINCT ma.nombre) as marcas, GROUP_CONCAT(DISTINCT t.nombre) as temporadas, pr.nombre as prenda_nombre
                  FROM producto p
                  LEFT JOIN material m ON p.material_id = m.id
                  LEFT JOIN marca ma ON p.marca_id = ma.id
                  LEFT JOIN temporada t ON p.temporada_id = t.id
                  LEFT JOIN prenda pr ON p.prenda_id = pr.id
                  GROUP BY p.id";
        
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $catalogo = $PDOStatement->fetchAll();
        
        return $catalogo;
    }


    public function catalogo_por_prenda(string $prenda_id): array {
        $catalogo = [];

        $conexion = (new Conexion())->getConexion();
        $query = "SELECT p.*, GROUP_CONCAT(DISTINCT m.nombre) as materiales, GROUP_CONCAT(DISTINCT ma.nombre) as marcas, GROUP_CONCAT(DISTINCT t.nombre) as temporadas, pr.nombre as prenda_nombre
                  FROM producto p
                  LEFT JOIN material m ON p.material_id = m.id
                  LEFT JOIN marca ma ON p.marca_id = ma.id
                  LEFT JOIN temporada t ON p.temporada_id = t.id
                  LEFT JOIN prenda pr ON p.prenda_id = pr.id
                  WHERE p.prenda_id = ?
                  GROUP BY p.id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute([$prenda_id]);
        
        $catalogo = $PDOStatement->fetchAll();

        return $catalogo;
    }


    public function producto_por_id(int $idProducto) : ? Producto {
        $conexion = (new Conexion())->getConexion();
        $query = "SELECT p.*, GROUP_CONCAT(DISTINCT m.nombre) as materiales, GROUP_CONCAT(DISTINCT ma.nombre) as marcas, GROUP_CONCAT(DISTINCT t.nombre) as temporadas, pr.nombre as prenda_nombre
                  FROM producto p
                  LEFT JOIN material m ON p.material_id = m.id
                  LEFT JOIN marca ma ON p.marca_id = ma.id
                  LEFT JOIN temporada t ON p.temporada_id = t.id
                  LEFT JOIN prenda pr ON p.prenda_id = pr.id
                  WHERE p.id = :idProducto";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute(["idProducto" => $idProducto]);

        $result = $PDOStatement->fetch();

        if (!$result) {
            return null;
        }
        return $result;
    }


    public function reemplazar_portada($portada, $id) {
        $conexion = Conexion::getConexion();
        $query = "UPDATE producto SET portada = :portada WHERE id = :id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            'portada' =>$portada,
            'id' => $id
        ]);
    }

    public function delete() {
        $conexion = Conexion::getConexion();
        $query = "DELETE FROM producto WHERE id = ?;";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([$this->id]);
    }

    public function precio_formateado(): string {
        return number_format($this->precio, 2, ",", ".");
    }

    public function descripcion() {
        $texto = $this->descripcion;
        $array = explode(" ", $texto);
        $resultado = "";

        if (count($array)) {
            $resultado = $texto;
        } else {
            array_splice($array);
        }
        return $resultado;
    }

    public function getId() {
        return $this->id;
    }

    public function getPortada() {
        return $this->portada;
    }

    public function getPrenda() {
        $prenda = (new Prenda())->get_por_id($this->prenda_id);
        $nombre = $prenda->getNombre();
        return "$nombre";
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getMarca() {
        $marca = (new Marca())->get_por_id($this->marca_id);
        $nombre = $marca->getNombre();
        return $nombre;
    }

    public function getTalle() {
        return $this->talle;
    }

    public function getTemporada() {
        $temporada = (new Temporada())->get_por_id($this->temporada_id);
        $nombre = $temporada->getNombre();
        return $nombre;
    }

    public function getMaterial() {
        $material = (new Material())->get_por_id($this->material_id);
        $nombre = $material->getNombre();
        return $nombre;
    }

    public function getPrecio() {
        return $this->precio;
    }
}
?>
