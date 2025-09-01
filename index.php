<?php
require_once __DIR__.'/config/init.php';
require_once __DIR__.'/controllers/AuthController.php';
require_once __DIR__.'/controllers/JobController.php';
require_once __DIR__.'/controllers/ProfileController.php';
require_once __DIR__.'/controllers/AdminController.php';
require_once __DIR__.'/controllers/PageController.php';

$route = $_GET['r'] ?? 'home';

if ($route === 'home') {
  include __DIR__.'/views/pages/home.php';
} elseif ($route === 'login' && $_SERVER['REQUEST_METHOD']==='GET') {
  AuthController::showLogin();
} elseif ($route === 'login' && $_SERVER['REQUEST_METHOD']==='POST') {
  AuthController::loginPost();
} elseif ($route === 'register' && $_SERVER['REQUEST_METHOD']==='GET') {
  AuthController::showRegister();
} elseif ($route === 'register' && $_SERVER['REQUEST_METHOD']==='POST') {
  AuthController::registerPost();
} elseif ($route === 'logout') {
  AuthController::logout();
} elseif ($route === 'jobs') {
  JobController::index();
} elseif ($route === 'job') {
  JobController::details();
} elseif ($route === 'save') {
  JobController::save();
} elseif ($route === 'saved') {
  JobController::saved();
} elseif ($route === 'search') {
  JobController::search();
} elseif ($route === 'profile') {
  ProfileController::view();
} elseif ($route === 'profile.edit') {
  ProfileController::edit();
} elseif ($route === 'profile.update' && $_SERVER['REQUEST_METHOD']==='POST') {
  ProfileController::update();
} elseif ($route === 'forgot' && $_SERVER['REQUEST_METHOD']==='GET') {
  AuthController::forgot();
} elseif ($route === 'forgot' && $_SERVER['REQUEST_METHOD']==='POST') {
  AuthController::forgotPost();
} elseif ($route === 'reset' && $_SERVER['REQUEST_METHOD']==='GET') {
  AuthController::reset();
} elseif ($route === 'reset' && $_SERVER['REQUEST_METHOD']==='POST') {
  AuthController::resetPost();
} elseif ($route === 'admin' ) {
  AdminController::dashboard();
} elseif ($route === 'admin.activity') {
  AdminController::activity();
} elseif ($route === 'admin.export') {
  AdminController::export();
} elseif ($route === 'contact' && $_SERVER['REQUEST_METHOD']==='GET') {
  PageController::contact();
} elseif ($route === 'contact' && $_SERVER['REQUEST_METHOD']==='POST') {
  PageController::contactPost();
} else {
  include __DIR__.'/views/pages/404.php';
}
