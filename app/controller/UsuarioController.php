<?php
/**
 * Created by PhpStorm.
 * User: Gonzalo Bascone
 * Date: 7/02/2018
 * Time: 12:34 AM
 */
use \App\model\User;
use libreria\ORM\EtORM;
use \vista\Vista;

class UsuarioController
{
    public function index() {

        $usuarios = User::all();
        return Vista::crear("admin.usuario.index", array(
            "usuarios" => $usuarios,
        ));
    }

    public function lista()
    {
        $usuarios = User::all();
        return Vista::crear("admin.usuario.listado", array(
            "usuarios" => $usuarios,
        ));
    }

    public function perfil($id)
    {
        if (($id == $_SESSION['id']) && ($_SESSION['privilegio'] != 'admin')) {
            $usuario = User::find($id);
            if (count($usuario)) {
                return Vista::crear('admin.usuario.perfil', array("usuario" => $usuario));
            }
        }elseif ($_SESSION['privilegio'] == 'admin'){
            $usuario = User::find($id);
            if (count($usuario)) {
                return Vista::crear('admin.usuario.perfil', array("usuario" => $usuario));
            }
        }
        else {
            return redirecciona()->to('usuario');
        }
    }


    public function agregar()
    {
        try {

            $usuario = input("usuario");
            $email = input("email");
            $objOrm = new EtORM();
            $data = $objOrm->Ejecutar("usuario_u", array($usuario));
            $objOrm1 = new EtORM();
            $data1 = $objOrm1->Ejecutar("usuario_em", array($email));
            $user = new User();

            $usuario_repetido = $data[0]["usuario"];
            $email_repetido = $data[0]["email"];

            $usuario_repetido1 = $data1[0]["usuario"];
            $email_repetido1 = $data1[0]["email"];

            $direccion = 'http://104.207.146.104:83/divfile/login/';
            if (count($data) == 0 && count($data1) == 0) {

                if (input('usuario_id')) {
                    $user = User::find(input('usuario_id'));
                }
                if ($_SESSION["privilegio"] == "admin") {

                    $user->email = input("email");
                    $user->usuario = input("usuario");
                    if (input("password")) {
                        $user->pass = crypt(input("password"), '$2a$07$usesomesillystringforsalt$');
                    }
                    $user->privilegio = input("privilegio");
                    $user->guardar();

                    $to =  $user->email;
                    $passw = input("password");
                    $subject = "Usuario Creado - Divfile";
                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    $headers .= "FROM: Divfile <noretry.divinf@gmail.com>\r\n";


                    $message = "<html>
<head>
<title>¡Hola! </title>
</head>
<body>
<h1>¡Hola!</h1>
<p>Se ha creado tu usuario para el sistema de documentación. Los datos para ingresar al sistema son los siguientes:</p>
<p>Usuario: $user->usuario</p>
<p>Contraseña: $passw</p>
<p>Para iniciar sesión, hacer click en el siguiente enlace: <a href=" . "$direccion" . ">Ir a la página</a></p>
<p>Un saludo, El equipo de Divinf</p>
</body>
</html>";

                    mail($to, $subject, $message, $headers);

                    return redirecciona()->to('usuario/lista');


                } else {

                    return redirecciona()->to('usuario/perfil/' . $_SESSION['id']);
                }



            } else if ((count($data) > 0 || count($data1) > 0) && input('usuario_id')) {
                $user = User::find(input('usuario_id'));

                if (($user->usuario == $usuario && $user->email == $email ) || ( $usuario_repetido != $usuario && $email_repetido != $email ) || ( $usuario_repetido1 != $usuario && $email_repetido1 != $email )) {
                    if ($_SESSION["privilegio"] == "admin") {

                        $user->email = input("email");
                        $user->usuario = input("usuario");
                        if (input("password")) {
                            $user->pass = crypt(input("password"), '$2a$07$usesomesillystringforsalt$');
                        }
                        $user->privilegio = input("privilegio");
                        $user->guardar();

                        return redirecciona()->to('usuario/lista');


                    } else {
                        $user->email = input("email");
                        $user->usuario = input("usuario");
                        if (input("password")) {
                            $user->pass = crypt(input("password"), '$2a$07$usesomesillystringforsalt$');
                        }
                        $user->guardar();

                        return redirecciona()->to('usuario/perfil/' .$_SESSION['id']);


                    }
                } else {
                    redirecciona()->to("usuario/editar/" . $user->id . "/?page=editar")->withMessage(array(
                        "estado" => "false",
                        "mensaje" => "El usuario o el email ya existe",
                    ));
                }


            } else {

                redirecciona()->to("usuario/index?page=nuevo")->withMessage(array(
                    "estado" => "false",
                    "mensaje" => "El usuario o el email ya han sido utilizados",
                ));

            }

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    /**
     * Método para editar usuario
     *
     * @param   int     $id     id del usuario
     * @return  redirect
     */
    public function editar($id)
    {
        if (($id == $_SESSION['id']) && ($_SESSION['privilegio'] != 'admin')) {
            $usuario = User::find($id);
            if (count($usuario)) {
                return Vista::crear('admin.usuario.index', array("usuario" => $usuario));
            }
            return redirecciona()->to('login/permiso');
        }elseif ($_SESSION['privilegio'] == 'admin'){
            $usuario = User::find($id);
            if (count($usuario)) {
                return Vista::crear('admin.usuario.index', array("usuario" => $usuario));
            }
            return redirecciona()->to('login/permiso');
        }
        else {
            return redirecciona()->to('login/permiso');
        }
    }


    public function eliminar($id)
    {
        $usuario = User::find($id);
        if ($id != $_SESSION['id']) {
            if (count($usuario)) {
                $usuario->eliminar();
                return redirecciona()->to('usuario');
            }
            return redirecciona()->to('usuario');
        }else{
            redirecciona()->to("usuarios/lista")->withMessage(array(
                "estado" => "false",
                "mensaje" => "<script>alert('ERROR: El usuario que desea eliminar se encuentra actualmente en uso')</script>",
            ));
        }
    }

    public function modificar_password()
    {
        try {
            if (input('usuario_id')) {
                $user = User::find(input('usuario_id'));
            }
            if ($_SESSION["privilegio"] == "admin") {
                $user->pass = crypt(input("password_nuevo"), '$2a$07$usesomesillystringforsalt$');
                $user->guardar();
                return redirecciona()->to("usuario/lista/");

            } else {
                $user->pass = crypt(input("password_nuevo"), '$2a$07$usesomesillystringforsalt$');
                $user->guardar();
                return redirecciona()->to("usuario/perfil/" . input('usuario_id'));
            }

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

}