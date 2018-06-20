<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\SluggableBehavior;
use yii\db\Expression;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;
use yii\helpers\Url;

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
class Brand extends ActiveRecord
{
    public $file;

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
            [['name'], 'required'],
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
            'date' => 'Date created',
            'slug' => 'slug',
            'description' => 'Description',
            'image' => 'Filename',
            'file' => 'Set image',
            'viewImage' => 'Logo (Image)',
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
        return $this->hasMany(Car::class, ['brandId' => 'id']);
    }

    public function beforeSave($insert)
    {
        if ($file = UploadedFile::getInstance($this, 'file')) {
            $dir = Yii::getAlias('@images') . '/brand/';
            if (!file_exists($dir)) {
                mkdir($dir . '/150x/', 0775, true);
                mkdir($dir . '/50x50/', 0775, true);
                mkdir($dir . '/800x/', 0775, true);
            } else {
                echo 'Folder exists';
            }
            if ($this->image && file_exists($dir . $this->image)) {
                unlink($dir . $this->image);
            }
            if ($this->image && file_exists($dir . '50x50/' . $this->image)) {
                unlink($dir . '50x50/' . $this->image);
            }
            if ($this->image && file_exists($dir . '800x/' . $this->image)) {
                unlink($dir . '800x/' . $this->image);
            }
            if ($this->image && file_exists($dir . '150x/' . $this->image)) {
                unlink($dir . '150x/' . $this->image);
            }
            $this->image = strtotime('now') . '_' . Yii::$app->getSecurity()->generateRandomString(6) . '.' . $file->extension;
            $file->saveAs($dir . $this->image);
            $imag = Yii::$app->image->load($dir . $this->image);
            $imag->background('#fff', 0);
            $imag->resize('50', '50', Yii\image\drivers\Image::INVERSE);
            $imag->crop('50', '50');
            $imag->save($dir . '50x50/' . $this->image, 90);
            $imag = Yii::$app->image->load($dir . $this->image);
            $imag->background('#fff', 0);
            $imag->resize('800', null, Yii\image\drivers\Image::INVERSE);
            $imag->save($dir . '800x/' . $this->image, 90);
            $imag->background('#fff', 0);
            $imag->resize('150', null, Yii\image\drivers\Image::INVERSE);
            $imag->save($dir . '150x/' . $this->image, 90);

        }
        return parent::beforeSave($insert);
    }


    public function getViewImage()
    {

        if ($this->image) {
            $path = Url::home() . 'images/brand/150x/' . $this->image;
        } else {
            $path = Url::home() . 'images/noimage.svg' . $this->image;
        }
        return $path;
    }
}
