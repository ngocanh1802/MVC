<?php
namespace SRC\Models;

use PDO;
use SRC\Models\TaskResourceModel;

class TaskRepository{

    private $taskResourceModel;
    
    public function __construct(){
        $this->taskResourceModel = new TaskResourceModel();
    }
    public function getAll(){
        return $this->taskResourceModel->getAll();
    }
    public function getById($id){
        return $this->taskResourceModel->get($id);
    }
    public function add($model){
        return $this->taskResourceModel->save($model);
    }
    public function edit($model){
        return $this->taskResourceModel->save($model);
    }
    public function delete($id){
        return $this->taskResourceModel->delete($id);
    }
    
}

