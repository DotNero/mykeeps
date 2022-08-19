<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Keep */

$this->title = 'Create Keep';
$this->params['breadcrumbs'][] = ['label' => 'Keeps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="keep-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
