<?php

require_once "email.class.php";
//******************** 配置信息 ********************************
$smtpserver = "smtp.126.com";//SMTP服务器
$smtpserverport =25;//SMTP服务器端口
$smtpusermail = "tanyawei@126.com";//SMTP服务器的用户邮箱
$smtpemailto = "xiedatelecom@gmail.com";//发送给谁
$smtpuser = "tanyawei";//SMTP服务器的用户帐号
$smtppass = "91tanyawei";//SMTP服务器的用户密码
$mailtitle = $_POST['your-subject'];//邮件主题
$mailcontent = "<p>Sender:".$_POST['your-name']."(".$_POST['your-email'].")</p>"."<p>".$_POST['your-message']."</p>";//邮件内容
$mailtype = "HTML";//邮件格式（HTML/TXT）,TXT为文本邮件
//************************ 配置信息 ****************************
$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//这里面的一个true是表示使用身份验证,否则不使用身份验证.
$smtp->debug = false;//是否显示发送的调试信息
$state = $smtp->sendmail($smtpemailto, $smtpusermail, $mailtitle, $mailcontent, $mailtype);

if($state==""){
    http_response_code(500);
}
http_response_code(200);
echo "Thank You! Your message has been sent.";

?>
