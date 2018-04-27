<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Car;

/**
 * CarSearch represents the model behind the search form of `common\models\Car`.
 */
class CarSearch extends Car
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'brandId', 'categoryId', 'price', 'speed', 'fuelConsumption', 'trunkVolume', 'year', 'upDate'], 'integer'],
            [['name', 'title', 'content', 'transmission', 'engine', 'drive', 'bodyStyle', 'color', 'img', 'description'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Car::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'brandId' => $this->brandId,
            'categoryId' => $this->categoryId,
            'price' => $this->price,
            'speed' => $this->speed,
            'fuelConsumption' => $this->fuelConsumption,
            'trunkVolume' => $this->trunkVolume,
            'year' => $this->year,
            'upDate' => $this->upDate,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'transmission', $this->transmission])
            ->andFilterWhere(['like', 'engine', $this->engine])
            ->andFilterWhere(['like', 'drive', $this->drive])
            ->andFilterWhere(['like', 'bodyStyle', $this->bodyStyle])
            ->andFilterWhere(['like', 'color', $this->color])
            ->andFilterWhere(['like', 'img', $this->img])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}