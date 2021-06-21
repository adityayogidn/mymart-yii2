<?php
    namespace frontend\components;

    use common\models\Statistic;
    use yii\base\Component;

    class AccessRecord extends Component{
        const EVENT_ACCESS_WEB = 'access-web';

        public function accessHandler(){
                \common\models\Statistic::createRecord();
        }
    }