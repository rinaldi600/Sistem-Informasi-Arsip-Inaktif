<?php

namespace App\Controllers;

class InaktifArsip extends BaseController
{

    private $userModel;
    private $retensiModel;
    private $inaktifModel;
    private $klasifikasiModel;
    private $perkembanganModel;
    private $satuanModel;
    private $kategoriModel;
    private $db;
    private $validation;
    private $dataUser;


    public function __construct()
    {
        setlocale(LC_ALL, 'IND');
        $this->validation = \Config\Services::validation();
        $this->validation->setRules([
                'klasifikasi' => [
                    'label'  => 'Klasifikasi',
                    'rules'  => 'required|regex_match[/^(?!.*ID Klasifikasi).*$/]',
                    'errors' => [
                        'required' => '{field} wajib diisi',
                        'regex_match' => '{field} wajib diisi',
                    ],
                ],

                'isi' => [
                    'label'  => 'Isi',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => '{field} wajib diisi',
                    ],
                ],

                'tanggalSurat' => [
                    'label'  => 'Tanggal Masuk Surat',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => '{field} wajib diisi',
                    ],
                ],

                'tanggalBerakhirSurat' => [
                    'label'  => 'Tanggal Berakhir Surat',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => '{field} wajib diisi',
                    ],
                ],

                'perkembangan' => [
                    'label'  => 'Perkembangan',
                    'rules'  => 'required|regex_match[/^(?!.*ID Perkembangan).*$/]',
                    'errors' => [
                        'required' => '{field} wajib diisi',
                        'regex_match' => '{field} wajib diisi',
                    ],
                ],

                'jumlah' => [
                    'label'  => 'Jumlah',
                    'rules'  => 'required|is_natural',
                    'errors' => [
                        'required' => '{field} wajib diisi',
                        'is_natural' => '{field} harus berupa angka'
                    ],
                ],

                'satuan' => [
                    'label'  => 'Satuan',
                    'rules'  => 'required|regex_match[/^(?!.*ID Satuan).*$/]',
                    'errors' => [
                        'required' => '{field} wajib diisi',
                        'regex_match' => '{field} wajib diisi',
                    ],
                ],

                'keteranganArsip' => [
                    'label'  => 'Keterangan Arsip',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => '{field} wajib diisi',
                    ],
                ],

                'noFolder' => [
                    'label'  => 'No Folder',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => '{field} wajib diisi',
                    ],
                ],

                'lokasiSimpan' => [
                    'label'  => 'Lokasi Simpan',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => '{field} wajib diisi',
                    ],
                ],

                'retensi' => [
                    'label'  => 'Retensi',
                    'rules'  => 'required|regex_match[/^(?!.*ID Retensi).*$/]',
                    'errors' => [
                        'required' => '{field} wajib diisi',
                        'regex_match' => '{field} wajib diisi',
                    ],
                ],

                'kategori' => [
                    'label'  => 'Kategori',
                    'rules'  => 'required|regex_match[/^(?!.*ID Kategori).*$/]',
                    'errors' => [
                        'required' => '{field} wajib diisi',
                        'regex_match' => '{field} wajib diisi',
                    ],
                ],
            ]
        );
        $this->userModel = new \App\Models\UserModel();
        $this->retensiModel = new \App\Models\RetensiModel();
        $this->inaktifModel = new \App\Models\InaktifModel();
        $this->klasifikasiModel = new \App\Models\KlasifikasiModel();
        $this->perkembanganModel = new \App\Models\PerkembanganModel();
        $this->satuanModel = new \App\Models\SatuanModel();
        $this->kategoriModel = new \App\Models\KategoriModel();
        $this->dataUser = $this->userModel->where('id_user', session()->get('idUser'))->first();
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $perPage = 20;

        $checkKeyword = $this->request->getGet('keyword') ?
            $this->inaktifModel->like('isi', $this->request->getGet('keyword'))
            ->orLike('tgl_surat', $this->request->getGet('keyword'))
            ->orLike('nama_perkembangan', $this->request->getGet('keyword'))
            ->orLike('jumlah', $this->request->getGet('keyword'))
            ->orLike('nama_satuan', $this->request->getGet('keyword'))
            ->orLike('keterangan_arsip', $this->request->getGet('keyword'))
            ->orLike('no_folder_books', $this->request->getGet('keyword'))
            ->orLike('lokasi_simpan', $this->request->getGet('keyword'))
            ->orLike('kategori', $this->request->getGet('keyword'))
            ->orLike('masuk_pengolah', $this->request->getGet('keyword'))
            ->orLike('kode', $this->request->getGet('keyword'))
            :
            $this->inaktifModel;

        $data = [
            'title' => 'Dashboard Inaktif Arsip',
            'dataUser' => $this->dataUser,
            'dataInaktif' => $checkKeyword
                ->join('tbl_klasifikasi','tbl_klasifikasi.id_klasifikasi = tbl_arsip_inaktif.id_klasifikasi')
                ->join('tbl_perkembangan','tbl_perkembangan.id_perkembangan = tbl_arsip_inaktif.id_perkembangan')
                ->join('tbl_satuan','tbl_satuan.id_satuan = tbl_arsip_inaktif.id_satuan')
                ->join('tbl_retensi','tbl_retensi.id_retensi = tbl_arsip_inaktif.id_retensi')
                ->join('tbl_kategori_arsip','tbl_kategori_arsip.id_kategori_arsip = tbl_arsip_inaktif.id_kategori_arsip')
                ->paginate($perPage, 'tbl_arsip_inaktif'),
            'pager' => $this->inaktifModel->pager,
            'numberPagination' => $this->request->getGet('page_tbl_arsip_inaktif')
                ? ((int) $this->request->getGet('page_tbl_arsip_inaktif') - 1 ) * $perPage + 1 : 1,
        ];
        return view('InaktifArsip/InaktifArsipView', $data);
    }

    public function tambahData() {
        $data = [
            'title' => 'Tambah Data Inaktif Arsip',
            'dataUser' => $this->dataUser,
            'dataKlasifikasi' => $this->klasifikasiModel->findAll(),
            'dataPerkembangan' => $this->perkembanganModel->findAll(),
            'dataSatuan' => $this->satuanModel->findAll(),
            'dataRetensi' => $this->retensiModel->findAll(),
            'dataKategori' => $this->kategoriModel->findAll(),
        ];
        return view('InaktifArsip/TambahDataInaktifView', $data);
    }

    public function getDataInaktif() {
        if ($this->validation->withRequest($this->request)->run()) {
            $idKlasifikasi = $this->request->getPost('klasifikasi');
            $isi = $this->request->getPost('isi');
            $tanggalSurat = $this->request->getPost('tanggalSurat');
            $tanggalBerakhirSurat = $this->request->getPost('tanggalBerakhirSurat');
            $idPerkembangan = $this->request->getPost('perkembangan');
            $jumlah = $this->request->getPost('jumlah');
            $idSatuan = $this->request->getPost('satuan');
            $keteranganArsip = $this->request->getPost('keteranganArsip');
            $noFolder = $this->request->getPost('noFolder');
            $lokasiSimpan = $this->request->getPost('lokasiSimpan');
            $idRetensi = $this->request->getPost('retensi');
            $idKategoriArsip = $this->request->getPost('kategori');
            $masukPengolah = date("Y-m-d", strtotime('+2 years', strtotime($tanggalBerakhirSurat)));

            $data = [
                'id_arsip_inaktif' => 'INAKTIF-'. uniqid(),
                'id_klasifikasi' => $idKlasifikasi,
                'isi' => $isi,
                'tgl_surat' => $tanggalSurat,
                'tanggal_akhir_surat' => $tanggalBerakhirSurat,
                'id_perkembangan' => $idPerkembangan,
                'jumlah' => $jumlah,
                'id_satuan' => $idSatuan,
                'keterangan_arsip' => $keteranganArsip,
                'no_folder_books' => $noFolder,
                'lokasi_simpan' => $lokasiSimpan,
                'masuk_pengolah' => $masukPengolah,
                'id_retensi' => $idRetensi,
                'id_kategori_arsip' => $idKategoriArsip,
                'id_user' => $this->dataUser['id_user'],
            ];
            if (strtotime($tanggalBerakhirSurat) < strtotime($tanggalSurat)) {
                session()->setFlashdata('tanggalBerakhirSurat', 'Data yang anda inputkan tidak valid');
                return redirect()->back()->withInput();
            } else {
                try {
                    $this->inaktifModel->insert($data);
                    if ($this->db->affectedRows()) {
                        session()->setFlashdata('success', 'Data berhasil ditambahkan');
                        return redirect()->back();
                    }
                } catch (\ReflectionException $e) {
                }
            }
        } else {
            session()->setFlashdata([
                'klasifikasi' => $this->validation->getError('klasifikasi'),
                'isi' => $this->validation->getError('isi'),
                'tanggalSurat' => $this->validation->getError('tanggalSurat'),
                'tanggalBerakhirSurat' => $this->validation->getError('tanggalBerakhirSurat'),
                'perkembangan' => $this->validation->getError('perkembangan'),
                'jumlah' => $this->validation->getError('jumlah'),
                'satuan' => $this->validation->getError('satuan'),
                'keteranganArsip' => $this->validation->getError('keteranganArsip'),
                'noFolder' => $this->validation->getError('noFolder'),
                'lokasiSimpan' => $this->validation->getError('lokasiSimpan'),
                'retensi' => $this->validation->getError('retensi'),
                'kategori' => $this->validation->getError('kategori'),
            ]);
            return redirect()->back()->withInput();
        }
    }

    public function editData($idInaktif) {
        $data = [
            'title' => 'Edit Data Inaktif Arsip',
            'dataUser' => $this->dataUser,
            'detailInaktif' => $this->inaktifModel->where('id_arsip_inaktif', $idInaktif)->first(),
            'dataKlasifikasi' => $this->klasifikasiModel->findAll(),
            'dataPerkembangan' => $this->perkembanganModel->findAll(),
            'dataSatuan' => $this->satuanModel->findAll(),
            'dataRetensi' => $this->retensiModel->findAll(),
            'dataKategori' => $this->kategoriModel->findAll(),
        ];

        return view('InaktifArsip/EditDataInaktifView', $data);
    }

    public function dataEditInaktif() {
        if ($this->validation->withRequest($this->request)->run()) {
            $idArsipInaktif = $this->request->getPost('idArsipInaktif');
            $idKlasifikasi = $this->request->getPost('klasifikasi');
            $isi = $this->request->getPost('isi');
            $tanggalSurat = $this->request->getPost('tanggalSurat');
            $tanggalAkhirSurat = $this->request->getPost('tanggalBerakhirSurat');
            $idPerkembangan = $this->request->getPost('perkembangan');
            $jumlah = $this->request->getPost('jumlah');
            $idSatuan = $this->request->getPost('satuan');
            $keteranganArsip = $this->request->getPost('keteranganArsip');
            $noFolder = $this->request->getPost('noFolder');
            $lokasiSimpan = $this->request->getPost('lokasiSimpan');
            $idRetensi = $this->request->getPost('retensi');
            $idKategoriArsip = $this->request->getPost('kategori');
            $masukPengolah = date("Y-m-d", strtotime('+2 years', strtotime($tanggalAkhirSurat)));

            $data = [
                'id_klasifikasi' => $idKlasifikasi,
                'isi' => $isi,
                'tgl_surat' => $tanggalSurat,
                'tanggal_akhir_surat' => $tanggalAkhirSurat,
                'id_perkembangan' => $idPerkembangan,
                'jumlah' => $jumlah,
                'id_satuan' => $idSatuan,
                'keterangan_arsip' => $keteranganArsip,
                'no_folder_books' => $noFolder,
                'lokasi_simpan' => $lokasiSimpan,
                'masuk_pengolah' => $masukPengolah,
                'id_retensi' => $idRetensi,
                'id_kategori_arsip' => $idKategoriArsip,
                'id_user' => $this->dataUser['id_user'],
            ];

            if (strtotime($tanggalAkhirSurat) < strtotime($tanggalSurat)) {
                session()->setFlashdata('tanggalBerakhirSurat', 'Data yang anda inputkan tidak valid');
                return redirect()->back()->withInput();
            } else {
//                d($this->retensiModel->where('id_retensi', $idRetensi)->first()['tahun_aksi']);
//                d(date('Y-m-d', strtotime('+' . $this->retensiModel->where('id_retensi', $idRetensi)->first()['tahun_aksi'] . ' years', strtotime($masukPengolah))));
//                dd($data);
                try {
                    $this->inaktifModel->where('id_arsip_inaktif', $idArsipInaktif)->set($data)->update();
                    if ($this->db->affectedRows()) {
                        session()->setFlashdata('success', 'Data berhasil diubah');
                        return redirect()->back();
                    }
                } catch (\ReflectionException $e) {
                }
            }
        } else {
            session()->setFlashdata([
                'klasifikasi' => $this->validation->getError('klasifikasi'),
                'isi' => $this->validation->getError('isi'),
                'tanggalSurat' => $this->validation->getError('tanggalSurat'),
                'masukPengolah' => $this->validation->getError('masukPengolah'),
                'perkembangan' => $this->validation->getError('perkembangan'),
                'jumlah' => $this->validation->getError('jumlah'),
                'satuan' => $this->validation->getError('satuan'),
                'keteranganArsip' => $this->validation->getError('keteranganArsip'),
                'noFolder' => $this->validation->getError('noFolder'),
                'lokasiSimpan' => $this->validation->getError('lokasiSimpan'),
                'retensi' => $this->validation->getError('retensi'),
                'kategori' => $this->validation->getError('kategori'),
            ]);
            return redirect()->back()->withInput();
        }
    }

    public function hapusDataInaktif() {
        try {
            $idArsipInaktif = $this->request->getPost('idInaktif');
            $this->inaktifModel->where('id_arsip_inaktif', $idArsipInaktif)->delete();

            if ($this->db->affectedRows()) {
                session()->setFlashdata('success', 'Data berhasil dihapus');
                return redirect()->back();
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('fails', 'Data saat ini digunakan di tabel lain');
        }
    }
}
