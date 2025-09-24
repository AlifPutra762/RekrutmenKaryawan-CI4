<?php

use Config\Fonnte;

function sendWhatsAppMessage($targets, $message)
{
    $config = new Fonnte();
    $url = $config->apiUrl;
    $token = $config->token;

    $data = [
        'target'      => is_array($targets) ? implode(',', $targets) : $targets,
        'message'     => $message,
        'delay'       => '5',
        'countryCode' => '62', // Opsional, gunakan jika diperlukan
    ];

    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL            => $url,
        CURLOPT_RETURNTRANSFER  => true,
        CURLOPT_ENCODING       => '',
        CURLOPT_MAXREDIRS      => 10,
        CURLOPT_TIMEOUT        => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST  => 'POST',
        CURLOPT_POSTFIELDS     => $data,
        CURLOPT_HTTPHEADER     => [
            "Authorization: $token",
        ],
    ]);

    $response = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE); // Untuk cek status HTTP

    curl_close($ch);

    // Log respon untuk debugging jika terjadi error
    if ($httpcode != 200) {
        log_message('error', "Fonnte API error: HTTP $httpcode - Response: $response");
    } else {
        log_message('info', "Pesan berhasil dikirim: $response");
    }

    return $response;
}

function sendSingleWhatsAppMessage($target, $message)
{
    $config = new Fonnte();
    $url = $config->apiUrl;
    $token = $config->token;

    $data = [
        'target'      => $target, // Single nomor langsung
        'message'     => $message,
        'delay'       => '5',
        'countryCode' => '62', // Opsional, gunakan jika diperlukan
    ];

    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL            => $url,
        CURLOPT_RETURNTRANSFER  => true,
        CURLOPT_ENCODING       => '',
        CURLOPT_MAXREDIRS      => 10,
        CURLOPT_TIMEOUT        => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST  => 'POST',
        CURLOPT_POSTFIELDS     => $data,
        CURLOPT_HTTPHEADER     => [
            "Authorization: $token",
        ],
    ]);

    $response = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    curl_close($ch);

    if ($httpcode != 200) {
        log_message('error', "Fonnte API error: HTTP $httpcode - Response: $response");
    } else {
        log_message('info', "Pesan berhasil dikirim: $response");
    }

    return $response;
}
