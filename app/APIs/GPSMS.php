<?php
namespace App\APIs;

class GPSMS
{
    public function send($mobile_no, $message)
    {
        $mobile_no = trim($mobile_no);
        $mobile_no = str_replace(['+88', ' ', '-', '_'], '', $mobile_no);
        $data = array(
            'username' => 'VARAdmin',
            'password' => '@Varendra1234@@',
            'apicode' => 1,
            'msisdn' => $mobile_no,
            'countrycode' => '880',
            'cli' => 'Varendra U.',
            'messagetype' => 1,
            'message' => $message,
            'messageid' => 0
        );

        $content = http_build_query($data);
        $opts = array(
            'http' =>
                array(
                    'method' => 'POST',
                    'header' => 'Content-type: application/x-www-form-urlencoded',
                    'content' => $content
                )
        );

        $context = stream_context_create($opts);
        $result = file_get_contents('https://gpcmp.grameenphone.com/gpcmpapi/messageplatform/controller.home', false, $context);

        return $result;
    }
}
?>
