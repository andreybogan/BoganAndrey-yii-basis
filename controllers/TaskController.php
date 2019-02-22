<?php

namespace app\controllers;

use app\models\ActiveRecord\Task;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class TaskController extends Controller
{
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider(
            [
                'query' => Task::find()->with('user'),
                'pagination' => [
                    'pageSize' => 3,
                ]
            ]
        );

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        $task = Task::findOne($id);
//        $user = $task->user;
//        var_dump($user); exit;

        return $this->render('view', ['task' => $task]);
    }
}