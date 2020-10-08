<?php
namespace common\components;

class User extends \yii\web\User {
public $identityClass = '\common\models\User';

public function checkAccess($operation, $params = [], $allowCaching = true) {
    // Always return true when SuperAdmin user
    if (\yii::$app->user->id == 1
    && \yii::$app->user->status == 10) {
        return true;
    }
    return parent::can($operation, $params, $allowCaching);
}
}