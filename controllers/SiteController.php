<?php

namespace Robi\App\controllers;

use App\RobiMvc\Core\Controller;
use App\RobiMvc\Core\Request;
use App\RobiMvc\Core\Application;
use App\RobiMvc\Core\Response;
use Robi\App\models\ContactForm;

class SiteController extends Controller
{
    public function index()
    {
        $params = [
            'hpt' => 'Home Page'
        ];
        return $this->render('pgs/home', $params);
    }

    public function getAboutPg()
    {
        $params = [
            'apt' => 'About Page'
        ];
        return $this->render('pgs/about', $params);
    }

    public function contact(Request $request, Response $response)
    {
        $contact = new ContactForm();
        
        if($request->isPost()){
            $contact->loadData($request->getBody());

            if($contact->validate() && $contact->send()){
                Application::$app->session->setFlash('success', 'Thank you for concating with us!');
                return $response->redirect('/');
            }
        }

        return $this->render('pgs/contact', [
            'model' => $contact
        ]);
    }
}
