<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "brand".
 *
 * @property int $id
 * @property string $name
 * @property string $img
 * @property int $upDate
 * @property string $description
 *
 * @property Car[] $cars
 */
class Brand extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'brand';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'img', 'upDate', 'slug'], 'required'],
            [['upDate'], 'integer'],
            [['name'], 'string', 'max' => 30],
            [['img', 'description'], 'string', 'max' => 255],
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
            'img' => 'Img',
            'upDate' => 'Up Date',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCars()
    {
        return $this->hasMany(Car::class(), ['brandId' => 'id']);
    }
}
