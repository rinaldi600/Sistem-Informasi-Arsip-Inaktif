<?php

namespace App\Controllers;

class KategoriArsip extends BaseController
{

    private $userModel;
    private $kategoriModel;
    private $db;
    private $validation;
    private $dataUser;

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->validation->setRules([
                'kategori' => [
                    'label'  => 'Kategori',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => '{field} wajib diisi',
                    ],
                ],
            ]
        );

        $this->userModel = new \App\Models\UserModel();
        $this->kategoriModel = new \App\Models\KategoriModel();
        $this->dataUser = $this->userModel->where('id_user', session()->get('idUser'))->first();
        $this->db = \Config\Database::connect();

    }

    public function index()
    {
        $perPage = 20;

        $checkKeyword = $this->request->getGet('keyword') ?
            $this->kategoriModel->like('kategori', $this->request->getGet('keyword')) :
            $this->kategoriModel;

        $data = [
          'title' => 'Dashboard Kategori Arsip',
            'dataUser' => $this->dataUser,
            'dataKategori' => $checkKeyword->paginate($perPage, 'tbl_kategori_arsip'),
            'pager' => $this->kategoriModel->pager,
            'numberPagination' => $this->request->getGet('page_tbl_kategori_arsip')
                ? ((int) $this->request->getGet('page_tbl_kategori_arsip') - 1 ) * $perPage + 1 : 1,
        ];
        return view('KategoriArsip/KategoriArsipView', $data);
    }

    public function tambahData() {

        $data = [
            'title' => 'Tambah Data Kategori Arsip',
            'dataUser' => $this->dataUser,
        ];
        return view('KategoriArsip/TambahDataKategoriView', $data);
    }

    public function getDataKategori() {
        if ($this->validation->withRequest($this->request)->run()) {
            $kategori = $this->request->getPost('kategori', FILTER_SANITIZE_STRING);

            $data = [
                'id_kategori_arsip' => 'KATEGORI-'. uniqid(),
                'kategori' => $kategori,
                'id_user' => $this->dataUser['id_user'],
            ];
            try {
                $this->kategoriModel->insert($data);
                if ($this->db->affectedRows()) {
                    session()->setFlashdata('success', 'Data berhasil ditambahkan');
                    return redirect()->back();
                }
            } catch (\ReflectionException $e) {
            }
        } else {
            session()->setFlashdata([
               'kategori' => $this->validation->getError('kategori'),
            ]);
            return redirect()->back()->withInput();
        }
    }

    public function editData($idKategori) {
        $data = [
            'title' => 'Edit Data Kategori Arsip',
            'dataUser' => $this->dataUser,
            'detailKategori' => $this->kategoriModel->where('id_kategori_arsip', $idKategori)->first(),
        ];
        return view('KategoriArsip/EditDataKategoriView', $data);
    }

    public function dataEditKategori() {
        if ($this->validation->withRequest($this->request)->run()) {
            $kategori = $this->request->getPost('kategori', FILTER_SANITIZE_STRING);
            $idKategori = $this->request->getPost('idKategori');

            $data = [
                'kategori' => $kategori,
                'id_user' => $this->dataUser['id_user'],
            ];


            try {
                $this->kategoriModel->where('id_kategori_arsip', $idKategori)->set($data)->update();
                if ($this->db->affectedRows()) {
                    session()->setFlashdata('success', 'Data berhasil diubah');
                    return redirect()->back();
                }
            } catch (\ReflectionException $e) {
            }
        } else {
            session()->setFlashdata([
                'kategori' => $this->validation->getError('kategori'),
            ]);
            return redirect()->back()->withInput();
        }
    }

    public function hapusDataKategori() {
        try {
            $idKategori = $this->request->getPost('idKategori');
            $this->kategoriModel->where('id_kategori_arsip', $idKategori)->delete();

            if ($this->db->affectedRows()) {
                session()->setFlashdata('success', 'Data berhasil dihapus');
                return redirect()->back();
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('fails', 'Data saat ini digunakan di tabel lain');
        }
    }
}
