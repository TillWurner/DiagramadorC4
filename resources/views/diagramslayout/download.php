<?php 
      function get($var){
            $id = $var;
            /* $db=connection_pgsql() or die('Sin conexion a la bd'); */
            $db = new PDO("pgsql:host=127.0.0.1;port=5432;dbname=diagramador;user=postgres;password=zeinaldo123");
            $query = "SELECT * FROM public.diagramas where id = $id ";
            $result = $db->prepare($query);
            $results = $result->execute();
            $row = $result->fetch();   //ENCONTRO EL JSON
            /* echo "<script>console.log({$name})</script>"; */
            $file = $row['json'];
            json_encode($file);
            $file_name = 'diagram.json';
            file_put_contents($file_name, $file);
            readfile($file_name);
            exit;
            /* echo "<script>console.log('" . json_encode($file) . "');</script>"; 
                */ 
            if(array_key_exists('test',$_POST)){
                  get($var);
               }
          /* echo '<a href="'.$file_name .'" class="btn btn-secondary">raa</a>'; */ 
      }  
?> 