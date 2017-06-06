<?php

namespace common\models;

use common\helper\JdhnCommonHelper;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\JdhnEnrollment;

/**
 * JdhnEnrollmentSearch represents the model behind the search form of `common\models\JdhnEnrollment`.
 */
class JdhnEnrollmentSearch extends JdhnEnrollment
{
    //add related table Activity's name query
    /**
     * @var string
     */
    public $activity_title;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['enroll_id', 'u_id', 'enroll_gender', 'enroll_height', 'act_id', 'enroll_state'], 'integer'],
            [['enroll_name', 'enroll_birthday', 'enroll_school', 'enroll_work', 'enroll_signupTime', 'enroll_custFormInfo'], 'safe'],
            //added by neil
            ['activity_title', 'safe'],
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
            'pagination' => [
                'pageSize' => JdhnCommonHelper::DEFAULT_PAGE_SIZE,
            ],
            'sort'=> ['defaultOrder' => ['enroll_signupTime'=>SORT_DESC]],
        ]);
        //add related table query
        $query->joinWith('jdhnActivity');
        $query->select("jdhn_enrollment.*, jdhn_activity.act_title");

        //让这个列也支持排序
        $sort = $dataProvider->getSort();
        $sort->attributes['activity_title'] = [
            'asc' => ['{{%jdhnActivity}}.act_title' => SORT_ASC],
            'desc' => ['{{%jdhnActivity}}.act_title' => SORT_DESC],
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
            'enroll_id' => $this->enroll_id,
            'u_id' => $this->u_id,
            'enroll_gender' => $this->enroll_gender,
            'enroll_birthday' => $this->enroll_birthday,
            'enroll_height' => $this->enroll_height,
            'jdhn_activity.act_id' => $this->act_id,
            'enroll_signupTime' => $this->enroll_signupTime,
            'enroll_state' => $this->enroll_state,
        ]);

        $query->andFilterWhere(['like', 'enroll_name', $this->enroll_name])
            ->andFilterWhere(['like', 'enroll_school', $this->enroll_school])
            ->andFilterWhere(['like', 'enroll_work', $this->enroll_work])
            ->andFilterWhere(['like', 'enroll_custFormInfo', $this->enroll_custFormInfo])
            //added by neil
            ->andFilterWhere(['like', 'jdhn_activity.act_title', $this->activity_title]);

        return $dataProvider;
    }
}
