<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Event extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_event' => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name_event' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'description_event' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'date_event' => [
                'type' => 'DATE',
            ],
        ]);
        $this->forge->addKey('id_event', true);
        $this->forge->createTable('event');
    }

    public function down()
    {
        $this->forge->dropTable('event');
    }
}
