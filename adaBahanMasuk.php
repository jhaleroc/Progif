<html>
   
   <head>
      <title>Update data stock</title>
      <h><b>Menambahkan Stock Bahan pada Database</b></h>
   	  <a href = "halamanUtama.php">Kembali ke halaman utama</a><br />

      
   </head>
   
   <body>
      <?php
         if(isset($_POST['update'])) {
          require_once('../mysqli_connect.php');
            
            if(! $dbc ) {
               die('Could not connect: ' . mysqli_error($dbc));
            }
            
            $n_item = $_POST['no_item'];
            $s_bahan = $_POST['stock_bahan'];
            
			$query2 = "select stock_bahan from databaseitem where no_item='$n_item'";
            $result2 = mysqli_query($dbc, $query2);
            $row2 = mysqli_fetch_array($result2);
            $s_bahan_database = $row2['stock_bahan'];
            
            $s_bahan_update = $s_bahan_database + $s_bahan;
            
            if( $s_bahan_update < 2000){
				$s_bahan_dibutuhkan = 2000 - $s_bahan_update;
				echo ("Bahan masih kurang sebesar {$s_bahan_dibutuhkan}<br />");
				}
          
            $sql = "UPDATE databaseitem ". "SET stock_bahan = $s_bahan_update ". 
               "WHERE no_item = $n_item" ;
           
            $retval = mysqli_query($dbc,$sql );
            
            if(! $retval ) {
               die('Could not update data: ' . mysqli_error($dbc));
            }
            echo "Updated data berhasil\n";
            
            mysqli_close($dbc);
         }else {
            ?>
               <form method = "post" action = "<?php $_PHP_SELF ?>">
                  <table width = "400" border =" 0" cellspacing = "1" 
                     cellpadding = "2">
                  
                     <tr>
                        <td width = "100">No Item</td>
                        <td><input name = "no_item" type = "text" 
                           id = "no_item"></td>
                     </tr>
                  
                     <tr>
                        <td width = "100">Stock Bahan</td>
                        <td><input name = "stock_bahan" type = "text" 
                           id = "stock_bahan"></td>
                     </tr>
                  
                     <tr>
                        <td width = "100"> </td>
                        <td> </td>
                     </tr>
                  
                     <tr>
                        <td width = "100"> </td>
                        <td>
                           <input name = "update" type = "submit" 
                              id = "update" value = "Update">
                        </td>
                     </tr>
                  
                  </table>
               </form>
            <?php
         }
      ?>
      
   </body>
</html>
