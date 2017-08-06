<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\JdhnActComment;

/**
 * JdhnActCommentSearch represents the model behind the search form of `common\models\JdhnActComment`.
 */
class JdhnActCommentSearch extends JdhnActComment
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['acm_id', 'u_id', 'act_id', 'acm_state'], 'integer'],
            [['acm_text', 'acm_time'], 'safe'],
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
        $query = JdhnActComment::find();

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
            'acm_id' => $this->acm_id,
            'u_id' => $this->u_id,
            'act_id' => $this->act_id,
            'acm_time' => $this->acm_time,
            'acm_state' => $this->acm_state,
        ]);

        $query->andFilterWhere(['like', 'acm_text', $this->acm_text]);

        return $dataProvider;
    }
}
