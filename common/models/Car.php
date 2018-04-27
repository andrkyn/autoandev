<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "car".
 *
 * @property int $id
 * @property int $brandId
 * @property int $categoryId
 * @property string $name
 * @property string $title
 * @property string $content
 * @property int $price
 * @property string $transmission
 * @property string $engine
 * @property int $speed
 * @property int $fuelConsumption
 * @property string $drive
 * @property int $trunkVolume
 * @property string $bodyStyle
 * @property string $color
 * @property int $year
 * @property string $img
 * @property int $upDate
 * @property string $description
 *
 * @property Brand $brand
 * @property Category $category
 */
class Car extends \yii\db\ActiveRecord
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
            [['brandId', 'categoryId', 'name', 'slug', 'price', 'transmission', 'engine', 'speed', 'drive', 'bodyStyle', 'year', 'img', 'upDate'], 'required'],
            [['brandId', 'categoryId', 'price', 'speed', 'fuelConsumption', 'trunkVolume', 'year', 'upDate'], 'integer'],
            [['content'], 'string'],
            [['name'], 'string', 'max' => 30],
            [['title', 'transmission', 'engine', 'drive', 'bodyStyle', 'color', 'img', 'description'], 'string', 'max' => 255],
            [['brandId'], 'exist', 'skipOnError' => true, 'targetClass' => Brand::className(), 'targetAttribute' => ['brandId' => 'id']],
            [['categoryId'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['categoryId' => 'id']],
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
            'title' => 'Title',
            'content' => 'Content',
            'price' => 'Price',
            'slug' =>'Slug',
            'transmission' => 'Transmission',
            'engine' => 'Engine',
            'speed' => 'Speed',
            'fuelConsumption' => 'Fuel Consumption',
            'drive' => 'Drive',
            'trunkVolume' => 'Trunk Volume',
            'bodyStyle' => 'Body Style',
            'color' => 'Color',
            'year' => 'Year',
            'img' => 'Img',
            'upDate' => 'Up Date',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBrand()
    {
        return $this->hasOne(Brand::className(), ['id' => 'brandId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'categoryId']);
    }
}
