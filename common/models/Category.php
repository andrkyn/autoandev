<?php

namespace common\models;

use Yii;
use yii\behaviors\SluggableBehavior;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\web\UploadedFile;
//use yii\widgets\ActiveForm;
//use kartik\file\FileInput;
use yii\helpers\Url;


/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string $name
 * @property string $content
 * @property string $img
 * @property int $upDate
 * @property string $description
 *
 * @property Car[] $cars
 */
class Category extends ActiveRecord
{

    public $file;

    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            //[['name'], 'required'],
            [['content'], 'string'],
            [['date'], 'safe'],
            [['name'], 'string', 'max' => 30],
            [['file'], 'image', 'extensions'=>'jpg, gif, png', 'maxSize'=>'99000'],
            [['description'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'content' => 'Content',
            'slug' => 'Slug',
            'date' => 'Date created',
            'description' => 'Description',
            'image' => 'Image file',
            'file' => 'Set image',
            'viewImage' => 'Image',
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::class,
                'attribute' => 'name',
                'slugAttribute' => 'slug',
            ],
            [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['date'],
                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCars()
    {
        return $this->hasMany(Car::class, ['categoryId' => 'id']);
    }

    public function beforeSave ($insert)
    {
        if ($file = UploadedFile::getInstance($this,'file')) {
            $dir = Yii::getAlias ('@images').'/category/';

            if(!file_exists($dir)){
                mkdir($dir . '/250x/', 0775, true);
                mkdir($dir . '/50x50/', 0775, true);
                mkdir($dir . '/800x/', 0775, true);
            }else{ echo 'Folder exists'; }

            if ($this->image && file_exists($dir . $this->image)) {
                unlink($dir . $this->image);
            }
            if ($this->image && file_exists($dir . '50x50/' . $this->image)) {
                unlink($dir . '50x50/' . $this->image);
            }
            if ($this->image && file_exists($dir . '800x/' . $this->image)) {
                unlink($dir . '800x/' . $this->image);
            }
            if ($this->image && file_exists($dir . '250x/' . $this->image)) {
                unlink($dir . '250x/' . $this->image);
            }
            $this ->image = strtotime ('now').'_'.Yii::$app->getSecurity()->generateRandomString(6) .'.'. $file->extension;
            $file ->saveAs($dir.$this->image);
            $imag = Yii::$app->image->load($dir.$this->image);
            $imag ->background ('#fff',0);
            $imag ->resize ('50','50', Yii\image\drivers\Image::INVERSE);
            $imag ->crop ('50','50');
            $imag ->save($dir.'50x50/'.$this->image, 90);
            $imag = Yii::$app->image->load($dir.$this->image);
            $imag->background('#fff',0);
            $imag->resize('800',null, Yii\image\drivers\Image::INVERSE);
            $imag->save($dir.'800x/'.$this->image, 90);
            $imag->background('#fff',0);
            $imag->resize('250',null, Yii\image\drivers\Image::INVERSE);
            $imag->save($dir.'250x/'.$this->image, 90);

        }
        return parent::beforeSave($insert);
    }


    public function getViewImage() {

        if($this->image){
          $path = Url::home().'images/category/250x/'. $this->image;
        }else {
          $path = Url::home().'images/noimage.svg'. $this->image;
        }
        return $path;
    }

}
