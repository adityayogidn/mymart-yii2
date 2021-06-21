<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "statistic".
 *
 * @property int $id
 * @property string|null $access_time
 * @property string|null $user_ip
 * @property string|null $user_host
 * @property string|null $path_info
 * @property string|null $query_string
 */
class Statistic extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'statistic';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['access_time'], 'safe'],
            [['user_ip'], 'string', 'max' => 20],
            [['user_host', 'path_info', 'query_string'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'access_time' => 'Access Time',
            'user_ip' => 'User Ip',
            'user_host' => 'User Host',
            'path_info' => 'Path Info',
            'query_string' => 'Query String',
        ];
    }
    
    public static function createRecord(){
        $statistic = new Statistic();
        
        $statistic->access_time = date('Y-m-d H:i:s');
        $statistic->user_ip = Yii::$app->request->userIP;
        $statistic->user_host = Yii::$app->request->userHost;
        $statistic->path_info = Yii::$app->request->pathInfo;
        $statistic->query_string = Yii::$app->request->queryString;

        $statistic->save();
    }

}
