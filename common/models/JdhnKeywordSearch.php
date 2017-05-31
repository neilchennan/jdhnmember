<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\JdhnKeyword;

/**
 * JdhnKeywordSearch represents the model behind the search form of `common\models\JdhnKeyword`.
 */
class JdhnKeywordSearch extends JdhnKeyword
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kw_id'], 'integer'],
            [['kw_group', 'kw_desc', 'kw_time'], 'safe'],
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
        $query = JdhnKeyword::find();

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
            'kw_id' => $this->kw_id,
            'kw_time' => $this->kw_time,
        ]);

        $query->andFilterWhere(['like', 'kw_group', $this->kw_group])
            ->andFilterWhere(['like', 'kw_desc', $this->kw_desc]);

        return $dataProvider;
    }
}
