<?php

/**
 * CRedisCache class file
 *
 * use and modify it as you wish
 *
 * @author Sam Xiao
 * @license http://www.opensource.org/licenses/gpl-3.0.html
 * @version 1.0
 */
require_once  dirname(__FILE__)."/facebook.php";
class CSocialButtons extends CWidget
{

    const FB_SRC = 'http://connect.facebook.net/en_US/all.js';

    const GOOGLE_SRC = 'https://apis.google.com/js/plusone.js';

    const TWITTER_SRC = 'http://platform.twitter.com/widgets.js';

    const PINTEREST_SRC = 'http://assets.pinterest.com/js/pinit.js';

    const SHARETHIS_SRC = 'http://w.sharethis.com/button/buttons.js';

    const FACEBOOK_APP_ID = '298463093563322';
    
    const FACEBOOK_APP_SECRET = '35a6ac48bc25901ca4af27ebcc04bc3b';

    const SHARETHIS_PUBLISHER = 'ur-cfdc95c4-1a7c-ae92-8cdb-4254f2966ac6';
    /**
     * 
     * @var Facebook
     */
    protected static $facebookObj = NULL ;
    /**
     * Set TRUE when won't to load share js 
     * @var boolean
     */
    protected static $DEBUG = FALSE;
    
    protected static $DEFAULT_FB_LIKE = array('send' => "false", 
        'show_faces' => "false", 'data-layout' => "button_count" );

    protected static $DEFAULT_FB_LOGIN = array('show-faces' => "false", 
        'width' => "200", 'max-rows' => "1", 'scope'=>'publish_stream,offline_access,email' );

    protected static $DEFAULT_GOOGLE_PLUS = array('annotation' => 'none' );

    protected static $DEFAULT_TWITTER_BUTTON = array();

    protected static $DEFAULT_PIN_IT_BUTTON = array(
        'count-layout' => "horizontal" );

    /**
	 * 
	 * @var vertical | horizontal
	 */
    public $layout = 'horizontal';

    public $style = 'box';

    /**
     * 
     * @var unknown_type
     */
    public $items = array('' );

    public function init ()
    {

        parent::init();
        Yii::app()->clientScript->registerCss('CSocialButton-Style', '.CSocialButton_Table td{padding:5px;}');
    }

    public function run ()
    {

        $layout = $this->layout;
        $this->$layout();
    }

    public function vertical ()
    {

        echo '<table class="CSocialButton_Table">';
        foreach ($this->items as $key => $item) {
            switch ($key) {
                case 'FB_LIKE':
                    echo '<tr><td>' . $this->getFacebookLikeButton($item) . '</td></tr>';
                    break;
                case 'FB_LOGIN':
                    echo '<tr><td>' . $this->getFacebookLoginButton($item) . '</td></tr>';
                    break;
                case 'GOOGLE_PLUS':
                    echo '<tr><td>' . $this->getGooglePlusButton($item) . '</td></tr>';
                    break;
                case 'TWITTER_BUTTON':
                    echo '<tr><td>' . $this->getTwitterButton($item) . '</td></tr>';
                    break;
                case 'PIN_IT_BUTTON':
                    echo '<tr><td>' . $this->getPinItButton($item) . '</td></tr>';
                    break;
                case 'SHARETHIS_BUTTON':
                    echo '<tr><td>' . $this->getSharethis($item) . '</td></tr>';
                    break;
                case 'TWITTER_FOLLOW_BUTTON':
                    echo '<a href="https://twitter.com/RewardIt" class="twitter-follow-button" data-show-count="true" data-size="large">Follow @RewardIt</a>
                	<script>!function(d,s,id){
                		var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){
                			js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);
                		}
                	}(document,"script","twitter-wjs");</script>';
                    break;
                case 'FB_SHARE':
                    if ($item === array()) $item = self::$DEFAULT_FB_SHARE;
                    echo '<tr><td><a name="fb_share" type="button" ' . $this->makeAttr($item) . '/>
                    	<script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share"
                                type="text/javascript">
                        </script>
                        </td></tr>';
                    break;
                default:
            }
        }
        echo '</table>';
    }

    public function horizontal ()
    {

        echo '<table class="CSocialButton_Table"><tr>';
        foreach ($this->items as $key => $item) {
            switch ($key) {
                case 'FB_LIKE':
                    echo '<td>' . $this->getFacebookLikeButton($item) . '</td>';
                    break;
                case 'FB_LOGIN':
                    echo '<td>' . $this->getFacebookLoginButton($item) . '</td>';
                    break;
                case 'GOOGLE_PLUS':
                    echo '<td>' . $this->getGooglePlusButton($item) . '</td>';
                    break;
                case 'TWITTER_BUTTON':
                    echo '<td>' . $this->getTwitterButton($item) . '</td>';
                    break;
                case 'PIN_IT_BUTTON':
                    echo '<td>' . $this->getPinItButton($item) . '</td>';
                    break;
                case 'SHARETHIS_BUTTON':
                    echo '<td>' . $this->getSharethis($item) . '</td>';
                    break;
                default:
            }
        }
        echo '</tr></table>';
    }

    /**
     * Render Facebook Like Button
     *
     * @param array $item     Settings For Google Plus Button
     * @return string
     *
     * @author Sam Xiao
     * @since 1.0
     */
    protected function getFacebookLikeButton ($item)
    {

        if (! self::$DEBUG) Yii::app()->clientScript->registerScriptFile(self::FB_SRC . '#appId=' . self::FACEBOOK_APP_ID . '&xfbml=1', CClientScript::POS_END);
        if ($item === array()) $item = self::$DEFAULT_FB_LIKE;
        return '<fb:like ' . $this->makeAttr($item) . '></fb:like>';
    }

    /**
     * Render Facebook Lolgin Button
     *
     * @param array $item     Settings For Google Plus Button
     * @return string
     *
     * @author Sam Xiao
     * @since 1.0
     */
    protected function getFacebookLoginButton ($item)
    {

        if (! self::$DEBUG) Yii::app()->clientScript->registerScriptFile(self::FB_SRC . '#appId=' . self::FACEBOOK_APP_ID . '&xfbml=1', CClientScript::POS_END);
        if ($item === array()) $item = self::$DEFAULT_FB_LOGIN;
        else array_merge($item,self::$DEFAULT_FB_LOGIN);
        if(isset($item['callback'])){
            Yii::app()->clientScript->registerScript('Facebook-login-callback',"FB.Event.subscribe('auth.authResponseChange', {$item['callback']});");
        }
        return '<fb:login-button ' . $this->makeAttr($item) . '>Login with Facebook</fb:login-button>';
    }

    /**
     * Render Google Plus Button
     *
     * @param array $item     Settings For Google Plus Button
     * @return string
     *
     * @author Sam Xiao
     * @since 1.0
     */
    protected function getGooglePlusButton ($item)
    {

        if (! self::$DEBUG) Yii::app()->clientScript->registerScriptFile(self::GOOGLE_SRC, CClientScript::POS_END);
        if ($item === array()) $item = self::$DEFAULT_GOOGLE_PLUS;
        return '<g:plusone ' . $this->makeAttr($item) . '></g:plusone>';
    }

    /**
     * Render Twitter Button
     *
     * @param array $item     Settings For Twitter Button
     * @return string
     *
     * @author Sam Xiao
     * @since 1.0
     */
    protected function getTwitterButton ($item)
    {

        if (! self::$DEBUG) Yii::app()->clientScript->registerScriptFile(self::TWITTER_SRC, CClientScript::POS_END);
        if ($item === array()) $item = self::$DEFAULT_TWITTER_BUTTON;
        return '<a href="https://twitter.com/share" class="twitter-share-button"' . $this->makeAttr($item) . '>Tweet</a>';
    }

    /**
     * Render Pin It Button
     * 
     * @param array $item     Settings For Pin It Button
     * @return string
     * 
     * @author Sam Xiao
     * @since 1.0
     */
    protected function getPinItButton ($item)
    {

        if (! self::$DEBUG) Yii::app()->clientScript->registerScriptFile(self::PINTEREST_SRC, CClientScript::POS_END);
        if ($item === array()) $item = self::$DEFAULT_PIN_IT_BUTTON;
        return '<a href="http://pinterest.com/pin/create/button/" class="pin-it-button"' . $this->makeAttr($item) . '><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a>';
    }

    /**
     * Render Share This
     *
     * @param array $item     Settings Share This
     * @return string
     *
     * @author Sam Xiao
     * @since 1.0
     */
    protected function getSharethis ($item)
    {

        if (! self::$DEBUG) {
            Yii::app()->clientScript->registerScriptFile(self::SHARETHIS_SRC, CClientScript::POS_HEAD);
            Yii::app()->clientScript->registerScript('SHARETHIS_BUTTON', 'stLight.options({publisher: "' . self::SHARETHIS_PUBLISHER . '"});', CClientScript::POS_END);
        }
        return "<span class='st_facebook' displayText=''></span>
                <span class='st_twitter' displayText=''></span>
                <span class='st_googleplus' displayText=''></span>";
    }

    protected function makeAttr ($item)
    {

        $attrString = array();
        foreach ($item as $attr => $attrValue) {
            $attrString[] = $attr . '="' . $attrValue . '"';
        }
        $return = implode($attrString, ' ');
        return $return;
    }
    protected static function getFacebookObj(){        
        if(self::$facebookObj === NULL){
            $config = array();
            $config[‘appId’] = FACEBOOK_APP_ID;
            $config[‘secret’] = FACEBOOK_APP_SECRET;
            $config[‘fileUpload’] = false; // optional
            self::$facebookObj = new Facebook($config);
        }
        return  self::$facebookObj;
    }
    public static function post($accessToken,$userId=0,$message=array()){
        Yii::log('Start Post to Facebook','info','application.firebuglog');
        Yii::log('AccessToken: '.$accessToken,'info','application.firebuglog');
        $facebook = self::getFacebookObj();
        $facebook->setAccessToken($accessToken);

        $ret_obj = $facebook->api('/'.$userId.'/feed', 'POST', $message);
        var_dump($ret_obj);

        Yii::log('End Post to Facebook','info','application.firebuglog');
    }
}