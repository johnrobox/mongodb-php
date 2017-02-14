<?php

    class Classes {
    
        public function connect() {
            $mongoClient = new MongoClient();
            $database = $mongoClient->mydb;
            $collection = $database->createCollection("mongo_db_practice");
            return $collection;
        }
    }

   $model = new Classes();
   $cursor = $model->connect()->find();
   // iterate cursor to display title of documents
   foreach ($cursor as $document) {
      echo "<pre>";
      foreach($document['_id'] as $ids) {
          print_r($ids);
          echo '<br>';
      }
      echo $document['url'];
      print_r($document);
      echo '<br>';
   }
   
?>