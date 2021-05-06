<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
$races = \app\models\Race::find()->all();

$json = [];
foreach ($races as $r){
    $json[] = [
            'title'=>$r->name,
            'start'=>$r->date,
            'url'=> \yii\helpers\Url::toRoute(['race/view','id'=>$r->id])
    ];
}
?>
<div class="site-index">

    <div class="body-content">
        <div id='calendar'></div>

    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            events: <?= json_encode($json) ?>
        });
        calendar.render();
    });

</script>
</script>
