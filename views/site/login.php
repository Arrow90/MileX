<?php
use dmstr\web\AdminLteAsset;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model \app\models\LoginForm */

$this->title = 'Acceso a la Plataforma';
AdminLteAsset::register($this); //Usar la clase contenida en otra carpeta
//$this->params['breadcrumbs'][] = $this->title;
?>

<div class="form-box login-box">
    <div class="header login-logo">
        <h1><p>Acceso a la Plataforma</p></h1>
    </div>
    <?php $form = ActiveForm::begin(['id' => 'login-form',
    ]); ?>
    <div class="login-box-body">
        <?= $form->field($model, 'username') ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
    </div>

    <div align="center">
        <br>
        <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-lg', 'name' => 'login-button']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>


</div>
