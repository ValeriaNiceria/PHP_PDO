<?php

function traduz_prioridade($codigo) {
    $prioridade = '';
    switch($codigo){
        case 1:
            $prioridade = 'Baixa';
        break;
        case 2:
            $prioridade = 'Média';
        break;
        case 3:
            $prioridade = 'Alta';
        break;
    }
    return $prioridade;
}

function traduz_concluida($codigo) {
    if($codigo) {
        return 'Sim';
    }
    return 'Não';
}

function traduz_data_para_exibir($data) {
    if ($data == "" || $data == "0000-00-00") {
        return "";
    }

    $dados = explode("-", $data);

    if (count($dados) != 3) {
        return false;
    }

    $data_exibir = "{$dados[2]}/{$dados[1]}/{$dados[0]}";

    return $data_exibir;
}