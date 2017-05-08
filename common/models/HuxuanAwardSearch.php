<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\HuxuanAward;

/**
 * HuxuanAwardSearch represents the model behind the search form of `common\models\HuxuanAward`.
 */
class HuxuanAwardSearch extends HuxuanAward
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'male_num', 'female_num'], 'safe'],
            [['total_score'], 'integer'],
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
        $query = HuxuanAward::find();

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
            'total_score' => $this->total_score,
        ]);

        $query->andFilterWhere(['like', 'id', $this->id])
            ->andFilterWhere(['like', 'male_num', $this->male_num])
            ->andFilterWhere(['like', 'female_num', $this->female_num]);

        return $dataProvider;
    }
}
