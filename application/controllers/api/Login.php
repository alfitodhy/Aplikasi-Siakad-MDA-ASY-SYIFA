<?php

use chriskacerguis\RestServer\RestController;

class Login extends RestController
{

    public function index_get()
    {
        $username = $this->get('username');
        $password = $this->input->get('password');

        $user = $username;
        $pass = MD5($password);

        $check = $this->Login_model->check_login($user, $pass);

        if ($check->num_rows() > 0) {
            foreach ($check->result() as $ck) {
                if ($ck->status == 1) {
                    $data = $this->get_detail_user($ck->id_user, $ck->level);
                    if ($data){
                        $data = [
                            'id_user'   => $data['id_user'],
                            'username'  => $data['username'],
                            'level'     => $data['level'],
                            'status'    => $data['status'],
                            'nip'       => $data['nip'],
                            'name'      => $data['nama'],
                            'gender'    => $data['jenis_kelamin'],
                            'born'      => $data['tanggal_lahir'],
                            'phone'     => $data['no_hp'],
                            'email'     => $data['email'],
                            'address'   => $data['alamat'],
                            'photo'     => $data['photo']
                        ];
                        $this->response(['status' => 200, 'messages' => 'success', 'auth' => $data], RestController::HTTP_OK);
                    } else {
                        $this->response(['status' => 404, 'messages' => 'fail', 'auth' => null], RestController::HTTP_NOT_FOUND);
                    }
                } else {
                    $this->response(['status' => 404, 'messages' => 'fail', 'auth' => null], RestController::HTTP_NOT_FOUND);
                }
            }
        } else {
            $this->response(['status' => 404, 'messages' => 'fail', 'auth' => null], RestController::HTTP_NOT_FOUND);
        }
    }

    private function get_detail_user($id_user, $level){
        if ($level == 'admin') {
            $data = $this->User_model->get_detail_admin($id_user, $level);
        } elseif ($level == 'guru') {
            $data = $this->User_model->get_detail_guru($id_user, $level);
        } elseif ($level == 'wali kelas') {
            $data = $this->User_model->get_detail_guru($id_user, $level);
        } elseif ($level == 'siswa') {
            $data = $this->User_model->get_detail_siswa($id_user, $level);
        } else {
            $data = NULL;
        }
        return $data;
    }
}
