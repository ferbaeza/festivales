<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        //$this->db->disableForeignKeyChecks();

        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
                'null'           =>false,
            ],
            'username'             => [
                'type'             => 'VARCHAR',
                'constraint'       => '100',
                'null'             =>false,
            ],
            'password'             =>[
                'type'             =>'VARCHAR',
                'constraint'       =>'255',
                'null'             =>false,
            ],
            'name'             =>[
                'type'             =>'VARCHAR',
                'constraint'       =>'255',
                'null'             =>false,
            ],
            'surname'             =>[
                'type'             =>'VARCHAR',
                'constraint'       =>'255',
                'null'             =>false,
            ],
            'rol_id'             =>[
                'type'             =>'INT',
                'constraint'       =>5,
                'unsigned'       => true,
                'null'             =>false,
            ],
            'created'   =>[
                'type'          =>'DATETIME',
                'null'          =>true,
            ],
            'updated'   =>[
                'type'          =>'DATETIME',
                'null'          =>true,
            ],
            'deleted'   =>[
                'type'          =>'DATETIME',
                'null'          =>true,
            ],

        ]);
        $this->forge->addKey('id', true);
        //$this->forge->addForeignKey('rol_id', 'Roles', 'id', 'CASCADE','SET NULL');
        $this->forge->createTable('Users');
        //$this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('Users');
    }
}
