<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $email
 * @property string $password
 * @property string $full_name
 * @property string $username
 * @property string $authKey
 * @property string $accessToken
 */
class User2 extends \yii\db\ActiveRecord
{
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
            [['email', 'password', 'full_name', 'username', 'authKey', 'accessToken'], 'required'],
            [['email', 'full_name'], 'string', 'max' => 64],
            [['password'], 'string', 'max' => 512],
            [['username'], 'string', 'max' => 32],
            [['authKey', 'accessToken'], 'string', 'max' => 256],
            [['username'], 'unique'],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'password' => 'Password',
            'full_name' => 'Full Name',
            'username' => 'Username',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
        ];
    }

    /**
     * {@inheritdoc}
     * @return UserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserQuery(get_called_class());
    }
}
