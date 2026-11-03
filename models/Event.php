<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "event".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int|null $participations
 * @property string|null $start_date
 * @property string|null $end_date
 * @property int $organizator_id
 * @property int $place_id
 * @property string|null $image_URL
 * @property string|null $status
 *
 * @property Organizator $organizator
 * @property Place $place
 * @property UserApplication[] $userApplications
 */
class Event extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'event';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['participations', 'start_date', 'end_date', 'image_URL'], 'default', 'value' => null],
            [['status'], 'default', 'value' => 'Предстоит'],
            [['title', 'description', 'organizator_id', 'place_id'], 'required'],
            [['participations', 'organizator_id', 'place_id'], 'integer'],
            [['start_date', 'end_date'], 'safe'],
            [['title', 'image_URL', 'status'], 'string', 'max' => 255],
            [['description'], 'string', 'max' => 1000],
            [['organizator_id'], 'exist', 'skipOnError' => true, 'targetClass' => Organizator::class, 'targetAttribute' => ['organizator_id' => 'id']],
            [['place_id'], 'exist', 'skipOnError' => true, 'targetClass' => Place::class, 'targetAttribute' => ['place_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'participations' => 'Participations',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'organizator_id' => 'Organizator ID',
            'place_id' => 'Place ID',
            'image_URL' => 'Image Url',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[Organizator]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrganizator()
    {
        return $this->hasOne(Organizator::class, ['id' => 'organizator_id']);
    }

    /**
     * Gets query for [[Place]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlace()
    {
        return $this->hasOne(Place::class, ['id' => 'place_id']);
    }

    /**
     * Gets query for [[UserApplications]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserApplications()
    {
        return $this->hasMany(UserApplication::class, ['event_id' => 'id']);
    }

}
