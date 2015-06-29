<?php
require_once "jssdk.php";
$jssdk = new JSSDK("wx5707e960c2a4da4c", "1ed0c37ed7e8281eb08ab456d6484241");
$url = $_REQUEST['link'];
if (empty($url)) {
    $pos = strpos("http://{$_SERVER[HTTP_HOST]}{$_SERVER[REQUEST_URI]}", 'wx-share');
    if ($pos) {
    	$url = substr("http://{$_SERVER[HTTP_HOST]}{$_SERVER[REQUEST_URI]}", 0, $pos);
    }
}
$signPackage = $jssdk->getSignPackage($url);
$urlPrefix = '';
$info = parse_url($signPackage['url']); 
if ($info && $info['path']) {
	$path = pathinfo($info['path'], PATHINFO_DIRNAME);
	if ($path && $info['scheme'] && $info['host']) {
		$urlPrefix = $info['scheme'] . '://' . $info['host'] . $path . '/';
	}
}
$urlPrefix = 'http://haichang.allyes.com/O2Best/';
$signPackage['urlPrefix'] = $urlPrefix;
echo json_encode($signPackage);
exit;
?>
