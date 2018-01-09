<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Poststatus;
use common\models\Adminuser;

/* @var $this yii\web\View */
/* @var $model common\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'author')
        ->dropDownList(Adminuser::find()
            ->select(['name','id'])
            ->indexBy('id')
            ->column(),
            ['prompt'=>'请选择作者']
        );?>

    <?= $form->field($model, 'tag')->textInput(['maxlength' => true]) ?>

<!--    <?//= $form->field($model, 'post_status')->textInput() ?>-->


    <?= $form->field($model, 'post_status')
        ->dropDownList(Poststatus::find()
            ->select(['name','id'])
            ->indexBy('id')
            ->column(),
        ['prompt'=>'请选择文章状态']
    ); ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
