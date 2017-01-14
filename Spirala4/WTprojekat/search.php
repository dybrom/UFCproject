<?php

function e($str) {
	return htmlspecialchars($str);
}

$xml = simplexml_load_file('fighters.xml');

$rezultati = [];
$query = $_GET['search'];
foreach ($xml as $fighter) {
	if (stripos($fighter->name, $query) !== false) {
		$rezultati[] = $fighter;
	}
}

$rezultati = array_map(function($fighter) {
	return [
		'name' => e($fighter->name)
	];
}, $rezultati);

echo json_encode($rezultati);