<?php

class Cliente {
    private $id;
    private $nome;
    private $email;
    private $telefone;
    private $senha;
    private $dataNasc;

    public function getId(){
        return $this->id;
    }
    public function setId($value){
        $this->id = $value;
    }

    public function getNome(){
        return $this->nome;
    }
    public function setNome($value){
        $this->nome = $value;
    }

    public function getEmail(){
        return $this->email;
    }
    public function setEmail($value){
        $this->email = $value;
    }

    public function getTelefone(){
        return $this->telefone;
    }
    public function setTelefone($value){
        $this->telefone = $value;
    }

    public function getSenha(){
        return $this->senha;
    }
    public function setSenha($value){
        $this->senha = $value;
    }

    public function getDataNasc(){
        return $this->dataNasc;
    }
    public function setDataNasc($value){
        $this->dataNasc = $value;
    }

    //Carregando o Cliente pelo Id
    public function loadById($id){

        $sql = new Sql();

        $results = $sql->select("SELECT * FROM clientes WHERE id_cliente = :ID", array(
            ":ID"=>$id
        ));

        //Validando
        if(count($results) > 0){

            $this->setData($results[0]);
        }

    }

    public function __toString(){
        return json_encode(array(
            "id_cliente"=>$this->getId(),
            "Nome"=>$this->getNome(),
            "Email"=>$this->getEmail(),
            "Telefone"=>$this->getTelefone(),
            "Senha"=>$this->getSenha(),
            "Data Nascimento"=>$this->getDataNasc()->format("d/m/y")
        ));
    }


    //Carregar uma lista de Clientes 
    public static function getList(){

        $sql = new Sql();

        return $sql->select("SELECT * FROM clientes ORDER BY id_cliente");
    }

    
    //Buscando Cliente pelo nome
    public static function search($nome){

        $sql = new Sql();

        return $sql->select("SELECT * FROM clientes WHERE nome_cliente LIKE :SEARCH ORDER BY id_cliente", array(
            ':SEARCH'=>"%".$nome."%"
        ));
    }


    //Fazendo um login 
    public function login($email, $senha){
        
        $sql = new Sql();

        $result = $sql->select("SELECT * FROM clientes WHERE email_cliente = :EMAIL AND senha_cliente = :SENHA", array(
            ":EMAIL"=>$email,
            ":SENHA"=>$senha
        ));

        if(count($result) > 0){

            $this->setData($result[0]);
        }else{
            throw new Exception("Login e/ou senha inválidos.");
        }
    }

    //Muda os dados do cliente
    public function setData($data){
        $this->setId($data['id_cliente']);
        $this->setNome($data['nome_cliente']);
        $this->setEmail($data['email_cliente']);
        $this->setTelefone($data['telefone_cliente']);
        $this->setSenha($data['senha_cliente']);
        $this->setDataNasc(new DateTime($data['data_nasc_cliente']));
    }

    //Inserindo cliente ao banco de dados
    public function insert(){
        
        $sql = new Sql();

        //Criando uma procedure no 'mysql' que será chamada 'CALL' no php
        $results = $sql->select("CALL sp_clientes_insert(:NOME, :EMAIL, :TELEFONE, :SENHA, :DATA_NASC)", array(
            ':NOME'=>$this->getNome(),
            ':EMAIL'=>$this->getEmail(),
            ':TELEFONE'=>$this->getTelefone(),
            ':SENHA'=>$this->getSenha(),
            ':DATA_NASC'=>$this->getDataNasc()
        ));

        if(count($results) > 0){
            $this->setData($results[0]);
        }
    }

    //metodo construtor para adicionar os dados do cliente
    public function __construct($nome = "", $email = "", $telefone = "", $senha = "", $dataNasc = ""){
        $this->setNome($nome);
        $this->setEmail($email);
        $this->setTelefone($telefone);
        $this->setSenha($senha);
        $this->setDataNasc($dataNasc);
    }
}

?> 