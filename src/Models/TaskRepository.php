<?php
namespace SRC\Models;
use SRC\Models\TaskResourceModel;

class TaskRepository{

    private $taskResourceModel;
    
    public class __construct(){
        $this->taskResourceModel = new TaskResourceModel();
    }
    public function getAll(){
        return $this->taskResourceModel->getAll();
    }
}

