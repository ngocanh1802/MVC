<?php
namespace SRC\Models;
use SRC\Core\ResourceModelInterface;
use SRC\Core\Model;
use SRC\Config\Database;

class ResourceModel implements ResourceModelInterface{
    private $id;
    private $table;
    private $model;

    public function _init($table, $id, $model){
        $this->table = $table;
        $this->id = $id;
        $this->model = $model;
    }
    public function delete($id)
    {
        $sql = "DELETE FROM $this->table WHERE $this->id = $id";
        $req = Database::getBdd()->prepare($sql);
        return $req->execute();
    }
    public function get($id){
        $sql = "SELECT * FROM $this->table WHERE $this->id = $id;";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetchObject(get_class($this->table));
    }
    public function getAll($id){
        $sql = "SELECT * FROM $this->table;";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }
    public function save($model){
        // $arrayModel = array(
        //     "id"=>"null",
        //     "title"=>"This is title",
        //     "name"=>"This is name"
        // );
        // $id = $arrayModel[$myId];

    }
}