<?php

namespace Itb;
use Itb\Project;



class projectTest extends \PHPUnit_Framework_TestCase
{
    public function testGetId()
    {
        // Arrange
        $project = new Project();
        $project->setId(1);
        $expectedResult = 1;

        // Act
        $result = $project->getId();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testGetSuperVisor()
    {
        // Arrange
        $project = new Project();
        $project->setTitle("Supervisor");
        $expectedResult = "Supervisor";

        // Act
        $result = $project->getTitle();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testGetGroup()
    {
        // Arrange
        $project = new Project();
        $project->setGroup("Group");
        $expectedResult = "Group";

        // Act
        $result = $project->getGroup();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

   public function testGetStatus()
    {
        // Arrange
        $project = new Project();
        $project->setStatus("role");
        $expectedResult = "role";

        // Act
        $result = $project->getStatus();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    public function testTitle()
    {
        // Arrange
        $project = new Project();
        $project->setTitle("title");
        $expectedResult = "title";

        // Act
        $result = $project->getTitle();

        // Assert
        $this->assertEquals($expectedResult, $result);
    }


}
