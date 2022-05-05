<?php

function file_put_raw_contents($url, $data, $username = null, $password = null)
{
    $opts = array(
        'http' =>
        array(
            'method'  => 'PUT',
            'header'  =>     "Content-type: text/plain\r\n" .
                "Content-Length: " . strlen($data) . "\r\n",
            'content' => $data,
        )
    );

    if ($username && $password) {
        $opts['http']['header'] .= ("Authorization: Basic " . base64_encode("$username:$password")) . "\r\n";
    }
    $context = stream_context_create($opts);
    file_get_contents($url, false, $context);
}

/**
 * Send a mail to the given mail address
 */
function sendMail(string $to, string $subject, string $body)
{
    $query = http_build_query([
        "to" => $to,
        "subject" => $subject,
    ]);
    try {
        file_put_raw_contents("https://mail-rest.dev.scriptis.fr/mail?$query", $body, 'admin', "dabEscPNSr");
        return true;
    } catch (Exception $e) {
        echo $e->getMessage();
        return false;
    }
}