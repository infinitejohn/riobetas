<?php
	require_once('../src/Mailchimp.php');
	
	$email = addslashes($_POST['email']);
	
	// Grab an API Key from http://admin.mailchimp.com/account/api/
	$mailChimpObj = new Mailchimp('849c9b0373310c362313701b569a583f-us9');
	
	$url = "/lists/subscribe";
	//Set your ListId below.
	$listId = "7c8c8c1351";
	
	
	
	
	//$campaignId = "d37bd17b9f"; // htmlcss campaign
	
	
	$params = array();
	$params['id'] = $listId;
	$params['email'] = array( 
								"email" => $email
							);
	
	
	//$mailChimpObj->call($targetUrl, $params);
	
	try{
		$member_info = $mailChimpObj->call($url,$params);
		echo json_encode(
							array(
								"status" => "success",
								"message" => "<p><i class='fa fa-envelope'></i> We sent you a confirmation email!</p>"
							)
						);
	}catch(Exception $e){
		echo json_encode(
							array(
								"status" => "failed",
								"message" => "<p><i class='fa fa-exclamation-triangle'></i> Your provided email address is already subscribed in our list!</p>"
							)
						);
	}
?>