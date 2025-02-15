<?php
// hum database users ka name say banaya hian or us main users_data k name say table banaya hain
$server = "localhost";
$username= "root";
$password = "";
$database = "taskone";
// yar uay kya hn raha hin mohjy smj nhi aa raha shrokhan es ko  q nhi bolta es tahran to phr ap ko hi kam karna 
// ga agar moneeb na kya 
$conn = mysqli_connect($server,$username,$password,$database);
//hmm billkul ahsay hi hain 
if(!$conn)
{
    die("Eroor".mysqli_connect_error());
}
?>