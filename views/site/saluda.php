<?php

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;

?>

<?= Html::encode($saluda) ?>

<?php foreach($array as $valor): ?>

<p><strong> <?= $valor ?> </strong></p>

<?php endforeach; ?>

<h1><?= $get; ?></h1>
