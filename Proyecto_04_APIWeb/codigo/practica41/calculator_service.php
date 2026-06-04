<?php

$resultados = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];

    $wsdl = "http://www.dneonline.com/calculator.asmx?WSDL";

    try {

        $client = new SoapClient($wsdl);

        $params = array(
            "intA" => $num1,
            "intB" => $num2
        );

        $suma = $client->Add($params);
        $resta = $client->Subtract($params);
        $multiplicacion = $client->Multiply($params);
        $division = $client->Divide($params);

        $resultados = "
        Resultado de la suma: " . $suma->AddResult . "<br>
        Resultado de la resta: " . $resta->SubtractResult . "<br>
        Resultado de la multiplicación: " . $multiplicacion->MultiplyResult . "<br>
        Resultado de la división: " . $division->DivideResult;

    } catch (SoapFault $e) {

        $resultados = "Error: " . $e->getMessage();

    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Calculadora SOAP</title>
</head>
<body>

<h2>Calculadora SOAP</h2>

<form method="POST">

    Número 1:
    <input type="number" name="num1" required><br><br>

    Número 2:
    <input type="number" name="num2" required><br><br>

    <input type="submit" value="Calcular">

</form>

<br>

<?php
echo $resultados;
?>

</body>
</html>