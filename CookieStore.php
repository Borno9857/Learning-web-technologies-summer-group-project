<?php
// helpers/CookieStore.php
class CookieStore {
  private static function get($key) {
    if (!isset($_COOKIE[$key])) return null;
    $json = base64_decode($_COOKIE[$key]);
    return json_decode($json, true);
  }
  private static function set_raw($key, $value, $days=30) {
    $json = json_encode($value, JSON_UNESCAPED_UNICODE);
    $b64 = base64_encode($json);
    setcookie($key, $b64, time()+60*60*24*$days, '/', '', false, true);
  }
  public static function allUsers() {
    return self::get('users') ?? [];
  }
  public static function saveUsers($users) {
    self::set_raw('users', $users);
  }
  public static function getUserByEmail($email) {
    $users = self::allUsers();
    foreach ($users as $u) if ($u['email'] === strtolower($email)) return $u;
    return null;
  }
  public static function saveUser($user) {
    $users = self::allUsers();
    $found = false;
    foreach ($users as &$u) {
      if ($u['email'] === $user['email']) { $u = $user; $found = true; break; }
    }
    if (!$found) $users[] = $user;
    self::saveUsers($users);
  }
}
