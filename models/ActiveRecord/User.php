<?php

namespace app\models\ActiveRecord;

use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $first_name
 * @property string $second_name
 * @property string $login
 * @property string $password
 * @property string $email
 *
 * @property Task[] $tasks
 */
class User extends ActiveRecord
{
    const SCENARIO_AUTH = 'auth';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'second_name', 'login', 'password', 'email'], 'required'],
            [['first_name', 'second_name', 'login'], 'string', 'max' => 56],
            [['password', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'second_name' => 'Second Name',
            'login' => 'Login',
            'password' => 'Password',
            'email' => 'Email',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTasks()
    {
        return $this->hasMany(Task::class, ['responsible_id' => 'id']);
    }

    /**
     * @return array|false
     */
    public function fields()
    {
        if ($this->scenario == self::SCENARIO_AUTH) {
            return [
                'id',
                'username' => 'login',
                'password',
            ];
        }

        return parent::fields();
    }

    /**
     * @return array
     */
    public function getRolesList()
    {
        $roles = Role::find()->select(['id', 'name'])->asArray()->all();
        return ArrayHelper::map($roles, 'id', 'name');
    }
}
