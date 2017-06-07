<?php

namespace common\models;

use common\helper\JdhnCommonHelper;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\JdhnOrder;

/**
 * JdhnOrderSearch represents the model behind the search form of `common\models\JdhnOrder`.
 */
class JdhnOrderSearch extends JdhnOrder
{
    //add related table Activity's name query
//    /**
//     * @var string
//     */
//    public $activity_title;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ord_id', 'ord_time', 'ord_payTime', 'ord_refundTime', 'ali_trade_no', 'ali_trade_status', 'ali_buyer_id', 'ali_buyer_email', 'ali_gmt_create', 'ali_gmt_payment', 'ali_refund_status', 'ali_gmt_refund', 'wechat_openid', 'wechat_fee_type', 'wechat_bank_type', 'wechat_transaction_id', 'wechat_time_end', 'ord_detail'], 'safe'],
            [['act_id', 'enroll_id', 'u_id', 'ord_payType', 'ord_state', 'wechat_total_fee'], 'integer'],
            [['ali_total_fee', 'ord_fee'], 'number'],
            //added by neil
//            ['activity_title', 'safe'],
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
        $query = JdhnOrder::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => JdhnCommonHelper::DEFAULT_PAGE_SIZE,
            ],
            'sort'=> ['defaultOrder' => ['ord_time'=>SORT_DESC]],
        ]);
//        //add related table query
//        $query->joinWith('jdhnActivity');
//        $query->select("jdhn_order.*, jdhn_activity.act_title");
//
//        //让这个列也支持排序
//        $sort = $dataProvider->getSort();
//        $sort->attributes['activity_title'] = [
//            'asc' => ['{{%jdhnActivity}}.act_title' => SORT_ASC],
//            'desc' => ['{{%jdhnActivity}}.act_title' => SORT_DESC],
//        ];
//        $dataProvider->setSort($sort);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
//            'jdhn_order.act_id' => $this->act_id,
            'act_id' => $this->act_id,
            'enroll_id' => $this->enroll_id,
            'u_id' => $this->u_id,
            'ord_payType' => $this->ord_payType,
            'ord_time' => $this->ord_time,
            'ord_payTime' => $this->ord_payTime,
            'ord_refundTime' => $this->ord_refundTime,
            'ord_state' => $this->ord_state,
            'ali_total_fee' => $this->ali_total_fee,
            'ali_gmt_create' => $this->ali_gmt_create,
            'ali_gmt_payment' => $this->ali_gmt_payment,
            'ali_gmt_refund' => $this->ali_gmt_refund,
            'wechat_total_fee' => $this->wechat_total_fee,
            'ord_fee' => $this->ord_fee,
        ]);

        $query->andFilterWhere(['like', 'ord_id', $this->ord_id])
            ->andFilterWhere(['like', 'ali_trade_no', $this->ali_trade_no])
            ->andFilterWhere(['like', 'ali_trade_status', $this->ali_trade_status])
            ->andFilterWhere(['like', 'ali_buyer_id', $this->ali_buyer_id])
            ->andFilterWhere(['like', 'ali_buyer_email', $this->ali_buyer_email])
            ->andFilterWhere(['like', 'ali_refund_status', $this->ali_refund_status])
            ->andFilterWhere(['like', 'wechat_openid', $this->wechat_openid])
            ->andFilterWhere(['like', 'wechat_fee_type', $this->wechat_fee_type])
            ->andFilterWhere(['like', 'wechat_bank_type', $this->wechat_bank_type])
            ->andFilterWhere(['like', 'wechat_transaction_id', $this->wechat_transaction_id])
            ->andFilterWhere(['like', 'wechat_time_end', $this->wechat_time_end])
            ->andFilterWhere(['like', 'ord_detail', $this->ord_detail]);
            //added by neil
//            ->andFilterWhere(['like', 'jdhn_activity.act_title', $this->activity_title]);

        return $dataProvider;
    }
}
