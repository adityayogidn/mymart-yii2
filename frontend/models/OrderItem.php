<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "order_item".
 *
 * @property int $customer_order_id
 * @property int $item_id
 *
 * @property CustomerOrder $customerOrder
 * @property Item $item
 */
class OrderItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customer_order_id', 'item_id'], 'required'],
            [['customer_order_id', 'item_id'], 'integer'],
            [['customer_order_id'], 'exist', 'skipOnError' => true, 'targetClass' => CustomerOrder::className(), 'targetAttribute' => ['customer_order_id' => 'id']],
            [['item_id'], 'exist', 'skipOnError' => true, 'targetClass' => Item::className(), 'targetAttribute' => ['item_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'customer_order_id' => 'Customer Order ID',
            'item_id' => 'Item ID',
        ];
    }

    /**
     * Gets query for [[CustomerOrder]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCustomerOrder()
    {
        return $this->hasOne(CustomerOrder::className(), ['id' => 'customer_order_id']);
    }

    /**
     * Gets query for [[Item]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getItem()
    {
        return $this->hasOne(Item::className(), ['id' => 'item_id']);
    }
}
