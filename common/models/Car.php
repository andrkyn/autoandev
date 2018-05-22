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
            [['brandId', 'categoryId', 'colorId', 'name', 'slug', 'engine', 'year'], 'required'],
            [['brandId', 'categoryId', 'colorId'], 'integer', 'min' => 0, 'max' => 999],
            [['year'], 'integer', 'min' => 1801, 'max' => 3001],
            [['date', 'date_modified'], 'safe'],
            [['name'], 'string', 'max' => 30],
            [['img', 'description'], 'string', 'max' => 255],
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

    public function getColor()
    {
        return $this->hasOne(Color::class, ['id' => 'colorId']);
    }
}
