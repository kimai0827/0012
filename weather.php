<?php
	//http://emaken.com/sae/livedoor/weather.php?city=63&day=today
        $city = $_GET['city'];
	$day = $_GET['day'];

//XML�f�[�^�擾�p�x�[�XURL
$req = "http://weather.livedoor.com/forecast/webservice/rest/v1";

//XML�f�[�^�擾�p���N�G�X�gURL����
$req .= "?city=".$city."&day=".$day;

//XML�t�@�C�����p�[�X���A�I�u�W�F�N�g���擾
$xml = simplexml_load_file($req)
or die("XML�p�[�X�G���[");

//$xml�I�u�W�F�N�g�̒��g���m�F����ꍇ�́A�ȉ��̃R�����g���O��

/*
echo "<pre>";
var_dump ($xml);
echo "</pre>";
*/

if($day === 'today'){
	$ret .= "�����̓V�C ";
}
if($day === 'tomorrow'){
	$ret .= "�����̓V�C ";
}
if($day === 'dayaftertomorrow'){
	$ret .= "�������Ă̓V�C ";
}

$ret .= " ".$xml->telop;
$ret .= " �ō��C�� ".$xml->temperature->max->celsius."�x";

echo $ret;
echo " by livedoor";

?>
