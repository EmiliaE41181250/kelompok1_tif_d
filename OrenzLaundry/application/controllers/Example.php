<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Example extends CI_Controller
{
    /**
     * Send to a single device
     */
    public function sendNotification()
    {
        $token = 'ckDSF-9gS-iTetSXzo4rmo:APA91bHqwzbivYmi4tRypw-dczF24ij6gwceKTxykXu_RPk2QwydTdnrxxUBVMv-t6-h52-_pZif9FpS2N3MhJnse46VyKDV1nEyx77arT4UID28MlEgQCIcVhrZ_vG_zcvX-ml1e3Ml'; // push token
        $message = "Pada bulan Ramadhan 2020 ini kami mengadakan promosi Ramadhan diskon hingga 30% lohh!";

        $this->load->library('fcm');
        $this->fcm->setTitle('Promo Ramadhan Diskon 30%, ayo cuci pakaianmu sekarang!');
        $this->fcm->setMessage($message);

        /**
         * set to true if the notificaton is used to invoke a function
         * in the background
         */
        $this->fcm->setIsBackground(false);

        /**
         * payload is userd to send additional data in the notification
         * This is purticularly useful for invoking functions in background
         * -----------------------------------------------------------------
         * set payload as null if no custom data is passing in the notification
         */
        
        $this->fcm->setPayload($payload);

        /**
         * Send images in the notification
         */
        $this->fcm->setImage('https://firebase.google.com/_static/9f55fd91be/images/firebase/lockup.png');

        /**
         * Get the compiled notification data as an array
         */
        $json = $this->fcm->getPush();

        $p = $this->fcm->send($token, $json);

        print_r($p);
    }

    /**
     * Send to multiple devices
     */
    public function sendToMultiple()
    {
        $token = array('Registratin_id1', 'Registratin_id2'); // array of push tokens
        $message = "Test notification message";

        $this->load->library('fcm');
        $this->fcm->setTitle('Test FCM Notification');
        $this->fcm->setMessage($message);
        $this->fcm->setIsBackground(false);
        // set payload as null
        $payload = array('notification' => '');
        $this->fcm->setPayload($payload);
        $this->fcm->setImage('https://firebase.google.com/_static/9f55fd91be/images/firebase/lockup.png');
        $json = $this->fcm->getPush();

        /** 
         * Send to multiple
         * 
         * @param array  $token     array of firebase registration ids (push tokens)
         * @param array  $json      return data from getPush() method
         */
        $result = $this->fcm->sendMultiple($token, $json);
    }
}
