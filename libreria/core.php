<?php
/**
 * Created by PhpStorm.
 * User: Gonzalo Bascone
 * Date: 7/02/2018
 * Time: 12:34 AM
 */

require_once("help/helps.php");
define("APP_RUTA",RUTA_BASE."app/");
define("VISTA_RUTA",RUTA_BASE."view/");
define("ASSETS_PATH",RUTA_BASE."assets/");
define("ASSETS_PATH_APP",RUTA_BASE."app_assets/");
define("LIBRERIA",RUTA_BASE."libreria/");
define("RUTA",APP_RUTA."rutas/");
define("MODELS",APP_RUTA."model/");


//configuraciones
require_once(RUTA_BASE."config/config.php");
require_once("ORM/Conexion.php");
require_once("ORM/EtORM.php");
require_once("ORM/Modelo.php");
require_once("help/class.inputfilter.php");

//librerias
require_once("vendor/Redirecciona.php");
require_once("vendor/Session.php");

includeModels();
require_once("Vista.php");
include "Ruta.php";
include RUTA."rutas.php";
//echo APP_RUTA;