<?php

class m150702_105808_fks_for_issues extends CDbMigration
{
	public function up()
	{
$this->addForeignKey("fk_issue_project", "tbl_issue", "project_id", "tbl_project", "id", "CASCADE", "RESTRICT");
//the tbl_issue.owner_id is a reference to tbl_user.id
$this->addForeignKey("fk_issue_owner", "tbl_issue", "owner_id","tbl_user", "id", "CASCADE", "RESTRICT");
//the tbl_issue.requester_id is a reference to tbl_user.id
$this->addForeignKey("fk_issue_requester", "tbl_issue","requester_id", "tbl_user", "id", "CASCADE", "RESTRICT");
//the tbl_project_user_assignment.project_id is a reference to tbl_project.id
$this->addForeignKey("fk_project_user", "tbl_project_user_assignment", "project_id", "tbl_project", "id", "CASCADE","RESTRICT");
//the tbl_project_user_assignment.user_id is a reference to tbl_user.id
$this->addForeignKey("fk_user_project", "tbl_project_user_assignment", "user_id", "tbl_user", "id", "CASCADE", "RESTRICT");

$this->addForeignKey('fk_issue_issue', 'tbl_issue', 'issue_id', 'tbl_issue', 'id','CASCADE','CASCADE');
	}

	public function down()
	{
		echo "m150702_105808_fks_for_issues does not support migration down.\n";
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