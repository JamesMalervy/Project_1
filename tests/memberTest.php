<?php

namespace Itb;
use Itb\Member;



class memberTest extends \PHPUnit_Framework_TestCase
{
    public function testGetId()
    {
        // Arrange
        $member = new Member();
        $member->setId(1);
        $expectedResult = 1;

        // Act
        $result = $member->getId();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testGetTitle()
    {
        // Arrange
        $member = new Member();
        $member->setTitle("Title");
        $expectedResult = "Title";

        // Act
        $result = $member->getTitle();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testGetStudentId()
    {
        // Arrange
        $member = new Member();
        $member->setStudentId("Student");
        $expectedResult = "Student";

        // Act
        $result = $member->getStudentId();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

   public function testGetPassword()
    {
        // Arrange
        $member = new Member();
        $member->setPassword("password");
        $expectedResult = "password";

        // Act
        $result = $member->getPassword();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testProjectId()
    {
        // Arrange
        $member = new Member();
        $member->setProjectId("project");
        $expectedResult = "project";

        // Act
        $result = $member->getProjectId();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testStatus()
    {
         // Arrange
        $member = new Member();
        $member->setStatus("status");
        $expectedResult = "status";

        // Act
        $result = $member->getStatus();

        // Assert
        $this->assertEquals($expectedResult, $result);

    }

    public function PastPresent()
    {
       // Arrange
        $member = new Member();
        $member->setPastPresent("Timeline");
        $expectedResult = "Timeline";

        // Act
        $result = $member->getPastPresent();

        // Assert
        $this->assertEquals($expectedResult, $result);

    }

    public function testName()
    {
       // Arrange
        $member = new Member();
        $member->setName("name");
        $expectedResult = "name";

        // Act
        $result = $member->getName();

        // Assert
        $this->assertEquals($expectedResult, $result);

    }


}
