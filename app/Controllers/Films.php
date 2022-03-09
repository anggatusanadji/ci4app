<?php

namespace App\Controllers;

use App\Models\FilmsModel;

class Films extends BaseController
{
    protected $filmsModel;
    public function __construct()
    {
        $this->filmsModel = new FilmsModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Film',
            'films' => $this->filmsModel->getFilm()
        ];

        return view('films/index', $data);
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'Detail Film',
            'film' => $this->filmsModel->getFilm($slug)
        ];

        //jika film tidak ada di tabel
        if (empty($data['film'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul film ' . $slug . ' tidak ditemukan. ');
        }

        return view('films/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Data Film',
            'validation' => \Config\Services::validation()
        ];

        return view('films/create', $data);
    }

    public function store()
    {
        // validasi
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[films.judul]',
                'errors' => [
                    'required' => '{field} film tidak boleh kosong.',
                    'is_unique' => '{field} film sudah tersedia.'
                ]
            ],
            'pencipta' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} film tidak boleh kosong.'
                ]
            ],
            'negara' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} film tidak boleh kosong.'
                ]
            ],
            'tanggal_rilis' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tanggal rilis film tidak boleh kosong.'
                ]
            ],
            'sampul' => [
                'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'max_size' => 'ukuran gambar terlalu besar.',
                    'is_image' => 'yang anda pilih bukan gambar.',
                    'mime_in' => 'yang anda pilih bukan gambar.'
                ]
            ]
        ])) {
            return redirect()->to('/film/create')->withInput();
        }

        // ambil sampul
        $fileSampul = $this->request->getFile('sampul');
        // jika tidak ada gambar yang diupload
        if ($fileSampul->getError() == 4) {
            $namaSampul = 'default.png';
        } else {
            // generate nama file random
            $namaSampul = $fileSampul->getRandomName();
            // pindahkan file ke public/img
            $fileSampul->move('img', $namaSampul);
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->filmsModel->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'pencipta' => $this->request->getVar('pencipta'),
            'negara' => $this->request->getVar('negara'),
            'tanggal_rilis' => $this->request->getVar('tanggal_rilis'),
            'sampul' => $namaSampul
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        return redirect()->to('/films');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Ubah Data Film',
            'validation' => \Config\Services::validation(),
            'film' => $this->filmsModel->getFilm($slug)
        ];

        return view('films/edit', $data);
    }

    public function update($id)
    {
        // validasi
        if (!$this->validate([
            'judul' => [
                // penambahan slug,{slug} agar saat mengupdate data tanpa mengubah judul, tidak muncul error is_unique
                'rules' => 'required|is_unique[films.judul, slug,{slug}]',
                'errors' => [
                    'required' => '{field} film tidak boleh kosong.',
                    'is_unique' => '{field} film sudah tersedia.'
                ]
            ],
            'pencipta' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} film tidak boleh kosong.'
                ]
            ],
            'negara' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} film tidak boleh kosong.'
                ]
            ],
            'tanggal_rilis' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tanggal rilis film tidak boleh kosong.'
                ]
            ],
            'sampul' => [
                'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'max_size' => 'ukuran gambar terlalu besar.',
                    'is_image' => 'yang anda pilih bukan gambar.',
                    'mime_in' => 'yang anda pilih bukan gambar.'
                ]
            ]
        ])) {
            return redirect()->to('/film/edit/' . $this->request->getVar('slug'))->withInput();
        }

        //Update gambar
        $fileSampul = $this->request->getFile('sampul');
        // cek gambar apakah tetap gambar yang lama
        if ($fileSampul->getError() == 4) {
            $namaSampul = $this->request->getVar('sampulLama');
        } else {
            // generate nama file random
            $namaSampul = $fileSampul->getRandomName();
            // pindahkan file ke public/img
            $fileSampul->move('img', $namaSampul);
            // hapus file yang lama
            unlink('img/' . $this->request->getVar('sampulLama'));
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->filmsModel->save([
            'id' => $id,
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'pencipta' => $this->request->getVar('pencipta'),
            'negara' => $this->request->getVar('negara'),
            'tanggal_rilis' => $this->request->getVar('tanggal_rilis'),
            'sampul' => $namaSampul
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        return redirect()->to('/films');
    }

    public function delete($id)
    {
        // cari gambar berdasarkan id
        $film = $this->filmsModel->find($id);

        if ($film['sampul'] != 'default.png') {
            // hapus gambar
            unlink('img/' . $film['sampul']);
        }

        $this->filmsModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to('/films');
    }
}
