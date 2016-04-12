<?php
/**
 * Created by PhpStorm.
 * User: James
 * Date: 12/04/2016
 * Time: 00:17
 */

namespace Itb;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;


class StudentController
{
    public function studentDetailAction(Request $request, Application $app, $id)
    {
        $studentRow = Student::getOneById($id);

        $argsArray = [
            'students' => $studentRow,
        ];

        $template = 'studentDetail';
        return $app['twig']->render($template . '.html.twig', $argsArray);
    }


}