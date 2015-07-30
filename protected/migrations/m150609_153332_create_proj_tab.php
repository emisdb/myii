<?php

class m150609_153332_create_proj_tab extends CDbMigration
{
        public function up()
        {
            $this->createTable('tbl_project', array(
            'id' => 'pk',
            'name' => 'string NOT NULL',
            'description' => 'text NOT NULL',
            'state' => 'int(3) NOT NULL DEFAULT 0',
           'create_time' => 'datetime DEFAULT NULL',
            'create_user_id' => 'int(11) DEFAULT NULL',
            'update_time' => 'datetime DEFAULT NULL',
            'update_user_id' => 'int(11) DEFAULT NULL',
            ), 'ENGINE=InnoDB');
            $this->createTable('tbl_payments', array(
            'id' => 'pk',
            'name' => 'string NOT NULL',
            'description' => 'text NOT NULL',
            'create_time' => 'datetime DEFAULT NULL',
            'create_user_id' => 'int(11) DEFAULT NULL',
            ), 'ENGINE=InnoDB');
        }
        public function down()
        {
            $this->dropTable('tbl_project');
            $this->dropTable('tbl_payments');
            echo "tbl_project, tbl_payments deleted";
        }	

}