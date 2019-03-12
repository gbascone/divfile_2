<?php
//todas las rutas disponibles en nuestra aplicación
$ruta = new Ruta();
$ruta->controladores(array(
    "/"         => "WelcomeController",
    "/login"    => "AuthController",
    "/error"    => "AuthController",
    "/usuario"  => "UsuarioController",
    "/admin"    => "AdminController",
    "/articulo"   => "EditorController",
    "/categorias"   => "CategoriaController",
));
