<?php
header("Content-Type: application/vnd.ms-excel; charset=UTF-8");
header("Content-Disposition: attachment; Filename = thong_ke.xls");
echo "\xEF\xBB\xBF";
$data = $_POST['data'];
echo "$data";
