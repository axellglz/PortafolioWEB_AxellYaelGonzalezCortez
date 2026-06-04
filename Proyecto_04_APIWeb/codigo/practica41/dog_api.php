<?php

// Función para obtener la lista de razas
function getBreeds($apiKey) {

    $url = "https://api.thedogapi.com/v1/breeds";

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'x-api-key: ' . $apiKey
    ));

    $response = curl_exec($ch);

    curl_close($ch);

    return json_decode($response, true);
}

// Función para obtener imágenes
function getBreedImages($apiKey, $breedId, $limit = 5) {

    $url = "https://api.thedogapi.com/v1/images/search?breed_id={$breedId}&limit={$limit}";

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'x-api-key: ' . $apiKey
    ));

    $response = curl_exec($ch);

    curl_close($ch);

    return json_decode($response, true);
}

// TU API KEY
$apiKey = "live_mIcDrnLHJrTXjwwcSwDMJHO8Ru8QuHQT38tFQkuMIWKIJWCUCmT2BPQs8DL6b3r6";

// Obtener razas
$breeds = getBreeds($apiKey);

// Mostrar lista
echo "<h1>Lista de Razas de Perros</h1>";

echo "<ul>";

foreach($breeds as $breed){

    echo "<li>" . $breed['name'] . " (ID: " . $breed['id'] . ")</li>";

}

echo "</ul>";

// ID Husky
$huskyId = 8;

// Obtener imágenes
$huskyImages = getBreedImages($apiKey, $huskyId);

// Mostrar imágenes
echo "<h1>Imágenes de la raza Husky</h1>";

foreach($huskyImages as $image){

    echo '<img src="' . $image['url'] . '" width="250"><br><br>';

}

?>