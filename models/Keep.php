g<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%keep}}".
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $body
 * @property string|null $date
 */
class Keep extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {   
        return 'keep';
    }

    public function behaviors()
    {
        return[
           [
            'class' => SluggableBehavior::class,
            'attribute' => 'title',
           ],
           TimestampBehavior::class,
           BlameableBehavior::class,

        ];
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'body'], 'required'],
            [['body'], 'string'],
            [['date'], 'safe'],
            [['title', 'slug'], 'string', 'max' => 1024],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function find()
    {
        /*return new \app\models\query\KeepQuery(get_called_class());*/
    }
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'slug' => 'Slug',
            'body' => 'Body',
            'date' => 'Date',
        ];
    }
}
