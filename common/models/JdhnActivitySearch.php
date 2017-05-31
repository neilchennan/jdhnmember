<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\JdhnActivity;

/**
 * JdhnActivitySearch represents the model behind the search form of `common\models\JdhnActivity`.
 */
class JdhnActivitySearch extends JdhnActivity
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['act_id', 'act_city', 'act_p_uLimit', 'act_p_dLimit', 'act_type', 'act_state', 'act_fee', 'act_readCount'], 'integer'],
            [['act_title', 'act_detail', 'act_richText', 'act_richText_html', 'act_address', 'act_beginTime', 'act_endTime', 'act_createTime', 'act_thumb', 'act_photos', 'act_signBeginTime', 'act_signEndTime', 'act_customForm', 'act_title_idx', 'act_richText_idx', 'act_address_idx', 'act_notice'], 'safe'],
            [['act_price', 'act_mbPrice'], 'number'],
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
        $query = JdhnActivity::find();

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
            'act_id' => $this->act_id,
            'act_city' => $this->act_city,
            'act_p_uLimit' => $this->act_p_uLimit,
            'act_p_dLimit' => $this->act_p_dLimit,
            'act_beginTime' => $this->act_beginTime,
            'act_endTime' => $this->act_endTime,
            'act_createTime' => $this->act_createTime,
            'act_type' => $this->act_type,
            'act_state' => $this->act_state,
            'act_price' => $this->act_price,
            'act_fee' => $this->act_fee,
            'act_signBeginTime' => $this->act_signBeginTime,
            'act_signEndTime' => $this->act_signEndTime,
            'act_readCount' => $this->act_readCount,
            'act_mbPrice' => $this->act_mbPrice,
        ]);

        $query->andFilterWhere(['like', 'act_title', $this->act_title])
            ->andFilterWhere(['like', 'act_detail', $this->act_detail])
            ->andFilterWhere(['like', 'act_richText', $this->act_richText])
            ->andFilterWhere(['like', 'act_richText_html', $this->act_richText_html])
            ->andFilterWhere(['like', 'act_address', $this->act_address])
            ->andFilterWhere(['like', 'act_thumb', $this->act_thumb])
            ->andFilterWhere(['like', 'act_photos', $this->act_photos])
            ->andFilterWhere(['like', 'act_customForm', $this->act_customForm])
            ->andFilterWhere(['like', 'act_title_idx', $this->act_title_idx])
            ->andFilterWhere(['like', 'act_richText_idx', $this->act_richText_idx])
            ->andFilterWhere(['like', 'act_address_idx', $this->act_address_idx])
            ->andFilterWhere(['like', 'act_notice', $this->act_notice]);

        return $dataProvider;
    }
}
