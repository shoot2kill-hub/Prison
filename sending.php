

<?php
include("connection.php");
if(isset($_POST['save1']))
{
  
 
 $phone=$_POST["phone"];
 $fname=$_POST["Fname"];
 $Date=$_POST["date"];
 $time=$_POST["time"];
$msg2 = " Dear ".$fname.":".$phone.", Ubusabe bwanyu bwo gusura Umugororwa Bwakiriwe Umunsi wo gusura ni:".$Date." : ".$time.", Gusura birangira: 15:00 PM Kubindi bisobanuro Sura urubuga Rwacu. ";
 $data=array(
 "sender"=>'250786329768', 
"recipients"=>$phone,
"message"=>$msg2,
 );
 $url="https://www.intouchsms.co.rw/api/sendsms/.json";
 $data=http_build_query($data);
 $username="Mihigo01";
 $password="Ganza@2014";
 $ch=curl_init();
 curl_setopt($ch,CURLOPT_URL,$url);
 curl_setopt($ch,CURLOPT_USERPWD,$username.":".$password);
 curl_setopt($ch,CURLOPT_POST,true);
 curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
 curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
 curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
 $result=curl_exec($ch);
 $httpcode=curl_getinfo($ch,CURLINFO_HTTP_CODE);
 curl_close($ch);
}
