<?php

if (!function_exists('verify_recaptcha')) {
    function verify_recaptcha($secret_key, $response)
    {
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = [
            'secret' => $secret_key,
            'response' => $response
        ];

        $options = [
            'http' => [
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data),
            ],
        ];

        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);

        if ($result === false) {
            return false;
        }

        $resultData = json_decode($result, true);
        return isset($resultData['success']) && $resultData['success'];
    }
}
