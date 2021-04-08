<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Address;
use Yii;
use common\models\User;

/**
 * AddressSearch represents the model behind the search form of `common\models\Address`.
 */
class AddressSearch extends Address {

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['id', 'postcode'], 'integer'],
            [['user_id' ,'country', 'city', 'street', 'house_number', 'apartment_number'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios() {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */


        public function searchone($params) {
        $user = User::findIdentity(Yii::$app->user->id);    
        $query = Address::find()->andWhere(['user_id' => $user->username]);
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id, 
        ]);

        $query->andFilterWhere(['like', 'postcode', $this->postcode])
                ->andFilterWhere(['like', 'country', $this->country])
                ->andFilterWhere(['like', 'city', $this->city])
                ->andFilterWhere(['like', 'street', $this->street])
                ->andFilterWhere(['like', 'house_number', $this->house_number])
                ->andFilterWhere(['like', 'apartment_number', $this->apartment_number]);

        return $dataProvider;
    }
}
