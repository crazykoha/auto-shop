<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "car".
 *
 * @property int $id
 * @property int $auto_model_id
 * @property int $engine_type_id
 * @property int $drive_unit_id
 * @property string $photo
 *
 * @property DriveUnit $driveUnit
 * @property EngineType $engineType
 * @property AutoModel $autoModel
 */
class Car extends \yii\db\ActiveRecord
{
    /**
     * @var UploadedFile
     */
    public $imageFile;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'car';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['auto_model_id', 'engine_type_id', 'drive_unit_id'], 'required'],
            [['auto_model_id', 'engine_type_id', 'drive_unit_id'], 'integer'],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
            [['photo'], 'string'],
            [['drive_unit_id'], 'exist', 'skipOnError' => true, 'targetClass' => DriveUnit::className(), 'targetAttribute' => ['drive_unit_id' => 'id']],
            [['engine_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => EngineType::className(), 'targetAttribute' => ['engine_type_id' => 'id']],
            [['auto_model_id'], 'exist', 'skipOnError' => true, 'targetClass' => AutoModel::className(), 'targetAttribute' => ['auto_model_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'auto_model_id' => 'Модель',
            'imageFile' => 'Фото',
            'engine_type_id' => 'Тип двигателя',
            'drive_unit_id' => 'Привод',
            'photo' => 'Фото',
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $this->imageFile->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }

    /**
     * Gets query for [[DriveUnit]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDriveUnit()
    {
        return $this->hasOne(DriveUnit::className(), ['id' => 'drive_unit_id']);
    }

    /**
     * Gets query for [[EngineType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEngineType()
    {
        return $this->hasOne(EngineType::className(), ['id' => 'engine_type_id']);
    }

    /**
     * Gets query for [[AutoModel]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAutoModel()
    {
        return $this->hasOne(AutoModel::className(), ['id' => 'auto_model_id']);
    }
}
