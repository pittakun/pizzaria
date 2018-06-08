<?php

require_once 'Crud.php';

class motorista extends Crud {

    protected $table = 'motorista';

    private $id_motorista;
    private $nome;
    private $dat;
    private $cpf;
    private $car;
    private $status;
    private $sex;

    public function setId_motorista($id){
        $this->id_motorista = $id;
    }

    public function getId(){
        return $this->id_motorista;
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

    public function getData(){
        return $this->dat;
    }

    public function setCpf($cpf){
        $this->cpf = $cpf;
    }

    public function getCpf(){
        return $this->cpf;
    }

    public function setCar($car){
        $this->car = $car;
    }

    public function getCar(){
        return $this->car;
    }

    public function setStatus($status){
        $this->status = $status;
    }

    public function getStatus(){
        return $this->status;
    }

    public function setSex($sex){
        $this->sex = $sex;
    }

    public function getSex(){
        return $this->sex;
    }


    public function find($id_motorista){
        $sql  = "SELECT nome FROM $this->table WHERE id_motorista = :id_motorista";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':id_motorista', $this->id_motorista, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function insert(){
        $sql  = "INSERT INTO $this->table (nome, dat, cpf, carro, status,sexo) VALUES (:nome, :dat, :cpf, :car, :status, :sex)";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':dat', $this->dat);
        $stmt->bindParam(':cpf', $this->cpf);
        $stmt->bindParam(':car', $this->car);
        $stmt->bindParam(':status', $this->status);
        $stmt->bindParam(':sex', $this->sex);
        return $stmt->execute();
    }

    public function update($id){
        $sql  = "UPDATE $this->table SET status = :status WHERE id_motorista = :id";

        $stmt = DB::prepare($sql);
        $stmt->bindParam(':status', $this->status);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}