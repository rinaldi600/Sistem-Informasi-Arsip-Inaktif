<?php

namespace App\Controllers;

class RegistrationUserArsipBappeda extends BaseController
{

    private $validation;
    private $userModel;
    private $logModel;
    private $db;

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->validation->setRules([
                'nama' => [
                    'label'  => 'Nama',
                    'rules'  => 'required|regex_match[/^[a-zA-Z ]+$/]',
                    'errors' => [
                        'required' => '{field} wajib diisi',
                        'regex_match' => '{field} tidak boleh mengandung selain huruf dan spasi',
                    ],
                ],
                'username' => [
                    'label'  => 'Username',
                    'rules'  => 'required|max_length[20]|min_length[3]|alpha_numeric|is_unique[tbl_user.username]',
                    'errors' => [
                        'required' => '{field} wajib diisi',
                        'max_length' => '{field} maksimal 20 karakter',
                        'min_length' => '{field} minimal 3 karakter',
                        'alpha_numeric' => '{field} harus kombinasi huruf dan angka',
                        'is_unique' => '{field} sudah terdaftar'
                    ],
                ],
                'bidang' => [
                    'label'  => 'Bidang',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => '{field} wajib diisi',
                    ],
                ],
                'password' => [
                    'label'  => 'Password',
                    'rules'  => 'required|max_length[20]|min_length[8]|alpha_numeric',
                    'errors' => [
                        'required' => '{field} wajib diisi',
                        'max_length' => '{field} maksimal 20 karakter',
                        'min_length' => '{field} minimal 8 karakter',
                        'alpha_numeric' => '{field} harus kombinasi huruf dan angka',
                        'is_unique' => '{field} sudah terdaftar'
                    ],
                ],
            ]
        );
        $this->userModel = new \App\Models\UserModel();
        $this->logModel = new \App\Models\LogModel();
        $this->db = \Config\Database::connect();

        if (session()->get('idUser')) {
            $this->logModel->where('id_log', session()->get('id_log'))->delete();

            if ($this->db->affectedRows()) {
                session()->destroy();
            }
        }
    }

    public function index()
    {
        return view('Registration/RegistrationView');
    }

    public function dataRegistration()
    {
        if ($this->validation->withRequest($this->request)->run()) {
            $nama = $this->request->getPost('nama');
            $username = $this->request->getPost('username');
            $bidang = $this->request->getPost('bidang');
            $password = $this->request->getPost('password');

            $data = [
                'id_user' => 'USER-' . uniqid(),
                'nama' => $nama,
                'username' => $username,
                'bidang' => $bidang,
                'password' => password_hash($password, PASSWORD_DEFAULT),
            ];

            try {
                $this->userModel->insert($data);
                if ($this->db->affectedRows()) {
                    session()->setFlashdata('success', 'Akun berhasil dibuat silahkan coba login');
                    return redirect()->back();
                }
            } catch (\ReflectionException $e) {
                session()->setFlashdata('fails', 'Terjadi kesalahan coba lagi nanti');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata([
                'nama' => $this->validation->getError('nama'),
                'username' => $this->validation->getError('username'),
                'bidang' => $this->validation->getError('bidang'),
                'password' => $this->validation->getError('password'),
            ]);
            return redirect()->back()->withInput();
        }
    }
}
