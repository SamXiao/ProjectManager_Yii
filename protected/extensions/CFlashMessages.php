<?php

/**
 * CFlashMessages class file
 *
 * use and modify it as you wish
 *
 * @author Sam Xiao
 * @license http://www.opensource.org/licenses/gpl-3.0.html
 * @version 1.0
 */
class CFlashMessages extends CWidget
{

    const ALERT_SUCCESS = 'alert-success';

    const ALERT_ERROR = 'alert-error';

    const ALERT_INFO = 'alert-info';

    const ALERT_BLOCK = 'alert-block';

    /**
	 * 
	 * @param unknown_type $type
	 * @param unknown_type $message
	 * @param unknown_type $options
	 * 
	 * 
	 * @author Sam Xiao 
	 * @since 1.0
	 */
    public static function setMessages ($type, $message, $options = array())
    {

        Yii::app()->user->setFlash($type, $message);
    }

    /**
	 * (non-PHPdoc)
	 * @see CWidget::init()
	 * 
	 * this method is called by CController::beginWidget()
	 */
    public function init ()
    {

        $flashes = Yii::app()->user->getFlashes();
        foreach ($flashes as $class => $message) {
            echo '<div class="alert ' . $class . '"><a class="close" data-dismiss="alert">×</a>';
            echo $message;
            echo '</div>';
        }
    }

    /**
	 * (non-PHPdoc)
	 * @see CWidget::run()
	 * 
	 * this method is called by CController::endWidget()
	 */
    public function run ()
    {

    }
}