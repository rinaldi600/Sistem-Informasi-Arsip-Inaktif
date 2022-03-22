<?php

namespace App\Controllers;


class Setting extends BaseController
{
    private $userModel;
    private $db;
    private $dataUser;
    private $validation;

    public function __construct()
    {
        $this->userModel = new \App\Models\UserModel();
        $this->validation = \Config\Services::validation();
        $this->dataUser = $this->userModel->where('id_user', session()->get('idUser'))->first();
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $data = [
            'title' => 'Data User',
            'dataUser' => $this->dataUser,
        ];
        return view('Setting/SettingView', $data);
    }

    public function dataUser() {
        $checkValidation = $this->request->getPost('username') == $this->request->getPost('oldUsername')
            ?
            '' : '|is_unique[tbl_user.username]';
        $this->validation->setRules([
            'username' => [
                'label'  => 'Username',
                'rules'  => 'required|max_length[20]|min_length[3]|alpha_numeric' . $checkValidation,
                'errors' => [
                    'required' => '{field} wajib diisi',
                    'max_length' => '{field} maksimal 20 karakter',
                    'min_length' => '{field} minimal 3 karakter',
                    'alpha_numeric' => '{field} harus kombinasi huruf dan angka',
                    'is_unique' => '{field} sudah terdaftar'
                ],
            ],
            'nama' => [
                'label'  => 'Nama',
                'rules'  => 'required|regex_match[/^[a-zA-Z ]+$/]',
                'errors' => [
                    'required' => '{field} wajib diisi',
                    'regex_match' => '{field} tidak boleh mengandung selain huruf dan spasi',
                ],
            ],
            'bidang' => [
                'label'  => 'Bidang',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi',
                ],
            ],
        ]);
        if ($this->validation->withRequest($this->request)->run()) {
            $nama = $this->request->getPost('nama');
            $username = $this->request->getPost('username');
            $bidang = $this->request->getPost('bidang');
            $idUser = $this->request->getPost('idUser');

            $data = [
                'nama' => $nama,
                'username' => $username,
                'bidang' => $bidang,
            ];

            try {
                $this->userModel->where('id_user', $idUser)->set($data)->update();
                if ($this->db->affectedRows()) {
                    session()->setFlashdata('success', 'Akun berhasil diubah');
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
                'passwordBaru' => $this->validation->getError('passwordBaru'),
                'konfirmasiPasswordBaru' => $this->validation->getError('konfirmasiPasswordBaru'),
            ]);
            return redirect()->back()->withInput();
        }
    }

    public function ubahPassword() {
        $data = [
            'title' => 'Ubah Password',
            'dataUser' => $this->dataUser,
        ];
        return view('Setting/UbahPasswordView', $data);
    }

    public function dataPassword() {
        $this->validation->setRules([
                'password' => [
                    'label'  => 'Password',
                    'rules'  => 'max_length[20]|min_length[8]|alpha_numeric',
                    'errors' => [
                        'max_length' => '{field} maksimal 20 karakter',
                        'min_length' => '{field} minimal 8 karakter',
                        'alpha_numeric' => '{field} harus kombinasi huruf dan angka',
                        'is_unique' => '{field} sudah terdaftar'
                    ],
                ],
                'passwordBaru' => [
                    'label'  => 'Password Baru',
                    'rules'  => 'max_length[20]|min_length[8]|alpha_numeric',
                    'errors' => [
                        'max_length' => '{field} maksimal 20 karakter',
                        'min_length' => '{field} minimal 8 karakter',
                        'alpha_numeric' => '{field} harus kombinasi huruf dan angka',
                        'is_unique' => '{field} sudah terdaftar'
                    ],
                ],
                'konfirmasiPasswordBaru' => [
                    'label'  => 'Konfirmasi Password Baru',
                    'rules'  => 'max_length[20]|min_length[8]|alpha_numeric',
                    'errors' => [
                        'max_length' => '{field} maksimal 20 karakter',
                        'min_length' => '{field} minimal 8 karakter',
                        'alpha_numeric' => '{field} harus kombinasi huruf dan angka',
                        'is_unique' => '{field} sudah terdaftar'
                    ],
                ],
            ]
        );
        if ($this->validation->withRequest($this->request)->run()) {
            $passwordBaru = $this->request->getPost('passwordBaru');
            $konfirmasiPassword = $this->request->getPost('konfirmasiPasswordBaru');
            $passwordLama = $this->request->getPost('password');
            $idUser = $this->request->getPost('idUser');

            if (password_verify($passwordLama, $this->dataUser['password'])) {
                if ($passwordBaru !== $konfirmasiPassword) {
                    session()->setFlashdata([
                        'konfirmasiPasswordBaru' => 'Password Tidak Sesuai',
                    ]);
                    return redirect()->back()->withInput();
                }
                $data = [
                    'password' => password_hash($passwordBaru, PASSWORD_DEFAULT),
                ];

                try {
                    $this->userModel->where('id_user', $idUser)->set($data)->update();
                    if ($this->db->affectedRows()) {
                        session()->setFlashdata('success', 'Akun berhasil diubah');
                        return redirect()->back();
                    }
                } catch (\ReflectionException $e) {
                    session()->setFlashdata('fails', 'Terjadi kesalahan coba lagi nanti');
                    return redirect()->back();
                }
            } else {
                if ($passwordLama == $this->dataUser['password']) {
                    if ($passwordBaru !== $konfirmasiPassword) {
                        session()->setFlashdata([
                            'konfirmasiPasswordBaru' => 'Password Tidak Sesuai',
                        ]);
                        return redirect()->back()->withInput();
                    }
                    $data = [
                        'password' => password_hash($passwordBaru, PASSWORD_DEFAULT),
                    ];

                    try {
                        $this->userModel->where('id_user', $idUser)->set($data)->update();
                        if ($this->db->affectedRows()) {
                            session()->setFlashdata('success', 'Akun berhasil diubah');
                            return redirect()->back();
                        }
                    } catch (\ReflectionException $e) {
                        session()->setFlashdata('fails', 'Terjadi kesalahan coba lagi nanti');
                        return redirect()->back();
                    }
                } else {
                    session()->setFlashdata([
                        'password' => 'Password Salah',
                    ]);
                    return redirect()->back()->withInput();
                }
            }
        } else {
            session()->setFlashdata([
                'password' => $this->validation->getError('password'),
                'passwordBaru' => $this->validation->getError('passwordBaru'),
                'konfirmasiPasswordBaru' => $this->validation->getError('konfirmasiPasswordBaru'),
            ]);
            return redirect()->back()->withInput();
        }
    }
}
