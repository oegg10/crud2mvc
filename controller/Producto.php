<?php

require_once("../config/conexion.php");
require_once("../models/producto.php");
$producto = new Producto();

switch($_GET["op"]){

case "listar":

    $datos = $producto->get_producto();
    $data = array();

    foreach ($datos as $row) {
        
        $sub_array = array();
        $sub_array[] = $row["prod_nom"];
        //Botones para modificar y eliminar
        $sub_array[] = '<button type="button" onClick="Editar('.$row["prod_id"].');" id="'.$row["prod_id"].'" class="btn btn-primary"><div><i class="mdi mdi-grease-pencil"></i></div></button>';
        $sub_array[] = '<button type="button" onClick="Eliminar('.$row["prod_id"].');" id="'.$row["prod_id"].'" class="btn btn-danger"><div><i class="mdi mdi-archive"></i></div></button>';

        $data[] = $sub_array;

    }

    $results = array(
        "sEcho"=>1,
        "iTotalRecords"=>count($data),
        "iTotalDisplayRecords"=>count($data),
        "aaData"=>$data);
    echo json_encode($results);
    break;



}



