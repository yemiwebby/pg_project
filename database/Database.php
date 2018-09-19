<?php
/**
 * Created by PhpStorm.
 * User: webby
 * Date: 17/09/2018
 * Time: 4:18 AM
 */

class Database
{
    private $link;
    private $host;
    private $username;
    private $password;
    private $database;

    public function __construct($host = 'localhost', $username = 'root', $password = '', $database = 'pg_project')
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
        $this->link = new mysqli($this->host, $this->username, $this->password, $this->database);
    }

    public function fetchAllStudent()
    {
        $users = $this->link->query("SELECT * FROM users");
        return $users;
    }

    public function fetchAllForms()
    {
        $forms = $this->link->query("SELECT * FROM form");
        return $forms;
    }

    public function fetchAllApprovedForms()
    {
        $approved = $this->link->query("SELECT * FROM form WHERE approved = 1");
        return $approved;
    }

    public function fetchAllUnApprovedForms()
    {
        $un_approved = $this->link->query("SELECT * FROM form WHERE approved is NULL or approved = 0");
        return $un_approved;
    }
}