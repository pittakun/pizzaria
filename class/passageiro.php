<?php

require_once 'Crud.php';

class passageiro extends Crud {

    protected $table = 'passageiro';

    private $id_passageiro;
    private $nome;
    private $dat;
    private $cpf;
    private $sex;

    public function setId_passageiro($id_passageiro){
        $this->id_passageiro = $id_passageiro;
    }

    public function getId_passageiro(){
        return $this->id_passageiro;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setDat($dat){
        $this->dat = $dat;
    }

    public function getDat(){
        return $this->dat;
    }

    public function setCpf($cpf){
        $this->cpf = $cpf;
    }

    public function getCpf(){
        return $this->cpf;
    }


    public function setSex($sex){
        $this->sex = $sex;
    }

    public function getSex(){
        return $this->sex;
    }

    public function find($id_passageiro){
        $sql  = "SELECT * FROM $this->table WHERE id_passageiro = :id_passageiro";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':id_passageiro', $this->id_passageiro, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function insert(){
        $sql  = "INSERT INTO $this->table (nome, dat, cpf,sexo) VALUES (:nome, :dat, :cpf, :sex)";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':dat', $this->dat);
        $stmt->bindParam(':cpf', $this->cpf);
        $stmt->bindParam(':sex', $this->sex);
        return $stmt->execute();
    }

    public function update($id){

    }


}