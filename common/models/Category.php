<?php

namespace common\models;

use Yii;
use yii\behaviors\SluggableBehavior;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;


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
    const PERMISSIONS_PRIVATE = 10;
    const PERMISSIONS_PUBLIC = 20;
    public $image;

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
            [['name'], 'required'],
            [['content'], 'string'],
            [['date'], 'safe'],
            [['name'], 'string', 'max' => 30],
            [['image'], 'safe'],
            [['image'], 'file', 'extensions'=>'jpg, gif, png'],
            [['image'], 'file', 'maxSize'=>'100000'],
            [['img', 'description', 'image_src', 'image_web'], 'string', 'max' => 255],
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
            'img' => 'Img',
            'slug' => 'Slug',
            'date' => 'Date created',
            'description' => 'Description',
            'image_src' => Yii::t('app', 'Filename'),
            'image_web' => Yii::t('app', 'Pathname'),
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
}
