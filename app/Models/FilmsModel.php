<?php

namespace App\Models;

use CodeIgniter\Model;

class FilmsModel extends Model
{
    protected $table = 'films';
    protected $allowedFields = ['judul', 'slug', 'pencipta', 'negara', 'sampul', 'tanggal_rilis'];
    protected $useTimestamps = true;

    public function getFilm($slug = false)
    {
        if ($slug === false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }

    public function getFilmById($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
}
