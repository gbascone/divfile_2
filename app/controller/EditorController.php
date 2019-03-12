<?php

/**
 * Created by PhpStorm.
 * User: Gonzalo Bascone
 * Date: 7/02/2018
 * Time: 12:34 AM
 */
use App\model\Categoria;
use App\model\Articulo;
use libreria\ORM\EtORM;
use \vista\Vista;

class EditorController
{

    public function vista()
    {
        $categorias = Categoria::all_order();
        $articulos = Articulo::all();
        return Vista::crear("admin.editor.vista", array(
            "articulos" => $articulos, "categorias" => $categorias,
        ));


    }

    public function index()
    {

        $categorias = Categoria::all();
        $articulos = Articulo::all();
        return Vista::crear("admin.editor.index", array(
            "articulos" => $articulos, "categorias" => $categorias,
        ));
    }


    public function lista()
    {

        $categorias = Categoria::all_order();
        $articulos = Articulo::all();
        return Vista::crear("admin.editor.listado", array(
            "articulos" => $articulos, "categorias" => $categorias,
        ));


    }

    public function agregar()
    {
        try {
            $arti = input("titulo");
            $objOrm = new EtORM();
            $data = $objOrm->Ejecutar("articulo", array($arti));
            $articulo = new Articulo();

            if (count($data) <= 0) {
                if (input('articulo_id')) {
                    $articulo = Articulo::find(input('articulo_id'));
                }
                $articulo->id_categoria = input("categoria");
                $articulo->titulo = input("titulo");
                $articulo->contenido = input_html("editor1");
                $articulo->fecha_creado = input(date('d/m/Y H:i:categorias'));
                $articulo->guardar();

                redirecciona()->to("articulo/lista");

            } elseif (count($data) > 0 && input('articulo_id')) {
                $articulo = Articulo::find(input('articulo_id'));
                if (eliminar_tildes($articulo->titulo) == eliminar_tildes($arti)) {
                    $articulo->id_categoria = input("categoria");
                    $articulo->titulo = input("titulo");
                    $articulo->contenido = input_html("editor1");
                    $articulo->fecha_creado = input(date('d/m/Y H:i:categorias'));
                    $articulo->guardar();
                    redirecciona()->to("articulo/lista");
                } else {
                    redirecciona()->to("articulo/editar/" . $articulo->id . "/?page=editar")->withMessage(array(
                        "estado" => "false",
                        "mensaje" => "El nombre del articulo ya existe, cambiar el nombre",
                    ));
                }
            } else {

                redirecciona()->to("articulo/index?page=nuevo")->withMessage(array(
                    "estado" => "false",
                    "mensaje" => "El nombre del articulo ya existe",
                ));

            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }

    }

    public function editar($id)
    {
        $categorias = Categoria::all();
        $articulo = Articulo::find($id);
        if (count($articulo)) {
            return Vista::crear('admin.editor.index', array("articulo" => $articulo, "categorias" => $categorias));
        }
        return redirecciona()->to('articulo/lista');
    }

    public function eliminar($id)
    {
        $articulo = Articulo::find($id);
        if (count($articulo)) {
            $articulo->eliminar();
            return redirecciona()->to('articulo/lista');
        }
        return redirecciona()->to('articulo/lista');
    }
}
