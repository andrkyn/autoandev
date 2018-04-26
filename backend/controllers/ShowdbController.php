<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 25.04.18
 * Time: 17:29
 */

namespace backend\controllers;

use Yii;
//use common\models\Showdb;
use common\models\Brand;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class ShowdbController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }


    public function actionIndex()
    {

        $this->layout = 'mytheme';
        $cats = Brand::find()->all(); //метод получения данных отложенная (ленивая) загрузка
        return $this->render('showdb', compact('cats'));


    }


}