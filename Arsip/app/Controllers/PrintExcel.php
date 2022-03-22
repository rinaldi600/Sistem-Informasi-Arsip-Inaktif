<?php

namespace App\Controllers;

class PrintExcel extends BaseController
{

    private $retensiModel;
    private $inaktifModel;
    private $klasifikasiModel;
    private $perkembanganModel;
    private $satuanModel;
    private $kategoriModel;
    private $validation;

    public function __construct()
    {
        $this->retensiModel = new \App\Models\RetensiModel();
        $this->inaktifModel = new \App\Models\InaktifModel();
        $this->klasifikasiModel = new \App\Models\KlasifikasiModel();
        $this->perkembanganModel = new \App\Models\PerkembanganModel();
        $this->satuanModel = new \App\Models\SatuanModel();
        $this->kategoriModel = new \App\Models\KategoriModel();
        $this->validation = \Config\Services::validation();
        $this->validation->setRules([
            'year' => [
                'label'  => 'Tahun',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi',
                ],
            ],
        ]);
    }

    public function index()
    {
        if ($this->validation->withRequest($this->request)->run()) {
            $data = [
                'dataInaktif' => $this->inaktifModel
                    ->where('Year(masuk_pengolah) + tahun_aksi = ', $this->request->getPost('year'))
                    ->join('tbl_klasifikasi','tbl_klasifikasi.id_klasifikasi = tbl_arsip_inaktif.id_klasifikasi')
                    ->join('tbl_perkembangan','tbl_perkembangan.id_perkembangan = tbl_arsip_inaktif.id_perkembangan')
                    ->join('tbl_satuan','tbl_satuan.id_satuan = tbl_arsip_inaktif.id_satuan')
                    ->join('tbl_retensi','tbl_retensi.id_retensi = tbl_arsip_inaktif.id_retensi')
                    ->join('tbl_kategori_arsip','tbl_kategori_arsip.id_kategori_arsip = tbl_arsip_inaktif.id_kategori_arsip')
                    ->findAll(),
                'dateTime' => date('Y-m-d H:i:s.u'),
                'year' => $this->request->getPost('year'),
            ];

            return view('Print/PrintView', $data);
        } else {
            session()->setFlashdata([
               'year' => $this->validation->getError('year'),
            ]);
            return redirect()->back();
        }
    }
}
