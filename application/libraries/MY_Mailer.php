<?php
/** application/libraries/MY_Mailer.php 
* Author: Le Ngoc Cuong (lnc)
**/ 
require 'PHPMailer52/PHPMailerAutoload.php';
class MY_Mailer extends PHPMailer{
	protected $_lncMail;
    public function __construct(){
    	parent::__construct();
    	date_default_timezone_set('Asia/Ho_Chi_Minh'); 
    	//Setting config send mail
		$this->_lncMail['host']       = 'smtp.gmail.com';
		$this->_lncMail['port']       = 465;
		$this->_lncMail['user']       = 'cuongle.dev@gmail.com';
		$this->_lncMail['pass']       = 'xpjmdzltlsdrwwur';
		$this->_lncMail['from']       = 'AfterUniversity@gmail.com';
		$this->_lncMail['name_from']  =  'After University System';
		$this->_lncMail['reply']      = 'AfterUniversity@gmail.com';
		$this->_lncMail['name_reply'] = 'After University';
		$this->_lncMail['altBody']    = 'Mail được gửi từ hệ thống After University';
    }
    public function sendMail($data){
		if (isset($data) && $data['type']=='SMTP') {
			$this->CharSet = 'UTF-8';
			//Tell PHPMailer to use SMTP
			$this->isSMTP();
			$this->SMTPSecure = 'ssl';
			//Enable SMTP debugging
			// 0 = off (for production use)
			// 1 = client messages
			// 2 = client and server messages
			$this->SMTPDebug = $data['debug'];
			//Ask for HTML-friendly debug output
			$this->Debugoutput = 'html';
			$this->SMTPAuth = true;
			//Set the hostname of the mail server
			$this->Host = $this->_lncMail['host'];
			//Set the SMTP port number - likely to be 25, 465 or 587
			$this->Port = $this->_lncMail['port'];
			//Whether to use SMTP authentication
			
			$this->Username = $this->_lncMail['user'];
			$this->Password = $this->_lncMail['pass'];
			if ($data['multi']==true) {
				// SMTP connection will not close after each email sent, reduces SMTP overhead
				$this->SMTPKeepAlive = true; 
			}
			
			//Set who the message is to be sent from
			$this->setFrom($this->_lncMail['from'], $this->_lncMail['name_from']);
			//Set an alternative reply-to address
			$this->addReplyTo($this->_lncMail['reply'], $this->_lncMail['name_reply']);			
			//Set the subject line
			$this->Subject = $data['subject'];
			$this->isHTML(true);
			$this->Body = $data['content'];
			//Replace the plain text body with one created manually
			$this->AltBody = $this->_lncMail['altBody'];
			//Attach an image file
			//$this->addAttachment('images/phpmailer_mini.png');
			if ($data['multi']==true) {
				foreach ($data['arrayAddAddress'] as $key => $value) {
					//Set who the message is to be sent to
					$this->addAddress($key,$value);
					if (!$this->send()) {
					    $result['message'] = "Emai:".$key."---".$this->ErrorInfo;
					    $result['status'] = false;
					} else {
						$result['message'] = "Emai:".$key."---".'Send mail success !';
					    $result['status'] = true;
					}
				}
			}else{
				//Set who the message is to be sent to
				$this->addAddress($data['addAddress'][0],$data['addAddress'][1]);	
				if (!$this->send()) {
					    $result['message'] = $this->ErrorInfo;	
					    $result['status'] = false;
					} else {
						$result['message'] = 'Send mail success !';
					    $result['status'] = true;
					}
			}			
			return $result;
		}
    }
}