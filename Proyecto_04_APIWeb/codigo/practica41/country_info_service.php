<?php
// URL del WSDL del servicio web
$wsdl = "http://webservices.oorsprong.org/websamples.countryinfo/CountryInfoService.wso?WSDL";
 
try {
    // Crear un cliente SOAP
    $client = new SoapClient($wsdl);
 
    // Llamar al método SOAP para obtener la lista de países
    $result = $client->ListOfCountryNamesByName();
 
    // Mostrar la lista de países
    echo "<h2>Lista de Países:</h2>";
    echo "<ul>";
    foreach ($result->ListOfCountryNamesByNameResult->tCountryCodeAndName as $country) {
        echo "<li>" . $country->sName . " (" . $country->sISOCode . ")</li>";
    }
    echo "</ul>";
 
    // Ejemplo: Obtener detalles de un país específico usando su código ISO
    $countryISOCode = "FR"; // Puedes cambiar este código ISO por cualquier otro
    $countryInfo = $client->FullCountryInfo(array("sCountryISOCode" => $countryISOCode));
 
    // Mostrar información detallada del país
    echo "<h2>Información Detallada del País: " . $countryInfo->FullCountryInfoResult->sName . "</h2>";
    echo "Código ISO: " . $countryInfo->FullCountryInfoResult->sISOCode . "<br>";
    echo "Capital: " . $countryInfo->FullCountryInfoResult->sCapitalCity . "<br>";
    echo "Moneda: " . $countryInfo->FullCountryInfoResult->sCurrencyISOCode . "<br>";
    echo "Teléfono: " . $countryInfo->FullCountryInfoResult->sPhoneCode . "<br>";
 
} catch (SoapFault $e) {
    // Manejo de errores
    echo "Error: " . $e->getMessage();
}
?>
