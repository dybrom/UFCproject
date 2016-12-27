<?php
function e($str) {
	return htmlspecialchars($str);
}

$xml = simplexml_load_file('fighters.xml');

$csv = '';

foreach ($xml as $info) {
	$csv .= e($info->name) . ',' . e($info->country) . e($info->weightClass) . "\n";
}

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename=fighters.csv');

echo $csv;