<?php

namespace frontend\controllers;

use Yii;
use common\models\Order;
use common\models\Area;
use common\models\Device;
use common\models\Service;
use common\models\Port;
use common\models\Groupvlan;
use common\models\Subnet;
use common\models\Vlan;
use common\models\Ip;
use common\models\OrderSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OrdersController implements the CRUD actions for Order model.
 */
class OrdersController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Order models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OrderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $model_area = Area::find()->orderBy('name')->all();
        
        foreach ($model_area as $value) {
            $arrArea[$value->id] = $value->name;
        }

        $model_service = Service::find()->orderBy('name')->all();
        
        foreach ($model_service as $value) {
            $arrService[$value->id] = $value->name;
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'arrArea' => $arrArea,
            'arrService' => $arrService,
        ]);
    }

    /**
     * Displays a single Order model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Order model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Order();
        $model_area = Area::find()->orderBy('name')->all();
        
        foreach ($model_area as $value) {
            $arrArea[$value->id] = $value->name;
        }

        $model_service = Service::find()->orderBy('name')->all();
        
        foreach ($model_service as $value) {
            $arrService[$value->id] = $value->name;
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'arrArea' => $arrArea,
            'arrService' => $arrService
        ]);
    }

    /**
     * Updates an existing Order model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model_area = Area::find()->orderBy('name')->all();
        
        foreach ($model_area as $value) {
            $arrArea[$value->id] = $value->name;
        }

        $model_service = Service::find()->orderBy('name')->all();
        
        foreach ($model_service as $value) {
            $arrService[$value->id] = $value->name;
        }
        
        foreach ($model->area->groupvlans as $value) {
            $arrGroupvlan[$value->id] = $value->name;
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'arrArea' => $arrArea,
            'arrService' => $arrService,
            'arrGroupvlan' => $arrGroupvlan
        ]);
    }

    /**
     * Deletes an existing Order model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Order model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Order the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Order::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
