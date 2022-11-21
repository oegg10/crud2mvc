<?php

class Producto extends Conectar{
    //Obtener todos los registros de la tabla
    public function get_producto(){
        $conectar=parent::Conexion();
        parent::set_names();
        //Consulta la tabla
        $sql="SELECT * FROM tm_producto WHERE est=1";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll();

    }

    //Obtener el registro por el id
    public function get_producto_x_id($prod_id){
        $conectar=parent::Conexion();
        parent::set_names();
        //Consulta la tabla
        $sql="SELECT * FROM tm_producto WHERE prod_id = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$prod_id);
        $sql->execute();
        return $resultado=$sql->fetchAll();

    }

    //Borrar el registro por el id
    public function delete_producto($prod_id){
        $conectar=parent::Conexion();
        parent::set_names();
        //Consulta la tabla
        $sql="UPDATE tm_producto SET est = 0, fecha_elim=NOW() WHERE prod_id = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$prod_id);
        $sql->execute();
        return $resultado=$sql->fetchAll();

    }

    //Insertar registro
    public function insert_producto($prod_nom){
        $conectar=parent::Conexion();
        parent::set_names();
        //Consulta la tabla
        $sql="INSERT INTO tm_producto (prod_id, prod_nombre, fecha_crea, fecha_modi, fecha_elim, est) VALUES (NULL, ?, NOW(), NULL, NULL, 1);";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$prod_nom);
        $sql->execute();
        return $resultado=$sql->fetchAll();

    }

    //Borrar el registro por el id
    public function update_producto($prod_id,$prod_nom){
        $conectar=parent::Conexion();
        parent::set_names();
        //Consulta la tabla
        $sql="UPDATE tm_producto SET prod_nom = ?, fecha_modi=NOW() WHERE prod_id = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$prod_nom);
        $sql->bindValue(2,$prod_id);
        $sql->execute();
        return $resultado=$sql->fetchAll();

    }

}