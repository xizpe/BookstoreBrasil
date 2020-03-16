<?php
 
include 'conecta.php';
header("Access-Control-Allow-Origin: *");

$json = file_get_contents('php://input');
 
$obj = json_decode($json,true);

$SQL="SELECT * FROM livros"; 
$resultado = mysqli_query($con,$SQL);
    while ($dados=mysqli_fetch_array($resultado))
    {
        $item=array(
            "id"=>$dados['ID'],
            "titulo" => $dados['TITULO'],
            "autor" => $dados['AUTOR'],
            "preco" => $dados['PRECO'],
            "estoque" => $dados['ESTOQUE'],
            "imagem" => $dados['IMAGEM'],
            "destaque" => $dados['DESTAQUE'],
        );

         $r[]= $item;
    }    

    echo json_encode($r);

 mysqli_close($con);
?>