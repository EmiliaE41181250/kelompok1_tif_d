<?php

class PrimsLib {

    public function autonumber($id_terakhir, $panjang_kode, $panjang_angka) {

    // mengambil nilai kode ex: USR0015 hasil USR
    $kode = substr($id_terakhir, 0, $panjang_kode);
    
    // mengambil nilai angka
    // ex: USR0015 hasilnya 0015
    $angka = substr($id_terakhir, $panjang_kode, $panjang_angka);
    
    // menambahkan nilai angka dengan 1
    // kemudian memberikan string 0 agar panjang string angka menjadi 4
    // ex: angka baru = 6 maka ditambahkan strig 0 tiga kali
    // sehingga menjadi 0006
    $angka_baru = str_repeat("0", $panjang_angka - strlen($angka+1)).($angka+1);
    
    // menggabungkan kode dengan nilang angka baru
    $id_baru = $kode.$angka_baru;
    
    return $id_baru;
    }

    function month($month, $format = "mmmm"){  
        if($format == "mmmm"){    
            $fm = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");  
        }elseif($format == "mmm"){    
            $fm = array("Jan","Feb","Mar","Apr","Mei","Jun","Jul","Agu","Sep","Okt","Nov","Des");  
        }    
        return $fm[$month-1];
    }
        
    function day($day, $format = "dddd"){  
        if($format == "dddd"){    
            $fd = array("Senin","Selasa","Rabu","Kamis","Jum'at","Sabtu","Minggu");  
        }elseif($format == "ddd"){    
            $fd = array("Sen","Sel","Rab","Kam","Jum","Sab","Min");  
        }    
        return $fd[$day-1];
    }

    function upload_file($file, $name, $format, $size){
        $ci =& get_instance();
        if ($name != '') {
            $config['upload_path'] = './assets/files/' . $file;
            $config['allowed_types'] = $format;
            $config['max_size'] = $size;
            // $config['max_width']  = '2048';
            // $config['max_height']  = '2048';
            $config['encrypt_name'] = TRUE;
            
            $ci->load->library('upload', $config);
            
            if (!$ci->upload->do_upload($file))
            {
                $error = array('error' => $ci->upload->display_errors(),
                                'promo' => $ci->model_promo->getAll('promo')->result(),
                                'custom' => $ci->lang->line('Pengunggahan file' . $file . 'Gagal!')
                );
                echo $ci->load->view('admin/templates/header', array(), TRUE);
                echo $ci->load->view('admin/templates/sidebar', array(), TRUE);
                echo $ci->load->view('admin/promo/index', $error, TRUE);
                echo $ci->load->view('admin/templates/footer', array(), TRUE);
                exit;
            }
            else
            {
                return $file = $ci->upload->data('file_name');
            }
        }
    
    }

    function upload_image($file, $name, $format, $size){
        $ci =& get_instance();
        if ($name != '') {
            $config['upload_path'] = './assets/files/' . $file;
            $config['allowed_types'] = $format;
            $config['max_size'] = $size;
            // $config['max_width']  = '2048';
            // $config['max_height']  = '2048';
            $config['encrypt_name'] = TRUE;
            
            $ci->load->library('upload', $config);
            
            if (!$ci->upload->do_upload($file))
            {
                $error = array('error' => $ci->upload->display_errors(),
                                'paket' => $ci->m_data_paket->getAll('paket')->result(),
                                'custom' => $ci->lang->line('Pengunggahan file' . $file . 'Gagal!')
                );
                echo $ci->load->view('admin/templates/header', array(), TRUE);
                echo $ci->load->view('admin/templates/sidebar', array(), TRUE);
                echo $ci->load->view('admin/paket/v_paket', $error, TRUE);
                echo $ci->load->view('admin/templates/footer', array(), TRUE);
                exit;
            }
            else
            {
                return $file = $ci->upload->data('file_name');
            }
        }
    
    }

    public function SendNotification($tokenM, $titleM, $messageM, $payloadM)
    {
        $ci =& get_instance();
        $token = $tokenM;

        if($messageM == ''){
            $message = "Pada bulan Ramadhan 2020 ini kami mengadakan promosi Ramadhan diskon hingga 30% lohh!";
        }else{
            $message = $messageM;
        }

        if($titleM == ''){
            $title = "Pada bulan Ramadhan 2020 ini kami mengadakan promosi Ramadhan diskon hingga 30% lohh!";
        }else{
            $title = $titleM;
        }

        $ci->load->library('fcm');
        $ci->fcm->setTitle($title);
        $ci->fcm->setMessage($message);

        /**
         * set to true if the notificaton is used to invoke a function
         * in the background
         */
        $ci->fcm->setIsBackground(false);

        /**
         * payload is userd to send additional data in the notification
         * This is purticularly useful for invoking functions in background
         * -----------------------------------------------------------------
         * set payload as null if no custom data is passing in the notification
         */
        $ci->fcm->setPayload($payloadM);

        /**
         * Send images in the notification
         */
        $ci->fcm->setImage('https://firebase.google.com/_static/9f55fd91be/images/firebase/lockup.png');

        /**
         * Get the compiled notification data as an array
         */
        $json = $ci->fcm->getPush();

        $p = $ci->fcm->send($token, $json);

        return $p;
    }
}