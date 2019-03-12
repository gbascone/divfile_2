<?php
/**
 * Created by PhpStorm.
 * User: Gonzalo Bascone
 * Date: 7/02/2018
 * Time: 12:34 AM
 */
/*
 * función que nos permite incluir los modelos dinamicamente
 * */
function includeModels()
{
    $directorio = opendir(MODELS);
    while ($archivo = readdir($directorio)) {
        if (!is_dir($archivo)) {
            require_once MODELS . $archivo;
        }
    }
}
/*
 * esta funcion no va a ayudar a retornar un asset
 * - $asset : nombre del archivo que esta dentro de asset
 * */
function asset($asset)
{
    $urlprin = trim(str_replace("index.php", "", $_SERVER["PHP_SELF"]), "/");
    echo $urlprin . "/assets/" . $asset;
}
/*
 * función que permite redireccionar hacia otra parte
 * - $rute : ruta hacia donde queremos dirigirnos
 * */

function app_asset($app_asset)
{
    $urlprin = trim(str_replace("index.php", "", $_SERVER["PHP_SELF"]), "/");
    echo "/" . $urlprin . "/app-assets/" . $app_asset;
}
/*
 * función que permite redireccionar hacia otra parte
 * - $rute : ruta hacia donde queremos dirigirnos
 * */
function redirecionar($rute)
{
    $urlprin = str_replace("index.php", "", $_SERVER["PHP_SELF"]);

    echo $urlprin;
    //header("location:/".trim($urlprin,"/")."".$rute);
}
/*
 * función que nos permite escribir una url por medio del que le pasamos
 * $rute : ruta hacia donde se va a ir.
 * */
function url($rute)
{
    $urlprin = str_replace("index.php", "", $_SERVER["PHP_SELF"]);
    echo trim($urlprin, "/") . "/" . $rute;
}
/*
 * funcion que crea el csrf, para la validación - token
 * */
session_start();
function csrf_token()
{
    if (isset($_SESSION["token"])) {
        unset($_SESSION["token"]);
    }
    $csrf_token             = md5(uniqid(mt_rand(), true));
    $_SESSION["csrf_token"] = $csrf_token;
    echo $csrf_token;
}
/*
 * validar csrf_token, por medio de sesiones
 * */
function val_csrf()
{
    if ($_REQUEST["_token"] == $_SESSION["csrf_token"]) {
        return true;
    } else {
        return false;
    }
}
/*
 * funcion que nos permite recuperar un input
 * */
function input($name)
{
    $re = new \Library\help\Request();
    return $re->input($name);
}
/*
 * Funcion que nos permite retornar json a partir de un array
 * */
function json_response($data)
{
    header('Content-Type: application/json');
    if (is_array($data)) {
        $array = array();
        foreach ($data as $d) {
            array_push($array, $d->getColumnas());
        }
        return json_encode($array);
    } else {
        return json_encode($data->getColumnas());
    }
}
/*
 * Permite encriptar un string
 * */
function encriptar($string)
{
    return crypt($string, '$2a$07$usesomesillystringforsalt$');
}

/*
redireccionar
 */
function redirecciona()
{
    return new Redirecciona();
}


function input_html($name)
{
    $re = new \Library\help\Request();
    return $re->input_html($name);
}

function eliminar_tildes($cadena){

    //Codificamos la cadena en formato utf8 en caso de que nos de errores
    $cadena = utf8_encode($cadena);

    //Ahora reemplazamos las letras
    $cadena = str_replace(
        array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
        array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
        $cadena
    );

    $cadena = str_replace(
        array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
        array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
        $cadena );

    $cadena = str_replace(
        array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
        array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
        $cadena );

    $cadena = str_replace(
        array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
        array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
        $cadena );

    $cadena = str_replace(
        array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
        array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
        $cadena );

    $cadena = str_replace(
        array('ñ', 'Ñ', 'ç', 'Ç'),
        array('n', 'N', 'c', 'C'),
        $cadena
    );

    return $cadena;
}
