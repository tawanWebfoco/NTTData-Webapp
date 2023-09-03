<?php
class Connection
{
  private static function getConnection()
  {
    // $conn = new mysqli('db', 'root', '', 'wpdatabase');
    // $conn = new mysqli('127.0.0.1:3307', 'root', '', 'wp_lpnttdata');
    // $conn = new mysqli('localhost', 'root', '', 'webappwebfoco_nttdata');
    $conn = new mysqli('localhost', 'webappwebfoco_nttdata', 'qMg[iv2!n~#*', 'webappwebfoco_nttdata');
    // $conn = new mysqli('localhost', 'root', '', 'wp_lpnttdata');

    if ($conn->connect_error) {
      die('Erro: ' . $conn->connect_error);
    }

    return $conn;
  }

  public static function getResultFromQuery($sql)
  {
    $conn = self::getConnection();
    $result = $conn->query($sql);
    return $result->fetch_assoc();
  }

  public static function all($sql)
  {
    $conn = self::getConnection();
    $result = $conn->query($sql);
    return $result->fetch_all();
  }

  public static function one($sql)
  {
    $conn = self::getConnection();
    $result = $conn->query($sql);
    return $result->fetch_assoc();
  }

  public static function execute($sql)
  {
    $conn = self::getConnection();
    if ($conn->query($sql) === FALSE) {
      return false;
    }

    return true;
  }
}

/**
 * Type: Post
 * Send Data Request: FormData
 * Params: id_user, time_score, time_stop
 */
function register_timer_callback()
{
  date_default_timezone_set('America/Sao_Paulo');
  $id_user = intval($_POST['id_user']);
  $time_stop = $_POST['time_stop'];
  $time_start = $_POST['time_start'];
  $time_score = intval($_POST['time_score']);
  $country = $_POST['country'];
  $date = str_replace('=','T',date('Y-m-d=H:i:s'));

  $sql_get_score_from_current_date = "SELECT SUM(score) as score FROM wp_app_time WHERE id_user = $id_user AND DATE(date) = CURDATE();";
  $scoreCurrentDay =  Connection::one($sql_get_score_from_current_date)['score'];

  $limitInsertDataBase = 240 - $scoreCurrentDay;

  $scoreInsertDataBase = ($time_score > $limitInsertDataBase) ? $limitInsertDataBase : $time_score;

 

  $sql_insert_time = "INSERT INTO wp_app_time (id_time, id_user, time_start, time_stop, date, trash, status, score) 
  VALUES (NULL, $id_user, '$time_start', '$time_stop', '$date', 0, 'stopped', $scoreInsertDataBase)";

  $sql_update_score = "UPDATE wp_app_user SET score = score + $scoreInsertDataBase WHERE id_user = $id_user";

  $sql_insert_engaged = "INSERT INTO wp_app_engaged (id_engaged, id_user, type, date, country, trash)
  VALUES (NULL, $id_user, 'cron', '$date', '" . $country . "', null)";

  Connection::execute($sql_insert_time);
  Connection::execute($sql_update_score);
  Connection::execute($sql_insert_engaged);
  
  $response = array(
    'message' => "Tempo registrado com sucesso current: $scoreCurrentDay , limit, $limitInsertDataBase, score: $time_score",
    '$_POST' => $_POST
  );
  return new WP_REST_Response($response, 200);
}


add_action('rest_api_init', function () {

  register_rest_route(
    'timer',
    'register',
    array(
      'methods' => 'POST',
      'callback' => 'register_timer_callback',
    )
  );
});

function user_logout_callback()
{
  session_start();
  userLogoutJS();
  session_destroy();
  return new WP_REST_Response('', 200);
}

add_action('rest_api_init', function () {
  register_rest_route(
    'user',
    'logout',
    array(
      'methods' => 'GET',
      'callback' => 'user_logout_callback',
    )
  );
});