<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sdi_seg_usuario".
 *
 * @property int $idusuario
 * @property string $user
 * @property string $pass
 * @property string|null $nombre
 * @property string|null $apellido
 * @property int $dni
 * @property string|null $imagen
 * @property string $mail
 * @property int $activo
 * @property string|null $authKey
 * @property string|null $accessToken
 * @property string|null $verification_code
 *
 * @property SdiRadIntervencion[] $sdiRadIntervencions
 * @property SdiRadIntervencion[] $sdiRadIntervencions0
 * @property SdiRadMovimiento[] $sdiRadMovimientos
 * @property SdiSegUsuarioRol[] $sdiSegUsuarioRols
 * @property SdiSysLog[] $sdiSysLogs
 */
class SdiSegUsuario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sdi_seg_usuario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dni', 'activo'], 'integer'],
            [['imagen'], 'string'],
            [['user'], 'string', 'max' => 45],
            [['pass'], 'string', 'max' => 255],
            [['nombre', 'apellido'], 'string', 'max' => 100],
            [['mail'], 'string', 'max' => 200],
            [['authKey', 'accessToken', 'verification_code'], 'string', 'max' => 250],
            [['user'], 'unique'],
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
            'pass' => 'Pass',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'dni' => 'Dni',
            'imagen' => 'Imagen',
            'mail' => 'Mail',
            'activo' => 'Activo',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
            'verification_code' => 'Verification Code',
        ];
    }

    /**
     * Gets query for [[SdiRadIntervencions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSdiRadIntervencions()
    {
        return $this->hasMany(SdiRadIntervencion::className(), ['usuario_carga' => 'idusuario']);
    }

    /**
     * Gets query for [[SdiRadIntervencions0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSdiRadIntervencions0()
    {
        return $this->hasMany(SdiRadIntervencion::className(), ['usuario_intervencion' => 'idusuario']);
    }

    /**
     * Gets query for [[SdiRadMovimientos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSdiRadMovimientos()
    {
        return $this->hasMany(SdiRadMovimiento::className(), ['idusuario' => 'idusuario']);
    }

    /**
     * Gets query for [[SdiSegUsuarioRols]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSdiSegUsuarioRols()
    {
        return $this->hasMany(SdiSegUsuarioRol::className(), ['idusuario' => 'idusuario']);
    }

    /**
     * Gets query for [[SdiSysLogs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSdiSysLogs()
    {
        return $this->hasMany(SdiSysLog::className(), ['idusuario' => 'idusuario']);
    }
}
