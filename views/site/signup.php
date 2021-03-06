<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Sign up';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to sign up:</p>
    <?php $form = ActiveForm::begin([
            'id' => 'signup-form',
            'layout' => 'horizontal',
            'fieldConfig' => [
                'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                'labelOptions' => ['class' => 'col-lg-1 control-label'],
            ],
        ]) ?>
    <?= $form->field($model, 'name') ?>
    <?= $form->field($model, 'username') ?>
    <?= $form->field($model, 'password')->passwordInput() ?>
    <?= $form->field($model, 'email') ?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Registration', ['class' => 'btn btn-success', 'name' => 'register-button']) ?>
        </div>
    </div>

    <?php ActiveForm::end() ?>

</div>
