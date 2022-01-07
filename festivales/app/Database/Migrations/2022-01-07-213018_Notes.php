<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Notes extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
                'null'           =>false,
            ],
            'title'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'body'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'created_at'   =>[
                'type'          =>'DATETIME',
                'null'          =>true,
            ],
            'updated_at'   =>[
                'type'          =>'DATETIME',
                'null'          =>true,
            ],
            'deleted_at'   =>[
                'type'          =>'DATETIME',
                'null'          =>true,
            ],
        ]);
        $this->forge->addKey('id', true);
        //$this->forge->addForeignKey('category_id', 'Categories', 'id', 'CASCADE','SET NULL');

        $this->forge->createTable('Notes');
    }

        public function down()
        {
            $this->forge->dropTable('Notes');
        }
}

