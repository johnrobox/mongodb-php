<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'Classes.php';
$collection = new Classes();
$query = $collection->connect();


        
if (isset($_POST) && isset($_POST['form_mode']) && $_POST['form_mode'] != null) {
    $mode = $_POST['form_mode'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    
    $document = array(
        'firstname' => $firstname,
        'lastname' => $lastname,
        'address' => $address,
        'contact' => $contact
    );
    
    if ($mode == 1) {
       $response = $collection->insertData($document);
    }
    
    echo json_encode(array(
        'response' => $response
    ));
}


