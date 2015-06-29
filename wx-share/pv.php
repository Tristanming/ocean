<?php
$dt = date('Ymd');
$aryContent = array();
$aryContent[] = $dt;
$aryContent[] = date('H:i:s');
$aryContent[] = $_SERVER['REMOTE_ADDR'];
$aryContent[] = $_SERVER['REMOTE_HOST'];
$aryContent[] = $_SERVER['HTTP_USER_AGENT'];
$aryContent[] = $_SERVER['HTTP_REFERER'];
$content = implode(",", $aryContent);
$content .= "\n";
$dt = 'all';
@file_put_contents(dirname(__FILE__)."/pv{$dt}.log", $content, FILE_APPEND);
exit;
