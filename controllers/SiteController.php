<?php

namespace app\controllers;

use app\models\AutoModel;
use app\models\Brand;
use app\models\Car;
use app\models\CarSearch;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\UploadedFile;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex($firstQueryParam=null, $secondQueryParam=null)
    {
        $searchModel = new CarSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->get());
        if(Yii::$app->request->isAjax) {
            return $this->renderAjax('catalog', [
                'dataProvider' => $dataProvider,
                'searchModel' => $searchModel
            ]);
        }
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel
        ]);
    }

    public function actionGetModels() {
        if($brand_ids = Yii::$app->request->get('brandIds')) {
            $models = AutoModel::find()->filterWhere(['brand_id'=>$brand_ids])->all();
            $searchModel = new CarSearch();
            $searchModel->autoModelIds = Yii::$app->request->get('modelIds');
            return $this->renderAjax('brand_filter', [
                'models' => $models,
                'searchModel' => $searchModel
            ]);
        } else {
            return '';
        }
    }

    public function actionGetUrl() {
        $params = Yii::$app->request->get();
        $url = '/';
        if($params['brandIds'] && count($params['brandIds']) === 1) {
            $brand = Brand::findOne($params['brandIds'][0]);
            $url = '/'.strtolower($brand->name);
            unset($params['brandIds']);
            if($params['autoModelIds'] && count($params['autoModelIds']) === 1) {
                $model = AutoModel::findOne($params['autoModelIds'][0]);
                $url .= '/'.strtolower($model->name);
                unset($params['autoModelIds']);
            }
        }
        return Url::toRoute(ArrayHelper::merge([$url], $params));
    }

    public function actionUpload()
    {
        $model = new Car();

        if (Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->upload()) {
                // file is uploaded successfully
                return;
            }
        }

        return $this->render('upload', ['model' => $model]);
    }
}
