<?php

namespace app\modules\mail\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "queue".
 *
 * @property int $id
 * @property string $text
 * @property string $email
 * @property int $template_id
 * @property string|null $send_at
 * @property string|null $sent_at
 * @property int $status
 * @property string $created_at
 * @property string|null $updated_at
 *
 * @property Template $template
 */
class Queue extends \yii\db\ActiveRecord
{
    const STATUS_CREATED = 0;
    const STATUS_SENT = 1;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'queue';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['text', 'email', 'template_id'], 'required'],
            [['text'], 'string'],
            [['template_id', 'status'], 'integer'],
            [['send_at', 'sent_at', 'created_at', 'updated_at'], 'safe'],
            [['email'], 'string', 'max' => 255],
            [['email'], 'email'],
            [
                ['template_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Template::class,
                'targetAttribute' => ['template_id' => 'id']
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'text' => 'Text',
            'email' => 'Email',
            'template_id' => 'Template ID',
            'send_at' => 'Send At',
            'sent_at' => 'Sent At',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }

    /**
     * Gets query for [[Template]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTemplate()
    {
        return $this->hasOne(Template::class, ['id' => 'template_id']);
    }
}
