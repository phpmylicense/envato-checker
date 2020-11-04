<?php
/**
 * PHPMyLicense Version 3 Toolkit
 *
 * https://support.phpmylicense.us
 *
 * test.php
 */

require_once('../vendor/autoload.php');

use PML3_Toolkit\Cryptography;

$Signature = new Cryptography\APISignatureHandler();

$response = json_decode(file_get_contents('https://test.phpmylicense.us/release/api/validate/host/test.net/1'), true);

//$response = json_decode('{"status":301,"message":"License not Found","signature":"rZ8Ut8N4FP07fP4plW00ZzuZPAxzSKSV3r+UPVdaI2Yoqu6QOmVTxPx20f+WCI6R+7u4uewtocRVtAL2cQVLNSN8pwQbbT7RI1ABXCbZwxT7rpHUa8RLVn70ov6Ewgeuf9bfU5fYmQnDGJTfFUI4tmO\/2hINAUtLknmlHyY9ZA46SnLStFs0J6itDkCIew4\/a7C3nO0s666WQGEQGYsrrFnkX5L02L5Kwpq1b7dh2DgNPqgDkScXCY6xNvoalHT3siCaZrzp8vnJ2Epe8ny5NGg9padc86OgoMMofRfyGLjJRRNzdN5Nyj1mmw3\/kYUmz0fxZB44jdZixM+sUZsEiA=="}', true);
echo "License Info:\n";
echo "Server Message: " . $response['message'] . "\n";
echo "Signature Status: ";

$Signature->setPubKey("-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAwg9P/gkeIGbENvB6sNcA
iBKmCGrC5ESAxJ2++1MjAJ6zx1hETFORrCV/7lm3jOMLuezMm52CCEw092h2BgZS
lcR9Bkto6VDbTabWJzrlwHSAxQ7rtKR+I6nG+KhsQsgHTz6kzs8qG7yNvb9qRyEH
kCtRL7s2wVstlHtd+VPWeUx6ui9edR1CRhkzCFP6pOv/s06AaDkwmNKFcG9qBN5E
Bqp8Ah5/Qy74SwDO1mCkLaLmqsgcZUOUWp0y2sql2mP+rFI1xFbaq7Yf/igZxzzh
4IW75baWxhrgTbs4ReIYs4ZO/nUUxJLOs3DkwDN9cR6MG+PD+2OZfHsZvXGRXjzy
owIDAQAB
-----END PUBLIC KEY-----");

$status = $Signature->validateJsonSignature($response);

if ($status == true) {
    echo "Valid\n";
} else {
    echo "Invalid\n";
}