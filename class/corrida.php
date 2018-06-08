<?php

require_once 'Crud.php';
class corrida extends Crud
{
    protected $table = 'corrida';

    private $id_motorista;
    private $id_passageiro;
    private $valor;


    public function setId_motorista($id_motorista){
        $this->id_motorista = $id_motorista;
    }

    public function getiId_motorista(){
        return $this->id_motorista;
    }

    public function setId_passageiro($id_passageiro){
        $this->id_passageiro = $id_passageiro;
    }

    public function getId_passageiro(){
        return $this->id_passageiro;
    }

    public function setValor($valor){
        $this->valor = $valor;
    }

    public function getValor(){
        return $this->valor;
    }

    public function find($id_corrida){
        $sql  = "SELECT * FROM $this->table WHERE id_corrida = :id_corrida";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':id_corrida', $this->id_corrida, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }


    public function insert(){
        $sql  = "INSERT INTO $this->table (id_motorista, id_passageiro, valor) VALUES (:id_motorista, :id_passageiro, :valor)";

        $stmt = DB::prepare($sql);
        $stmt->bindParam(':id_motorista', $this->id_motorista);
        $stmt->bindParam(':id_passageiro', $this->id_passageiro);
        $stmt->bindParam(':valor', $this->valor);

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