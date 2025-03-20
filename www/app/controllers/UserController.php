<?php

class UserController extends Controller
{
    public function getAllUsers()
    {
        $userModel = $this->loadModel("User");
        $users = $userModel->getAllUsers();
        $this->renderView('User/ViewAllUsers', ["users" => $users]);
    }
}