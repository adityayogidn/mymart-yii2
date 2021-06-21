<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CustomerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Show Order';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-index">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <?php
    $dataProvider2 = new ActiveDataProvider([
        'query' => $dataProvider,
        'pagination' => [
            'pageSize' => 20,
        ],
    ]);
    ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider2,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                    'header' => 'Order ID',
                    'attribute' => 'id',
                ],
                [
                    'header' => 'Customer Name',
                    'attribute' => 'customer.nama',
                ],
                [
                    'label' => 'Items',
                    'class' => 'yii\grid\DataColumn',
                    'format' => 'html',
                    'value' => function ($data) {
                        $result = '<ul>';
                        foreach($data->orderItems as $orderItem){
                            $result .= '<li>'.$orderItem->item->name.'</li>';
                        }
                        $result .= '</ul>';
                        return $result;
                    },
                ]
            ],
        ]); ?>

</div>