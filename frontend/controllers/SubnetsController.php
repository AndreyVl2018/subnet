<?php

namespace frontend\controllers;

use Yii;
use common\models\Area;
use common\models\Subnet;
use common\models\SubnetSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SubnetsController implements the CRUD actions for Subnet model.
 */
class SubnetsController extends Controller
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
     * Lists all Subnet models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SubnetSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $model_area = Area::find()->orderBy('name')->all();
        
        foreach ($model_area as $value) {
            $arrArea[$value->id] = $value->name;
        }
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'arrArea' => $arrArea
        ]);
    }

    /**
     * Displays a single Subnet model.
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
     * Creates a new Subnet model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Subnet();

        $model_area = Area::find()->orderBy('name')->all();
        foreach ($model_area as $value) {
            $arrArea[$value->id] = $value->name;
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'arrArea' => $arrArea
        ]);
    }

    /**
     * Updates an existing Subnet model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $arrArea = [];
        $model = $this->findModel($id);
        
        $model_area = Area::find()->orderBy('name')->all();
        foreach ($model_area as $value) {
            $arrArea[$value->id] = $value->name;
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'arrArea' => $arrArea
        ]);
    }

    /**
     * Deletes an existing Subnet model.
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
     * Finds the Subnet model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Subnet the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Subnet::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
