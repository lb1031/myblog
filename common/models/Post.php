<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "post".
 *
 * @property string $id
 * @property string $title
 * @property string $content
 * @property int $author
 * @property string $tag
 * @property int $post_status
 * @property string $create_time
 * @property string $update_time
 *
 * @property Poststatus $postStatus
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'content'], 'string'],
            [['author', 'post_status'], 'integer'],
            [['create_time', 'update_time'], 'safe'],
            [['tag'], 'string', 'max' => 255],
            [['post_status'], 'exist', 'skipOnError' => true, 'targetClass' => Poststatus::className(), 'targetAttribute' => ['post_status' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '标题',
            'content' => '内容',
            'author' => '作者',
            'tag' => '标签',
            'post_status' => '状态',
            'create_time' => '创建时间',
            'update_time' => '最后修改时间',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostStatus()
    {
        return $this->hasOne(Poststatus::className(), ['id' => 'post_status']);
    }


    public function getPostAuthor()
    {
        return $this->hasOne(Adminuser::className(), ['id' => 'author']);
    }
}
