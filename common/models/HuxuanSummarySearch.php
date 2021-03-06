<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\HuxuanSummary;

/**
 * HuxuanSummarySearch represents the model behind the search form of `common\models\HuxuanSummary`.
 */
class HuxuanSummarySearch extends HuxuanSummary
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'activity_id', 'male_num', 'female_num', 'description'], 'safe'],
            [['male_order', 'female_order', 'male_score', 'female_score', 'total_score', 'created_at', 'modified_at'], 'integer'],
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
        $query = HuxuanSummary::find();

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
            'male_order' => $this->male_order,
            'female_order' => $this->female_order,
            'male_score' => $this->male_score,
            'female_score' => $this->female_score,
            'total_score' => $this->total_score,
            'created_at' => $this->created_at,
            'modified_at' => $this->modified_at,
        ]);

        $query->andFilterWhere(['like', 'id', $this->id])
            ->andFilterWhere(['like', 'activity_id', $this->activity_id])
            ->andFilterWhere(['like', 'male_num', $this->male_num])
            ->andFilterWhere(['like', 'female_num', $this->female_num])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
