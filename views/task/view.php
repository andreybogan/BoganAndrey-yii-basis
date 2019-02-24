<?php
/* @var $task  */

$this->title = $task->name;
//$this->params['breadcrumbs'][] = $task->name;
?>

<h1><?= $task->name ?></h1>
<p><?= $task->description ?></p>
<p><b>Дата:</b> <?= $task->date ?></p>
<p><b>Исполнитель:</b> <?= $task->user->first_name ?> <?= $task->user->second_name ?></p>