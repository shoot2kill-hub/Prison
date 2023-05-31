
<?php
include("connection.php");
if(isset($_GET['save2']))
{
  
 $a=$_POST["UserID"];
 $phone=$_POST["phone"];
 $fname=$_POST["Fname"];
 $comment=$_POST["comment"];
 $msg2 = " Dear ".$fname.":".$phone.", Ubusabe bwanyu bwo gusura Umugororwa Ntibubashije kwemerwa;IMPAMVU:".$comment." Kubindi bisobanuro hamagara Tel:0789582389 . Murakoze";
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
