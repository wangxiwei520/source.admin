<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/2/22
 * Time: 21:35
 */
require_once 'AipFace.php';
// 你的 APPID AK SK
const APP_ID = '10845059';
const API_KEY = 'nesEdrDFHNgREubIP15uyj2d';
const SECRET_KEY = 'A5S7GeL0gNrQfdSFpIPgydxgQTxOn2DX';

$client = new AipFace(APP_ID, API_KEY, SECRET_KEY);

$image = file_get_contents('03.jpg');
// 调用人脸检测
$client->detect($image);

// 如果有可选参数
$options = array();
$options["max_face_num"] = 2;
$options["face_fields"] = "age,beauty,expression,race";

// 带参数调用人脸检测
$img =  $client->detect($image, $options);
var_dump($img);
