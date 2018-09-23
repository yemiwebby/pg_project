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

    public function fetchAllPrioritizedForms()
    {
        $approved = $this->link->query("SELECT * FROM prioritize");
        return $approved;
    }

    public function fetchAllPrioritizedFormsScheduled()
    {
        $approved = $this->link->query("SELECT * FROM prioritize WHERE scheduled_for_seminar = 1");
        return $approved;
    }

    public function fetchAllPrioritizedFormsNotScheduled()
    {
        $approved = $this->link->query("SELECT * FROM prioritize WHERE scheduled_for_seminar = 0");
        return $approved;
    }

    public function fetchAllUnApprovedForms()
    {
        $un_approved = $this->link->query("SELECT * FROM form WHERE approved is NULL or approved = 0");
        return $un_approved;
    }

    public function saveConfiguration($semester)
    {
        $config = $this->link->query("INSERT INTO configuration(semester) VALUES ('$semester')");

        return $config;
    }

    public function getCurrentSemester()
    {
        $admin_current_semester = $this->link->query("SELECT * FROM configuration ORDER BY ID DESC LIMIT 1");

        $semester = '';
        $num_rows = mysqli_num_rows($admin_current_semester);
        if ($admin_current_semester->num_rows > 0) {
            $sup = $admin_current_semester->fetch_assoc();
            $semester = $sup['semester'];
        }
        return $semester;
    }

    public function updateStudentSemester($semester, $reg_number)
    {
        $student_semester = $this->link->query("UPDATE users SET no_of_semester ='$semester' WHERE reg_number ='$reg_number'");
//
        return $student_semester;
    }


//    public function showAllCandidate()
//    {
//        $candidates = $this->link->query("SELECT * FROM")
//    }
}