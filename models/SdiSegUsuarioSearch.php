<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SdiSegUsuario;

/**
 * SdiSegUsuarioSearch represents the model behind the search form of `app\models\SdiSegUsuario`.
 */
class SdiSegUsuarioSearch extends SdiSegUsuario
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idusuario', 'dni', 'activo'], 'integer'],
            [['user', 'pass', 'nombre', 'apellido', 'imagen', 'mail', 'authKey', 'accessToken', 'verification_code'], 'safe'],
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
        $query = SdiSegUsuario::find();

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
            'dni' => $this->dni,
            'activo' => $this->activo,
        ]);

        $query->andFilterWhere(['like', 'user', $this->user])
            ->andFilterWhere(['like', 'pass', $this->pass])
            ->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'apellido', $this->apellido])
            ->andFilterWhere(['like', 'imagen', $this->imagen])
            ->andFilterWhere(['like', 'mail', $this->mail])
            ->andFilterWhere(['like', 'authKey', $this->authKey])
            ->andFilterWhere(['like', 'accessToken', $this->accessToken])
            ->andFilterWhere(['like', 'verification_code', $this->verification_code]);

        return $dataProvider;
    }
}
