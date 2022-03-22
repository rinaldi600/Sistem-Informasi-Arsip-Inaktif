<?php

namespace App\Controllers;

class KlasifikasiArsip extends BaseController
{
    private $userModel;
    private $klasifikasiModel;
    private $db;
    private $validation;
    private $dataUser;

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->validation->setRules([
                'nama' => [
                    'label'  => 'Nama',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => '{field} wajib diisi',
                    ],
                ],
                'kode' => [
                    'label'  => 'Kode',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => '{field} wajib diisi',
                    ],
                ],
            ]
        );

        $this->userModel = new \App\Models\UserModel();
        $this->klasifikasiModel = new \App\Models\KlasifikasiModel();
        $this->dataUser = $this->userModel->where('id_user', session()->get('idUser'))->first();
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $perPage = 20;

        $checkKeyword = $this->request->getGet('keyword') ?
            $this->klasifikasiModel->like('kode', $this->request->getGet('keyword'))
                ->orLike('nama_klasifikasi', $this->request->getGet('keyword')) :
            $this->klasifikasiModel;

        $data = [
            'title' => 'Dashboard Klasifikasi Arsip',
            'dataUser' => $this->dataUser,
            'dataKlasifikasi' => $checkKeyword->paginate($perPage, 'tbl_klasifikasi'),
            'pager' => $this->klasifikasiModel->pager,
            'numberPagination' => $this->request->getGet('page_tbl_klasifikasi')
                ? ((int) $this->request->getGet('page_tbl_klasifikasi') - 1 ) * $perPage + 1 : 1,
        ];
        return view('KlasifikasiArsip/KlasifikasiArsipView', $data);
    }

    public function tambahData() {
        $data = [
            'title' => 'Tambah Data Klasifikasi Arsip',
            'dataUser' => $this->dataUser,
        ];
        return view('KlasifikasiArsip/TambahDataKlasifikasiView', $data);
    }

    public function getDataKlasifikasi() {
        if ($this->validation->withRequest($this->request)->run()) {
            $kode = $this->request->getPost('kode', FILTER_SANITIZE_STRING);
            $nama = $this->request->getPost('nama', FILTER_SANITIZE_STRING);

            $data = [
                'id_klasifikasi' => 'KLASIFIKASI-'. uniqid(),
                'kode' => $kode,
                'nama_klasifikasi' => $nama,
                'id_user' => $this->dataUser['id_user'],
            ];

            try {
                $this->klasifikasiModel->insert($data);
                if ($this->db->affectedRows()) {
                    session()->setFlashdata('success', 'Data berhasil ditambahkan');
                    return redirect()->back();
                }
            } catch (\ReflectionException $e) {
            }
        } else {
            session()->setFlashdata([
                'kode' => $this->validation->getError('kode'),
                'nama' => $this->validation->getError('nama'),
            ]);
            return redirect()->back()->withInput();
        }
    }

    public function editData($idKlasifikasi) {
        $data = [
            'title' => 'Edit Data Klasifikasi Arsip',
            'dataUser' => $this->dataUser,
            'detailKlasifikasi' => $this->klasifikasiModel->where('id_klasifikasi', $idKlasifikasi)->first(),
        ];
        return view('KlasifikasiArsip/EditDataKlasifikasiView', $data);
    }

    public function dataEditKlasifikasi() {
        if ($this->validation->withRequest($this->request)->run()) {
            $kode = $this->request->getPost('kode', FILTER_SANITIZE_STRING);
            $nama = $this->request->getPost('nama', FILTER_SANITIZE_STRING);
            $idKlasifikasi = $this->request->getPost('idKlasifikasi');

            $data = [
                'kode' => $kode,
                'nama_klasifikasi' => $nama,
                'id_user' => $this->dataUser['id_user'],
            ];

            try {
                $this->klasifikasiModel->where('id_klasifikasi', $idKlasifikasi)->set($data)->update();
                if ($this->db->affectedRows()) {
                    session()->setFlashdata('success', 'Data berhasil diubah');
                    return redirect()->back();
                }
            } catch (\ReflectionException $e) {
            }
        } else {
            session()->setFlashdata([
                'kode' => $this->validation->getError('kode'),
                'nama' => $this->validation->getError('nama'),
            ]);
            return redirect()->back()->withInput();
        }
    }

    public function hapusDataKlasifikasi() {
        try {
            $idKlasifikasi = $this->request->getPost('idKlasifikasi');
            $this->klasifikasiModel->where('id_klasifikasi', $idKlasifikasi)->delete();

            if ($this->db->affectedRows()) {
                session()->setFlashdata('success', 'Data berhasil dihapus');
                return redirect()->back();
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('fails', 'Data saat ini digunakan di tabel lain');
        }

    }
}