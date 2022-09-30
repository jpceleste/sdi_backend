<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ViewUsuario;

/**
 * ViewUsuarioSearch represents the model behind the search form of `app\models\ViewUsuario`.
 */
class ViewUsuarioSearch extends ViewUsuario
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idusuario'], 'integer'],
            [['user', 'email', 'localidad', 'provinica', 'pais'], 'safe'],
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
        $query = ViewUsuario::find();

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
            'idusuario' => $this->idusuario,
        ]);

        $query->andFilterWhere(['like', 'user', $this->user])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'localidad', $this->localidad])
            ->andFilterWhere(['like', 'provinica', $this->provinica])
            ->andFilterWhere(['like', 'pais', $this->pais]);

        return $dataProvider;
    }
}
