<?php

namespace App\Controllers;

use App\Model\User as user_model;

/**
 * Class User
 * @package App\Controllers
 */
class User
{
  /**
   * @var user_model
   */
  private $db;
  /**
   * @var int
   */
  private $id;

  /**
   * User constructor.
   */
  public function __construct()
  {
    $this->db = new user_model();
  }

  /**
   * Displays login page
   */
  public function login()
  {
    require_once APPROOT . "/View/Login.php";
  }

  /**
   * Handles user registration
   */
  public function register()
  {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $username = $_POST['username'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      if ($this->db->register($username, $email, $password)) {
        echo "success";
      } else {
        echo "Registration failed.";
      }
    }
  }

  /**
   * Handles user login
   */
  public function loggedin()
  {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $email = $_POST['email'];
      $password = $_POST['password'];

      if ($this->db->login($email, $password)) {
        $newobj = new Stock();
      } else {
        echo "Login failed.";
      }
    }
  }
}
