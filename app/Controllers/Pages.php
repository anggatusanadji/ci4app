<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home'
        ];
        return view('pages/home', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About Me'
        ];
        return view('pages/about', $data);
    }

    public function contact()
    {
        $data = [
            'title' => 'Contact',
            'alamat' => [
                [
                    'tipe' => 'Rumah',
                    'alamat' => 'Jl. Tukad Buana V no.22',
                    'kota' => 'Denpasar'
                ],
                [
                    'tipe' => 'Kantor',
                    'alamat' => 'Jl. ABC no.123',
                    'kota' => 'Denpasar'
                ]
            ]
        ];
        return view('pages/contact', $data);
    }
}
