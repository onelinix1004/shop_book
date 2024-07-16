<?php

use yii\db\Migration;

class m130524_201442_init extends Migration
{
     public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull(),
            'fullname' => $this->string()->notNull(),
            'phone' => $this->string()->notNull(),
            'address' => $this->string()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(1),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

         $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
        ], $tableOptions);


         $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'image' => $this->string(),
            'price' => $this->decimal()->notNull(),
            'description' => $this->string(),
            'category_id' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

          $this->createTable('{{%orders}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'amount' => $this->integer(),
            'status' => $this->string(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

           $this->createTable('{{%orders_item}}', [
            'id' => $this->primaryKey(),
            'orders_id' => $this->integer(),
            'product_id' => $this->integer(),
            'quantity' => $this->integer(),
            'price' => $this->integer(),
            'status' => $this->string(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

          $this->createTable('{{%contact}}', [
            'id' => $this->primaryKey(),
            'email' => $this->string()->notNull(),
            'phone' => $this->string()->notNull(),
            'body' => $this->string()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

          $this->addForeignKey(
            'fk-001',
            'product',
            'category_id',
            'category',
            'id',
            'CASCADE'
        );

          $this->addForeignKey(
            'fk-002',
            'orders',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );

          $this->addForeignKey(
            'fk-003',
            'orders_item',
            'orders_id',
            'orders',
            'id',
            'CASCADE'
        );

          $this->addForeignKey(
            'fk-004',
            'orders_item',
            'product_id',
            'product',
            'id',
            'CASCADE'
        );



    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
