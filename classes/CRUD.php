<?php

require('DB.php');

abstract class CRUD extends DB{
    
    protected $table;
    
    abstract public function insert();

    abstract public function update($id);
    
    public function view($id){
        $sql = "SELECT * FROM  $this->table WHERE id_func = :id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }
    
    public function viewAll(){
        $sql = "SELECT * FROM  $this->table";
        $stmt = DB::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
        
    }
    
    public function deleteRow(){
        
        $sql = "DELETE FROM $this->table WHERE id_func = :id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt-execute();
    }
    
}
