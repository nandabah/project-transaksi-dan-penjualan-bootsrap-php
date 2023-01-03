<?php 
session_start();
function setsession($data){
if (isset($data['submit']) ) {
    # code...

 $jmlh = $data['jmlh'];
 $menu = $data['menu'];
 $id_menu = $data['id_menu'];
 $harga = $data['harga'];

function arrayjum($value){
   return $value != "" ;
}

if (empty ($_SESSION['menu'] )) {
   $filtermenu = array_values(array_filter($menu));
   $filterjmlh = array_values(array_filter($jmlh));  
   if (empty ($filterjmlh)) {
      return false;
   }

   $filterharga =array_values(array_filter($harga));   
   $filterid_menu =array_values(array_filter($id_menu));   

}else {
   $addmenu = array_values(array_filter($menu));
 
   $addjmlh = array_values(array_filter($jmlh));    
   if (empty ($addjmlh)) {
      return false;
      exit;
   }
   $addharga =array_values(array_filter($harga));   
   $addid_menu =array_values(array_filter($id_menu));   

   $filtermenu = array_merge($_SESSION['menu'],$addmenu) ;
   $filterjmlh = array_merge($_SESSION['jumlah'],$addjmlh);
   $filterharga =array_merge($_SESSION['harga'],$addharga);
   $filterid_menu = array_merge($_SESSION['id_menu'],$addid_menu);

}






$jml = count($filtermenu);

for ($i=0; $i < $jml; $i++) { 
   $total_bayar[] = $filterjmlh[$i] * $filterharga[$i];
};

$arraysum = array_sum($total_bayar);

$_SESSION['jumlah']= $filterjmlh;
$_SESSION['menu'] = $filtermenu;
$_SESSION['id_menu']= $filterid_menu;
$_SESSION['harga']= $filterharga;
$_SESSION['total']= $arraysum;

//set session jumlah
$_SESSION['a']= $jml;
$_SESSION['b']= $filterjmlh;

}
// var_dump($_SESSION['harga']);

// var_dump($_SESSION['harga']);
// echo"<br>";
// var_dump( $_SESSION['harga']);

// var_dump( $_SESSION['id_menu']);
//  var_dump($filterjmlh);

 header('Location: ' . $_SERVER['HTTP_REFERER']);

// echo '<script>
//                  javascript:history.back(1);
//           </script>';




?>

<?php
// // begin the session
// session_start();
 
// // create an array
// $my_array=array('cat', 'dog', 'mouse', 'bird', 'crocodile', 'wombat', 'koala', 'kangaroo');
 
// // put the array in a session variable
// $_SESSION['animals']=$my_array;
 
// // a little message to say we have done it
// echo 'Putting array into a session variable';


 
// // loop through the session array with foreach
// foreach($_SESSION['animals'] as $key=>$value)
//     {
//     // and print out the values
//     echo 'The value of $_SESSION['."'".$key."'".'] is '."'".$value."'".' <br />';
//     }

}
?>