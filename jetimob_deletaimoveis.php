<?php
include('db.php');
//=======================================
$SQL="select id from tb_imoveis where dataupdate<>'".date('Y-m-d')."'";
$res = mysqli_query($conn,$SQL);
//$rs = mysqli_fetch_array($res);
$registros =mysqli_num_rows($res);
if ($registros!=0){
    while($rs = mysqli_fetch_array($res)){

        echo $rs['id'].'<br>';
         
        $queryUp="delete from  tb_imoveis where id=".$rs['id']."";

        if (mysqli_query($conn, $queryUp)) {
            echo "Deletado com sucesso!<br>";
        } else {
            echo "Erro: " . $query . "<br>" . mysqli_error($conn);
            exit;
        }
        

    }
    
    
}
?>