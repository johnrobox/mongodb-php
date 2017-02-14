<?php
   // connect to mongodb
   $m = new MongoClient();
   echo "Connection to database successfully";
	
   // select a database
   $db = $m->mydb;
   
   $collection = $db->mycol;
	
   $document = array( 
      "title" => "MongoDB", 
      "description" => "database", 
      "likes" => 100,
      "url" => "http://www.tutorialspoint.com/mongodb/",
      "byss", "tutorials point",
      "anak" => array(
          "anak-01" => array(
              'apo-01',
              'apo-02',
          ), 
          "anak-02" => array(
              'apo-03',
              'apo-04'
          ),
          "anak-03" => array(
              'apo-05',
              'apo-06'
          ),
      )
   );
	
   $result = $collection->insert($document);
   echo json_encode($result);
   
?>