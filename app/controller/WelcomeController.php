<?php
/**
 * User: eytoo
 * Date: 6/10/2015
 * Time: 12:33 AM
 */
use \vista\Vista;
use App\model\Categoria;
use App\model\Articulo;

class WelcomeController
{

    public function index()
    {
        $categorias = Categoria::all();
        $articulos = Articulo::all();
        return Vista::crear("index", array(
            "articulos" => $articulos,"categorias" => $categorias,
        ));
    }

}
