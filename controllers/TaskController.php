<?php

namespace app\controllers;

use app\models\ActiveRecord\Task;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use Yii;

class TaskController extends Controller
{
    public function actionIndex()
    {
        $month = Yii::$app->request->get('month');

        $dataProvider = new ActiveDataProvider(
            [
                'query' => Task::find()
                    ->with('user')
                    ->filterWhere(['MONTH(date)' => $month]),
                'pagination' => [
                    'pageSize' => 8,
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

        return $this->render('view', ['task' => $task]);
    }

    public function actionCreate()
    {
        $model = new Task();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'responsible' => $model->getUsersList()
        ]);
    }
}