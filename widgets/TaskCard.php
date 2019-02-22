<?php

namespace app\widgets;

use app\models\ActiveRecord\Task;
use yii\base\Widget;

/**
 * Class TaskCard
 * @package app\widgets
 */
class TaskCard extends Widget
{
    public $model;

    /**
     * @return string
     * @throws \Exception
     */
    public function run()
    {
        if (is_a($this->model, Task::class)) {
            return $this->render('taskCard', ['model' => $this->model]);
        }

        throw new \Exception('Невозможно отобразить модель');
    }
}
