<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii2mod\editable\EditableColumn;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RoomsCandidatesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rooms Candidates';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rooms-candidates-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'conclusion',
                'label' => 'Room name',
                'value' => function ($model) {
                    return $model->room->name;
                },
            ],
            [
                'label' => 'Candidate Name',
                'value' => function ($model) {
                    return $model->candidate->name;
                },
            ],
            [
                'label' => 'Candidate Email',
                'value' => function ($model) {
                    return $model->candidate->email;
                },
                'visible' => Yii::$app->user->can('manager'),
            ],
            'points',
            [
                'attribute' => 'conclusion',
                'visible' => Yii::$app->user->can('candidate'),
            ],
            [
                'visible' => Yii::$app->user->can('manager'),
                'class' => EditableColumn::class,
                'attribute' => 'conclusion',
                'value' => function ($model) {
                    return $model->conclusion ? $model->conclusion : 'Not overviewed yet';
                },
                'url' => ['change-conclusion'],
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'visible' => Yii::$app->user->can('manager'),
            ],
        ],
    ]); ?>


</div>
