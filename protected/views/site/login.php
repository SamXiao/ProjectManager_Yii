<style type="text/css">
  body {
    padding-top: 40px;
    padding-bottom: 40px;
    background-color: #f5f5f5;
  }

  .form-signin {
    max-width: 300px;
    padding: 19px 29px 29px;
    margin: 0 auto 20px;
    background-color: #fff;
    border: 1px solid #e5e5e5;
    -webkit-border-radius: 5px;
       -moz-border-radius: 5px;
            border-radius: 5px;
    -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
       -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
            box-shadow: 0 1px 2px rgba(0,0,0,.05);
  }
  .form-signin .form-signin-heading,
  .form-signin .checkbox {
    margin-bottom: 10px;
  }
  .form-signin input[type="text"],
  .form-signin input[type="password"] {
    font-size: 16px;
    height: auto;
    margin-bottom: 15px;
    padding: 7px 9px;
  }

</style>
<?php
$this->pageTitle = Yii::app()->name . ' - Login';
$this->breadcrumbs = array(
    'Login'
);

$form = $this->beginWidget( 'CActiveForm', array(
    'id' => 'login-form',
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true
    ),
    'htmlOptions' => array(
        'class'=>'form-signin'
    )
) );
?>
<h2 class="form-signin-heading">Please sign in</h2>
<!-- username -->
<div class="control-group">
<?php echo $form->textField($model,'username', array('class'=>'input-block-level', 'placeholder' => $model->getAttributeLabel( 'username' ))); ?>
<?php echo $form->error($model,'username', array('class'=>'help-inline')); ?>
</div>
<!-- password -->
<div class="control-group">
<?php echo $form->passwordField($model,'password', array('class'=>'input-block-level', 'placeholder' => $model->getAttributeLabel( 'password' ))); ?>
<?php echo $form->error($model,'password', array('class'=>'help-inline')); ?>
</div>
<!-- remember me -->
<div class="control-group">
    <label class="checkbox">
    <?php echo $form->checkBox($model,'rememberMe'); ?>
    <?php echo $model->getAttributeLabel('rememberMe'); ?>
    </label>
</div>

<button class="btn btn-large btn-primary pull-right" type="submit">Sign in</button>
<div class="clearfix"></div>

<?php $this->endWidget(); ?>
