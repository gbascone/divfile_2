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

class CategoriaController {

    public function index() {

        $categorias = Categoria::all();
        return Vista::crear("admin.categorias.index", array(
            "categorias" => $categorias,
        ));
    }


    public function lista()
    {

        $categorias= Categoria::all_order();
        $articulos = Articulo::all();
        return Vista::crear("admin.categorias.listado", array(
            "articulos" => $articulos,"categorias" => $categorias,
        ));


    }

    public function validar()
    {
        $post_order = isset($_POST["n_orden"]) ? $_POST["n_orden"] : [];

        if(count($post_order)>0){
            for($order_no= 0; $order_no < count($post_order); $order_no++)
            {

                $categ = $post_order[$order_no];
                $objOrm = new EtORM();
                $data = $objOrm->Ejecutar("categoria_id", array($categ));
                $categorias = new Categoria();

                if (count($data) > 0) {
                    $categorias = Categoria::find("$post_order[$order_no]");
                    $categorias->orden = $order_no+1;
                    $categorias->guardar();

                }
            }
            echo true;

        }else{
            echo false;

        }

    }

    public function orden()
    {

        $categorias= Categoria::all_order();
        return Vista::crear("admin.categorias.orden", array(
            "categorias" => $categorias,
        ));
    }

    public function agregar()
    {


        try {
            $cate = input("categoria");
            $objOrm = new EtORM();
            $data = $objOrm->Ejecutar("categoria", array($cate));
            $categorias = new Categoria();

            if (count($data) == 0) {
                if (input('categoria_id')){
                    $categorias = Categoria::find(input('categoria_id'));
                }
                $categorias->categoria = input("categoria");
                $categorias->descripcion = input("descripcion");
                $categorias->guardar();

                redirecciona()->to("categorias/lista");

            }elseif (count($data) > 0 && input('categoria_id')) {
                $categorias = Categoria::find(input('categoria_id'));
                if (eliminar_tildes($categorias->categoria) == eliminar_tildes($cate)) {
                    $categorias->categoria = input("categoria");
                    $categorias->descripcion = input("descripcion");
                    $categorias->guardar();
                    redirecciona()->to("categorias/lista");
                }else{
                    redirecciona()->to("categorias/editar/" . $categorias->id . "/?page=editar")->withMessage(array(
                        "estado" => "false",
                        "mensaje" => "La categoria ya existe",
                    ));
                }
            }else{

                redirecciona()->to("categorias/index?page=nuevo")->withMessage(array(
                    "estado" => "false",
                    "mensaje" => "La categoria ya existe",
                ));

            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }

    }
    public function editar($id)
    {
        $categorias= Categoria::find($id);
        if (count($categorias)) {
            return Vista::crear('admin.categorias.index', array("categorias" => $categorias));
        }
        return redirecciona()->to('categorias/lista');
    }

    public function eliminar($id)
    {
        $objOrm = new EtORM();
        $data = $objOrm->Ejecutar("categoria_eliminar", array($id));

        if (count($data) <= 0) {

            $categorias = Categoria::find($id);

            if (count($categorias)) {
                $categorias->eliminar();
                return redirecciona()->to('categorias/lista');
            }
        }else{
            redirecciona()->to("categorias/lista")->withMessage(array(
                "estado" => "false",
                "mensaje" => "<script>alert('ERROR: La categoria que desea eliminar esta asociado a uno o más articulos')</script>",
            ));
        }
    }

}