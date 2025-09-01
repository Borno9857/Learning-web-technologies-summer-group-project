<?php
// helpers/Validation.php
class Validation {
  public static function required($v) { return isset($v) && trim($v) !== ''; }
  public static function email($v) { return filter_var($v, FILTER_VALIDATE_EMAIL); }
  public static function minlen($v, $n) { return mb_strlen($v) >= $n; }
  public static function match($a, $b) { return $a === $b; }
  public static function errors() { return $_SESSION['errors'] ?? []; }
  public static function set_error($field, $msg) { $_SESSION['errors'][$field]=$msg; }
  public static function clear() { unset($_SESSION['errors']); }
}
