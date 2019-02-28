<?php

namespace app\components;

use app\models\ActiveRecord\Task;
use Yii;
use yii\base\Application;
use yii\base\BootstrapInterface;
use yii\base\Component;
use yii\base\Event;

class Bootstrap extends Component implements BootstrapInterface
{
    /**
     * Bootstrap method to be called during application bootstrap stage.
     * @param Application $app the application currently running
     */
    public function bootstrap($app)
    {
        $this->attachEventsHandlers();
    }

    protected function attachEventsHandlers()
    {
        Event::on(Task::class, Task::EVENT_AFTER_INSERT, function ($event) {
            $task = $event->sender;
            $user = $task->user;

            Yii::$app->mailer->compose()
                ->setTo($user->email)
                ->setFrom("admin@mysite.ru")
                ->setSubject("Вам назначена новая задача")
                ->setTextBody("Вам назначена задача: {$task->name}")
                ->send();
        });
    }
}