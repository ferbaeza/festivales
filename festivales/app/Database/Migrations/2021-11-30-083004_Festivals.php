<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Festivals extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();

        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
                'null'           =>false,
            ],
            'name'             => [
                'type'             => 'VARCHAR',
                'constraint'       => '100',
                'null'             =>false,
            ],
            'email'             =>[
                'type'             =>'VARCHAR',
                'constraint'        =>'255',
                'null'             =>false,
            ],
            'price'             =>[
                'type'             =>'FLOAT',
                'constraint'        =>5,
                'null'             =>false,
            ],
            'address'             =>[
                'type'             =>'VARCHAR',
                'constraint'       =>'255',
                'null'             =>false,
            ],
            'image_url'             =>[
                'type'             =>'VARCHAR',
                'constraint'       =>'255',
                'null'             =>false,
            ],
            'category_id'             =>[
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'null'           =>true,
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
        $this->forge->addForeignKey('category_id', 'Categories', 'id', 'CASCADE','SET NULL');
        $this->forge->createTable('Festivals');
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('Festivals');
    }
}