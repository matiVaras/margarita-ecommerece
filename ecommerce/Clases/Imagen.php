<?php

class Imagen {
    
    protected $error;

    public function subirImagen($directorio, $datosArchivo) : string {
        if (!empty($datosArchivo['tmp_name'])) {
            // Obtenemos el nombre original del archivo
            $og_name = explode(".", $datosArchivo['name']);
            $extension = end($og_name);
            $filename = time() . ".$extension";

            $fileUpload = move_uploaded_file($datosArchivo['tmp_name'], "$directorio/$filename");

            if (!$fileUpload) {
                throw new Exception("No se pudo subir la imagen");
            } else {
                return $filename;
            }
        }
    }


    public function borrarImagen($archivo) : bool {
        if (file_exists($archivo)) {
            $fileDelete = unlink($archivo);

            if (!$fileDelete) {
                throw new Exception("No se pudo borrar la imagen");
            } else {
                return true;
            }
        } else {
            return false;
        }
    }

    /**
     * Get the value of error
     */
    public function getError() {
        return $this->error;
    }
}
