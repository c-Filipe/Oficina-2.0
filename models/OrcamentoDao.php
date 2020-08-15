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
        $sql = Conexao::getConn()->query("SELECT * FROM orcamento ORDER BY dataDoc,hora DESC");
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
    public function update(Orcamento $o){
        $sql = Conexao::getConn()->prepare("UPDATE orcamento SET
            vendedor = :vendedor, cliente = :cliente, dataDoc = :dataDoc, 
            hora = :hora , descricao = :descricao, valor_total = :valor_total WHERE id = :id");
        $sql->bindValue(':cliente', $o->getCliente());
        $sql->bindValue(':vendedor', $o->getVendedor());
        $sql->bindValue(':dataDoc', $o->getData());
        $sql->bindValue(':hora', $o->getHora());
        $sql->bindValue(':descricao', $o->getDescricao());
        $sql->bindValue(':valor_total', $o->getValorTotal());
        $sql->bindValue(':id', $o->getId());
        $sql->execute();

        return true;


    }
    public function delete($id){
        $sql = Conexao::getConn()->prepare("DELETE FROM orcamento WHERE id = :id");
        $sql->bindValue(':id',$id);
        $sql->execute();

    }
    public function findById($id){
        $sql = Conexao::getConn()->prepare("SELECT * FROM orcamento WHERE id = :id");
        $sql->bindValue(':id',$id);
        $sql->execute();

        if($sql->rowCount() > 0){
            $data = $sql->fetch();

            $o = new Orcamento();
            $o->setId($data['id']);
            $o->setVendedor($data['vendedor']);
            $o->setCliente($data['cliente']);
            $o->setData($data['dataDoc']);
            $o->setHora($data['hora']);
            $o->setDescricao($data['descricao']);
            $o->setValorTotal($data['valor_total']);

            return $o;
        }
        else{
            return false;
        }
    }
    public function busca($termo,$filtro){
        $lista = [];

        if(!empty($termo)){
            $sql = Conexao::getConn()->prepare("SELECT * FROM orcamento WHERE $filtro  LIKE :termo ORDER BY dataDoc,hora DESC");
            $sql->bindValue(':termo', '%'.$termo.'%');
            $sql->execute();

            if($sql->rowCount() > 0){
                $data = $sql->fetchAll(PDO::FETCH_ASSOC);
                
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

        }
        return $lista;
        

    }
}