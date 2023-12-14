<?php
  if(isset($_POST['btn_submit'])){
	 $fname = $_POST['fname'];
	 $age = $_POST['age'];
	 $phone = $_POST['phone'];	 
	 $address = $_POST['address'];
	 $email = $_POST['email'];
	 $education = $_POST['education'];
	 $priorexperienceinfood = $_POST['priorexperienceinfood'];
	 $currentlyworkingornatureofbusiness = $_POST['currentlyworkingornatureofbusiness'];
	 $incomedetailsanditreturs = $_POST['incomedetailsanditreturs'];
	 $howdidyouhearaboutpakodifactory = $_POST['howdidyouhearaboutpakodifactory'];
	 $whyareyouinterestedinpakodifactory = $_POST['whyareyouinterestedinpakodifactory'];
	 $inwhichareayouarelookingtosetuppakodifactory = $_POST['inwhichareayouarelookingtosetuppakodifactory'];
	 $whyhaveyouchosenthisparticulararea = $_POST['whyhaveyouchosenthisparticulararea'];
	 $doyouhaveyourownplacetosetupthestore = $_POST['doyouhaveyourownplacetosetupthestore'];
	 $ifyesfillinthedetailsbelow = $_POST['ifyesfillinthedetailsbelow'];
	 $ifnodoyouhaveasiteinmind = $_POST['ifnodoyouhaveasiteinmind'];
	 $howlongwouldittakeforyoutorentthisplace = $_POST['howlongwouldittakeforyoutorentthisplace'];
	 $whoisgoingtomanagethestore = $_POST['whoisgoingtomanagethestore'];
	 $whatisyourfinancialexpectationfrompakodifactory = $_POST['whatisyourfinancialexpectationfrompakodifactory'];
	 $areyouwillingtorunpakodifactoryonalongtermbasis = $_POST['areyouwillingtorunpakodifactoryonalongtermbasis'];
	 $howdoyouplanyourcompany = $_POST['howdoyouplanyourcompany'];
	 $forapartnershiphowmanypartnersexist = $_POST['forapartnershiphowmanypartnersexist'];
	 $howlonghaveyoubeenassociatedwitheachother = $_POST['howlonghaveyoubeenassociatedwitheachother'];
	 $areyouworkingtogetheronotherprojectsaswell = $_POST['areyouworkingtogetheronotherprojectsaswell'];
	 $howmuchtimeinadaycanyouspendnearthestore = $_POST['howmuchtimeinadaycanyouspendnearthestore'];
	 $isyourcomapnyaccreditedtoanyotherfoodrelatedbusiness = $_POST['isyourcomapnyaccreditedtoanyotherfoodrelatedbusiness'];
	 $ifyesprovidedetails = $_POST['ifyesprovidedetails'];
	 $email_from = 'franchise@pakodifactory.in';
	 
	 $email_to = 'shyambollina@gmail.com';
	 $email_subject = "Pakodi Factory Franchise Form Details";
	 $email_message = '';
	 $email_message = "<table width='600' align='center' cellpadding='0' cellspacing='1' style='border:solid 1px #009ddc; background: #fff;'>
	 					<tr>						
							<td colspan='2' valign='middle' bgcolor='#009ddc' style='color: #FFFFFF; font:bold 15px Arial; padding: 30px; border-right:solid 1px #009ddc;'>Pakodi Factory Franchise Form Details</td>
						</tr>
						<tr>
    <td colspan='2' bgcolor='#d5ecff' style='color: #1f1f1f; font: 14px/20px Arial;'><p style='padding:10px; margin:0px;'></p></td>
  </tr>
	 					<tr>
							<td width='350' bgcolor='#d5ecff' align='right' valign='middle' style='color: #191919; font: normal 12px/20px Arial,Helvetica,sans-serif; padding:5px;'>Name :</td>
							<td bgcolor='#d5ecff' align='left' valign='middle' style='color: #191919; font: normal 12px/20px Arial,Helvetica,sans-serif; padding:5px;'>".$fname."</td>
						</tr>
						<tr>
							<td bgcolor='#d5ecff' align='right' valign='middle' style='color: #191919; font: normal 12px/20px Arial,Helvetica,sans-serif; padding:5px;'>Age :</td>
							<td bgcolor='#d5ecff' align='left' valign='middle' style='color: #191919; font: normal 12px/20px Arial,Helvetica,sans-serif; padding:5px;'>".$age."</td>
						</tr>
						<tr>
							<td bgcolor='#d5ecff' align='right' valign='middle' style='color: #191919; font: normal 12px/20px Arial,Helvetica,sans-serif; padding:5px;'>Phone No :</td>
							<td bgcolor='#d5ecff' align='left' valign='middle' style='color: #191919; font: normal 12px/20px Arial,Helvetica,sans-serif; padding:5px;'>".$phone."</td>
						</tr>
						<tr>
							<td bgcolor='#d5ecff' align='right' valign='middle' style='color: #191919; font: normal 12px/20px Arial,Helvetica,sans-serif; padding:5px;'>Address :</td>
							<td bgcolor='#d5ecff' align='left' valign='middle' style='color: #191919; font: normal 12px/20px Arial,Helvetica,sans-serif; padding:5px;'>".$address."</td>
						</tr>
						<tr>
							<td bgcolor='#d5ecff' align='right' valign='middle' style='color: #191919; font: normal 12px/20px Arial,Helvetica,sans-serif; padding:5px;'>E-mail :</td>
							<td bgcolor='#d5ecff' align='left' valign='middle' style='color: #191919; font: normal 12px/20px Arial,Helvetica,sans-serif; padding:5px;'>".$email."</td>
						</tr>
						<tr>
							<td bgcolor='#d5ecff' align='right' valign='middle' style='color: #191919; font: normal 12px/20px Arial,Helvetica,sans-serif; padding:5px;'>Education :</td>
							<td bgcolor='#d5ecff' align='left' valign='middle' style='color: #191919; font: normal 12px/20px Arial,Helvetica,sans-serif; padding:5px;'>".$education."</td>
						</tr>
						<tr>
							<td bgcolor='#d5ecff' align='right' valign='middle' style='color: #191919; font: normal 12px/20px Arial,Helvetica,sans-serif; padding:5px;'>Prior Experience in food(if any) :</td>
							<td bgcolor='#d5ecff' align='left' valign='middle' style='color: #191919; font: normal 12px/20px Arial,Helvetica,sans-serif; padding:5px;'>".$priorexperienceinfood."</td>
						</tr>
						<tr>
							<td bgcolor='#d5ecff' align='right' valign='middle' style='color: #191919; font: normal 12px/20px Arial,Helvetica,sans-serif; padding:5px;'>Currently Working or Nature of Business :</td>
							<td bgcolor='#d5ecff' align='left' valign='middle' style='color: #191919; font: normal 12px/20px Arial,Helvetica,sans-serif; padding:5px;'>".$currentlyworkingornatureofbusiness."</td>
						</tr>
						<tr>
							<td bgcolor='#d5ecff' align='right' valign='middle' style='color: #191919; font: normal 12px/20px Arial,Helvetica,sans-serif; padding:5px;'>Income Details and IT Returs :</td>
							<td bgcolor='#d5ecff' align='left' valign='middle' style='color: #191919; font: normal 12px/20px Arial,Helvetica,sans-serif; padding:5px;'>".$incomedetailsanditreturs."</td>
						</tr>
						<tr>
							<td bgcolor='#d5ecff' align='right' valign='middle' style='color: #191919; font: normal 12px/20px Arial,Helvetica,sans-serif; padding:5px;'>How did you hear about Pakodi Factory? :</td>
							<td bgcolor='#d5ecff' align='left' valign='middle' style='color: #191919; font: normal 12px/20px Arial,Helvetica,sans-serif; padding:5px;'>".$howdidyouhearaboutpakodifactory."</td>
						</tr>
						<tr>
							<td bgcolor='#d5ecff' align='right' valign='middle' style='color: #191919; font: normal 12px/20px Arial,Helvetica,sans-serif; padding:5px;'>Why are you interested in Pakodi Factory? :</td>
							<td bgcolor='#d5ecff' align='left' valign='middle' style='color: #191919; font: normal 12px/20px Arial,Helvetica,sans-serif; padding:5px;'>".$whyareyouinterestedinpakodifactory."</td>
						</tr>
						<tr>
							<td bgcolor='#d5ecff' align='right' valign='middle' style='color: #191919; font: normal 12px/20px Arial,Helvetica,sans-serif; padding:5px;'>In which area you are looking to setup Pakodi Factory? :</td>
							<td bgcolor='#d5ecff' align='left' valign='middle' style='color: #191919; font: normal 12px/20px Arial,Helvetica,sans-serif; padding:5px;'>".$inwhichareayouarelookingtosetuppakodifactory."</td>
						</tr>
						<tr>
							<td bgcolor='#d5ecff' align='right' valign='middle' style='color: #191919; font: normal 12px/20px Arial,Helvetica,sans-serif; padding:5px;'>Why have you chosen this particular area? :</td>
							<td bgcolor='#d5ecff' align='left' valign='middle' style='color: #191919; font: normal 12px/20px Arial,Helvetica,sans-serif; padding:5px;'>".$whyhaveyouchosenthisparticulararea."</td>
						</tr>
						<tr>
							<td bgcolor='#d5ecff' align='right' valign='middle' style='color: #191919; font: normal 12px/20px Arial,Helvetica,sans-serif; padding:5px;'>Do you have your own place to set up the store? :</td>
							<td bgcolor='#d5ecff' align='left' valign='middle' style='color: #191919; font: normal 12px/20px Arial,Helvetica,sans-serif; padding:5px;'>".$doyouhaveyourownplacetosetupthestore."</td>
						</tr>
						<tr>
							<td bgcolor='#d5ecff' align='right' valign='middle' style='color: #191919; font: normal 12px/20px Arial,Helvetica,sans-serif; padding:5px;'>If yes, fill in the details below (location &amp; Visibility) :</td>
							<td bgcolor='#d5ecff' align='left' valign='middle' style='color: #191919; font: normal 12px/20px Arial,Helvetica,sans-serif; padding:5px;'>".$ifyesfillinthedetailsbelow."</td>
						</tr>
						<tr>
							<td bgcolor='#d5ecff' align='right' valign='middle' style='color: #191919; font: normal 12px/20px Arial,Helvetica,sans-serif; padding:5px;'>If no,do you have a site in mind :</td>
							<td bgcolor='#d5ecff' align='left' valign='middle' style='color: #191919; font: normal 12px/20px Arial,Helvetica,sans-serif; padding:5px;'>".$ifnodoyouhaveasiteinmind."</td>
						</tr>
						<tr>
							<td bgcolor='#d5ecff' align='right' valign='middle' style='color: #191919; font: normal 12px/20px Arial,Helvetica,sans-serif; padding:5px;'>How long would it take for you to rent this place? :</td>
							<td bgcolor='#d5ecff' align='left' valign='middle' style='color: #191919; font: normal 12px/20px Arial,Helvetica,sans-serif; padding:5px;'>".$howlongwouldittakeforyoutorentthisplace."</td>
						</tr>
						<tr>
							<td bgcolor='#d5ecff' align='right' valign='middle' style='color: #191919; font: normal 12px/20px Arial,Helvetica,sans-serif; padding:5px;'>Who is going to manage the store? :</td>
							<td bgcolor='#d5ecff' align='left' valign='middle' style='color: #191919; font: normal 12px/20px Arial,Helvetica,sans-serif; padding:5px;'>".$whoisgoingtomanagethestore."</td>
						</tr>
						<tr>
							<td bgcolor='#d5ecff' align='right' valign='middle' style='color: #191919; font: normal 12px/20px Arial,Helvetica,sans-serif; padding:5px;'>What is your financial expectation from Pakodi Factory? :</td>
							<td bgcolor='#d5ecff' align='left' valign='middle' style='color: #191919; font: normal 12px/20px Arial,Helvetica,sans-serif; padding:5px;'>".$whatisyourfinancialexpectationfrompakodifactory."</td>
						</tr>
						<tr>
							<td bgcolor='#d5ecff' align='right' valign='middle' style='color: #191919; font: normal 12px/20px Arial,Helvetica,sans-serif; padding:5px;'>Are you willing to run Pakodi Factory on a long term basis? :</td>
							<td bgcolor='#d5ecff' align='left' valign='middle' style='color: #191919; font: normal 12px/20px Arial,Helvetica,sans-serif; padding:5px;'>".$areyouwillingtorunpakodifactoryonalongtermbasis."</td>
						</tr>
						<tr>
							<td bgcolor='#d5ecff' align='right' valign='middle' style='color: #191919; font: normal 12px/20px Arial,Helvetica,sans-serif; padding:5px;'>How do you plan your company? :</td>
							<td bgcolor='#d5ecff' align='left' valign='middle' style='color: #191919; font: normal 12px/20px Arial,Helvetica,sans-serif; padding:5px;'>".$howdoyouplanyourcompany."</td>
						</tr>
						<tr>
							<td bgcolor='#d5ecff' align='right' valign='middle' style='color: #191919; font: normal 12px/20px Arial,Helvetica,sans-serif; padding:5px;'>For a Partnership,how many partners exist :</td>
							<td bgcolor='#d5ecff' align='left' valign='middle' style='color: #191919; font: normal 12px/20px Arial,Helvetica,sans-serif; padding:5px;'>".$forapartnershiphowmanypartnersexist."</td>
						</tr>
						<tr>
							<td bgcolor='#d5ecff' align='right' valign='middle' style='color: #191919; font: normal 12px/20px Arial,Helvetica,sans-serif; padding:5px;'>How long have you been associated with each other :</td>
							<td bgcolor='#d5ecff' align='left' valign='middle' style='color: #191919; font: normal 12px/20px Arial,Helvetica,sans-serif; padding:5px;'>".$howlonghaveyoubeenassociatedwitheachother."</td>
						</tr>
						<tr>
							<td bgcolor='#d5ecff' align='right' valign='middle' style='color: #191919; font: normal 12px/20px Arial,Helvetica,sans-serif; padding:5px;'>Are you working together on other projects as well? :</td>
							<td bgcolor='#d5ecff' align='left' valign='middle' style='color: #191919; font: normal 12px/20px Arial,Helvetica,sans-serif; padding:5px;'>".$areyouworkingtogetheronotherprojectsaswell."</td>
						</tr>
						<tr>
							<td bgcolor='#d5ecff' align='right' valign='middle' style='color: #191919; font: normal 12px/20px Arial,Helvetica,sans-serif; padding:5px;'>How muchtime in a day can you spend near the store? :</td>
							<td bgcolor='#d5ecff' align='left' valign='middle' style='color: #191919; font: normal 12px/20px Arial,Helvetica,sans-serif; padding:5px;'>".$howmuchtimeinadaycanyouspendnearthestore."</td>
						</tr>
						<tr>
							<td bgcolor='#d5ecff' align='right' valign='middle' style='color: #191919; font: normal 12px/20px Arial,Helvetica,sans-serif; padding:5px;'>Is your comapny accredited to any other food related business? :</td>
							<td bgcolor='#d5ecff' align='left' valign='middle' style='color: #191919; font: normal 12px/20px Arial,Helvetica,sans-serif; padding:5px;'>".$isyourcomapnyaccreditedtoanyotherfoodrelatedbusiness."</td>
						</tr>
						<tr>
							<td bgcolor='#d5ecff' align='right' valign='middle' style='color: #191919; font: normal 12px/20px Arial,Helvetica,sans-serif; padding:5px;'>If yes provide details :</td>
							<td bgcolor='#d5ecff' align='left' valign='middle' style='color: #191919; font: normal 12px/20px Arial,Helvetica,sans-serif; padding:5px;'>".$ifyesprovidedetails."</td>
						</tr>
						<tr>
    <td colspan='2' bgcolor='#d5ecff' style='color: #1f1f1f; font: 14px/20px Arial;'><p style='padding:10px; margin:0px;'></p></td>
  </tr><tr>
    <td colspan='2' bgcolor='#009ddc' style='color: #FFFFFF; font: 14px/20px Arial;'><p style='padding:30px; margin:0px;'></p></td>
  </tr>
						</table>";
	 $headers = "MIME-Version: 1.0" . "\r\n";
	 $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
	 $headers .= 'From: '.$email_from."\r\n".
	 'Reply-To: '.$email_from."\r\n" .
	 'X-Mailer: PHP/' . phpversion();
	 @mail($email_to, $email_subject, $email_message, $headers);
	 header("Location:http://pakodifactory.in");
	 }

?>
