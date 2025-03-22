<?php

class UserController extends Controller
{
    public function getAllUsers()
    {
        $userModel = $this->loadModel("User");
        $users = $userModel->getAllUsers();
        $this->renderView('User/ViewAllUsers', ["users" => $users]);
    }

    public function signup()
    {
        $username = $email = $password = $password2 = "";
        $errors = [];
        $userModel = $this->loadModel("User");

        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            //sanitize and validate username
            $username = $this->sanitizeData($_POST["username"]);
            if (!preg_match("/^[a-zA-Z0-9_-]*$/", $username)) {
                $errors['username'] = "Username can contain only letters, numbers '-' and '_'";
            }

            //check if the username is already taken
            if (!empty($userModel->getUser($username))) {
                $errors['username'] = "Username already taken";
            }

            //sanitize and validate email
            $email = $this->sanitizeData($_POST["email"]);

            //check id the email is already associated with an account
            if (!empty($userModel->getEmail($email))) {
                $errors['username'] = "Account already registered with this email";
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = "Invalid email format";
            }

            //sanitize and validate password
            $password = $this->sanitizeData($_POST["password"]);
            $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/';

            if ((strlen($password) < 8 or strlen($password) > 15) or !preg_match($pattern, $password)) {
                $errors['password'] = "Invalid password. Must be between 8 and 15 characters and must contain combination of uppercase, lowercase and special characters";
            }
            $password2 = $this->sanitizeData($_POST["password2"]);

            if (strcmp($password, $password2) != 0) {
                $errors['password2'] = "Passwords dont match";
            }

            if (empty($errors)) {
                $userModel->addUser($username, $email, $password);
                $this->renderView('User/signup');
                //if everything is good user should be redirected to the login page
//                header('Location: ' . BASE_URL . 'login');
            }
        }
        $this->renderView('User/signup', ['errors' => $errors]);
    }

    private function sanitizeData($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    //this function should check if the username that the user chose is not already taken
    //by someone else
}