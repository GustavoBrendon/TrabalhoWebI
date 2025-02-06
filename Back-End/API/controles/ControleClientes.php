<?php
require_once './conexao/Conexao.php';
class ControleClientes {
    
    public function listar() {
        $sql = 'select * from clientes';
        $todos = [];
        $preparado = Conexao::preparaComando($sql);
        if($preparado->execute()){
            $todos = $preparado->fetchAll(PDO::FETCH_ASSOC);
        }
        return $todos;
    }

    public function um() {
        $sql = 'select * from clientes where id = ?';
        $id = filter_input(INPUT_POST, 'id');
        $um = [];
        $preparado = Conexao::preparaComando($sql);
        $preparado->bindValue(1, $id);
        if($preparado->execute()){
            $um = $preparado->fetch(PDO::FETCH_ASSOC);
        }
        return $um;
    }

    public function inserir() {
        $sql = 
        'insert into clientes (nome)
        values (?)';
        $nome = filter_input(INPUT_POST, 'nome');
        $preparado = Conexao::preparaComando($sql);
        $preparado->bindValue(1, $nome);
        if($preparado->execute()){
            return ['status' => 'Gravou'];
        } else {
            return ['status' => $preparado->errorInfo()];
        }        
    }

    public function editar() {
        $sql = 
        'update clientes set nome = ?
        where id = ?;';
        $id = filter_input(INPUT_POST, 'id');
        $nome = filter_input(INPUT_POST, 'nome');
        $preparado = Conexao::preparaComando($sql);
        $preparado->bindValue(1, $nome);
        $preparado->bindValue(2, $id);
        if($preparado->execute()){
            return ['status' => 'Editou'];
        } else {
            return ['status' => $preparado->errorInfo()];
        }        
    }

    public function excluir() {
        $sql = 'delete from clientes where id = ?';
        $id = filter_input(INPUT_POST, 'id');
        $preparado = Conexao::preparaComando($sql);
        $preparado->bindValue(1, $id);
        if($preparado->execute()){
            return ['status' => 'Apagou'];
        } else {
            return ['status' => $preparado->errorInfo()];
        }        
    }

}