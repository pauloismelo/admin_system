<?php
$key='';

$url='https://api.jetimob.com/webservice/'.$key.'/imoveis?page=1&pageSize=4';
//$post = array('name' => $desc, 'desc' => 'Link do pedido: '.$link.' | Link da proposta: '.$link2.' | Data de entrega: '.$limite3.'', 'pos' => 'top', 'start' => date('Y-m-d'), 'urlSource' => $arquivo, 'fileSource' => '1', 'due' => $limite2, 'dueComplete'=>'false');

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, false);
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$resultado=curl_exec($ch);
curl_close($ch);

include('db.php');

$array_imoveis=json_decode($resultado);
//print_r($array_imoveis);

foreach ($array_imoveis as $card){
    
    echo $card->codigo.'<br>';
    if ($card->valor_venda_visivel){
        $valor=$card->valor_venda;
    }elseif($card->valor_locacao_visivel){
        $valor=$card->valor_locacao;
    }elseif($card->valor_temporada_visivel){
        $valor=$card->valor_temporada;
    }
    if($card->area_total!=''){
        $area_total=$card->area_total;
    }else{
        $area_total=0;
    }
    if($card->garagens!=''){
        $garagens=$card->garagens;
    }else{
        $garagens=0;
    }
    if($card->banheiros!=''){
        $banheiros=$card->banheiros;
    }else{
        $banheiros=0;
    }
    if($card->suites!=''){
        $suites=$card->suites;
    }else{
        $suites=0;
    }
    if($card->dormitorios!=''){
        $dormitorios=$card->dormitorios;
    }else{
        $dormitorios=0;
    }

    //=======================================
    $SQL="select * from tb_imoveis where codigo='".$card->codigo."'";
    $res = mysqli_query($conn,$SQL);
    $rs = mysqli_fetch_array($res);
    $registros =mysqli_num_rows($res);
    if ($registros==0){

        $query ="insert into tb_imoveis (codigo, contrato, tipo, subtipo, observacoes, quartos, suites, banheiros, garagens, area_total, status, valor, valor_locacao, valor_temporada, situacao, destaque, id_imovel, id_corretor, cep, endereco, numero, bairro, cidade, estado, complemento, titulo, descricao, keywords, datareg, dataupdate) values ('".$card->codigo."', '".str_replace("Locação","Locacao",utf8_decode($card->contrato))."', '".utf8_decode($card->tipo)."', '".utf8_decode($card->subtipo)."', '".utf8_decode(str_replace("'","",$card->observacoes))."', ".$dormitorios.", ".$suites.", ".$banheiros.", ".$garagens.", ".$area_total.", '".$card->status."', '".$card->valor_venda."', '".$card->valor_locacao."', '".$card->valor_temporada."', '".$card->situacao."', '".$card->destaque."', ".$card->id_imovel.", ".$card->id_corretor.", '".$card->endereco_cep."', '".$card->endereco_logradouro."', '".$card->endereco_numero."', '".$card->endereco_bairro."', '".utf8_decode(str_replace("'","",$card->endereco_cidade))."', '".utf8_decode(str_replace("'","",$card->endereco_estado))."', '".utf8_decode(str_replace("'","",$card->endereco_complemento))."', '".utf8_decode(str_replace("'","",$card->titulo_anuncio))."', '".utf8_decode(str_replace("'","",$card->descricao_anuncio))."', '".$card->imovel_comodidades."', '".date('Y-m-d H:i:s')."', '".date('Y-m-d')."')";

        if (mysqli_query($conn, $query)) {
            echo "Cadastrado com sucesso!<br>";
        } else {
            echo "Erro: " . $query . "<br>" . mysqli_error($conn);
            exit;
        }

        $SQL2="select id from tb_imoveis order by id desc";
        $res2 = mysqli_query($conn,$SQL2);
        $rs2 = mysqli_fetch_array($res2);
        $registros2 =mysqli_num_rows($res2);
        if ($registros2>0){
            $idp=$rs2['id'];
        }

        foreach ($card->imagens as $img){
            $queryimg ="insert into tb_imoveis_img (id_imovel, link) values ('".$idp."', '".$img->link."')";
            if (mysqli_query($conn, $queryimg)) {
                echo "Imagem inserida com sucesso!<br>";
            } else {
                echo "Erro: " . $queryimg . "<br>" . mysqli_error($conn);
                exit;
            }
        }

    }else{ //Encontrou imovel cadastrado, entao apenas atualiza
        
        $queryUp="update tb_imoveis set contrato='".str_replace("Locação","Locacao",utf8_decode($card->contrato))."', tipo='".utf8_decode($card->tipo)."', subtipo='".utf8_decode($card->subtipo)."', observacoes='".utf8_decode(str_replace("'","",$card->observacoes))."', quartos=".$dormitorios.", suites=".$suites.", banheiros=".$banheiros.", garagens=".$garagens.", area_total=".$area_total.", status='".$card->status."', valor='".$card->valor_venda."', valor_locacao='".$card->valor_locacao."', valor_temporada='".$card->valor_temporada."', situacao='".$card->situacao."', destaque='".$card->destaque."', id_imovel=".$card->id_imovel.", id_corretor=".$card->id_corretor.", cep='".$card->endereco_cep."', endereco='".$card->endereco_logradouro."', numero='".$card->endereco_numero."', bairro='".$card->endereco_bairro."', cidade='".utf8_decode(str_replace("'","",$card->endereco_cidade))."', estado='".utf8_decode(str_replace("'","",$card->endereco_estado))."', complemento='".utf8_decode(str_replace("'","",$card->endereco_complemento))."', titulo='".utf8_decode(str_replace("'","",$card->titulo_anuncio))."', descricao='".utf8_decode(str_replace("'","",$card->descricao_anuncio))."', keywords='".$card->imovel_comodidades."', dataupdate='".date('Y-m-d')."' where codigo='".$card->codigo."'";

        if (mysqli_query($conn, $queryUp)) {
            echo "Atualizado com sucesso!<br>";
        } else {
            echo "Erro: " . $query . "<br>" . mysqli_error($conn);
            exit;
        }

    }
}
?>
