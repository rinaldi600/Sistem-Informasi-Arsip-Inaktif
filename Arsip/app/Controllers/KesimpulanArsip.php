<?php

namespace App\Controllers;

class KesimpulanArsip extends BaseController
{

    private $userModel;
    private $retensiModel;
    private $inaktifModel;
    private $klasifikasiModel;
    private $perkembanganModel;
    private $satuanModel;
    private $kategoriModel;
    private $db;
    private $dataUser;

    public function __construct()
    {
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
            $this->inaktifModel->where('Year(masuk_pengolah) + tahun_aksi = ', $this->request->getGet('keyword'))
            :
            $this->inaktifModel->where('Year(masuk_pengolah) + tahun_aksi = ', date('Y'));

        $data = [
            'title' => 'Kesimpulan Setelah Masa Retensi Arsip',
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
        return view('KesimpulanArsip/KesimpulanArsipView', $data);
    }
}
