<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property int $role_id
 * @property string $username
 * @property string|null $email
 * @property string $password
 * @property string|null $fisrt_name
 * @property string|null $last_name
 * @property string|null $patronymic
 * @property string|null $phone_number
 * @property string|null $city
 * @property string|null $avatar_URL
 *
 * @property Role $role
 * @property UserApplication[] $userApplications
 */
class User extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'fisrt_name', 'last_name', 'patronymic', 'phone_number', 'city', 'avatar_URL'], 'default', 'value' => null],
            [['role_id'], 'default', 'value' => 1],
            [['role_id'], 'integer'],
            [['username', 'password'], 'required'],
            [['username', 'email', 'password', 'fisrt_name', 'last_name', 'patronymic', 'phone_number', 'city', 'avatar_URL'], 'string', 'max' => 255],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['phone_number'], 'unique'],
            [['role_id'], 'exist', 'skipOnError' => true, 'targetClass' => Role::class, 'targetAttribute' => ['role_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'role_id' => 'Роль',
            'username' => 'Логин',
            'email' => 'Почта',
            'password' => 'Пароль',
            'fisrt_name' => 'Имя',
            'last_name' => 'Фамилия',
            'patronymic' => 'Отчество',
            'phone_number' => 'Номер телефона',
            'city' => 'Город',
            'avatar_URL' => 'Путь к аватару',
        ];
    }

    /**
     * Gets query for [[Role]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(Role::class, ['id' => 'role_id']);
    }

    /**
     * Gets query for [[UserApplications]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserApplications()
    {
        return $this->hasMany(UserApplication::class, ['user_id' => 'id']);
    }
}
