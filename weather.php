<?php
	//http://emaken.com/sae/livedoor/weather.php?city=63&day=today
        $city = $_GET['city'];
	$day = $_GET['day'];

//XMLデータ取得用ベースURL
$req = "http://weather.livedoor.com/forecast/webservice/rest/v1";

//XMLデータ取得用リクエストURL生成
$req .= "?city=".$city."&day=".$day;

//XMLファイルをパースし、オブジェクトを取得
$xml = simplexml_load_file($req)
or die("XMLパースエラー");

//$xmlオブジェクトの中身を確認する場合は、以下のコメントを外す

/*
echo "<pre>";
var_dump ($xml);
echo "</pre>";
*/

if($day === 'today'){
	$ret .= "今日の天気 ";
}
if($day === 'tomorrow'){
	$ret .= "明日の天気 ";
}
if($day === 'dayaftertomorrow'){
	$ret .= "あさっての天気 ";
}

$ret .= " ".$xml->telop;
$ret .= " 最高気温 ".$xml->temperature->max->celsius."度";

echo $ret;
echo " by livedoor";

?>
