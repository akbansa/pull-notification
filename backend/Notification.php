<?php
/**
 * Created by PhpStorm.
 * User: akbansal
 * Date: 11/12/17
 * Time: 10:05 PM
 */

class Notification
{

  /**
   * @var mysqli
   */
  protected  $connection;

  /**
   * @var array
   */
  protected $texts = [
      'Someone poked you!',
      'AkBansal tagged you in a photo.',
      'Someone liked your photo.',
      'Your request has been accepted.'
  ];

  /**
   * Notification constructor.
   * @param \Database $database
   */
  public function __construct(Database $database)
  {
    $this->connection  = $database->connect();
  }

  public function create()
  {
    $key = array_rand($this->texts);

    echo mysqli_query($this->connection, "INSERT INTO notifications (text) VALUES('{$this->texts[$key]}')");
  }

  public function getCount()
  {
    echo mysqli_num_rows(mysqli_query($this->connection,"SELECT * FROM notifications where is_read = 0"));
  }

  public function getNotifications()
  {
    $result = mysqli_query($this->connection,"SELECT * FROM notifications ORDER BY id DESC");

    while ($notification = mysqli_fetch_assoc($result)) {
      if ($notification['is_read']==0) {
        echo "<div class='notif_box'><span class='dropdown-item'>".$notification['text']."</span></div>";
      } else {
        echo "<div class='notif_box active_box'><span class='dropdown-item'>".$notification['text']."</span></div>";
      }
    }

    $this->updateStatus();
  }

  public function updateStatus()
  {
    mysqli_query($this->connection, "UPDATE notifications SET is_read = 1");
  }
}