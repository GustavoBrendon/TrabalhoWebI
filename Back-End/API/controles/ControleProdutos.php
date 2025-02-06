<?php
require_once './conexao/Conexao.php';
class ControleProdutos {
    
    public function listar() {
        $sql = 'select * from produtos';
        $todos = [];
        $preparado = Conexao::preparaComando($sql);
        if($preparado->execute()){
            $todos = $preparado->fetchAll(PDO::FETCH_ASSOC);
        }
        return $todos;
    }

    public function um() {
        $sql = 'select * from produtos where id = ?';
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
        'insert into produtos (nome, quantidade, preco)
        values (?,?,?)';
        $nome = filter_input(INPUT_POST, 'nome');
        $quantidade = filter_input(INPUT_POST, 'quantidade');
        $preco = filter_input(INPUT_POST, 'preco');
        $preparado = Conexao::preparaComando($sql);
        $preparado->bindValue(1, $nome);
        $preparado->bindValue(2, $quantidade);
        $preparado->bindValue(3, $preco);
        if($preparado->execute()){
            return ['status' => 'Gravou'];
        } else {
            return ['status' => $preparado->errorInfo()];
        }        
    }

    public function editar() {
        $sql = 
        'update produtos set nome = ?, quantidade = ?, preco = ?
        where id = ?;';
        $id = filter_input(INPUT_POST, 'id');
        $nome = filter_input(INPUT_POST, 'nome');
        $quantidade = filter_input(INPUT_POST, 'quantidade');
        $preco = filter_input(INPUT_POST, 'preco');
        $preparado = Conexao::preparaComando($sql);
        $preparado->bindValue(1, $nome);
        $preparado->bindValue(2, $quantidade);
        $preparado->bindValue(3, $preco);
        $preparado->bindValue(4, $id);
        if($preparado->execute()){
            return ['status' => 'Editou'];
        } else {
            return ['status' => $preparado->errorInfo()];
        }        
    }

    public function excluir() {
        $sql = 'delete from produtos where id = ?';
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