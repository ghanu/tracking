<?

// Created by G.M.Sundar & R.Surya
// [created : 07/16/2008, 03:51:59 PM]
// Description:Used to create Alerts from the data provided the alert may be any one of the following type Mail,SMS,
// RSS Feed,Message through the internal system


class cAlerts
	{
	var $db;
	var $alerts_array;
	var $alert_limit_value;
	var $alert_mode;
	var $alert_details_array;
	var $table_format_array;
	var $from_address;
	var $to_address;
	var $html_text;
	var $text;
	var $subject;
	var $attachment;
	var $document_root;
	var $mail_back_ground_image;
	function cAlerts()
		{
		}
	function getAlert()
		{
/*		include("global_files/tables.inc");
		switch($this->alert_id)
			{


			break;

			}
		$this->table_format_array["table_style"]="width:80%;border:solid 2px gold; border-width:thin; border-collapse:collapse;";
		$this->table_format_array["tr_style"]="width:80%;border:solid 2px gold; border-width:thin; border-collapse:collapse;";
		$this->table_format_array["th_style"]="width:80%;border:solid 2px gold; border-width:thin; border-collapse:collapse;";
		$this->db->runQuery();
		$this->alert_details_array=$this->db->returnArrays();
		$this->db->query="UPDATE $sys_alerts_table SET status='com' WHERE alert_id=".$this->alert_id;
		$this->db->runQuery();
		$this->db->query="SELECT sam.alert_class_id FROM $sys_alert_master_table sam WHERE alert_id=".$this->alert_id;
		$this->db->runQuery();
		$class_id_array=$this->db->returnArrays();
		if(is_array($this->alert_details_array))
			{
			foreach($this->alert_details_array as $key=>$value)
				{
				$this->db->query="INSERT INTO $sys_alerts_table VALUES (".$this->alert_id.",".$class_id_array[0][alert_class_id].",'".strip_tags($value[$reference_detail])."','".date("Y-m-d H:i:s")."','act');";
				$this->db->runQuery();
				}
			}
*/
		}
	function sendMail()
		{
		require_once("mail/htmlMimeMail.php");
		$mail = new htmlMimeMail();
		//$value[0] will be the file name i.e example.zip
		//$value[1] will be the type of the attachment i.e application/zip
		//$value[2] will be the display string i.e po.zip
		if(is_array($this->attachment))
			{
			foreach($this->attachment as $key=>$value)
				{
				$attachment = $mail->getFile($value[0]);
				$mail->addAttachment($attachment,$value[2],$value[1]);
				}
			}

		$this->from_address=$this->from_address?$this->from_address:"customercare@leatherlink.net";
		$mail->setReturnPath($this->from_address);
		$this->html_text=eregi_replace("[\]",'',$this->html_text);

		if($this->mail_back_ground_image)
			$mail->addHtmlImage($this->mail_back_ground_image, 'test','image/gif');
		$mail->setHtml($this->html_text);
		$to_address_string=is_array($this->to_address)?implode(",",$this->to_address):$this->to_address;
		$mail->setFrom($this->from_address);
		$mail->setSubject($this->subject);
		$mail->setHeader('X-Mailer', 'Designed and maintained by BSG Leatherlink');
		$result = $mail->send(array($this->to_address), 'smtp');
		if($result)
			$this->text="Mail Sucessfully sent to ".$this->to_address;
		else
			$this->text="Sending mail failed";
		}
	function generateAlert()
		{
		$i=0;
		$this->html_text="";

		foreach($this->alerts_array as $mode=>$data)
			{
			if($mode=='mail')
				{
				foreach($data as $key=>$html_table)
					{
					$this->html_text.=$html_table;
					}
				$this->subject='Alerts on '.date('l jS \of F Y h:i:s A');
				$test=$this->sendMail();
				}
// 			if($mode=='sms')
// 				{
// 				$this->html_text.="use need to send sms?";
// 				}
			}
		}

	}

?>
