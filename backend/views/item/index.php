<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Item', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'price',
            'category_id',
            [
                'class' => 'yii\grid\DataColumn',
                'header' => 'Gambar',
                'format' => 'raw',
                'value' => function($data) {
                    return "<img width='104px' src='".Url::to(['item/view-gambar', 'nama'=>$data->gambar])."'>";
                }
             ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
