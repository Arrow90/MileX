<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "coche".
 *
 * @property integer $id
 * @property string $nombre
 * @property integer $persona_id
 *
 * @property Persona $persona
 */
class Coche extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'coche';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['persona_id'], 'integer'],
            [['nombre'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'persona_id' => 'Persona ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersona()
    {
        return $this->hasOne(Persona::className(), ['id' => 'persona_id']);
    }
}
