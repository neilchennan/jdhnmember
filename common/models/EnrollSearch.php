<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Enroll;

/**
 * EnrollSearch represents the model behind the search form of `common\models\Enroll`.
 */
class EnrollSearch extends Enroll
{
    //add related table Activity's name query
    /**
     * @var string
     */
    public $activity_name;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'activity_id', 'nickname', 'birth_year', 'school', 'company_major', 'hometown', 'contact', 'name', 'mobile', 'weixin_id', 'id_card_num'], 'safe'],
            [['applicant_role', 'gender', 'highest_degree', 'height', 'created_at', 'modified_at'], 'integer'],
            //added by neil
            ['activity_name', 'safe'],
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
        $query = Enroll::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        //add related table query
        $query->joinWith('activity');
        $query->select("enroll.*, activity.activity_name");

        //让这个列也支持排序
        $sort = $dataProvider->getSort();
        $sort->attributes['activity_name'] = [
            'asc' => ['{{%activity}}.activity_name' => SORT_ASC],
            'desc' => ['{{%activity}}.activity_name' => SORT_DESC],
        ];
        $dataProvider->setSort($sort);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'applicant_role' => $this->applicant_role,
            'birth_year' => $this->birth_year,
            'gender' => $this->gender,
            'highest_degree' => $this->highest_degree,
            'height' => $this->height,
            'created_at' => $this->created_at,
            'modified_at' => $this->modified_at,
        ]);

        $query->andFilterWhere(['like', 'id', $this->id])
            ->andFilterWhere(['like', 'activity_id', $this->activity_id])
            ->andFilterWhere(['like', 'nickname', $this->nickname])
            ->andFilterWhere(['like', 'school', $this->school])
            ->andFilterWhere(['like', 'company_major', $this->company_major])
            ->andFilterWhere(['like', 'hometown', $this->hometown])
            ->andFilterWhere(['like', 'contact', $this->contact])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'mobile', $this->mobile])
            ->andFilterWhere(['like', 'weixin_id', $this->weixin_id])
            ->andFilterWhere(['like', 'id_card_num', $this->id_card_num])
            //added by neil
            ->andFilterWhere(['like', 'activity.activity_name', $this->activity_name]);

        return $dataProvider;
    }
}
