<?php

namespace App\Controllers;

class PerkembanganArsip extends BaseController
{

    private $userModel;
    private $perkembanganModel;
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
            ]
        );

        $this->userModel = new \App\Models\UserModel();
        $this->perkembanganModel = new \App\Models\PerkembanganModel();
        $this->dataUser = $this->userModel->where('id_user', session()->get('idUser'))->first();
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $perPage = 20;

        $checkKeyword = $this->request->getGet('keyword') ?
            $this->perkembanganModel->like('nama_perkembangan', $this->request->getGet('keyword')) :
            $this->perkembanganModel;

        $data = [
            'title' => 'Dashboard Perkembangan Arsip',
            'dataUser' => $this->dataUser,
            'dataPerkembangan' => $checkKeyword->paginate($perPage, 'tbl_perkembangan'),
            'pager' => $this->perkembanganModel->pager,
            'numberPagination' => $this->request->getGet('page_tbl_perkembangan')
                ? ((int) $this->request->getGet('page_tbl_perkembangan') - 1 ) * $perPage + 1 : 1,
        ];
        return view('PerkembanganArsip/PerkembanganArsipView', $data);
    }

    public function tambahData() {
        $data = [
            'title' => 'Tambah Data Perkembangan Arsip',
            'dataUser' => $this->dataUser,
        ];
        return view('PerkembanganArsip/TambahDataPerkembanganView', $data);
    }

    public function getDataPerkembangan() {
        if ($this->validation->withRequest($this->request)->run()) {
            $nama = $this->request->getPost('nama', FILTER_SANITIZE_STRING);

            $data = [
                'id_perkembangan' => 'PERKEMBANGAN-'. uniqid(),
                'nama_perkembangan' => $nama,
                'id_user' => $this->dataUser['id_user'],
            ];

            try {
                $this->perkembanganModel->insert($data);
                if ($this->db->affectedRows()) {
                    session()->setFlashdata('success', 'Data berhasil ditambahkan');
                    return redirect()->back();
                }
            } catch (\ReflectionException $e) {
            }
        } else {
            session()->setFlashdata([
                'nama' => $this->validation->getError('nama'),
            ]);
            return redirect()->back()->withInput();
        }
    }

    public function hapusDataPerkembangan() {
        try {
            $idPerkembangan = $this->request->getPost('idPerkembangan');
            $this->perkembanganModel->where('id_perkembangan', $idPerkembangan)->delete();

            if ($this->db->affectedRows()) {
                session()->setFlashdata('success', 'Data berhasil dihapus');
                return redirect()->back();
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('fails', 'Data saat ini digunakan di tabel lain');
        }
    }

    public function editData($idPerkembangan) {
        $data = [
            'title' => 'Edit Data Perkembangan Arsip',
            'dataUser' => $this->dataUser,
            'detailperkembangan' => $this->perkembanganModel->where('id_perkembangan', $idPerkembangan)->first(),
        ];
        return view('PerkembanganArsip/EditDataPerkembanganView', $data);
    }

    public function dataEditPerkembangan() {
        if ($this->validation->withRequest($this->request)->run()) {
            $nama = $this->request->getPost('nama', FILTER_SANITIZE_STRING);
            $idPerkembangan = $this->request->getPost('idPerkembangan');

            $data = [
                'nama_perkembangan' => $nama,
                'id_user' => $this->dataUser['id_user'],
            ];

            try {
                $this->perkembanganModel->where('id_perkembangan', $idPerkembangan)->set($data)->update();
                if ($this->db->affectedRows()) {
                    session()->setFlashdata('success', 'Data berhasil diubah');
                    return redirect()->back();
                }
            } catch (\ReflectionException $e) {
            }
        } else {
            session()->setFlashdata([
                'nama' => $this->validation->getError('nama'),
            ]);
            return redirect()->back()->withInput();
        }
    }
}
