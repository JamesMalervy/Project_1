<?php
/**
 * Created by PhpStorm.
 * User: James
 * Date: 30/03/2016
 * Time: 15:52
 */

namespace Itb;

use Mattsmithdev\PdoCrud\DatabaseTable;

class Member extends DatabaseTable
{
    private $id;
    private $title;
    private $studentId;
   // private $supervisorId;
    private $password;
    private $projectId;
    private $status;
    private $pastPresent;
    private $name;



    /**
     * @return mixed
     */
    public function getPastPresent()
    {
        return $this->pastPresent;
    }

    /**
     * @param mixed $pastPresent
     */
    public function setPastPresent($pastPresent)
    {
        $this->pastPresent = $pastPresent;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixedadmin.html.twig
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getStudentId()
    {
        return $this->studentId;
    }

    /**
     * @param mixed $studentId
     */
    public function setStudentId($studentId)
    {
        $this->studentId = $studentId;
    }


   /* public function getSupervisorId()
    {
        return $this->supervisorId;
    }


    public function setSupervisorId($supervisorId)
    {
        $this->supervisorId = $supervisorId;
    }*/

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getProjectId()
    {
        return $this->projectId;
    }

    /**
     * @param mixed $projectId
     */
    public function setProjectId($projectId)
    {
        $this->projectId = $projectId;
    }

}