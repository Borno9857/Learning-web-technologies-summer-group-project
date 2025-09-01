<?php
// config/init.php
session_start();
date_default_timezone_set('Asia/Dhaka');

define('APP_NAME', 'Fix Life');
define('BASE_URL', rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\'));

require_once __DIR__.'/../helpers/CookieStore.php';
require_once __DIR__.'/../helpers/Validation.php';

// Simple flash messaging via session
function flash($key, $msg=null) {
  if ($msg !== null) { $_SESSION['flash'][$key] = $msg; return; }
  if (isset($_SESSION['flash'][$key])) { $m = $_SESSION['flash'][$key]; unset($_SESSION['flash'][$key]); return $m; }
  return null;
}

// Load current user from session
function current_user() {
  return $_SESSION['user'] ?? null;
}

function is_logged_in() {
  return !!current_user();
}

// csrf token
if (empty($_SESSION['csrf'])) {
  $_SESSION['csrf'] = bin2hex(random_bytes(16));
}
function csrf_field() {
  $t = htmlspecialchars($_SESSION['csrf'] ?? '', ENT_QUOTES, 'UTF-8');
  echo '<input type="hidden" name="csrf" value="'.$t.'">';
}
function csrf_check() {
  if (!isset($_POST['csrf']) || $_POST['csrf'] !== ($_SESSION['csrf'] ?? '')) {
    http_response_code(400);
    die('CSRF validation failed.');
  }
}
