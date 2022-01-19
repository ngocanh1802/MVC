<?php

namespace SRC\Core;

use SRC\Core\ResourceModelInterface;
use SRC\Core\Model;
use SRC\Config\Database;

class ResourceModel implements ResourceModelInterface
{
    private $id;
    private $table;
    private $model;

    public function _init($table, $id, $model)
    {
        $this->table = $table;
        $this->id = $id;
        $this->model = $model;
    }

    public function delete($id)
    {
        // $sql = 'DELETE FROM tasks WHERE id = ?';
        // $req = Database::getBdd()->prepare($sql);
        // return $req->execute([$id]);
        $sql = "DELETE FROM $this->table WHERE $this->id = :$this->id";
        echo $sql;
        echo $id;
    
        print_r ($this);
        $req = Database::getBdd()->prepare($sql);
        return $req->execute(
            [
                $this->id => $id
            ]
        );
    }
    public function get($id)
    {
        $sql = "SELECT * FROM $this->table WHERE $this->id = $id;";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetchObject(get_class($this->model));
    }
    public function getAll()
    {
        $sql = "SELECT * FROM $this->table;";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }
    public function save($model)
    {
        $classModel = new Model;
        // var_dump($model);
        // echo '<pre>';

        $arrayModel = $classModel->getProperties($model);
       print_r($arrayModel);
        $id = $arrayModel['id']; 
        $stringModel="";
        foreach ($arrayModel as $key => $value) {
            $stringModel .= $key .' = :' .$key. ', ';
        }
        $stringModel = trim($stringModel,', '). ';';
        // echo $stringModel;die;
        
        // $stringModel="title=: title, description =: description";
        if($id == null){
            $sql = "INSERT INTO $this->table SET $stringModel";
            // var_dump($sql); die;
        } else{
            // var_dump('hello'); die;
            $sql = "UPDATE $this->table SET $stringModel WHERE id = $id";
        }
        $req = Database::getBdd()->prepare($sql);
        return $req->execute($arrayModel);

    }
}
