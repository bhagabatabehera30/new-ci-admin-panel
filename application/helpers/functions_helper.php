<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* 
Private common functions
Author: Bhagabat Behera
*/
// array_dropdown: 
function array_dropdown( $arr, $sel_value='', $name='', $extra='', $choose_one='', $arr_skip= array())
{
	$combo="<select name='$name' id='$name' $extra >";
	if($choose_one!=''){
		$combo.="<option value=\"\">$choose_one</option>";
	}
	foreach($arr as $key => $value)
	{
		if(is_array($arr_skip) && in_array($key, $arr_skip)) {
			continue;
		}
		$combo.='<option value="'.htmlspecialchars($key).'"';
		if(is_array($sel_value)) {
			if(in_array($key, $sel_value) || in_array(htmlspecialchars($key), $sel_value)) {
				$combo.=" selected ";
			}
		} else {
			if($sel_value==$key || $sel_value==htmlspecialchars($key)) {
				$combo.=" selected ";
			}
		}
		$combo.=" >$value</option>";
	}
	$combo.=" </select>";
	return $combo;
}
function status_dropdown($name, $sel_value)
{
	$arr = array( "1" => 'Active', '0' => 'Inactive');
	return array_dropdown($arr, $sel_value, $name);
}

function features_dropdown($name, $sel_value)
{
	$arr = array( "Featured" => 'Featured', 'Unfeatured' => 'Unfeatured');
	return array_dropdown($arr, $sel_value, $name);
}

function yes_no_dropdown($name, $sel_value)
{
	$arr = array( "Y" => 'Yes', 'N' => 'No');
	return array_dropdown($arr, $sel_value, $name);
}

//------ session messages-------------------------------------------------------------------------

function display_session_msg()
{
	//echo "<p class=msg>". $_SESSION['sessionMsg'] . "</p>";
	
	echo "<p style='text-align:center;'>". $_SESSION['sessionMsg'] . "</p>";
	
	unset($_SESSION['sessionMsg']);
}
function display_session_mssg()
{
	echo "<p class='td-admin' style='color:red;font-weight:bold;'>". $_SESSION['sessionMsg'] . "</p>";
	
	unset($_SESSION['sessionMsg']);
}
function display_session_mssg_white()
{
	echo "<p class='td-admin' style='color:#fff;font-weight:bold;'>". $_SESSION['sessionMsg'] . "</p>"; 
	
	unset($_SESSION['sessionMsg']);
}

function display_sessmsg()
{
	echo "<p style='color:red;font-weight:bold;'>". $_SESSION['sessionMssg'] . "</p>";
	
	unset($_SESSION['sessionMssg']);
}


//---------------------function date-time-am/pm-----------------------------------------------------------------

function display_date($date)
{
	if($date!='')
	{
		return date("d M,Y",strtotime($date));
	}
} 

function date_time($datetime){
	if($datetime!=""){
		$datetime=explode(" ",$datetime);
		$date=$datetime[0];  // Y-m-d
		$time=$datetime[1];  // H-i-s
		$am_pm=$datetime[2];  // AM or PM
		//------get---y-m-d-------------
		$date=explode('-',$date);
		$Y=$date[0];
		$m=$date[1];
		$d=$date[3];
	}
	switch($m){
		case '01' : $m="JANUARY";
		break;
		case '02' : $m="FEBRUARY";
		break;
		case '03' : $m="MARCH";
		break;
		case '04' : $m="APRIL";
		break;
		case '05' : $m="MAY";
		break;
		case '06' : $m="JUNE";
		break;
		case '07' : $m="JULY";
		break;
		case '08' : $m="AUGUST";
		break;
		case '09' : $m="SEPTEMBER";
		break;
		case '10': $m="OCTOBER";
		break;
		case '11' : $m="NOVEMBER";
		break;
		case '12' : $m="DECEMBER";
		break;
		
	}
	return $m;
}

function short_month($datetime){

	if($datetime!=""){
		$datetime=explode(" ",$datetime);
		$date=$datetime[0];  // Y-m-d
		$time=$datetime[1];  // H-i-s
		$am_pm=$datetime[2];  // AM or PM
		//------get---y-m-d-------------
		$date=explode('-',$date);
		$Y=$date[0];
		$m=$date[1];
		$d=$date[3];
	}
	switch($m){
		case '01' : $m="JAN";
		break;
		case '02' : $m="FEB";
		break;
		case '03' : $m="MAR";
		break;
		case '04' : $m="APR";
		break;
		case '05' : $m="MAY";
		break;
		case '06' : $m="JUN";
		break;
		case '07' : $m="JUL";
		break;
		case '08' : $m="AUG";
		break;
		case '09' : $m="SEPT";
		break;
		case '10': $m="OCT";
		break;
		case '11' : $m="NOV";
		break;
		case '12' : $m="DEC";
		break;
		
	}
	return $m;


}
function day($datetime){
	if($datetime!=""){
		$day=date("D",strtotime($datetime));

	}
	return $day;
}


function short_month2($datetime){

	if($datetime!=""){
		//$datetime=explode(" ",$datetime);
		//$date=$datetime[0];  // Y-m-d
		//$time=$datetime[1];  // H-i-s
		//$am_pm=$datetime[2];  // AM or PM
		//------get---y-m-d-------------
		$date=explode('-',$datetime);
		$Y=$date[0];
		$m=$date[1];
		$d=$date[2];
	}
	switch($m){
		case '01' : $m="JAN";
		break;
		case '02' : $m="FEB";
		break;
		case '03' : $m="MAR";
		break;
		case '04' : $m="APR";
		break;
		case '05' : $m="MAY";
		break;
		case '06' : $m="JUN";
		break;
		case '07' : $m="JUL";
		break;
		case '08' : $m="AUG";
		break;
		case '09' : $m="SEPT";
		break;
		case '10': $m="OCT";
		break;
		case '11' : $m="NOV";
		break;
		case '12' : $m="DEC";
		break;
		
	}
	return $m;


}

//---------------------function date-time-am/pm witth previous time---------------------------------
function get_compairedate($posteddate){
	if($posteddate!=""){
		$today=date("Y-m-d H:i:s A");
		$TD=explode(" ",$today);
		$TD1=explode("-",$TD[0]);
		$TD2=explode("-",$TD[1]);
		$TDAM=$TD[2];
		$TDY=$TD1[0];
		$TDM=$TD1[1];
		$TDD=$TD1[2];
		$LD=explode(" ",$posteddate);
		$LD1=explode("-",$LD[0]);
		$LD2=explode("-",$LD[1]);
		$LDAM=$LD[2];
		$LDY=$LD1[0];
		$LDM=$LD1[1];
		$LDD=$LD1[2];
		//-----------check--the time-------
		if(($TD[2] == $LD[2]) && ($TD[0] == $LD[0])){
			$RTTN=$LD[1]." ".$LD[2];

		}
		else
		{
			
			$RTTN=$posteddate; 

		}

	}
	return  $RTTN;
}
function get_compdate($postdate){
	if($postdate!=""){
		$today=date("Y-m-d H:i:s A");
		$TD=explode(" ",$today);
		$TD1=explode("-",$TD[0]);
		$TD2=explode(":",$TD[1]);
		$TDAM=$TD[2];
		$TDY=$TD1[0];
		$TDM=$TD1[1];
		$TDD=$TD1[2];
		$LD=explode(" ",$postdate);
		$LD1=explode("-",$LD[0]);
		$LD2=explode(":",$LD[1]);
		/*function d_AM(){
		return $LDAM=$LD[2];
		}
		function d_Y(){
		return $LDY=$LD1[0];
		}
		function d_M(){
		return $LDM=$LD1[1];
		}
	    function d_D(){
		return $LDD=$LD1[2];
	}*/


		//-----------check--the time-------
}
	//return true;
}

function timeDiff($starttime, $endtime)
{
	$timespent = strtotime( $endtime)-strtotime($starttime);
	$days = floor($timespent / (60 * 60 * 24)); 
	$remainder = $timespent % (60 * 60 * 24);
	$hours = floor($remainder / (60 * 60));
	$remainder = $remainder % (60 * 60);
	$minutes = floor($remainder / 60);
	$seconds = $remainder % 60;
	$TimeInterval = '';
	if($hours < 0) $hours=0;
	if($hours != 0)
	{
		$TimeInterval = ($hours == 1) ? $hours.' hour' : $hours.' hours';
	}
	if($minutes < 0) $minutes=0;
	if($seconds < 0) $seconds=0;
	$TimeInterval = $minutes.' minutes '. $seconds.' seconds ';


	return $TimeInterval;
}

// date_format1: 
function date_format1($date)
{
	if (strlen($date) >= 10) {
		if ($date == '0000-00-00 00:00:00' || $date	== '0000-00-00') {
			return '';
		}
		$mktime	= mktime(0,	0, 0, substr($date,	5, 2), substr($date, 8,	2),	substr($date, 0, 4));
		return date("M j, Y", $mktime);
	} else {
		return $s;
	}
}

// datetime_format: 
function datetime_format($date)
{
	global $arr_month_short;
	if (strlen($date) >= 10) {
		if ($date == '0000-00-00 00:00:00' || $date	== '0000-00-00') {
			return '';
		}
		$mktime	= mktime(substr($date, 11, 2), substr($date, 14, 2), substr($date, 17, 2),substr($date,	5, 2), substr($date, 8,	2),	substr($date, 0, 4));
		return date("h:i A M j, Y", $mktime);
	} else {
		return $s;
	}
}

// time_format: 
function time_format($time)
{
	if (strlen($time) >= 5)	{
		$hour =	substr($time, 0, 2);
		$hour =	str_pad($hour, 2, "0", STR_PAD_LEFT);

		return $hour . ':' . substr($time, 3, 2) . ' ' . $ampm;
	} else {
		return $s;
	}
}

// date_dropdown: 
function date_dropdown($pre, $selected_date = '', $start_year='', $end_year = '', $sort = 'asc')
{
	$cur_date =	date("Y-m-d");
	$cur_date_day =	substr($cur_date, 8, 2);
	$cur_date_month	= substr($cur_date,	5, 2);
	$cur_date_year = substr($cur_date, 0, 4);

	if ($selected_date != '') {
		$selected_date_day = substr($selected_date,	8, 2);
		$selected_date_month = substr($selected_date, 5, 2);
		$selected_date_year	= substr($selected_date, 0,	4);
	}
	$date_dropdown	.= month_dropdown($pre	. "month", $selected_date_month);
	$date_dropdown	.= day_dropdown($pre .	"day", $selected_date_day);
	// echo($pre . "year: ". $selected_date_year);
	$date_dropdown	.= year_dropdown($pre . "year", $selected_date_year, $start_year,	$end_year,	$sort);
	return $date_dropdown;
}

// month_dropdown: 
function month_dropdown($name,	$selected_date_month = '', $extra='')
{
	global $ARR_MONTHS;

	$date_dropdown	= "	<select	name='$name' $extra> <option value='0'>Month</option>";
	$i = 0;
	foreach ($ARR_MONTHS as $key => $value) {
		$date_dropdown	.= " <option ";
		if ($key == $selected_date_month)	{
			$date_dropdown	.= " selected ";
		}
		$date_dropdown	.= " value='" .	str_pad($key, 2, "0",	STR_PAD_LEFT) .	"'>$value</option>";
	}
	$date_dropdown	.= "</select>";
	return $date_dropdown;
}

// day_dropdown: 
function day_dropdown($name, $selected_date_day = '', $extra='')
{
	$date_dropdown	.= "<select	name='$name' $extra>";
	$date_dropdown	.= "<option	value='0'>Date</option>";
	for($i = 1;$i <= 31;$i++) {
		//$s = date('S', mktime(1, 0,	0, 3, $i, 1970));
		$date_dropdown	.= " <option ";
		if ($i == $selected_date_day) {
			$date_dropdown	.= " selected ";
		}
		$date_dropdown	.= " value='" .	str_pad($i,	2, "0",	STR_PAD_LEFT) .	"'>" . $i .	$s . "</option>";
	}
	$date_dropdown	.= "</select>";
	return $date_dropdown;
}

// year_dropdown: 
function year_dropdown($name, $selected_date_year = '', $start_year =	'',	$end_year = '', $extra='')
{
	if ($start_year	== '') {
		$start_year	= DEFAULT_START_YEAR;
	}
	
	if ($end_year == '') {
		$end_year =	DEFAULT_END_YEAR;
	}

	$date_dropdown	.= "<select	name='$name' $extra>";
	$date_dropdown	.= "<option	value='0'>Year</option>";

	for($i = $start_year; $i <= $end_year; $i++) {
		$date_dropdown	.= " <option ";
		if ($i == $selected_date_year) {
			$date_dropdown	.= " selected ";
		}
		$date_dropdown	.= " value='" .	str_pad($i,	2, "0",	STR_PAD_LEFT) .	"'>" . str_pad($i, 2, "0", STR_PAD_LEFT) .	"</option>";
	}
	$date_dropdown	.= "</select>";
	return $date_dropdown;
}

// time_dropdown: 
function time_dropdown($pre, $selected_time = '')
{
	// echo("<br>selected_time:$selected_time");
	if ($selected_time != '' &&	$selected_time != ':') {
		$selected_hour = substr($selected_time,	0, 2);
		$selected_minute = substr($selected_time, 3, 2);
		/*
		if($selected_hour >11){
			$selected_ampm = "PM";
			$selected_hour -= 12;
		}else{
			$selected_ampm = "AM";
		}
		if($selected_hour==0){
			$selected_hour = 12;
		}
		*/
	}
	$str .= hour_dropdown($pre, $selected_hour);
	$str .= '<b>:</b>';
	$str .= minute_dropdown($pre, $selected_minute);
	return $str;
	// echo	"<br>$selected_hour, $selected_minute $selected_ampm <br>";
}

// hour_dropdown: 
function hour_dropdown($pre, $selected_hour )
{
	$str .= "<select	name='"	. $pre . "hour'>";
	$str .= "<option	value=''>Hour</option>";
	for($i = 0;	$i <= 23; $i++)	{
		$str .= " <option ";
		if ($i == $selected_hour &&	$selected_hour != '') {
			$str .= " selected ";
		}
		$str .= " value='" .	str_pad($i,	2, "0",	STR_PAD_LEFT) .	"'>" . str_pad($i, 2, "0", STR_PAD_LEFT) .	"</option>";
	}
	$str .= "</select>";
	return $str;
}

// minute_dropdown: 
function minute_dropdown($pre, $selected_minute )
{
	$str .= "<select	name='"	. $pre . "minute'>";
	$str .= "<option	value=''>Minute</option>";
	for($i = 0;	$i <= 59; $i = $i +	15)	{
		$str .= " <option ";
		if (str_pad($i,	2, "0",	STR_PAD_LEFT) === strval($selected_minute))	{
			$str .= " selected ";
		}
		$str	.= " value='" .	str_pad($i,	2, "0",	STR_PAD_LEFT) .	"'>" . str_pad($i, 2, "0", STR_PAD_LEFT) .	"</option>";
	}
	$str .= "</select>";
	return $str;
}

// ampm_dropdown: 
function ampm_dropdown($pre, $selected_ampm)
{
	$str .= "<select name='" . $pre . "ampm'>";
	$str .= " <option ";
	if ($selected_ampm=='AM') {
		$str .= " selected ";
	}
	$str .= " value='AM'>AM</option>";
	$str .= " <option ";
	if ($selected_ampm=='PM') {
		$str	.= " selected ";
	}
	$str .= " value='PM'>PM</option>";
	$str .= "</select>";
	return $str;
}


//---------------------function email send---------------------------------



if(!function_exists("send_mail"))
{
	function send_mail($email_to,$subject,$message,$from_email,$from_name='',$html=false)
	{
		if($from_name == '') $from_name=$from_email;
		if($html==true) $headers = "Content-type: text/html; charset=iso-8859-1\r\n";
		else $headers = "Content-type: text/plain; charset=iso-8859-1\r\n";
		$headers .= "From: $from_email \r\n";
		mail($email_to,$subject,$message,$headers);
	}

}

// ms_mail: 
function ms_mail($to, $subject, $message, $arr_headers= array())
{
	$str_headers = '';
	foreach($arr_headers as $name=>$value){
		$str_headers .= "$name: $value\n";
	}
	@mail($to, $subject, $message, $str_headers);
	return true; 
}


//---------function to remove bad cars---------------------------------------------------------------
function removeBadChars($strWords){
	$bad_string = array("select", "drop", ";", "--", "insert","delete", "xp_", "%20union%20", "/*", "*/union/*", "+union+", "load_file", "outfile", "document.cookie", "onmouse", "<script", "<iframe", "<applet", "<meta", "<style", "<form", "<img", "<body", "<link", "_GLOBALS", "_REQUEST", "_GET", "_POST", "include_path", "prefix", "http://", "https://", "ftp://", "smb://" );
	for ($i = 0; $i < count($bad_string); $i++){
		$strWords = str_replace ($bad_string[$i], "", $strWords);
	}
	return $strWords;
}

function stripQuotes($strWords){
	return str_replace("'", "''", $strWords);
}

//-------------------------------------------------------------------------

//----read more--descriptions----

function contents_readmore($string, $nb_caracs, $separator){
	$string = strip_tags(html_entity_decode($string));
	if( strlen($string) <= $nb_caracs ){
		$final_string = $string;
	} else {
		$final_string = "";
		$words = explode(" ", $string);
		foreach( $words as $value ){
			if( strlen($final_string . " " . $value) < $nb_caracs ){
				if( !empty($final_string) ) $final_string .= " ";
				$final_string .= $value;
			} else {
				break;
			}
		}
		$final_string .= $separator;
	}
	return $final_string;
}



function contents_readmore2($string,$no_caracters){

	$string = strip_tags(html_entity_decode($string));
	if (strlen($string) > $no_caracters) {

    // truncate string
		$stringCut = substr($string, 0, $no_caracters);

    // make sure it ends in a word so assassinate doesn't become ass...
		$string = substr($stringCut, 0, strrpos($stringCut, ' ')); 
	}
	else{
		$string=$string;
	}
	return $string;


}
//   only ---contents------------------
function contents($string){
	$string = strip_tags(html_entity_decode($string));
	return $string;
	
}


/*function currency_code() {
		
		$current_place_ip = get_client_ip(); //  for local use static IP
		$finf_geo_details =  unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$current_place_ip));
		return  $finf_geo_details['geoplugin_currencyCode']; //return currency code accoring to location
	}
	
	function client_country() {
		
		$current_place_ip = get_client_ip(); //  for local use static IP
		$finf_geo_details =  unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$current_place_ip));
		return  $finf_geo_details['geoplugin_countryName']." (".$finf_geo_details['geoplugin_countryCode'].")"; //return country name with code accoring to location
	}
	*/
	

	
	
	
	
	
	function get_client_ip()
	{
		$ip= '';
		if (getenv('HTTP_CLIENT_IP'))
			$ip = getenv('HTTP_CLIENT_IP');
		else if(getenv('HTTP_X_FORWARDED_FOR'))
			$ip = getenv('HTTP_X_FORWARDED_FOR');
		else if(getenv('HTTP_X_FORWARDED'))
			$ip = getenv('HTTP_X_FORWARDED');
		else if(getenv('HTTP_FORWARDED_FOR'))
			$ip = getenv('HTTP_FORWARDED_FOR');
		else if(getenv('HTTP_FORWARDED'))
			$ip = getenv('HTTP_FORWARDED');
		else if(getenv('REMOTE_ADDR'))
			$ip = getenv('REMOTE_ADDR');
		else
			$ip = 'UNKNOWN';

		return $ip;
	}


	function RemoveCharacters($string) 
	{
    # Prep string with some basic normalization
		$string = strip_tags($string);
		$string = stripslashes($string);
		$string = html_entity_decode($string);

    # Remove quotes (can't, etc.)
		$string = str_replace('\'', '', $string);

    # Replace non-alpha numeric with hyphens
		$match = '/[^A-Za-z0-9]+/';
		$replace = ' ';
		$string = preg_replace($match, $replace, $string);

		$string = trim($string);

		return $string;
	}
	
	

	function ConvertTitleToUrl($url)
	{
    # Prep string with some basic normalization
		$url = strtolower($url);
		$url = strip_tags($url);
		$url = stripslashes($url);
		$url = html_entity_decode($url);

    # Remove quotes (can't, etc.)
		$url = str_replace('\'', '', $url);

    # Replace non-alpha numeric with hyphens
		$match = '/[^a-z0-9]+/';
		$replace = '-';
		$url = preg_replace($match, $replace, $url);

		$url = trim($url, '-');

		return $url;
	}




	function getJsonDataThoughCurl($ArrayData,$apiUrl){
// $ArrayData = array("no_of_key" => $no_of_key, "plan" => $plan,  "planDays" => $planDays,  "planPrice" => $planPrice);
//--call api through curl---here-------------
		$data_string = json_encode($ArrayData);       
		$ch = curl_init("$apiUrl");
// curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");  
		curl_setopt($ch, CURLOPT_POST, TRUE);                                                                      
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
			'Content-Type: application/json',                                                                                
			'Content-Length: ' . strlen($data_string))                                                                       
	);                                                                                                             $response = curl_exec($ch);
		curl_close($response); 
		return $response; 
// $jsonData=json_decode($response);     
// $TotRequestData=count($jsonData);
	}
	
	function get_domain_or_subdomain($url)
	{
 //$website_url=$_GET['website_url']; 
  // $website_url="https://blog.asset-books.com.uk/test-chat.html";
		if($url!=""){
			$pieces = parse_url($url);
			$domain =$pieces['host'];
			return $domain;
		}
		return false;
	}

 //---get only domain---like--asset-books.com 
	function get_domain_only($url)
	{
		$pieces = parse_url($url);
		$domain = isset($pieces['host']) ? $pieces['host'] : $pieces['path'];
		if (preg_match('/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i', $domain, $regs)) {
			return $regs['domain'];
		}
		return false;
	}

// print get_domain_only("$website_url"); // outputs 'somedomain.co.uk' it is a array();

// get user operating System-----------------

	function getOS($user_agent) { 

    // global $user_agent;

		$os_platform    =   "Unknown OS Platform";

		$os_array       =   array(
			'/windows nt 10/i'     =>  'Windows 10',
			'/windows nt 6.3/i'     =>  'Windows 8.1',
			'/windows nt 6.2/i'     =>  'Windows 8',
			'/windows nt 6.1/i'     =>  'Windows 7',
			'/windows nt 6.0/i'     =>  'Windows Vista',
			'/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
			'/windows nt 5.1/i'     =>  'Windows XP',
			'/windows xp/i'         =>  'Windows XP',
			'/windows nt 5.0/i'     =>  'Windows 2000',
			'/windows me/i'         =>  'Windows ME',
			'/win98/i'              =>  'Windows 98',
			'/win95/i'              =>  'Windows 95',
			'/win16/i'              =>  'Windows 3.11',
			'/macintosh|mac os x/i' =>  'Mac OS X',
			'/mac_powerpc/i'        =>  'Mac OS 9',
			'/linux/i'              =>  'Linux',
			'/ubuntu/i'             =>  'Ubuntu',
			'/iphone/i'             =>  'iPhone',
			'/ipod/i'               =>  'iPod',
			'/ipad/i'               =>  'iPad',
			'/android/i'            =>  'Android',
			'/blackberry/i'         =>  'BlackBerry',
			'/webos/i'              =>  'Mobile'
		);

		foreach ($os_array as $regex => $value) { 

			if (preg_match($regex, $user_agent)) {
				$os_platform    =   $value;
			}

		}   

		return $os_platform;

	}

//-------- get user browser----------------

	function getBrowser($user_agent) {

   //  global $user_agent;

		$browser        =   "Unknown Browser";

		$browser_array  =   array(
			'/msie/i'       =>  'Internet Explorer',
			'/firefox/i'    =>  'Firefox',
			'/safari/i'     =>  'Safari',
			'/chrome/i'     =>  'Chrome',
			'/edge/i'       =>  'Edge',
			'/opera/i'      =>  'Opera',
			'/netscape/i'   =>  'Netscape',
			'/maxthon/i'    =>  'Maxthon',
			'/konqueror/i'  =>  'Konqueror',
			'/mobile/i'     =>  'Handheld Browser'
		);

		foreach ($browser_array as $regex => $value) { 

			if (preg_match($regex, $user_agent)) {
				$browser    =   $value;
			}

		}

		return $browser; 

	}
// get user location---------------------  


/*function UserLocationDetails($ip){
 $json  = file_get_contents("https://freegeoip.net/json/$ip");
 $jsonUserLocation  =  json_decode($json ,true);
 return $jsonUserLocation;
 
}*/ 

function rand_string( $length ) {
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	$size = strlen( $chars );
	$str = '';
	for( $i = 0; $i < $length; $i++ ) {
		$str .= $chars[ rand( 0, $size - 1 ) ];
	}
	return $str;
}  

function rand_str_digits( $length ) {
	$chars = "0123456789";
	$size = strlen( $chars );
	$str = '';
	for( $i = 0; $i < $length; $i++ ) {
		$str .= $chars[ rand( 0, $size - 1 ) ];
	}
	return $str;
} 
function get_rand_lowercasechar_digits( $length ) {
	$chars = "abcdefghijklmnopqrstuvwxyz0123456789";
	$size = strlen( $chars );
	$str = '';
	for( $i = 0; $i < $length; $i++ ) {
		$str .= $chars[ rand( 0, $size - 1 ) ];
	}
	return $str;
}  
function get_rand_uppsercasechar_digits( $length ) {
	$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	$size = strlen( $chars );
	$str = '';
	for( $i = 0; $i < $length; $i++ ) {
		$str .= $chars[ rand( 0, $size - 1 ) ];
	}
	return $str;
}   

function price_format_dollar($price)
{
	if ($price != '' &&	$price != '0') {
		$price = number_format($price, 2);
		return '$'.$price;
	}
}   
function price_format_inr($price)
{
	if ($price != '' &&	$price != '0') {
		$price = number_format($price, 2);
		return '₹'.$price;
	}
}   

function price_format($price, $symbol='') 
{
	if ($price != '' &&	$price != '0') {
		$price = number_format($price, 2);
		return $symbol.$price;
	} 
} 

//---------ms functions----------------------------------------------------


// ms_form_value: 
function ms_form_value($var)
{
	return is_array($var) ? array_map('ms_form_value', $var) : htmlspecialchars(stripslashes(trim($var)));
}

// ms_display_value: 
function ms_display_value($var)
{
	return is_array($var) ? array_map('ms_display_value', $var) : nl2br(htmlspecialchars(stripslashes(trim($var))));
}

// ms_stripslashes: 
function ms_stripslashes($var)
{
	return is_array($var) ? array_map('ms_stripslashes', $var) : stripslashes(trim($var));
}

// ms_addslashes: 
function ms_addslashes($var)
{
	return is_array($var) ? array_map('ms_addslashes', $var) : addslashes(trim($var));
}

// ms_trim: 
function ms_trim($var)
{
	return is_array($var) ? array_map('ms_trim', $var) : trim($var);
}



//-----------file functions---------------------------------------------------------------

function readmyfile($path)
{
	$text='';
	$fp = @fopen($path,"r");
	while (!@feof($fp))
	{
		$buffer = @fgets($fp, 4096);
		$text.= $buffer;
	}
	@fclose($fp);
	return $text;
}	

  // is_image_valid: 
function is_image_valid($file_name)
{
	global $ARR_VALID_IMG_EXTS;
	$ext = file_ext($file_name);
	if (in_array($ext, $ARR_VALID_IMG_EXTS))	{
		return true;
	} else {
		return false;
	}
}

// getmicrotime: 
function getmicrotime()
{
	list($usec,	$sec) =	explode(" ", microtime());
	return ((float)$usec + (float)$sec);
}

// file_ext: 
function file_ext($file_name)
{
	$path_parts = pathinfo($file_name);
	$ext = strtolower($path_parts["extension"]);
	return $ext;
}

// make_thumb_im: 
function make_thumb_im($file_path, $arr_options)
{
	$width		= $arr_options['width'];
	$height		= $arr_options['height'];
	$prefix		= $arr_options['prefix'];
	$target_dir	= $arr_options['target_dir'];
	$quality	= $arr_options['quality'];
	
	$path_parts = pathinfo($file_path);

	if($width==''){
		$width = '120';
	}
	
	if($prefix=='') {
		$prefix = 'thumb_';
	}
	if($target_dir=='') {
		$target_dir = $path_parts["dirname"];
	}

	if($quality=='') {
		$quality = '70';
	}
	
	$size = @getimagesize($file_path);
	if($size=='') {
		return false;
	}
	
	/*
	$ratio = round($width/$height, 2);
	$img_width = $size[0];
	$img_height = $size[1];
	*/

	$path_parts = pathinfo($file_path);

	$thumb_path="$target_dir/".$prefix.$path_parts["basename"];

	$cmd ="convert -resize ".$width.'x'." -quality $quality \"$file_path\" \"$thumb_path\" ";
	system($cmd);
	//echo("<br>$cmd");
	return $prefix.$path_parts["basename"];
}


function unlink_file( $file_name , $folder_name ) 
{
	$file_path = $folder_name."/".$file_name;
	@chmod ($foleder_name , 0777);
	@unlink($file_path);
	return true;	
}


// make_thumb_gd: 
function make_thumb_gd($imgPath, $destPath, $newWidth, $newHeight, $ratio_type = 'width', $quality = 60, $verbose = false)
{ 
	// options for ratio type = width|height|distort|crop

	// get image info (0 width and 1 height, 2 is (1 = GIF, 2 = JPG, 3 = PNG)
	$size = getimagesize($imgPath); 
	// break and return false if failed to read image infos
	if (!$size) {
		if ($verbose) {
			echo "Unable to read image info.";
		}
		return false;
	} 
	$curWidth	= $size[0];
	$curHeight	= $size[1];
	$fileType	= $size[2];
	
	// width/height ratio
	$ratio =  $curWidth/$curHeight;

	$srcX = 0;
	$srcY = 0;
	$srcWidth = $curWidth;
	$srcHeight = $curHeight;

	if($ratio_type=='width') {
		// If the dimensions for thumbnails are greater than original image do not enlarge
		if($newWidth > $curWidth) {
			$newWidth = $curWidth;
		}
		$newHeight	= $newWidth / $ratio;
	} else if($ratio_type=='crop') {
		$thumbRatio = $newWidth / $newHeight;
		if($ratio < $thumbRatio) {
			$srcHeight = round($curHeight*$ratio/$thumbRatio);
			$srcY = round(($curHeight-$srcHeight)/2);
		} else {
			$srcWidth = round($curWidth*$thumbRatio/$ratio);
			$srcX = round(($curWidth-$srcWidth)/2);
		}
		/*echo "<br>curWidth: $curWidth";
		echo "<br>curHeight: $curHeight";
		echo "<br>newWidth: $newWidth";
		echo "<br>newHeight: $newHeight";
		echo "<br>ratio: $ratio";
		echo "<br>thumbRatio: $thumbRatio";
		echo "<br>srcWidth: $srcWidth";
		echo "<br>srcX: $srcX";
		echo "<br>srcHeight: $srcHeight";
		echo "<br>srcY: $srcY";*/
	} else if($ratio_type=='height') {
		// If the dimensions for thumbnails are greater than original image do not enlarge
		if($newHeight > $curHeight) {
			$newHeight = $curHeight;
		}
		$newWidth	= $newHeight * $ratio;
	} else if($ratio_type=='distort') {
	}
	
	// create image
	switch ($fileType) {
		case 1:
		if (function_exists("imagecreatefromgif")) {
			$originalImage = imagecreatefromgif($imgPath);
		} else {
			if ($verbose) {
				echo "GIF images are not support in this php installation.";
				return false;
			}
		} 
		$fileExt = 'gif';
		break;
		case 2: 
		$originalImage = imagecreatefromjpeg($imgPath);
		$fileExt = 'jpg';
		break;
		case 3: 
		$originalImage = imagecreatefrompng($imgPath);
		$fileExt = 'png';
		break;
		default:
		if ($verbose) {
			echo "Not a valid image type.";
		}
		return false;
	} 
	// create new image

	$resizedImage = imagecreatetruecolor($newWidth, $newHeight);
	//echo "$srcX, $srcY, $newWidth, $newHeight, $curWidth, $curHeight";
	//echo "<br>$srcX, $srcY, $newWidth, $newHeight, $srcWidth, $srcHeight<br>";
	imagecopyresampled($resizedImage, $originalImage, 0, 0, $srcX, $srcY, $newWidth, $newHeight, $srcWidth, $srcHeight);
	switch ($fileExt) {
		case 'gif':
		imagegif($resizedImage, $destPath, $quality);
		break;
		case 'jpg': 
		imagejpeg($resizedImage, $destPath, $quality);
		break;
		case 'png': 
		imagepng($resizedImage, $destPath, $quality);
		break;
	} 
	// return true if successfull
	return true;
} 


/*function show_thumb($file_org, $width, $height, $ratio_type = 'width')
{
	$file_name = str_replace(SITE_WS_PATH."/", "", $file_org);
	$file_name = str_replace("/", "^", $file_name);
	$cache_file = $width."x".$height.'__'.$ratio_type .'__'.$file_name;

	$file_fs_path = str_replace(SITE_WS_PATH, SITE_FS_PATH, $file_org);
	if(!is_file(SITE_FS_PATH."/".THUMB_CACHE_DIR."/".$cache_file)) {
		make_thumb_gd($file_fs_path, SITE_FS_PATH."/".THUMB_CACHE_DIR."/".$cache_file, $width, $height, $ratio_type );
	}	
	return SITE_WS_PATH."/".THUMB_CACHE_DIR."/".$cache_file;
}
*/ 

//-----------filters-----------------------------------------------------------


function blank_filter($var)
{
	$var = trim($var);
	return ($var != '' && $var != '&nbsp;');
}

// apply_filter: 
function apply_filter($sql,	$field,	$field_filter, $column)
{
	if (!empty($field))	{
		if ($field_filter == "=" || $field_filter == "") {
			$sql = $sql	. "	and	$column	= '$field' ";
		} else if ($field_filter == "like")	{
			$sql = $sql	. "	and	$column	like '%$field%'	";
		} else if ($field_filter ==	"starts_with") {
			$sql = $sql	. "	and	$column	like '$field%' ";
		} else if ($field_filter ==	"ends_with") {
			$sql = $sql	. "	and	$column	like '%$field' ";
		} else if ($field_filter ==	"not_contains")	{
			$sql = $sql	. "	and	$column	not	like '%$field%'	";
		} else if ($field_filter ==	"!=") {
			$sql = $sql	. "	and	$column	!= '$field'	";
		} else if ($field_filter ==	"IN") {
			$sql = $sql	. "	or $column	IN ($field)	";
		}
	}
	return $sql;
}

// filter_dropdown: 
function filter_dropdown($name	= 'filter',	$sel_value)
{
	$arr = array( "like" => 'Contains', '=' => 'Is', "starts_with" => 'Starts with', "ends_with"	=> 'Ends with', "!=" => 'Is not' , "not_contain" => 'Not contains');
	return array_dropdown($arr, $sel_value, $name);
}

// make_url: 
function make_url($url)
{
	$parsed_url	= parse_url($url);
	if ($parsed_url['scheme'] == '') {
		return 'http://' . $url;
	} else {
		return $url;
	}
}

function checkpoint($from_start = false)
{
	global $TMP_CHECKPOINT;
	if($TMP_CHECKPOINT==''){
		$TMP_CHECKPOINT = SCRIPT_START_TIME;
	}
	if($from_start) {
		$TMP_CHECKPOINT = getmicrotime()- SCRIPT_START_TIME;
		return getmicrotime()-SCRIPT_START_TIME;
	} else {
		$TMP_CHECKPOINT = getmicrotime()-SCRIPT_START_TIME;
		return $TMP_CHECKPOINT;
	}
}

// readable_col_name: 
function readable_col_name($str) 
{
	return ucwords( str_replace('_', ' ', strtolower($str) ) );
}


// make_checkboxes:  
function make_checkboxes($manutmp, $checkname, $checksel = '', $cols,	$missit, $style	= '', $tableattr = '')
{
	if ($style != "") {
		$style = "class='" . $style	. "'";
	}

	$colwidth =	100	/ $cols;
	$colwidth =	round($colwidth, 2);
	$j = 1;
	/*
	$manutmp['Any']="Any";
	if($checksel==''){
		$checksel=Array("Any");
	}
	*/
	foreach($manutmp as	$key =>	$value)	{
		$tochecked = "";
		if (is_array($checksel)	&& in_array($key, $checksel)) {
			$tochecked = "checked";
		}
		if ($key !=	$missit) {
			if ($value != "") {
				if ($j == 1) {
					$checkstr .= "<table $tableattr><tr>\n";
				} else if (($j % $cols)	== 1) {
					$checkstr .= "</tr><tr>\n";
				}
				$checkstr .= "<td width='" . $colwidth . "%' $style	valign=top><INPUT TYPE='checkbox' $javascript	 NAME='$checkname" . '[]' .	"' value='$key'	$tochecked	   > $value	</td>\n";
				$j++;
			}
		}
	}
	$j--;
	// echo	"$cols-($j%$cols)=".$cols-($j%$cols);
	// echo	"<BR>($j%$cols)=".($j%$cols);
	for($x = $j	% $cols;$x < 4;$x++) {
		if ($x != 3) {
			$checkstr .= "<td>&nbsp;</td>\n";
		} else {
			$checkstr .= "<td>&nbsp;</td></tr>\n";
		}
	}
	$checkstr .= "</table>";
	return $checkstr;
}

// make_radios: 
function make_radios($manutmp, $checkname, $checksel = '', $cols,	$missit, $style	= '', $tableattr = '')
{
	if ($style != "") {
		$style = "class='" . $style	. "'";
	}

	$colwidth =	100	/ $cols;
	$colwidth =	round($colwidth, 2);
	$j = 1;
	/*
	$manutmp['Any']="Any";
	if($checksel==''){
		$checksel=Array("Any");
	}
	*/
	foreach($manutmp as	$key =>	$value)	{
		$tochecked = "";
		if ($checksel == $key) {
			$tochecked = "checked";
		}
		if ($key !=	$missit) {
			if ($value != "") {
				if ($j == 1) {
					$checkstr .= "<table $tableattr><tr>\n";
				} else if (($j % $cols)	== 1) {
					$checkstr .= "</tr><tr>\n";
				}
				$checkstr .= "<td width='" . $colwidth . "%' $style	valign=top><INPUT TYPE='radio' $javascript	 NAME='$checkname' value='$key'	$tochecked	   > $value	</td>\n";
				$j++;
			}
		}
	}
	$j--;
	// echo	"$cols-($j%$cols)=".$cols-($j%$cols);
	// echo	"<BR>($j%$cols)=".($j%$cols);
	for($x = $j	% $cols;$x < 4;$x++) {
		if ($x != 3) {
			$checkstr .= "<td>&nbsp;</td>\n";
		} else {
			$checkstr .= "<td>&nbsp;</td></tr>\n";
		}
	}
	$checkstr .= "</table>";
	return $checkstr;
}

// get_qry_str: 
function get_qry_str($over_write_key = array(),	$over_write_value =	array())
{
	global $_GET;
	$m = $_GET;
	if (is_array($over_write_key)) {
		$i = 0;
		foreach($over_write_key	as $key) {
			$m[$key] = $over_write_value[$i];
			$i++;
		}
	} else {
		$m[$over_write_key]	= $over_write_value;
	}
	$qry_str = qry_str($m);
	return $qry_str;
}

// qry_str: 
function qry_str($arr, $skip = '')
{
	$s = "?";
	$i = 0;
	foreach($arr as	$key =>	$value)	{
		if ($key !=	$skip) {
			if (is_array($value)) {
				foreach($value as $value2) {
					if ($i == 0) {
						$s .= $key . '[]=' . $value2;
						$i = 1;
					} else {
						$s .= '&' .	$key . '[]=' . $value2;
					}
				}
			} else {
				if ($i == 0) {
					$s .= "$key=$value";
					$i = 1;
				} else {
					$s .= "&$key=$value";
				}
			}
		}
	}
	return $s;
}

// check_radio: 
function check_radio($s, $s2)
{
	if (is_array($s2)) {
		// echo("<br>$s");
		// print_r($s2);
		if (in_array($s, $s2)) {
			return " checked ";
		}
	} else if ($s == $s2) {
		return " checked ";
	}
}

// sort_arrows: Updated  Oct 2010
function sort_arrows($column)
{
	//return '<A HREF="' . $_SERVER['PHP_SELF'] .	get_qry_str(array('order_by', 'order_by2'),	array($column, 'asc')) . '"><img src="'.SITE_WS_PATH.'/images/up_arrow.gif" border="0"></a>	<a href="'	. $_SERVER['PHP_SELF'] . get_qry_str(array('order_by', 'order_by2'), array($column,	'desc')) . '"><img src="'.SITE_WS_PATH.'/images/down_arrow.gif" border="0"></a>';
	return '<A HREF="' . $_SERVER['PHP_SELF'] .	get_qry_str(array('order_by', 'order_by2'),	array($column, 'asc')) . '"><img src="images/white_up.gif" border="0"></a>	<a href="'	. $_SERVER['PHP_SELF'] . get_qry_str(array('order_by', 'order_by2'), array($column,	'desc')) . '"><img src="images/white_down.gif" border="0"></a>';
}


// sort_arrows: Updated  march 2017



function sorting_arrows($column)
{
	
	
	return '<A HREF="' . $_SERVER['PHP_SELF'] .	get_qry_str(array('order_by', 'order_by2'),	array($column, 'asc')) . '"><i class="glyph-icon icon-arrow-up font-bold" style="font-size:9px !important"></i></a>	<a href="'	. $_SERVER['PHP_SELF'] . get_qry_str(array('order_by', 'order_by2'), array($column,	'desc')) . '"><i class="glyph-icon icon-arrow-down font-bold" style="font-size:9px !important"></i></a>';
}


function sorting_arrows_tpl2($column)
{
	
	
	return '<a href="' . $_SERVER['PHP_SELF'] .	get_qry_str(array('order_by', 'order_by2'),	array($column, 'asc')) . '"><i class="glyphicon glyphicon-arrow-up font-bold" style="font-size:9px !important"></i></a>	<a href="'	. $_SERVER['PHP_SELF'] . get_qry_str(array('order_by', 'order_by2'), array($column,	'desc')) . '"><i class="glyphicon glyphicon-arrow-down font-bold" style="font-size:9px !important"></i></a>'; 
}  



// select_option:    
function select_option($s, $s1)
{
	if ($s == $s1) {
		echo " selected	";
	}
}

// --check post array------------

function is_post_back(){
	if(count($_POST)>0) {
		return true;
	} else {
		return false;
	}
}

// request_to_hidden: 
function request_to_hidden($arr_skip='') 
{
	foreach($_REQUEST as $name => $value) {
		$s .= '<input type="hidden" name="'.$name.'" value="'.htmlspecialchars(stripslashes($value)).'">'."\n";
	}
	return $s;
}


// array_radios: 
function array_radios($arr, $sel_value = '', $name = '', $cols = 3, $extra = '')
{
	if ($style != "") {
		$style = "class='" . $style . "'";
	} 

	$colwidth = 100 / $cols;
	$colwidth = round($colwidth, 2);
	$j = 1;
	/*
	$manutmp['Any']="Any";
	if($checksel==''){
		$checksel=Array("Any");
	}
	*/
	foreach($arr as $key => $value) {
		$tochecked = "";
		if (is_array($sel_value) && in_array($key, $sel_value)) {
			$tochecked = "checked";
		} 
		if ($key != $missit) {
			if ($value != "") {
				if ($j == 1) {
					$checkstr .= "<table $tableattr><tr>\n";
				} else if (($j % $cols) == 1 || $cols==1) {
					$checkstr .= "</tr><tr>\n";
				} 

				$checkstr .= "<td width='" . $colwidth . "%' $style valign=top><INPUT TYPE='radio' $javascript  NAME='$name' value='$key' $tochecked     > $value </td>\n";
				$j++;
			} 
		} 
	} 
	$j--; 
	// echo "$cols-($j%$cols)=".$cols-($j%$cols);
	// echo "<BR>($j%$cols)=".($j%$cols);
	for($x = $j % $cols;$x < 4;$x++) {
		if ($x != 3) {
			$checkstr .= "<td>&nbsp;</td>\n";
		} else {
			$checkstr .= "<td>&nbsp;</td></tr>\n";
		} 
	} 
	$checkstr .= "</table>";
	return $checkstr;
} 


// ms_parse_keywords: 
// Temporary function. Need to be made more elegant or replace with regular expression
function ms_parse_keywords($keywords)
{
	$arr_keywords = array();
	$dq_end =true;
	$sp_end = true;
	for ($i=0;$i<strlen($keywords);$i++) {
		//echo "<br>cur_token:$cur_token, cur_keyword:$cur_keyword, dq_start:$dq_start, dq_end:$dq_end, sp_start:$sp_start, sp_end:$sp_end,";
		$cur_token = $keywords[$i];
		if($cur_token=='"') {
			if($dq_start) {
				$dq_end = true;
				$dq_start = false;
				$arr_keywords[] = $cur_keyword;
				$cur_keyword = '';
			} else if($dq_end) {
				$dq_end = false;
				$dq_start = true;
				$sp_start = false;
			} else {
				$dq_end = false;
				$dq_start = true;
			}
		} else if($cur_token==' ') {
			if($sp_start || $dq_end) {
				$sp_end = true;
				$sp_start = false;
				$arr_keywords[] = $cur_keyword;
				$cur_keyword = '';
			} else if($sp_end && !$dq_start) {
				$sp_end = false;
				$sp_start = true;
			} else if($dq_start) {
				$cur_keyword .= $cur_token;
			}
		} else {
			$cur_keyword .= $cur_token;
		}
	}

	$arr_keywords[] =$cur_keyword;
	return $arr_keywords;
}

// validate_form: 
function validate_form()
{
	return ' onsubmit="return validateForm(this,0,0,0,1,8);" ';
}

// pagesize_dropdown: 
function pagesize_dropdown($name, $value)
{
	$arr = array('10'=>'10','25'=>'25','50'=>'50','100'=>'100');
	$m = $_GET;
	unset($m['pagesize']);
	return array_dropdown($arr, $value , $name, '  onchange="location.href=\''.$_SERVER['PHP_SELF'].qry_str($m).'&pagesize=\'+this.value" ');
}


function implodeList($arr, $seperator)
{
	$seperatedList = implode($seperator, $arr);
	return $seperatedList;
}

function generatePassword($length=5, $strength=4) {
	$vowels = 'aeuy';
	$consonants = 'BDGHJLMNPQRSTVWXZ';
	if ($strength & 1) {
		$consonants .= 'BDGHJLMNPQRSTVWXZ';
	}
	if ($strength & 2) {
		$vowels .= "AEUY";
	}
	if ($strength & 4) {
		$consonants .= '23456789';
	}
	if ($strength & 8) {
		$consonants .= '@#$%';
	}

	$password = '';
	$alt = time() % 2;
	for ($i = 0; $i < $length; $i++) {
		if ($alt == 1) {
			$password .= $consonants[(rand() % strlen($consonants))];
			$alt = 0;
		} else {
			$password .= $vowels[(rand() % strlen($vowels))];
			$alt = 1;
		}
	}
	return $password;
}

