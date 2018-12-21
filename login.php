<html>
   
   <head>
      <title>Login</title>
      <h><b>Login admin</b></h><br />
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
            
			$query2 = "select * from authentication where username='$n_item'";
            $result2 = mysqli_query($dbc, $query2);
            $row2 = mysqli_fetch_array($result2);
            
            $s_bahan_database = $row2['username'];
            $password = $row2['password'];
            
            
            if( ($s_bahan != $s_bahan_database) &&($n_item != $password)){
				echo ("Username atau password yang anda masukan salah<br />");
				header("Location:login.php");
				}
			else{
				header("Location:halamanUtama.php");
				}
          
            
            mysqli_close($dbc);
         }else {
            ?>
               <form method = "post" action = "<?php $_PHP_SELF ?>">
                  <table width = "400" border =" 0" cellspacing = "1" 
                     cellpadding = "2">
                  
                     <tr>
                        <td width = "100">Username</td>
                        <td><input name = "no_item" type = "text" 
                           id = "no_item"></td>
                     </tr>
                  
                     <tr>
                        <td width = "100">Password</td>
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
                              id = "update" value = "Login">
                        </td>
                     </tr>
                  
                  </table>
               </form>
            <?php
         }
      ?>
      
   </body>
</html>
