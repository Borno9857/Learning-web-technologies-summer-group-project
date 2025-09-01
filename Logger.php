<?php
// helpers/Logger.php

class Logger {

  // return all logs
  private static function getLogs() {
    if (!isset($_COOKIE['activity'])) return [];
    return json_decode(base64_decode($_COOKIE['activity']), true) ?? [];
  }

  // save log on cookies
  private static function saveLogs($logs) {
    $b = base64_encode(json_encode($logs, JSON_UNESCAPED_UNICODE));
    setcookie('activity', $b, time()+60*60*24*365, '/', '', false, true);
  }

  // add new logs
  public static function info($userEmail, $action, $meta=[]) {
    $logs = self::getLogs();
    $logs[] = [
      'time'  => date('Y-m-d H:i:s'),
      'user'  => $userEmail,
      'action'=> $action,
      'meta'  => $meta
    ];
    self::saveLogs($logs);
  }

  // Get all
  public static function all() {
    return self::getLogs();
  }

  // Log Clear
  public static function clear() {
    self::saveLogs([]);
  }
}
