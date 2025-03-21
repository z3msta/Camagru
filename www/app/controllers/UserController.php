<?php

class UserController extends Controller
{
    public function getAllUsers()
    {
        $userModel = $this->loadModel("User");
        $users = $userModel->getAllUsers();
        $this->renderView('User/ViewAllUsers', ["users" => $users]);
    }

    public function addUser()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $userModel = $this->loadModel("User");
            $userModel->addUser($_POST['username'], $_POST['email'], $_POST['password']);
            header('Location: ' . BASE_URL);
        }
        $this->renderView('User/AddUser');
    }
}