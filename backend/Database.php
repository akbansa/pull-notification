<?php
/**
 * Created by PhpStorm.
 * User: akbansal
 * Date: 11/12/17
 * Time: 10:09 PM
 */

class Database
{
  protected $db_host, $db_name, $db_user, $db_password;

  /**
   * Database constructor.
   * @param $db_host
   * @param $db_name
   * @param $db_user
   * @param $db_password
   */
  public function __construct($db_host, $db_name, $db_user, $db_password)
  {
    $this->db_host = $db_host;
    $this->db_name = $db_name;
    $this->db_user = $db_user;
    $this->db_password = $db_password;
  }

  public function connect()
  {
    $conn = mysqli_connect($this->db_host, $this->db_user, $this->db_password, $this->db_name);

    // Check connection
    if (mysqli_connect_errno())
    {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    return $conn;
  }

}