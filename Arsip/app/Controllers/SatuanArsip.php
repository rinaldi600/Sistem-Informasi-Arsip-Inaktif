<?php

namespace App\Controllers;

class SatuanArsip extends BaseController
{

    private $userModel;
    private $satuanModel;
    private $db;
    private $validation;
    private $dataUser;

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->validation->setRules([
                'namaSatuan' => [
                    'label'  => 'Nama Satuan',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => '{field} wajib diisi',
                    ],
                ],
            ]
        );
        $this->userModel = new \App\Models\UserModel();
        $this->satuanModel = new \App\Models\SatuanModel();
        $this->dataUser = $this->userModel->where('id_user', session()->get('idUser'))->first();
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $perPage = 20;

        $checkKeyword = $this->request->getGet('keyword') ?
            $this->satuanModel->like('nama_satuan', $this->request->getGet('keyword')) :
            $this->satuanModel;

        $data = [
            'title' => 'Dashboard Satuan Arsip',
            'dataUser' => $this->dataUser,
            'dataSatuan' => $checkKeyword->paginate($perPage, 'tbl_satuan'),
            'pager' => $this->satuanModel->pager,
            'numberPagination' => $this->request->getGet('page_tbl_satuan')
                ? ((int) $this->request->getGet('page_tbl_satuan') - 1 ) * $perPage + 1 : 1,
        ];
        return view('SatuanArsip/SatuanArsipView', $data);
    }

    public function tambahData() {
        $data = [
            'title' => 'Tambah Data Satuan Arsip',
            'dataUser' => $this->dataUser,
        ];
        return view('SatuanArsip/TambahDataSatuanView', $data);
    }

    public function getDataSatuan() {
        if ($this->validation->withRequest($this->request)->run()) {
            $namaSatuan = $this->request->getPost('namaSatuan', FILTER_SANITIZE_STRING);

            $data = [
                'id_satuan' => 'SATUAN-'. uniqid(),
                'nama_satuan' => $namaSatuan,
                'id_user' => $this->dataUser['id_user'],
            ];

            try {
                $this->satuanModel->insert($data);
                if ($this->db->affectedRows()) {
                    session()->setFlashdata('success', 'Data berhasil ditambahkan');
                    return redirect()->back();
                }
            } catch (\ReflectionException $e) {
            }
        } else {
            session()->setFlashdata([
                'namaSatuan' => $this->validation->getError('namaSatuan'),
            ]);
            return redirect()->back()->withInput();
        }
    }

    public function editData($idSatuan) {
        $data = [
            'title' => 'Edit Data Satuan Arsip',
            'dataUser' => $this->dataUser,
            'detailSatuan' => $this->satuanModel->where('id_satuan', $idSatuan)->first(),
        ];
        return view('SatuanArsip/EditDataSatuanView', $data);
    }

    public function dataEditSatuan() {
        if ($this->validation->withRequest($this->request)->run()) {
            $namaSatuan = $this->request->getPost('namaSatuan', FILTER_SANITIZE_STRING);
            $idSatuan = $this->request->getPost('idSatuan');

            $data = [
                'nama_satuan' => $namaSatuan,
                'id_user' => $this->dataUser['id_user'],
            ];

            try {
                $this->satuanModel->where('id_satuan', $idSatuan)->set($data)->update();
                if ($this->db->affectedRows()) {
                    session()->setFlashdata('success', 'Data berhasil diubah');
                    return redirect()->back();
                }
            } catch (\ReflectionException $e) {
            }
        } else {
            session()->setFlashdata([
                'namaSatuan' => $this->validation->getError('namaSatuan'),
            ]);
            return redirect()->back()->withInput();
        }
    }

    public function hapusDataSatuan() {
        try {
            $idSatuan = $this->request->getPost('idSatuan');
            $this->satuanModel->where('id_satuan', $idSatuan)->delete();

            if ($this->db->affectedRows()) {
                session()->setFlashdata('success', 'Data berhasil dihapus');
                return redirect()->back();
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('fails', 'Data saat ini digunakan di tabel lain');
        }
    }
}