<?php 

$frase = $_POST['texto'];

$palabras_positivas = array("contento", "feliz", "alegre","positivo","Felicidad", "Alegría", "Placer",);
$palabras_negativas = array("triste", "enojado", "frustrado","Tristeza","Desilusión","Dolor","Amargura");


function analizarSentimiento($frase, $positivas, $negativas) {
    $palabras = explode(" ", $frase);
    $sentimiento = 0;

    foreach ($palabras as $palabra) {
        if (in_array($palabra, $positivas)) {
            $sentimiento++;
        } elseif (in_array($palabra, $negativas)) {
            $sentimiento--;
        }
    }

    if ($sentimiento > 0) {
        return "Positivo";
    } elseif ($sentimiento < 0) {
        return "Negativo";
    } else {
        return "Neutral";
    }
}


$sentimiento_frase = analizarSentimiento($frase, $palabras_positivas, $palabras_negativas);
echo json_encode(array("resultado" => $sentimiento_frase));

?>