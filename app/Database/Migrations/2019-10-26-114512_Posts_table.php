<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PostsTable extends Migration
{
	public function up()
	{
		$forge = \Config\Database::forge();
		$fields = [
			'id'          => [
					'type'           => 'INT',
					'constraint'     => 5,
					'unsigned'       => true,
					'auto_increment' => true
			],
			'user_id'          => [
				'type'           => 'INT',
				'constraint'     => 5,
			],
			'title'       => [
					'type'           => 'VARCHAR',
					'constraint'     => '100',
			],
			'description' => [
					'type'           => 'TEXT',
					'null'           => true,
			],
			'image'      => [
					'type'           => 'VARCHAR',
					'constraint'     => '255',
					'null'           => true,
			],
			'created_at'      => [
				'type'           => 'TIMESTAMP',
				'null'           => true,
			],
			'updated_at'      => [
				'type'           => 'TIMESTAMP',
				'null'           => true,
			],
			'deleted_at'      => [
				'type'           => 'TIMESTAMP',
				'null'           => true,
			],
		];
		$forge->addField($fields);
		$forge->addKey('id', TRUE);
		//$forge->addForeignKey('users_id','users','id');
		$forge->createTable('posts', TRUE);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$forge = \Config\Database::forge();
		$forge->dropTable('posts',TRUE);
	}
}
