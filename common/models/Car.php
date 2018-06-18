<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\SluggableBehavior;
use yii\db\Expression;
use yii\web\UploadedFile;
use yii\helpers\Url;
/**
 * This is the model class for table "car".
 *
 * @property int $id
 * @property int $brandId
 * @property int $categoryId
 * @property string $name
 * @property string $engine
 * @property int $speed
 * @property int $year
 * @property string $image
 * @property int $upDate
 * @property string $description
 *
 * @property Brand $brand
 * @property Category $category
 */
class Car extends ActiveRecord
{
    public $file;

    public static function tableName()
    {
        return 'car';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['brandId', 'categoryId', 'name', 'engine', 'year'], 'required'],
            [['brandId', 'categoryId'], 'integer', 'min' => 0, 'max' => 999],
            [['year'], 'integer', 'min' => 1801, 'max' => 3001],
            [['date', 'date_modified'], 'safe'],
            [['name'], 'string', 'max' => 30],
            [['image'], 'file', 'extensions'=>'jpg, gif, png'],
            [['image'], 'file', 'maxSize'=>'100000'],
            [['image'], 'string', 'max' => 100],
            [['file'], 'image'],
            [['description'], 'string', 'max' => 255],
            [['engine'], 'string', 'max' => 10],
            [['brandId'], 'exist', 'skipOnError' => true, 'targetClass' => Brand::class, 'targetAttribute' => ['brandId' => 'id']],
            [['categoryId'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['categoryId' => 'id']],
            [['colorId'], 'exist', 'skipOnError' => true, 'targetClass' => Color::class, 'targetAttribute' => ['colorId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'brandId' => 'Brand ID',
            'categoryId' => 'Category ID',
            'colorId' => 'Color',
            'name' => 'Name',
            'slug' =>'Slug',
            'engine' => 'Engine',
            'year' => 'Year',
            'image' => 'Image',
            'date' => 'Date created',
            'date_modified' => 'Date modified',
            'description' => 'Description',
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
                'value' => new Expression('NOW()'),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['date'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['date_modified'],
                 ],
            ],
        ];
    }


    public function getBrand()
    {
        return $this->hasOne(Brand::class, ['id' => 'brandId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'categoryId']);
    }

    public function getColor()
    {
        return $this->hasOne(Color::class, ['id' => 'colorId']);
    }

    public function beforeSave ($insert)
    {
        if ($file = UploadedFile::getInstance($this,'file')) {
            $dir = Yii::getAlias ('@images').'/car/';
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
            if ($this->image && file_exists($dir . '80x/' . $this->image)) {
                unlink($dir . '80x/' . $this->image);
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
            $imag->resize('80',null, Yii\image\drivers\Image::INVERSE);
            $imag->save($dir.'80x/'.$this->image, 90);

        }
        return parent::beforeSave($insert);
    }


    public function getViewImage() {

        if($this->image){
            $path = str_replace('admin','',Url::home(true)).'backend/web/uploads/images/car/250x/'. $this->image;
        }else {
            $path = str_replace('admin', '', Url::home(true)) . 'backend/web/uploads/images/noimage.svg';
        }
        return $path;
    }

    public function getSmallImage() {

    if($this->image){
        $path = str_replace('admin','',Url::home(true)).'backend/web/uploads/images/car/80x/'. $this->image;
    }else {
        $path = str_replace('admin', '', Url::home(true)) . 'backend/web/uploads/images/noimage.svg';
    }
    return $path;
}
}
