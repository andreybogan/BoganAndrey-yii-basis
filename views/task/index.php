<?php

use yii\helpers\Html;
use \yii\widgets\ListView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\filters\TaskSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Список задач';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="tasks-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Task', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="get">
        <select name="month">
            <option value="1">Январь</option>
            <option value="2">Февраль</option>
            <option value="3">Март</option>
            <option value="4">Апрель</option>
        </select>
        <input type="submit" value="Посмотреть">
    </form>


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