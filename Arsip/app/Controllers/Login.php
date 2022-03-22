<?php

namespace App\Controllers;

class Login extends BaseController
{
    private $validation;
    private $userModel;
    private $logModel;
    private $db;

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->validation->setRules([
                'username' => [
                    'label'  => 'Username',
                    'rules'  => 'required|max_length[20]|min_length[3]|alpha_numeric',
                    'errors' => [
                        'required' => '{field} wajib diisi',
                        'max_length' => '{field} maksimal 20 karakter',
                        'min_length' => '{field} minimal 3 karakter',
                        'alpha_numeric' => '{field} harus kombinasi huruf dan angka',
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
        return view('Login/LoginView');
    }

    public function dataLogin()
    {
        if ($this->validation->withRequest($this->request)->run()) {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            $checkUsername = $this->userModel->where('username', $username)->first();

            if (is_null($checkUsername)) {
                session()->setFlashdata('username', 'Username tidak ditemukan');
            } else {
                $checkPassword = $checkUsername['password'];
                if (password_verify($password, $checkPassword)) {
                    $data = [
                      'id_log' => 'LOG-' . uniqid(),
                        'id_user' =>  $checkUsername['id_user'],
                        'session_id' => session_id(),
                        'ip_address' => $this->request->getIPAddress()
                    ];

                    try {
                        $this->logModel->insert($data);
                        if ($this->db->affectedRows()) {

                            $dataLogIn = [
                                'idUser' => $checkUsername['id_user'],
                                'id_log' => $this->logModel->where('id_user', $checkUsername['id_user'])
                                    ->orderBy('id_user', 'DESC')->limit(1)->first()['id_log'],
                            ];
                            session()->set($dataLogIn);
                            return redirect()->to('/kategori_arsip');

                        }
                    } catch (\ReflectionException $e) {
                    }
                } else {
                    if ($checkPassword === $password) {
                        $data = [
                            'id_log' => 'LOG-' . uniqid(),
                            'id_user' =>  $checkUsername['id_user'],
                            'session_id' => session_id(),
                            'ip_address' => $this->request->getIPAddress()
                        ];

                        try {
                            $this->logModel->insert($data);
                            if ($this->db->affectedRows()) {

                                $dataLogIn = [
                                    'idUser' => $checkUsername['id_user'],
                                    'id_log' => $this->logModel->where('id_user', $checkUsername['id_user'])
                                        ->orderBy('id_user', 'DESC')->limit(1)->first()['id_log'],
                                ];
                                session()->set($dataLogIn);
                                return redirect()->to('/kategori_arsip');

                            }
                        } catch (\ReflectionException $e) {
                        }
                    } else {
                        session()->setFlashdata('password', 'Password salah');
                    }
                }
            }
        } else {
            session()->setFlashdata([
                'username' => $this->validation->getError('username'),
                'password' => $this->validation->getError('password'),
            ]);
        }
        return redirect()->back()->withInput();
    }
}
