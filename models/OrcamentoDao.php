<?php

require_once 'Orcamento.php';
require_once 'Conexao.php';

class OrcamentoDao {

    public function create(Orcamento $o){
        $sql = Conexao::getConn()->prepare("INSERT INTO orcamento (cliente,vendedor,dataDoc,hora,descricao,valor_total)
        VALUES (:cliente,:vendedor,:dataDoc,:hora,:descricao,:valor_total)");
        $sql->bindValue(':cliente', $o->getCliente());
        $sql->bindValue(':vendedor', $o->getVendedor());
        $sql->bindValue(':dataDoc', $o->getData());
        $sql->bindValue(':hora', $o->getHora());
        $sql->bindValue(':descricao', $o->getDescricao());
        $sql->bindValue(':valor_total', $o->getValorTotal());
        
       
        $sql->execute();

        $o->setId(Conexao::getConn()->lastInsertId());
        return $o;
        

    }
    public function read(){
        $lista = [];
        $sql = Conexao::getConn()->query("SELECT * FROM orcamento");
        if($sql->rowCount() > 0){
            $data = $sql->fetchAll();

            foreach($data as $item){



                $o = new Orcamento();
                $o->setId($item['id']);
                $o->setVendedor($item['vendedor']);
                $o->setCliente($item['cliente']);
                $o->setData($item['dataDoc']);
                $o->setHora($item['hora']);
                $o->setDescricao($item['descricao']);
                $o->setValorTotal($item['valor_total']);
                
                $lista[] = $o;
            }

        }
        return $lista;
    }
    public function update(Orcamento $p){

    }
    public function delete($id){

    }
}