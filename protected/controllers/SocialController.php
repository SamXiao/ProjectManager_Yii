<?php

class SocialController extends Controller
{

    public function actionIndex ()
    {

    }

    public function actionSamples ()
    {

        $this->render('samples');
    }

    public function actionPostFB ()
    {

        CSocialButtons::post($_REQUEST['accessToken'], '1465857437', array(
            'link' => 'www.rewardit.com', 
            'message' => 'Posting with the PHP SDK!' ));
    }
}