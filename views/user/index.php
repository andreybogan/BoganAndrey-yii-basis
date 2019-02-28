<?php

use yii\helpers\Html;
use \yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $tasks \app\models\ActiveRecord\Task */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Кабинет пользователя';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="tasks-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => function ($model) {
            return \app\widgets\TaskCard::widget(['model' => $model]);
        },
        'summary' => false,
        'options' => [
            'class' => 'task-preview-content'
        ]
    ]); ?>

</div>