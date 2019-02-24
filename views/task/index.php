<?php

use yii\helpers\Html;
use \yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\filters\TaskSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Список задач';
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