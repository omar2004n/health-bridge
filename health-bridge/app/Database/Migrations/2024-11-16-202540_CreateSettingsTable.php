<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSettingsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'setting_key' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'unique'     => true,
            ],
            'setting_value' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('settings');

        // Insert default united cabinet time
        $db = \Config\Database::connect();
        $db->table('settings')->insertBatch([
            ['setting_key' => 'open_time', 'setting_value' => '08:00:00'],
            ['setting_key' => 'close_time', 'setting_value' => '17:00:00'],
        ]);
    }

    public function down()
    {
        $this->forge->dropTable('settings');
    }
}
