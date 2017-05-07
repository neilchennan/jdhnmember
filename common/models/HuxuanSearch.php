<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Huxuan;

/**
 * HuxuanSearch represents the model behind the search form of `common\models\Huxuan`.
 */
class HuxuanSearch extends Huxuan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'from_num', 'to_num', 'description'], 'safe'],
            [['order', 'gender', 'score', 'created_at', 'modified_at'], 'integer'],
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
        $query = Huxuan::find();

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
            'order' => $this->order,
            'gender' => $this->gender,
            'score' => $this->score,
            'created_at' => $this->created_at,
            'modified_at' => $this->modified_at,
        ]);

        $query->andFilterWhere(['like', 'id', $this->id])
            ->andFilterWhere(['like', 'from_num', $this->from_num])
            ->andFilterWhere(['like', 'to_num', $this->to_num])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
