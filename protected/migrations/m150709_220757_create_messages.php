<?php

class m150709_220757_create_messages extends CDbMigration
{
	public function up()
	{
$this->createTable('tbl_message', array(
'id' => 'pk',
'text' => 'string(1027) NOT NULL',
'user_name' => 'string NOT NULL',
'mess_time' => 'datetime DEFAULT NULL',
'user_id' => 'int(11) DEFAULT NULL',
), 'ENGINE=InnoDB');
$this->addForeignKey("fk_message_user", "tbl_message", "user_id","tbl_user", "id", "CASCADE", "RESTRICT");

}

	public function down()
	{
		echo "m150709_220757_create_messages does not support migration down.\n";
		return false;
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}