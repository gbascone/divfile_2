<?php

use vista\Vista;
use App\model\Categoria;
use App\model\Articulo;

/**
 * Created by PhpStorm.
 * User: Gonzalo Bascone
 * Date: 7/02/2018
 * Time: 12:34 AM
 */
class AdminController
{
    public function index()
    {
        $categorias = Categoria::all();
        $articulos = Articulo::all();
        return Vista::crear("admin.index", array(
            "articulos" => $articulos,"categorias" => $categorias,
        ));

    }


}
