<?php

use kartik\datetime\DateTimePicker;
use kartik\number\NumberControl;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap4\Modal;;
/* @var $this yii\web\View */
/* @var $model app\models\Race */
/* @var $form yii\widgets\ActiveForm */
$dispOptions = ['class' => 'form-control kv-monospace'];

$saveOptions = [
    'type' => 'text',
    'label'=>'<label>Saved Value: </label>',
    'class' => 'kv-saved',
    'readonly' => true,
    'tabindex' => 1000
];

$saveCont = ['class' => 'kv-saved-cont'];
?>

<div class="race-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'place')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date')->widget(DateTimePicker::classname(), [
        'options' => ['placeholder' => 'Verseny időpontja'],
        'pluginOptions' => [
            'autoclose' => true
        ]
    ]); ?>

    <?= $form->field($model, 'max_member')->widget(NumberControl::classname(), [
        'maskedInputOptions' => [
            'groupSeparator' => ' ',
            'allowMinus' => false
        ],
        'options' => $saveOptions,
        'displayOptions' => $dispOptions,
        'saveInputContainer' => $saveCont
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
