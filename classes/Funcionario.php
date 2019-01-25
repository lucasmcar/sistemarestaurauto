  <?php

require('CRUD.php');
  
class Funcionario extends CRUD {
    
    protected $table = 'tb_funcionario'; 


    private $nome;
    private $funcao;
    private $funcaosecundaria;
    private $idade;
    
    public function setNome($nome){
        $this->nome = $nome;
    }
    
    public function getNome(){
        return $this->nome;
    }
    
    public function setFuncao($funcao){
        $this->funcao = $funcao;
    }
    
    public function getFuncao(){
        return $this->funcao;
    }
    
    public function setFuncaoSencudaria($funcaosecundaria){
        $this->funcaosecundaria = $funcaosecundaria;
    }
    
    public function getFuncaoSecundaria(){
        return $this->funcaosecundaria;
    }
    
    public function setIdade($idade){
        $this->idade = $idade;
    }
    
    public function getIdade(){
        return $this->idade;
    }
    
    public function insert(){
        $sql = "INSERT INTO $this->table (nome, funcao, funcaosecundaria, idade) VALUES (:nome, :funcao, :funcaosecundaria, :idade)";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':funcao', $this->funcao);
        $stmt->bindParam(':funcaosecundaria', $this->funcaosecundaria);
        $stmt->bindParam(':idade', $this->idade);
        return $stmt->execute();
    }
    
    public function update($id) {
        $sql = "UPDATE $this->table SET nome = :nome, funcao = :funcao, "
                . "funcaosecundaria = :fs, idade = :idade WHERE id_func = :id_func";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':funcao', $this->funcao);
        $stmt->bindParam(':fs', $this->funcaosecundaria);
        $stmt->bindParam(':idade', $this->idade);
        $stmt->bindParam(':id_func', $id);
        return $stmt->execute();
    }
    
}
