<?php
require_once './conexao/Conexao.php';
class ControleMateriais {
    
    public function listar() {
        $sql = 'select * from materiais';
        $todos = [];
        $preparado = Conexao::preparaComando($sql);
        if($preparado->execute()){
            $todos = $preparado->fetchAll(PDO::FETCH_ASSOC);
        }
        return $todos;
    }

    public function um() {
        $sql = 'select * from materiais where id = ?';
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
        'insert into materiais (nome, custo, quantidade)
        values (?,?,?)';
        $nome = filter_input(INPUT_POST, 'nome');
        $custo = filter_input(INPUT_POST, 'custo');
        $quantidade = filter_input(INPUT_POST, 'quantidade');
        $preparado = Conexao::preparaComando($sql);
        $preparado->bindValue(1, $nome);
        $preparado->bindValue(2, $custo);
        $preparado->bindValue(3, $quantidade);
        if($preparado->execute()){
            return ['status' => 'Gravou'];
        } else {
            return ['status' => $preparado->errorInfo()];
        }        
    }

    public function editar() {
        $sql = 
        'update materiais set nome = ?, custo = ?, quantidade = ?
        where id = ?;';
        $id = filter_input(INPUT_POST, 'id');
        $nome = filter_input(INPUT_POST, 'nome');
        $custo = filter_input(INPUT_POST, 'custo');
        $quantidade = filter_input(INPUT_POST, 'quantidade');
        $preparado = Conexao::preparaComando($sql);
        $preparado->bindValue(1, $nome);
        $preparado->bindValue(2, $custo);
        $preparado->bindValue(3, $quantidade);
        $preparado->bindValue(4, $id);
        if($preparado->execute()){
            return ['status' => 'Editou'];
        } else {
            return ['status' => $preparado->errorInfo()];
        }        
    }

    public function excluir() {
        $sql = 'delete from materiais where id = ?';
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