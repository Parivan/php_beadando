<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "race_member".
 *
 * @property int $id
 * @property int $race
 * @property string $name
 * @property string $phone
 * @property int $age
 */
class RaceMember extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'race_member';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['race', 'name', 'phone', 'age'], 'required'],
            [['race', 'age'], 'integer'],
            [['name'], 'string', 'max' => 64],
            [['phone'], 'string', 'max' => 16],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'race' => Yii::t('app', 'Verseny'),
            'name' => Yii::t('app', 'Név'),
            'phone' => Yii::t('app', 'Telefonszám'),
            'age' => Yii::t('app', 'Kor'),
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
