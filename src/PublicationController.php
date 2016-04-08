<?php
/**
 * Created by PhpStorm.
 * User: James
 * Date: 23/03/2016
 * Time: 16:16
 */

namespace Itb;


use Silex\Application;
use Symfony\Component\HttpFoundation\Request;


class PublicationController
{
    public function publicationsAction(Request $request, Application $app)
    {
        $publications = Publication::getAll();

        $argsArray = [
            'publications' => $publications,
        ];

        $templateName = 'publications';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);

    }

}