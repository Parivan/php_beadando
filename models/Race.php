<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "race".
 *
 * @property int $id
 * @property string $name
 * @property string $place
 * @property string $date
 * @property int $max_member
 * @property string $description
 */
class Race extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'race';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'place', 'date', 'max_member', 'description'], 'required'],
            [['date'], 'safe'],
            [['max_member'], 'integer'],
            [['name'], 'string', 'max' => 128],
            [['place'], 'string', 'max' => 256],
            [['description'], 'string', 'max' => 1024],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Név',
            'place' => 'Helyszín',
            'date' => 'Dátum',
            'max_member' => 'Maximum jelentkezők',
            'description' => 'Leírás',
        ];
    }

    /**
     * {@inheritdoc}
     * @return RaceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RaceQuery(get_called_class());
    }
}
