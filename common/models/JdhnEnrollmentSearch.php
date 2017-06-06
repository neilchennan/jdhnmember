<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\JdhnEnrollment;

/**
 * JdhnEnrollmentSearch represents the model behind the search form of `common\models\JdhnEnrollment`.
 */
class JdhnEnrollmentSearch extends JdhnEnrollment
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['enroll_id', 'u_id', 'enroll_gender', 'enroll_height', 'act_id', 'enroll_state'], 'integer'],
            [['enroll_name', 'enroll_birthday', 'enroll_school', 'enroll_work', 'enroll_signupTime', 'enroll_custFormInfo'], 'safe'],
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
        $query = JdhnEnrollment::find();

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
            'enroll_id' => $this->enroll_id,
            'u_id' => $this->u_id,
            'enroll_gender' => $this->enroll_gender,
            'enroll_birthday' => $this->enroll_birthday,
            'enroll_height' => $this->enroll_height,
            'act_id' => $this->act_id,
            'enroll_signupTime' => $this->enroll_signupTime,
            'enroll_state' => $this->enroll_state,
        ]);

        $query->andFilterWhere(['like', 'enroll_name', $this->enroll_name])
            ->andFilterWhere(['like', 'enroll_school', $this->enroll_school])
            ->andFilterWhere(['like', 'enroll_work', $this->enroll_work])
            ->andFilterWhere(['like', 'enroll_custFormInfo', $this->enroll_custFormInfo]);

        return $dataProvider;
    }
}
