

<ul class="nav nav-tabs" id="myTab">
    <li class="active"><a href="#Facebook">Facebook</a></li>
    <li><a href="#Twitter">Twitter</a></li>
    <li><a href="#Google">Google+</a></li>
</ul>
     
<div class="tab-content">
    <?php /** FACEBOOK **/?>
    <div class="tab-pane active" id="Facebook">
        <?php
        $assestUrl = Yii::app()->baseUrl; 
        /** Facebook Login  **/?>
        <script type="text/javascript" >
        /**
         * accessToken need to be saved 
         */
        var accessToken = '';
        function showinfo(data){
        	if(data.status=="connected"){
        		accessToken = data.authResponse.accessToken;
        		console.log(data);
        	}
        }
        
        function post(){
        	
        	$.post('<?php echo $assestUrl;?>/social/PostFB','accessToken='+accessToken);
        	
        }
        </script>
        <?php
        $this->widget("CSocialButtons",
        array('items'=>array(
        'FB_LOGIN'=>array('callback'=>'showinfo')
        )));
        ?>
        <?php /** Facebook Login  **/?>
        
        <?php /** Facebook Post -- php  **/?>
        <div style="cursor: pointer;" onclick="javascript:post()"  >post on wall</div>
        <?php /** Facebook Post -- php  **/?>
    </div>
    <?php /** FACEBOOK **/?>
    
    <?php /** TWITTER **/?>
    <div class="tab-pane" id="Twitter">
        <?php Yii::app()->clientScript->registerScriptFile($assestUrl.'/js/jsOAuth-1.3.4.js');?>
        <script type="text/javascript">
            var oauth, options;
        
            options = {
                consumerKey: 'YVRQJZFAsOoClG8PdfVw',
                consumerSecret: 'm0pft6cMBOUMoJLge9GAKFi9IVIjpEYgO6SYfzsM5Bo',
                requestTokenUrl: 'https://api.twitter.com/oauth/request_token',
                authorizationUrl: 'https://api.twitter.com/oauth/authorize',
                accessTokenUrl: 'https://api.twitter.com/oauth/access_token'
            };
        
            oauth = OAuth(options);
            oauth.fetchAccessToken();
            console.log(oauth);
        </script>
    </div>
    <?php /** TWITTER **/?>
    
    <div class="tab-pane" id="Google">...</div>
</div>
     
<script>
    $(function () {
        $('#myTab a').click(function (e) {
            e.preventDefault();
            $(this).tab('show');
        });
    })
</script>