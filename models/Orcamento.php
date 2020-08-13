<?php

class Orcamento
{
    private $id;
    private $cliente;
    private $vendedor;
    private $data;
    private $hora;
    private $descricao;
    private $valorTotal;

    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function getCliente(){
        return $this->cliente;
    }
    public function setCliente($cliente){
        $this->cliente = ucWords($cliente);
    }
    public function getVendedor(){
        return $this->vendedor;
    }
    public function setVendedor($vendedor){
        $this->vendedor = ucWords($vendedor);
    }
    public function getData(){
        return $this->data;
    }
    public function setData($data){
        $this->data = $data;
    }
    public function getHora(){
        return $this->hora;
    }
    public function setHora($hora){
        $this->hora = $hora;
    }
    public function getDescricao(){
        return $this->descricao;
    }
    public function setDescricao($descricao){
        $this->descricao = ucWords($descricao);
    }
    public function getValorTotal(){
        return $this->valorTotal;
    }
    public function setValorTotal($valorTotal){
        $this->valorTotal = $valorTotal;
    }
}
