<?php
$provincesJson = file_get_contents('https://emsifa.github.io/api-wilayah-indonesia/api/provinces.json');
$provinces = json_decode($provincesJson, true);
$result = [];

foreach ($provinces as $province) {
    $provName = ucwords(strtolower($province['name']));
    $regenciesJson = file_get_contents('https://emsifa.github.io/api-wilayah-indonesia/api/regencies/' . $province['id'] . '.json');
    $regencies = json_decode($regenciesJson, true);
    
    foreach ($regencies as $regency) {
        $regName = ucwords(strtolower($regency['name']));
        $val = $provName . ', ' . $regName;
        $result[$val] = $val;
    }
}

file_put_contents('storage/app/indonesia_locations.json', json_encode($result, JSON_PRETTY_PRINT));
echo "Successfully fetched " . count($result) . " locations!";
