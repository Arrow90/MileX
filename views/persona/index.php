<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Inflector;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PersonaSeach */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Personas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="persona-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Persona', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nombre',
            'apellidos',
            'password',
            [
                'attribute' => 'avatar',
            ],
            [
                'attribute' => 'coches',
                'content'=> function ($model, $key, $index, $column) {
                    return Inflector::sentence(ArrayHelper::getColumn($model->coches, 'nombre'), ' y ');
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <a href="<?= Url::to(['persona/view', 'id' => 13]) ?>">Usuario</a>
</div>
