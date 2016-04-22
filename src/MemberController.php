<?php
namespace Itb;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class MemberController
{
    /**
     * render the days page template
     */

    /**
     * render the About page template
     */
    public function editMemberTableDisplayAction(Request $request, Application $app)
    {

        $member = Member::getAll();


        $argsArray = [
            'members' => $member,
        ];

        $templateName = 'editMember';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }


    public function editMemberDisplayAction(Request $request, Application $app, $id)
    {

        $memberRow = Member::getOneById($id);


        $argsArray = [
            'memberRow' => $memberRow,
        ];
        $app['session']->set('user', array('id' => $id));

        $templateName = 'editMemberRow';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    public function editMemberDetailsAction(Request $request, Application $app)
    {
        $user = $app['session']->get('user');
        $id = $user['id'];


        $paramsPost = $request->request->all();
        $title = $paramsPost['title'];
        $studentId = $paramsPost['studentId'];
         $supervisorId = $paramsPost['supervisorId'];
         $password = $paramsPost['password'];
         $projectId = $paramsPost['projectId'];
         $status = $paramsPost['status'];
         $name = $paramsPost['name'];

        $title = filter_var($title, FILTER_SANITIZE_STRING);
        $studentId = filter_var($studentId, FILTER_SANITIZE_STRING);
        $supervisorId = filter_var($supervisorId, FILTER_SANITIZE_STRING);
        $password = filter_var($password, FILTER_SANITIZE_STRING);
        $projectId = filter_var($projectId, FILTER_SANITIZE_STRING);
        $status = filter_var($status, FILTER_SANITIZE_STRING);
        $name = filter_var($name, FILTER_SANITIZE_STRING);



        $member = new Member();
        $member->setId($id);
        $member->setTitle($title);
        $member->setStudentId($studentId);
        $member->setPassword($password);
       // $member->setSupervisorId($supervisorId);
        $member->setProjectId($projectId);
        $member->setStatus($status);
        $member->setName($name);

       $succesfullUpdate = Member::update($member);

        $member = Member::getAll();

        $argsArray = [
            'username' => ' ',
           //'text' => 'Update was succesfull',
            'members' => $member,
        ];

        $templateName = 'admin';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    public function createMemberAction(Request $request, Application $app)
    {




        $argsArray = [

        ];


        $templateName = 'createMember';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }


    public function newMemberAction(Request $request, Application $app)
    {



        $paramsPost = $request->request->all();
        $id = $paramsPost['id'];
        $title = $paramsPost['title'];
        $studentId = $paramsPost['studentId'];
        $supervisorId = $paramsPost['supervisorId'];
        $password = $paramsPost['password'];
        $projectId = $paramsPost['projectId'];
        $status = $paramsPost['status'];
        $pastPresent = $paramsPost['pastPresent'];
        $name = $paramsPost['name'];

        $id = filter_var($id, FILTER_SANITIZE_STRING);
        $title = filter_var($title, FILTER_SANITIZE_STRING);
        $studentId = filter_var($studentId, FILTER_SANITIZE_STRING);
        $supervisorId = filter_var($supervisorId, FILTER_SANITIZE_STRING);
        $password = filter_var($password, FILTER_SANITIZE_STRING);
        $projectId = filter_var($projectId, FILTER_SANITIZE_STRING);
        $status = filter_var($status, FILTER_SANITIZE_STRING);
        $pastPresent = filter_var($pastPresent, FILTER_SANITIZE_STRING);
        $name = filter_var($name, FILTER_SANITIZE_STRING);




        $member = new Member();
        //$member->setId($id);
        $member->setTitle($title);
        $member->setStudentId($studentId);
        $member->setPassword($password);
        // $member->setSupervisorId($supervisorId);
        $member->setProjectId($projectId);
        $member->setStatus($status);
        $member->setPastPresent($pastPresent);
        $member->setName($name);

        $succesfullUpdate = Member::insert($member);

        $member = Member::getAll();

        $argsArray = [
            'text' => 'Insert was succesfull',
            'members' => $member,
        ];

        $templateName = 'admin';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }


    public function deleteMemberTableDisplayAction(Request $request, Application $app)
    {

        $member = Member::getAll();


        $argsArray = [
            'members' => $member,
        ];

        $templateName = 'deleteMember';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    public function deleteMemberAction(Request $request, Application $app, $id)
    {

        $deleteSuccesfull = Member::delete($id);

        return $app->redirect('/admin');



    }




}
