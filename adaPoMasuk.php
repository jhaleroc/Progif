<html>
   
   <head>
      <title>Ketika ada PO masuk</title>
      <h><b>Ketika ada PO masuk</b></h>
      <p>Dilakukan perhitungan terhadap keperluan bahan</p>
      <p>Kekurangan bahan akan ditampilkan ke user</p>
   </head>
   
   <body>
      <?php
         if(isset($_POST['update'])) {
          require_once('../mysqli_connect.php');
            
            if(! $dbc ) {
               die('Could not connect: ' . mysqli_error($dbc));
            }
            
            $n_item = $_POST['no_item'];
            $j_po = $_POST['jumlah_po'];
            
			$query2 = "select * from databaseitem where no_item='$n_item'";
            $result2 = mysqli_query($dbc, $query2);
            $row2 = mysqli_fetch_array($result2);
            
            $s_bahan_database = $row2['stock_bahan'];
            $k_per_item = $row2['keperluan_per_item'];
            
            $bahan_yang_diperlukan =  $k_per_item * $j_po;
            $stock_tersisa = $s_bahan_database -  $bahan_yang_diperlukan;
            if( $stock_tersisa < 2000){
				$s_bahan_dibutuhkan = 2000 - $stock_tersisa;
				echo ("Bahan masih kurang sebesar {$s_bahan_dibutuhkan} untuk menjalankan PO<br />");
				}
          
            $sql = "UPDATE databaseitem ". "SET stock_bahan = $stock_tersisa ". 
               "WHERE no_item = $n_item" ;
           
            $retval = mysqli_query($dbc,$sql );
            
            if(! $retval ) {
               die('Could not update data: ' . mysqli_error($dbc));
            }
            echo "Update data berhasil\n";
            
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
                        <td width = "100">Jumlah PO</td>
                        <td><input name = "jumlah_po" type = "text" 
                           id = "jumlah_po"></td>
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

