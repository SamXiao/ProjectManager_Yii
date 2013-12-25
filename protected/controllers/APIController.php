<?php
/**
 *
 * 对外接口
 *
 * @author Samuel
 *
 */
class APIController extends Controller
{

    public function actionCronjob( $c, $r='Has been running' ){
        $projectCronjob = ProjectCronjob::model()->findByPk($c);
        $projectCronjob->recordCronjobRunning($r);
        echo $projectCronjob->result;
    }

}