<?php
namespace SRC\Models;
use SRC\Models\TaskModel;
use SRC\Core\ResourceModel;
class TaskResourceModel extends ResourceModel
{
    public function __construct(){
        _init("tasks", "taskId", new TaskModel);
    }
}