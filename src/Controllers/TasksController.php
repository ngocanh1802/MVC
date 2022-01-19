<?php
namespace SRC\Controllers;
use SRC\Core\Controller;
use SRC\Models\Task;
use SRC\Models\TaskRepository;
use SRC\Models\TaskModel;
class TasksController extends Controller
{
    function index()
    {
        $tasks = new TaskRepository();

        $d['tasks'] = $tasks->getAll();
        $this->set($d);
        // print_r($this);
        $this->render("index");
    }

    function create()
    {
        if (isset($_POST["title"]))
        {
            $taskModel= new TaskModel();
            $taskModel ->setTitle($_POST["title"]);
            $taskModel->setDescription($_POST["description"]);
            $taskModel->setCreated_at(date('Y-m-d H:i:s'));
            $taskRepository = new TaskRepository();
            if($taskRepository->add($taskModel)){
                header("Location: " . WEBROOT . "public/tasks/index");
            }
        }

        $this->render("create");
    }

    function edit($id)
    {

        $taskRepo = new TaskRepository();
        $d["task"] = $taskRepo->getById($id);

        if (isset($_POST["title"]))
        {
            $taskModel = new TaskModel;
            $taskModel->setTitle($_POST["title"]);
            $taskModel->setDescription($_POST["description"]);
            $taskModel->setUpdated_at(date('Y-m-d H:i:s'));

            if ($taskRepo->edit($taskModel))
            {
                header("Location: " . WEBROOT . "public/tasks/index");
            }
        }
        $this->set($d);
        $this->render("edit");
    }

    public function delete($id)
    {
        $taskRepository = new TaskRepository();
        if ($taskRepository->delete($id))
        {
            header("Location: " . WEBROOT . "public/tasks/index");
        }
    }
}
?>