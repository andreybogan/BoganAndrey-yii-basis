<?php

namespace app\controllers;

use app\models\ActiveRecord\Task;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use Yii;

class UserController extends Controller
{
    public function actionIndex()
    {
        $userId = Yii::$app->user->id;
        $query = Task::find()->where(['responsible_id' => $userId])->with('user');
        $dataProvider = new ActiveDataProvider(['query' => $query]);

        Yii::$app->db->cache(function () use ($dataProvider) {
            return $dataProvider->prepare();
        }, 20);

        return $this->render('index', ['dataProvider' => $dataProvider]);
    }
}