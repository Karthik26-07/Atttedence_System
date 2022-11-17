<?php
include './dbconnect.php';


$id=$_POST['id'];
//$isenabled=$_GET['isenabled'];
var_dump($id);
 $sql=  "select * from manage_mapping where id='$id'";
  $result1= mysqli_query($con, $sql);
   while ($row = mysqli_fetch_assoc($result1)) {
         $flag = $row['isenabled'];
     
    }
    var_dump($flag);
 if($flag==='1'){
  $update=mysqli_query($con,"update manage_mapping set isenabled=0 where id='$id'");
    
     
 
   
 }
else if($flag ==='0'){
    
       $update1=mysqli_query($con,"update manage_mapping set isenabled=1 where id='$id'");      
        
       
   }


// $update="update manage_mapping set isenabled='$flag' where id='$id'";  
////if(mysqli_query($con, $update))
//{
////if(result1){
   
    
   // header('location:insertmap.php');
///}
 //else {
    
//}
?>










 
 