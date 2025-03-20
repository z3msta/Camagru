<?php

class User
{
    private $db;

    public function __construct()
    {
        //db holds database instance;
        $this->db = new Database();
    }

    public function getAllusers()
    {
        $this->db->query("SELECT * FROM user");
        $this->db->execute();
    }

    public function addUser($email, $password, $username)
    {
        $this->db->query("INSERT INTO user (email, password, username) VALUES (:email, :password, :username)");
        $this->db->bind(':email', $email);
        $this->db->bind(':password', $password);
        $this->db->bind(':username', $username);
        $this->db->execute();
    }

    public function updateEmail($email)
    {
        $this->db->query("UPDATE user SET email=:email");
        $this->db->bind(':email', $email);
        $this->db->execute();
    }

    public function updatePassword($password)
    {
        $this->db->query("UPDATE user SET password=:password");
        $this->db->bind(':password', $password);
        $this->db->execute();
    }

    public function updateUsername($username)
    {
        $this->db->query("UPDATE user SET username=:username");
        $this->db->bind(':username', $username);
        $this->db->execute();
    }

    public function getUserById($id)
    {
        $this->db->query("SELECT * FROM user WHERE id = :id");
        $this->db->bind(':id', $id);
        $this->db->execute();
        return $this->db->result();
    }

    public function deleteUser($id)
    {
        $this->db->query("DELETE FROM user WHERE id=:id");
        $this->db->bind(':id', $id);
        $this->db->execute();
    }
}
