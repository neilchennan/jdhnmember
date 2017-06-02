<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\JdhnUser;

/**
 * JdhnUserSearch represents the model behind the search form of `common\models\JdhnUser`.
 */
class JdhnUserSearch extends JdhnUser
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['u_id', 'u_gender', 'u_academic', 'u_state', 'u_salary', 'u_height'], 'integer'],
            [['u_pwd', 'u_realName', 'u_wechat3', 'u_wechat2', 'u_nickName', 'u_portrait', 'u_mobile', 'u_regTime', 'u_school', 'u_city', 'u_birthday', 'u_work', 'u_idCardNo', 'u_academicImg', 'u_idCardImg0', 'u_idCardImg1', 'u_workerImg', 'u_jpush', 'u_comment'], 'safe'],
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
        $query = JdhnUser::find();

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
            'u_id' => $this->u_id,
            'u_regTime' => $this->u_regTime,
            'u_gender' => $this->u_gender,
            'u_academic' => $this->u_academic,
            'u_state' => $this->u_state,
            'u_birthday' => $this->u_birthday,
            'u_salary' => $this->u_salary,
            'u_height' => $this->u_height,
        ]);

        $query->andFilterWhere(['like', 'u_pwd', $this->u_pwd])
            ->andFilterWhere(['like', 'u_realName', $this->u_realName])
            ->andFilterWhere(['like', 'u_wechat3', $this->u_wechat3])
            ->andFilterWhere(['like', 'u_wechat2', $this->u_wechat2])
            ->andFilterWhere(['like', 'u_nickName', $this->u_nickName])
            ->andFilterWhere(['like', 'u_portrait', $this->u_portrait])
            ->andFilterWhere(['like', 'u_mobile', $this->u_mobile])
            ->andFilterWhere(['like', 'u_school', $this->u_school])
            ->andFilterWhere(['like', 'u_city', $this->u_city])
            ->andFilterWhere(['like', 'u_work', $this->u_work])
            ->andFilterWhere(['like', 'u_idCardNo', $this->u_idCardNo])
            ->andFilterWhere(['like', 'u_academicImg', $this->u_academicImg])
            ->andFilterWhere(['like', 'u_idCardImg0', $this->u_idCardImg0])
            ->andFilterWhere(['like', 'u_idCardImg1', $this->u_idCardImg1])
            ->andFilterWhere(['like', 'u_workerImg', $this->u_workerImg])
            ->andFilterWhere(['like', 'u_jpush', $this->u_jpush])
            ->andFilterWhere(['like', 'u_comment', $this->u_comment]);

        return $dataProvider;
    }
}
