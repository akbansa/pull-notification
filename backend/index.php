<?php
/**
 * Created by PhpStorm.
 * User: akbansal
 * Date: 11/12/17
 * Time: 10:21 PM
 */

require_once('config.php');
require_once('Database.php');
require_once('Notification.php');

$validFunctions = array("create", "getCount", "getNotifications", "updateStatus");

$requestedFunction = $_GET['func'];

if(in_array($requestedFunction, $validFunctions)) {

  $db_connection = new Database($servername, $db_name, $username, $password);

  $notification = new Notification($db_connection);

  if($requestedFunction == "getCount") {
    $notification->getCount();
  }
  if($requestedFunction == "getNotifications") {
    $notification->getNotifications();
  }
  if($requestedFunction == "create") {
    $notification->create();
  }

} else {

  $arr = array('message' => 'The method you are trying to access in not found.'); //etc

  header('HTTP/1.1 404 Not Found');

  echo json_encode($arr);

  exit();

}

?>