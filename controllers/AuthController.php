<?php

namespace Robi\App\controllers;

use App\RobiMvc\Core\Application;
use App\RobiMvc\Core\Controller;
use App\RobiMvc\Core\Request;
use App\RobiMvc\Core\Response;
use Robi\App\models\LoginModel;
use Robi\App\models\User;
use App\RobiMvc\Core\middlewares\AuthMiddleware;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['profile']));    
    }

    public function login(Request $request, Response $response){
        $loginModel = new LoginModel();

        if($request->isPost()){
            $loginModel->loadData($request->getBody());

            if($loginModel->validate() && $loginModel->login()){
                $response->redirect('/');
                //return;
            }
            // echo 'else';
        }
        
        $this->setLayout('auth');
        return $this->render('auth/login', [
            'model' => $loginModel
        ]);
    }

    public function register(Request $request){
        $userModel = new User();
        $this->setLayout('auth');
        if($request->isPost()){
            $userModel->loadData($request->getBody());
            //This section for RobiModel
            // $errors = $user->validate([
            //     'first_name' => 'required',
            //     'last_name' => 'required',
            //     'email' => 'required|email|exists:users,email', //when need class name then add this ',classname' after email word
            //     'password' => 'required|min:8|max:24',
            //     'confirm_password' => 'required|match,password',
            // ]);

            // if(empty($errors)){
            //     if($user->create()){
            //         Application::$app->session->setFlash('success', 'Registration successfully completed');
            //         Application::$app->response->redirect('/register');
            //         exit;
            //     }
            // }
            
            //This section for default Model
            if($userModel->validate() && $userModel->create()){
                Application::$app->session->setFlash('success', 'Registration successfully completed');
                Application::$app->response->redirect('/register');
                exit;
            }
        }
        return $this->render('auth/registration', [
            'model' => $userModel
        ]);
    }

    public function logout(Request $request, Response $response)
    {
        Application::$app->logout();
        $response->redirect('/');
    }

    public function profile()
    {
        $params = [
            'apt' => 'Profile Page'
        ];
        return $this->render('pgs/profile', $params);
    }
}
