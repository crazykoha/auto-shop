<?php


namespace app\models;
use yii\data\ActiveDataProvider;

/**
 *
 * @property integer $brandIds
 * @property integer $autoModelIds
 * @property integer $engineTypeIds
 * @property integer $driveUnitIds
 */

class CarSearch extends Car
{
    public $brandIds;
    public $autoModelIds;
    public $engineTypeIds;
    public $driveUnitIds;
    public $currentBrand;
    public $currentModel;

    public function rules()
    {
        return [
            [['brandIds', 'autoModelIds', 'engineTypeIds', 'driveUnitIds'], 'string'],
        ];
    }

    public function search($params) {
        $query = Car::find()
            ->joinWith(['driveUnit', 'engineType', 'autoModel.brand']);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 12
            ]
        ]);
        $this->load($params, '');
        if(($params['firstQueryParam'] && $brand = Brand::findOne(['name'=>$params['firstQueryParam']])) || ($params['brandIds'] && $brand = Brand::findOne(['name'=>$params['brandIds']]))) {
            $this->currentBrand = $brand;
            $this->brandIds = $brand->id;
        }
        if($params['secondQueryParam'] && $model = AutoModel::findOne(['name'=>$params['secondQueryParam']])) {
            $this->currentModel = $model;
            $this->autoModelIds = $model->id;
        }
        $query->andFilterWhere(['auto_model_id' => $this->autoModelIds]);
        $query->andFilterWhere(['brand_id' => $this->brandIds]);
        $query->andFilterWhere(['drive_unit_id' => $this->driveUnitIds]);
        $query->andFilterWhere(['engine_type_id' => $this->engineTypeIds]);
        return $dataProvider;
    }
}