<?php
/**
 * Created by PhpStorm.
 * User: James
 * Date: 01/04/2016
 * Time: 23:53
 */

namespace Itb;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class ProjectController
{
    /**
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function projectsAction(Request $request, Application $app)
    {
        $projects = Project::getAll();

        $argsArray = [
            'projects' => $projects,
        ];

        $templateName = 'projects';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * @param Request $request
     * @param Application $app
     * @param $id
     * @return mixed
     */
    public function projectDetailAction(Request $request, Application $app, $id)
    {
        $projectRow = Project::getOneById($id);

        $argsArray = [
            'projects' => $projectRow,
        ];

        $template = 'projectDetail';
        return $app['twig']->render($template . '.html.twig', $argsArray);
    }


}