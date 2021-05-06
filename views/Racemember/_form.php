<?php

use borales\extensions\phoneInput\PhoneInput;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Racemember */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="racemember-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php
    if(!Yii::$app->user->isGuest) {
        ?>
        <label class="control-label" for="racemember-race">Verseny</label>
       <?php
        echo Html::activeDropDownList($model, 'race',
            ArrayHelper::map(\app\models\Race::find()->where(['>', 'date', 'NOW()'])->all(), 'id', 'name'), ['class' => 'form-control']);
    }
    ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->widget(PhoneInput::className(), [
        'jsOptions' => [
            'preferredCountries' => ['hu'],
        ]
    ]); ?>

    <?= $form->field($model, 'age')->textInput(['type' => 'number', 'maxlength' => 3,'max'=>150,'min'=>0]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
