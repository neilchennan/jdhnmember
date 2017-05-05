<?php

namespace common\models;

use common\helper\JdhnCommonHelper;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Qrxq2017Enroll;

/**
 * Qrxq2017EnrollSearch represents the model behind the search form of `common\models\Qrxq2017Enroll`.
 */
class Qrxq2017EnrollSearch extends Qrxq2017Enroll4View
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //safe的话不会验证类型
            [['id', 'name', 'nickname', 'school', 'company_major', 'hometown', 'contact', 'mobile', 'weixin_id', 'id_card_num'], 'safe'],
            [['birth_year'], 'integer',  'min' => 1970, 'max' => 2017],
            [['age'], 'integer'],
            [['created_at', 'modified_at'], 'integer'],
            [['applicant_role', 'highest_degree', 'gender'], 'string'],
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
        $query = Qrxq2017Enroll::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            $this->prepareModels4view($dataProvider);

            return $dataProvider;
        }

//         grid filtering conditions
        $query->andFilterWhere([
            'applicant_role' => JdhnCommonHelper::getApplicationRoles4query($this->applicant_role),
            'birth_year' => $this->birth_year,
            'gender' => JdhnCommonHelper::getGenders4query($this->gender),
            'highest_degree' => JdhnCommonHelper::getHighestDegrees4query($this->highest_degree),
            'height' => $this->height,
            'created_at' => $this->created_at,
            'modified_at' => $this->modified_at,
        ]);

        $query->andFilterWhere(['like', 'id', $this->id])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'nickname', $this->nickname])
            ->andFilterWhere(['like', 'school', $this->school])
            ->andFilterWhere(['like', 'company_major', $this->company_major])
            ->andFilterWhere(['like', 'hometown', $this->hometown])
            ->andFilterWhere(['like', 'contact', $this->contact])
            ->andFilterWhere(['like', 'mobile', $this->mobile])
            ->andFilterWhere(['like', 'weixin_id', $this->weixin_id])
            ->andFilterWhere(['like', 'id_card_num', $this->id_card_num]);

        $this->prepareModels4view($dataProvider);

        return $dataProvider;
    }

    public function prepareModels4view($dp){
        $models = $dp->getModels();
        $newModels = array();
        foreach($models as $element){
            $newElement = new Qrxq2017Enroll4View($element);
            array_push($newModels, $newElement);
        }
        $dp->models = $newModels;
    }
}
