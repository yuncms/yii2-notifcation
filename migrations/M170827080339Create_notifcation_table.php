<?php

namespace yuncms\notifcation\migrations;

use yii\db\Migration;

/**
 * Class M170827080339Create_notifcation_table
 */
class M170827080339Create_notifcation_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE  utf8mb4_general_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%notification}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'to_user_id' => $this->integer(),
            'type' => $this->string(),
            'subject' => $this->string(),
            'model_id' => $this->integer(),
            'refer_model' => $this->string(),
            'refer_model_id' => $this->integer(),
            'content' => $this->string(),
            'status' => $this->integer(2),
            'created_at' => $this->integer()->unsigned()->notNull(),
        ], $tableOptions);

        $this->addForeignKey('{{%notification_ibfk_1}}', '{{%notification}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('{{%notification_ibfk_2}}', '{{%notification}}', 'to_user_id', '{{%user}}', 'id', 'CASCADE', 'RESTRICT');

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('{{%notification}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "M170827080339Create_notifcation_table cannot be reverted.\n";

        return false;
    }
    */
}
