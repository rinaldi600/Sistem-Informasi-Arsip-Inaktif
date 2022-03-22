<?php

namespace App\Controllers;

class RetensiArsip extends BaseController
{

    private $userModel;
    private $retensiModel;
    private $inaktifModel;
    private $db;
    private $validation;
    private $dataUser;

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->validation->setRules([
                'judul' => [
                    'label'  => 'Judul',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => '{field} wajib diisi',
                    ],
                ],
                'tahunAksi' => [
                    'label'  => 'Tahun Aksi',
                    'rules'  => 'required|is_natural',
                    'errors' => [
                        'required' => '{field} wajib diisi',
                        'is_natural' => '{field} harus berupa angka'
                    ],
                ],
                'keteranganAksi' => [
                    'label'  => 'Keterangan Aksi',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => '{field} wajib diisi',
                    ],
                ],
            ]
        );

        $this->userModel = new \App\Models\UserModel();
        $this->retensiModel = new \App\Models\RetensiModel();
        $this->dataUser = $this->userModel->where('id_user', session()->get('idUser'))->first();
        $this->inaktifModel = new \App\Models\InaktifModel();
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $perPage = 20;

        $checkKeyword = $this->request->getGet('keyword') ?
            $this->retensiModel->like('judul', $this->request->getGet('keyword'))
            ->orLike('tahun_aksi', $this->request->getGet('keyword'))
            ->orLike('keterangan_aksi', $this->request->getGet('keyword')):
            $this->retensiModel;

        $data = [
            'title' => 'Dashboard Retensi Arsip',
            'dataUser' => $this->dataUser,
            'dataRetensi' => $checkKeyword->paginate($perPage, 'tbl_retensi'),
            'pager' => $this->retensiModel->pager,
            'numberPagination' => $this->request->getGet('page_tbl_retensi')
                ? ((int) $this->request->getGet('page_tbl_retensi') - 1 ) * $perPage + 1 : 1,
        ];
        return view('RetensiArsip/RetensiArsipView', $data);
    }

    public function tambahData() {
        $data = [
            'title' => 'Tambah Data Retensi Arsip',
            'dataUser' => $this->dataUser,
        ];
        return view('RetensiArsip/TambahDataRetensiView', $data);
    }

    public function editData($idRetensi) {
        $data = [
            'title' => 'Edit Data Retensi Arsip',
            'dataUser' => $this->dataUser,
            'detailRetensi' => $this->retensiModel->where('id_retensi', $idRetensi)->first(),
        ];
        return view('RetensiArsip/EditDataRetensiView', $data);
    }

    public function getDataRetensi() {
        if ($this->validation->withRequest($this->request)->run()) {
            $judul = $this->request->getPost('judul', FILTER_SANITIZE_STRING);
            $tahunAksi = $this->request->getPost('tahunAksi', FILTER_SANITIZE_STRING);
            $keteranganAksi = $this->request->getPost('keteranganAksi', FILTER_SANITIZE_STRING);

            $data = [
                'id_retensi' => 'RETENSI-'. uniqid(),
                'judul' => $judul,
                'tahun_aksi' => $tahunAksi,
                'keterangan_aksi' => $keteranganAksi,
                'id_user' => $this->dataUser['id_user'],
            ];

            try {
                $this->retensiModel->insert($data);
                if ($this->db->affectedRows()) {
                    session()->setFlashdata('success', 'Data berhasil ditambahkan');
                    return redirect()->back();
                }
            } catch (\ReflectionException $e) {
            }
        } else {
            session()->setFlashdata([
                'judul' => $this->validation->getError('judul'),
                'tahunAksi' => $this->validation->getError('tahunAksi'),
                'keteranganAksi' => $this->validation->getError('keteranganAksi'),
            ]);
            return redirect()->back()->withInput();
        }
    }

    public function dataEditRetensi() {
        if ($this->validation->withRequest($this->request)->run()) {
            $idRetensi = $this->request->getPost('idRetensi');
            $judul = $this->request->getPost('judul', FILTER_SANITIZE_STRING);
            $tahunAksi = $this->request->getPost('tahunAksi', FILTER_SANITIZE_STRING);
            $keteranganAksi = $this->request->getPost('keteranganAksi', FILTER_SANITIZE_STRING);
            $number = 0;
            $dataInaktif = $this->inaktifModel->where('id_retensi', $idRetensi)->findAll();
            $updateInaktif = array();

            $data = [
                'judul' => $judul,
                'tahun_aksi' => $tahunAksi,
                'keterangan_aksi' => $keteranganAksi,
                'id_user' => $this->dataUser['id_user'],
            ];

            try {
                $this->retensiModel->where('id_retensi', $idRetensi)->set($data)->update();
                if ($this->db->affectedRows()) {
                    session()->setFlashdata('success', 'Data berhasil diubah');
                    return redirect()->back();
                }
            } catch (\ReflectionException $e) {
            }
        } else {
            session()->setFlashdata([
                'judul' => $this->validation->getError('judul'),
                'tahunAksi' => $this->validation->getError('tahunAksi'),
                'keteranganAksi' => $this->validation->getError('keteranganAksi'),
            ]);
            return redirect()->back()->withInput();
        }
    }

    public function hapusDataRetensi() {
        try {
            $idRetensi = $this->request->getPost('idRetensi');
            $this->retensiModel->where('id_retensi', $idRetensi)->delete();

            if ($this->db->affectedRows()) {
                session()->setFlashdata('success', 'Data berhasil dihapus');
                return redirect()->back();
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('fails', 'Data saat ini digunakan di tabel lain');
        }
    }
}
