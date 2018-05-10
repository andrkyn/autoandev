<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

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
 * @property string $img
 * @property int $upDate
 * @property string $description
 *
 * @property Brand $brand
 * @property Category $category
 */
class Car extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
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
            [['brandId', 'categoryId', 'name', 'slug', 'engine', 'year',], 'required'],
            [['brandId', 'categoryId', 'year'], 'integer'],
            [['date', 'date_modified'], 'safe'],
            [['name'], 'string', 'max' => 30],
            [['engine', 'img', 'description'], 'string', 'max' => 255],
            [['brandId'], 'exist', 'skipOnError' => true, 'targetClass' => Brand::class, 'targetAttribute' => ['brandId' => 'id']],
            [['categoryId'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['categoryId' => 'id']],
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
            'name' => 'Name',
            'slug' =>'Slug',
            'engine' => 'Engine',
            'year' => 'Year',
            'img' => 'Img',
            'date' => 'Date',
            'date_modified' => 'Date modified',
            'description' => 'Description',
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'value' => new Expression('NOW()'),
                'attributes' => [
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
}
