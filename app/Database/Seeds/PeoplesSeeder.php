<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;
use CodeIgniter\Database\Seeder;

class PeoplesSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama'        => 'Angga',
                'alamat'      => 'Jl. Tukad Buana V no.22',
                'created_at'  => Time::now(),
                'updated_at'  => Time::now()
            ],
            [
                'nama'        => 'Ferdian',
                'alamat'      => 'Jl. Patih Nambi',
                'created_at'  => Time::now(),
                'updated_at'  => Time::now()
            ],
            [
                'nama'        => 'Rifki',
                'alamat'      => 'Jl. Cokroaminoto',
                'created_at'  => Time::now(),
                'updated_at'  => Time::now()
            ],

        ];

        // Simple Queries
        // $this->db->query("INSERT INTO peoples (nama, alamat, created_at, updated_at) VALUES(:nama:, :alamat:, :created_at:, :updated_at:)", $data);

        // Using Query Builder
        // $this->db->table('peoples')->insert($data);
        $this->db->table('peoples')->insertBatch($data);
    }
}
