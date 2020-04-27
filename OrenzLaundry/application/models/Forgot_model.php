<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Forgot_model extends CI_Model
{
    public function validate()
    {
        $validationRules = [
            [
                'field'     => 'email',
                'label'        => 'E-Mail',
                'rules'        => 'trim|required|valid_email',
                'errors'    => [
                    'valid_email' => '%s tidak valid'
                ]
            ]
        ];

        $this->load->library('form_validation');

        $this->form_validation->set_rules($validationRules);

        return $this->form_validation->run();
    }

    function status($pesan = "Terjadi kesalahan", $status = false, $data = null)
    {
        return [
            'status' => $status,
            'data' => $data,
            'pesan' => $pesan
        ];
    }

    public function run($request)
    {
        $query    = $this->db->where('email', strtolower($request->email))->get('user')->row();
        if (!$query) {
            return $this->status('Email tidak terdaftar');
        }

        // $queryVerifikasi    = $this->db->where('id_user', strtolower($query->id_user))->order_by('created_at', 'desc')->get('verifikasi')->row();
        // if ($queryVerifikasi) {
        //     $exp_time = date("Y-m-d H:i:s", strtotime($queryVerifikasi->created_at . " +2 minutes"));
        //     if ($exp_time > date("Y-m-d H:i:s")) return status('Hanya boleh mengirim 1 permintaan dalam 2 menit');
        // }

        $kode = $this->sendMail($request->email);
        // if (!$kode) return status('Gagal mengirim ke email');

        // $verifikasi = [
        //     'id_user' => $query->id_user,
        //     'kode_verifikasi' => $kode
        // ];
        // $this->$this->db->insert('verifikasi', $verifikasi);

        return $this->status('Kode verifikasi berhasil dikirim, silahkan cek email anda.', true);
    }

    public function sendMail($email)
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.sendgrid.net',
            'smtp_port' => 587,
            'smtp_user' => 'apikey',
            'smtp_pass' => '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',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => '\r\n'
        ];
        $this->load->library('email', $config);
        $this->email->from('agoy@semester4.com', 'Agoy');
        $this->email->to($email);
        $kode = rand(100000, 999999);
        $this->email->subject($kode . ' adalah kode verisikasi anda');
        $this->email->message("------------------------<br>Kode Verifikasi : $kode<br>------------------------");
        if ($this->email->send()) return $kode;
        return false;
        // var_dump($this->email->print_debugger());
    }
}

/* End of file m_forgot.php */