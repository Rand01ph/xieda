<?php

require_once "email.class.php";
//******************** ������Ϣ ********************************
$smtpserver = "smtp.126.com";//SMTP������
$smtpserverport =25;//SMTP�������˿�
$smtpusermail = "tanyawei@126.com";//SMTP���������û�����
$smtpemailto = $_POST['your-email'];//���͸�˭
$smtpuser = "tanyawei";//SMTP���������û��ʺ�
$smtppass = "91tanyawei";//SMTP���������û�����
$mailtitle = $_POST['your-subject'];//�ʼ�����
$mailcontent = "<p>".$_POST['your-name']."</p>"."<p>".$_POST['your-email']."</p>"."<p>".$_POST['your-message']."</p>";//�ʼ�����
$mailtype = "HTML";//�ʼ���ʽ��HTML/TXT��,TXTΪ�ı��ʼ�
//************************ ������Ϣ ****************************
$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//�������һ��true�Ǳ�ʾʹ�������֤,����ʹ�������֤.
$smtp->debug = false;//�Ƿ���ʾ���͵ĵ�����Ϣ
$state = $smtp->sendmail($smtpemailto, $smtpusermail, $mailtitle, $mailcontent, $mailtype);

if($state==""){
    http_response_code(500);
}
http_response_code(200);
echo "Thank You! Your message has been sent.";

?>
