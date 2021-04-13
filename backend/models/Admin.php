<?php

namespace backend\models;

use common\models\User;
use yii\db\ActiveRecord;

class Admin extends ActiveRecord {
    
        public function rules() {
        return [
            ['status', 'string'],
        ];
    }

    public function ban($id) {
        $model = User::findIdentity($id);
        $model->status = 5;
        $model->update();
    }
    
    public function unban($id){
        $model = User::findBanidentity($id);
        $model->status = 10;
        $model->update();
    }
}
