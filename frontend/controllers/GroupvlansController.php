<?php

namespace frontend\controllers;

use Yii;
use common\models\Groupvlan;
use common\models\Area;
use common\models\GroupvlanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GroupvlansController implements the CRUD actions for Groupvlan model.
 */
class GroupvlansController extends Controller
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
     * Lists all Groupvlan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GroupvlanSearch();
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
     * Displays a single Groupvlan model.
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
     * Creates a new Groupvlan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Groupvlan();

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
     * Updates an existing Groupvlan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $model_area = Area::find()->orderBy('name')->all();
        $this->storeReturnUrl();
        
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
     * Deletes an existing Groupvlan model.
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
     * Finds the Groupvlan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Groupvlan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Groupvlan::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    private function storeReturnUrl()
    {
        Yii::$app->user->returnUrl = Yii::$app->request->url;
    }
}
