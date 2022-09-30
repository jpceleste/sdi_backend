<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "view_usuario".
 *
 * @property int $idusuario
 * @property string $user
 * @property string $email
 * @property string $localidad
 * @property string $provinica
 * @property string $pais
 */
class ViewUsuario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'view_usuario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idusuario'], 'integer'],
            [['user', 'email', 'localidad', 'provinica', 'pais'], 'required'],
            [['user', 'email', 'localidad', 'provinica', 'pais'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idusuario' => 'Idusuario',
            'user' => 'User',
            'email' => 'Email',
            'localidad' => 'Localidad',
            'provinica' => 'Provinica',
            'pais' => 'Pais',
        ];
    }

    public static function primaryKey()
    {
        return ['idusuario'];
    }
}
