<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "color".
 *
 * @property int $id
 * @property string $name
 * @property int $is_enabled
 *
 * @property Car[] $cars
 */
class Color extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'color';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['is_enabled', 'boolean'],
            [['name'], 'string', 'max' => 30],
            [['code'], 'string', 'min'=>0, 'max' => 6],
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
            'code' => 'HTML Code',
            'is_enabled' => 'Is Enabled',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCars()
    {
        return $this->hasMany(Car::class, ['colorId' => 'id']);
    }
}
