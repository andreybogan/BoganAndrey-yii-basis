<?php

use yii\helpers\Url;

/* @var $model \app\models\ActiveRecord\Task */

?>

<div style="border: 1px solid #3c3c3c; margin: 6px 0; padding: 6px">
    <h1><?= $model->name ?></h1>
    <p>Дата: <?= $model->date ?></p>
    <p>Исполнитель: <?= $model->user->first_name ?> <?= $model->user->second_name ?></p>
    <a href="<?= Url::to(['task/view', 'id' =>$model->id]) ?>">Подробная информация »</a>
</div>