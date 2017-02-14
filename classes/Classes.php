<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Classes {
    
    public function __construct() {
        $this->options = array(
            'w' => 1,
            'j' => false
        );
    }
    
    
    public function connect() {
       $mongoClient = new MongoClient();
        $database = $mongoClient->mongo_db_practice;
        $collection = $database->members;
        
        return $collection;
    }
    
    public function insertData($document) {
        try {
            $this->connect()->insert($document, $this->options);
            $response['inserted'] = true;
        } catch(MongoCursorException $e) {
            $response['inserted'] = false;
        }
        return $response;
    }
    
    
    public function updateData($condition, $document) {
        $this->connect()->update($condition, $document);
        $response['inserted'] = true;
        return $response;
    }
    
    public function deleteData($condition) {
        $this->connect()->remove($condition);
        return $response['deleted'] = true;
    }
    
}