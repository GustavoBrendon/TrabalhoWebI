<?php
require_once './conexao/Conexao.php';
class ControleFuncionarios {
    
    public function listar() {
        $sql = 'select * from funcionarios';
        $todos = [];
        $preparado = Conexao::preparaComando($sql);
        if($preparado->execute()){
            $todos = $preparado->fetchAll(PDO::FETCH_ASSOC);
        }
        return $todos;
    }

    public function um() {
        $sql = 'select * from funcionarios where id = ?';
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
        'insert into funcionarios (nome, salario)
        values (?,?)';
        $nome = filter_input(INPUT_POST, 'nome');
        $salario = filter_input(INPUT_POST, 'salario');
        $preparado = Conexao::preparaComando($sql);
        $preparado->bindValue(1, $nome);
        $preparado->bindValue(2, $salario);
        if($preparado->execute()){
            return ['status' => 'Gravou'];
        } else {
            return ['status' => $preparado->errorInfo()];
        }        
    }

    public function editar() {
        $sql = 
        'update funcionarios set nome = ?, salario = ?
        where id = ?;';
        $id = filter_input(INPUT_POST, 'id');
        $nome = filter_input(INPUT_POST, 'nome');
        $salario = filter_input(INPUT_POST, 'salario');
        $preparado = Conexao::preparaComando($sql);
        $preparado->bindValue(1, $nome);
        $preparado->bindValue(2, $salario);
        $preparado->bindValue(3, $id);
        if($preparado->execute()){
            return ['status' => 'Editou'];
        } else {
            return ['status' => $preparado->errorInfo()];
        }        
    }

    public function excluir() {
        $sql = 'delete from funcionarios where id = ?';
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