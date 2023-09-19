<?PHP

class Autenticacion {

    /*
        Verifica las credenciales del usuario, y de ser correctas guarda los datos en la sesión
        $username El nombre de usuario provisto
        $username El password provisto
        Devuelve TRUE en caso que las credenciales sean correctas, FALSE en caso de que no lo sean
    */
    public function log_in(string $usuario, string $password) : ? string {

        echo "<p>VAMOS A INTENTAR AUTENTICAR UN USUARIO</p>";
        echo "<p>El nombre de usuario provisto es: $usuario</p>";
        echo "<p>El password provisto es: $password</p>";

        $datosUsuario = (new Usuario())->usuario_x_username($usuario);

        if ($datosUsuario) {
            if (password_verify($password, $datosUsuario->getPassword())) {
                echo "<p>EL PASSWORD ES CORRECTO! LOGUEAR!</p>";
                $datosLogin['username'] = $datosUsuario->getNombre_usuario();
                $datosLogin['id'] = $datosUsuario->getId();
                $datosLogin['rol'] = $datosUsuario->getRol();
                $_SESSION['loggedIn'] = $datosLogin;
                return $datosLogin['rol'];
            } else {
                (new Alerta())->add_alerta('danger', "Contraseña incorrecta");
                return null;
            }
        } else {
            (new Alerta())->add_alerta('warning', "Usuario no encontrado");
            return null;
        }
    }

    public function log_out()
    {
        //(new Alerta())->clear_alertas();
        if (isset($_SESSION['loggedIn'])) {
            unset($_SESSION['loggedIn']);
        };
    }

    public function verify() : bool
    {
        if (isset($_SESSION['loggedIn'])) {
            return TRUE;
        } else {
            //header('location: ./index.php?sec=login');
        }
    }
}
