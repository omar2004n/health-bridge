<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePatientsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'user_id'     => ['type' => 'INT', 'unsigned' => true, 'unique' => true],
            'phone'       => ['type' => 'VARCHAR', 'constraint' => '20', 'null' => true],
            'gender'      => ['type' => 'ENUM', 'constraint' => ['male', 'female', 'other'], 'null' => true],
            'address'     => ['type' => 'VARCHAR', 'constraint' => '255', 'null' => true],
            'birth_date'  => ['type' => 'DATE', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('patients');
    }

    public function down()
    {
        $this->forge->dropTable('patients');
    }
}
