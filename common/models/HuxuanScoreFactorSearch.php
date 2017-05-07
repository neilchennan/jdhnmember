<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\HuxuanScoreFactor;

/**
 * HuxuanScoreFactorSearch represents the model behind the search form of `common\models\HuxuanScoreFactor`.
 */
class HuxuanScoreFactorSearch extends HuxuanScoreFactor
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //不设置的属性会被丢弃，不能搜索
            [['id', 'description'], 'safe'],
            [['gender', 'order', 'factor'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
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
    public function search($params)
    {
        $query = HuxuanScoreFactor::find();

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
            'gender' => $this->gender,
            'order' => $this->order,
            'factor' => $this->factor,
            'created_at' => $this->created_at,
            'modified_at' => $this->modified_at,
        ]);

        $query->andFilterWhere(['like', 'id', $this->id])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
