<?php
/**
 * Created by PhpStorm.
 * User: webby
 * Date: 17/09/2018
 * Time: 3:58 AM
 */


class AdminController
{
//    public $database;
//
//    public function __construct(Database $database)
//    {
//        $this->database = $database;
//    }

    public function getAllStudents()
    {
        $database = new Database();
        $users = $database->fetchAllStudent();
        return $users;
    }

}