<?php

use yii\db\Migration;

/**
 * Class m210408_135054_address
 */
class m210408_135054_address extends Migration {

    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%address}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->string(25)->notNull(),
            'postcode' => $this->integer(11)->notNull(),
            'country' => $this->string(25)->notNull(),
            'city' => $this->string(30)->notNull(),
            'street' => $this->string(30)->notNull(),
            'house_number' => $this->string(20)->notNull(),
            'apartment_number' => $this->string(15),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        $this->dropTable('{{%address}}');
    }

    /*
      // Use up()/down() to run migration code without a transaction.
      public function up()
      {

      }

      public function down()
      {
      echo "m210408_135054_address cannot be reverted.\n";

      return false;
      }
     */
}
