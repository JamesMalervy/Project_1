<?php
namespace Itb;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class MainController
{
    /**
     * render the days page template
     */

    /**
     * render the About page template
     */
    public function membersAction(Request $request, Application $app)
    {

        $member = Member::getAll();


        $argsArray = [
            'members' => $member,
        ];

        $templateName = 'members';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * render the Index page template
     */
    public function indexAction(Request $request, Application $app)
    {
        $argsArray = [];

        $templateName = 'index';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * @param Request $request
     * @param Application $app
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function logAction(Request $request, Application $app)
    {
       // $argsArray = [];
        $paramsPost = $request->request->all();
        $id = $paramsPost['id'];
        $password = $paramsPost['password'];

        $sanitId = filter_var($id, FILTER_SANITIZE_STRING);
        $sanitPassword = filter_var($password, FILTER_SANITIZE_STRING);


        $users = Log::searchByColumn('position', $sanitId);
        $user = $users[0];
        // $user = \Itb\Log::getOneById($sanitId);
        $password = $user->getPassword();
        $position = $user->getPosition();

        // authenticate! the administrator
        if ('admin' ===  $position  && $password === $sanitPassword) {
            // store username in 'user' in 'session'
          $app['session']->set('user', array('username' => $sanitId));

            // success - redirect to the secure admin home page
            return $app->redirect('/admin');
        }
        // authenticate! the student
        if ('student' === $position  && $password === $sanitPassword) {
            // store username in 'user' in 'session'
            $app['session']->set('user', array('username' => $sanitId));

            // success - redirect to the secure admin home page
            return $app->redirect('/student');
        }
        if ('supervisor' === $position  && $password === $sanitPassword) {
            // store username in 'user' in 'session'
            $app['session']->set('user', array('username' => $sanitId));

            // success - redirect to the secure admin home page
            return $app->redirect('/supervisor');
        }

        // login page with error message
        // ------------
        $templateName = 'index';
        $argsArray = array(
            'errorMessage' => 'bad username or password - please re-enter'
        );

        //$templateName = 'members';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function adminPageAction(Request $request, Application $app)
    {

     $user = $app['session']->get('user');

     $members = Member::getAll();


        $argsArray = array(
            'members' => $members,
            'username' => $user['username']

    );

        $templateName = 'admin';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    public function studentPageAction(Request $request, Application $app)
    {

        $user = $app['session']->get('user');

        $students = Student::getAll();


        $argsArray = array(
            'students' => $students,
            'username' => $user['username']

        );

        $templateName = 'student';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    public function supervisorPageAction(Request $request, Application $app)
    {

        $user = $app['session']->get('user');




        $argsArray = array(
            'username' => $user['username']

        );

        $templateName = 'supervisor';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    // action for route:    /logout
    public function logoutAction(Request $request, Application $app)
    {
        // logout any existing user
        $app['session']->set('user', null );

        // redirect to home page
//        return $app->redirect('/');

        // render (draw) template
        // ------------
        $templateName = 'index';
        return $app['twig']->render($templateName . '.html.twig', []);

    }

    /**
     * @param Request $request
     * @param Application $app
     * @param $id
     * @return mixed
     */
    public function detailAction(Request $request, Application $app, $id)
    {
        $memberRow = Member::getOneById($id);

        $argsArray = [
            'members' => $memberRow,
        ];

        $template = 'detail';
        return $app['twig']->render($template . '.html.twig', $argsArray);
    }







    /**
     * not found error page
     * @param \Silex\Application $app
     * @param             $message
     *
     * @return mixed
     */
    public static function error404(Application $app, $message)
    {
        $argsArray = [
            'name' => 'Fabien',
        ];
        $templateName = '404';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     *
     * if (!isset($blogPosts[$id])) {
     *  // generate a 404 error from within a controller...
     *  $app->abort(404, "Post $id does not exist.");
     * }
     */
}
