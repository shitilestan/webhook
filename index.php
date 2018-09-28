<?php
/**
 * Created by PhpStorm.
 * User: morteza
 * Date: 9/28/2018
 * Time: 8:27 PM
 */
$data = json_decode(file_get_contents("php://input"), true);
curl($_GET['url'], $data);
function curl($url, $datas = [])
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    if ($this->proxy) {
        curl_setopt($ch, CURLOPT_PROXY, $this->proxy_uri . ":" . $this->proxy_port);
        curl_setopt($ch, CURLOPT_PROXYUSERPWD, $this->proxy_user . ":" . $this->proxy_pass);
        curl_setopt($ch, CURLOPT_PROXYTYPE, $this->proxy_type);
    }
    curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
    $res = curl_exec($ch);
    if (curl_error($ch)) {
        var_dump(curl_error($ch));
    } else {
        return json_decode($res);
    }
    return $res;
}
