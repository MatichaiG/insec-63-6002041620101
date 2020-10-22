<?php

use yii\db\Migration;

/**
 * Class m201022_113808_create_post_permission_to_role
 */
class m201022_113808_create_post_permission_to_role extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;
        $author = $auth->getRole('author');
        $admin = $auth->getRole('admin');
        $superadmin = $auth->getRole('superadmin');
        $listPost = $auth->getPermission('post-index');
        $createPost = $auth->getPermission('post-create');
        $updatePost = $auth->getPermission('post-update');
        $viewPost = $auth->getPermission('post-view');
        $deletePost = $auth->getPermission('post-delete');
        //assign
        $auth->addChild($author,$createPost);
        $auth->addChild($author,$listPost);
        $auth->addChild($author,$viewPost);
        $auth->addChild($author,$updatePost);
        $auth->addChild($admin,$author);
        $auth->addChild($superadmin,$admin);
        $auth->addChild($superadmin,$deletePost);

    
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        //echo "m201022_113808_create_post_permission_to_role cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201022_113808_create_post_permission_to_role cannot be reverted.\n";

        return false;
    }
    */
}
