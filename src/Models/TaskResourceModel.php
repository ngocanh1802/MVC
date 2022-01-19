<?php
namespace SRC\Models;
use SRC\Models\TaskModel;
use SRC\Core\ResourceModel;
class TaskResourceModel extends ResourceModel
{
    public function __construct(){
        $this->_init("tasks", "Id", new TaskModel);
    }
}