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
    
    
    
    if (isset($_POST['old_contact'])) {
        $old_contact = $_POST['old_contact'];
    }
    
    if ($mode != 3) {
        if (isset($_POST['firstname']))
            $firstname = $_POST['firstname'];
        if (isset($_POST['lastname']))
            $lastname = $_POST['lastname'];
        if (isset($_POST['address']))
            $address = $_POST['address'];
        if (isset($_POST['contact']))
            $contact = $_POST['contact'];
        
        $document = array(
            'firstname' => $firstname,
            'lastname' => $lastname,
            'address' => $address,
            'contact' => $contact
        );
    }
    
    if ($mode == 1) {
       $response = $collection->insertData($document);
    } else if ($mode == 2) {
       $response = $collection->updateData(array('contact' => $old_contact),array('$set' => $document)); 
    } else if ($mode == 3) {
        $response = $collection->deleteData(array('contact' => $old_contact));
    }
    
    echo json_encode(array(
        'response' => $response
    ));
}


