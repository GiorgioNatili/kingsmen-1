<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// change site url, Ex: localhost to live site


$CI=& get_instance();
if (getenv("ENV") == 'production') {
	//this code is for appfog
	// the next two lines provided by appfog
	$services_json = json_decode(getenv("VCAP_SERVICES"),true);
	$mysql_config = $services_json["mysql-5.1"][0]["credentials"];


	$config["db_hostname"] = $mysql_config["hostname"];
	$config["db_username"] = $mysql_config["username"];
	$config["db_password"] = $mysql_config["password"];
	$config["db_name"]	   = $mysql_config["name"];

}else{
	// change database connection info
	$config["db_hostname"] = 'localhost';
	$config["db_username"] = 'i';
	$config["db_password"] = 'i';
	$config["db_name"] 	   = 'kingsmen';
	// local server site url, overiding the base url in config.php
	$CI->config->set_item('base_url', 'http://localhost:8888/kingsmen/');
	// remove the index.php from url, don't forget to update htaccess file
	$CI->config->set_item('index_page', '');
}


// config email server
$config['email_username'] = 'bigtrouble1212@gmail.com';
$config['email_password'] =  'porschegt3';

$config['site_name'] = 'kingsmen';

