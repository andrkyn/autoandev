<?php

namespace backend\controllers;

use Yii;
use common\models\Car;
use common\models\CarSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\Brand;
use common\models\Category;
use common\models\Color;

/**
 * CarController implements the CRUD actions for Car model.
 */
class CarController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Car models.
     * @return mixed
     */
    public function actionIndex()
    {
        //$this->layout = 'mytheme';
        $searchModel = new CarSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Car model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $car = Car::findOne($id);
        $colorId = $car->colorId;
        if (isset($colorId)) {
            $codecol = Color::findOne(['id' => $colorId]);
        } else {
            $codecol = new Color();
            $codecol->code = 'FFFFFF';
        }
        return $this->render('view', [
            'model' => $this->findModel($id), 'codecol' => $codecol,
        ]);
    }

    /**
     * Creates a new Car model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $brands = Brand::find()->all();
        $categories = Category::find()->all();
        $colors = Color::find()->all();
        $model = new Car();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'brands' => $brands,
            'categories' => $categories,
            'colors' => $colors,

        ]);
    }

    /**
     * Updates an existing Car model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $brands = Brand::find()->all();
        $categories = Category::find()->all();
        $colors = Color::find()->all();
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'brands' => $brands,
            'categories' => $categories,
            'colors' => $colors,
        ]);
    }

    /**
     * Deletes an existing Car model.
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

    public function actionDeleteImage($id)
    {
        $model = $this->findModel($id);
        $imgName = $model->image;
        unlink(Yii::getAlias('@images').'/car/250x/'.$imgName);
        unlink(Yii::getAlias('@images').'/car/50x50/'.$imgName);
        unlink(Yii::getAlias('@images').'/car/800x/'.$imgName);
        unlink(Yii::getAlias('@images').'/car/80x/'.$imgName);
        unlink(Yii::getAlias('@images').'/car/'.$imgName);
        $model->image = null;
        $model->update();
        return $this->redirect(['update', 'id' => $model->id]);
    }

    protected function findModel($id)
    {
        if (($model = Car::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
