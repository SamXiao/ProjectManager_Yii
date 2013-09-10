<?php
$this->pageTitle = Yii::app()->name . ' - Login';
$this->breadcrumbs = array(
    'Login'
);
?>
<style type="text/css">
body {
    padding-top: 40px;
    padding-bottom: 40px;
}
</style>

<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading"><h2>Please sign in</h2></div>
            <div class="panel-body">
            <?php
                $form = $this->beginWidget( 'CActiveForm', array(
                    'id' => 'login-form',
                    'enableClientValidation' => true,
                    'clientOptions' => array(
                        'validateOnSubmit' => true
                    ),
                    'htmlOptions' => array(
                        'role'=>'form'
                    )
                ) );
            ?>
            <!-- username -->
            <div class="form-group <?php echo $model->hasErrors('username')?'error':'';?>">
            <?php echo $form->labelEx($model,'username', array('class'=>'control-label')); ?>
            <?php echo $form->textField($model,'username', array('class'=>'form-control', 'placeholder' => $model->getAttributeLabel( 'username' ))); ?>
            <?php echo $form->error($model,'username', array('class'=>'control-label')); ?>
            </div>
            <!-- password -->
            <div class="form-group <?php echo $model->hasErrors('password')?'error':'';?>">
            <?php echo $form->labelEx($model,'password', array('class'=>'control-label')); ?>
            <?php echo $form->passwordField($model,'password', array('class'=>'form-control', 'placeholder' => $model->getAttributeLabel( 'password' ))); ?>
            <?php echo $form->error($model,'password', array('class'=>'control-label')); ?>
            </div>
            <!-- remember me -->
            <div class="form-group">
                <label class="checkbox">
                <?php echo $form->checkBox($model,'rememberMe'); ?>
                <?php echo $model->getAttributeLabel('rememberMe'); ?>
                </label>
            </div>

            <button class="btn btn-large btn-primary pull-right" type="submit">Sign in</button>
            <div class="clearfix"></div>
            <?php $this->endWidget(); ?>
            </div>
        </div>
    </div>
    <div class="col-md-4"></div>
</div>


