<?php

/**
 * Created by PhpStorm.
 * User: Gonzalo Bascone
 * Date: 7/02/2018
 * Time: 12:34 AM
 */

use App\model\User;
use libreria\ORM\EtORM;
use \vista\Vista;

class AuthController
{

    public function index()
    {
        return Vista::crear("auth.login");
    }

    public function permiso()
    {
        return Vista::crear("auth.permiso");
    }

    public function error()
    {
        return Vista::crear("auth.error");
    }


    public function ingresar()
    {

        if (val_csrf()) {


            $usuario = input("usuario");
            $password = encriptar(input("password"));
            $_SESSION['redirrecion'] = input('redirrecion');
            $objOrm = new EtORM();
            $data = $objOrm->Ejecutar("login", array($usuario, $password));
            if (count($data) > 0) {
                $_SESSION['id'] = $data[0]["id"];
                $_SESSION['usuario'] = $data[0]["usuario"];
                $_SESSION['email'] = $data[0]["email"];
                $_SESSION['privilegio'] = $data[0]["privilegio"];
                if ($_SESSION['redirrecion'] == NULL) {
                    redirecciona()->to("/admin");
                } else {
                    redirecciona()->to("/articulo/vista/#" . $_SESSION['redirrecion']);
                    unset($_SESSION['redireccion']);
                }
            } else {
                redirecciona()->to("/login")->withMessage(array(
                    "estado" => "false",
                    "mensaje" => "Usuario/Password incorrectos",
                ));
            }
        } else {
            echo "esta mal";
        }
    }

    public function recuperar()
    {
        return Vista::crear("auth.recuperar");
    }

    public function recuperarcontra()
    {
        return Vista::crear("auth.restablecer");
    }
    public function procesos()
    {
        return Vista::crear("auth.procesos");
    }

    public function enviar()
    {

        $email = input("email");
        $objOrm = new EtORM();
        $data = $objOrm->Ejecutar("usuario_em", array($email));
        $_SESSION["usuario_email"] = $data[0]['usuario'];
        $direccion = 'http://divfile.dnsalias.com/login/recuperarcontra';
        if (count($data) > 0) {
            $to = input("email");
            $subject = "Recuperar la contraseña";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= "FROM: Divfile <noretry.divinf@gmail.com>\r\n";
            $_SESSION['usuario_e'] = $data[0]['email'];
            $_SESSION['usuario_email'] = $_SESSION['usuario_e'];
            $usuario_nombre = $data[0]['usuario'];


            If (!isset ($_COOKIE["recuperar"])) {
                setcookie("recuperar", $_SESSION["usuario_email"] , time() + 60 * 5);
            };

            $message = "<html>
<head>
<title>¡Hola! </title>
</head>
<body>
<h1>¡Hola - " . "$usuario_nombre" . "!</h1>
<p>No te preocupes, puedes restablecer tu contraseña haciendo click en el siguiente enlace: <a href=" . "$direccion" . "/?page=" . $_SESSION["usuario_email"] . ">Volver a establecer contraseña</a></p>
<p>El enlace no sera válido 5 minutos posteriores al pedido.</p>
<p>Un saludo, El equipo de Divinf</p>
</body>
</html>";

            mail($to, $subject, $message, $headers);
            $_SESSION['proceso']='enviado';
            redirecciona()->to("login/procesos/?page=" . $_SESSION['proceso']);
        } else {
            redirecciona()->to("login/recuperar")->withMessage(array(
                "estado" => "false",
                "mensaje" => "El email ingreso no se encuentra registrado",
            ));
        }

    }

    public function modificar_password()
    {
        try {
            $usuario_email = input('usuario_email');
            $objOrm = new EtORM();
            $data = $objOrm->Ejecutar("usuario_em", array($usuario_email));
            $_SESSION['id'] = $data[0]["id"];

            if (isset($_SESSION['id'])) {
                $user = User::find(($_SESSION['id']));
            }
            $user->pass = crypt(input("password_nuevo"), '$2a$07$usesomesillystringforsalt$');
            $user->guardar();
            $_SESSION['proceso']='modificado';
            If (isset ($_COOKIE["recuperar"])) {
                setcookie("recuperar", '');
            };

            return redirecciona()->to("login/procesos/?page=" . $_SESSION['proceso']);

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

}




