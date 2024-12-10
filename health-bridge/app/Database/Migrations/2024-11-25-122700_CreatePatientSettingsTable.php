<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePatientSettingsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'patient_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'notification_preference' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'default'    => 'email', // Default notification method
            ],
            'theme_preference' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'default'    => 'light', // Default theme
            ],
            'language_preference' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'default'    => 'en', // Default language
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

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('patient_id', 'patients', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('patient_settings');
    }

    public function down()
    {
        $this->forge->dropTable('patient_settings');
    }
}
