<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Racemember */

$this->title = Yii::t('app', 'Create Racemember');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Racemembers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="racemember-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
