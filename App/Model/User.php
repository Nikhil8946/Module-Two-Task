<?php

/**

User Model Class
This class represents the User Model and contains methods for user registration, login, and logout.
@package App\Model
 */

namespace App\Model;

use App\Libraries\Database;

class User
{
  private $db;

  /**
   * Class Constructor
   * 
   * Initializes a new instance of the User Model class and creates a new database connection.
   */
  public function __construct()
  {
    $this->db = new Database();
  }

  /**
   * Register Method
   * 
   * Registers a new user in the database.
   * 
   * @param string $username The username of the new user
   * @param string $email The email address of the new user
   * @param string $password The password of the new user
   * 
   * @return bool Returns true on success or false on failure
   */
  public function register($username, $email, $password)
  {
    $hash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = $this->db->prepare($sql);
    $stmt->bind_param("sss", $username, $email, $hash);

    if ($stmt->execute()) {
      return true;
    } else {
      return false;
    }
  }

  /**
   * Login Method
   * 
   * Logs in a user with the given email and password.
   * 
   * @param string $email The email address of the user
   * @param string $password The password of the user
   * 
   * @return bool Returns true on successful login or false on failed login attempt
   */
  public function login($email, $password)
  {

    $sql = "SELECT * FROM users WHERE email = ?";

    $stmt = $this->db->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
      $row = $result->fetch_assoc();

      if (password_verify($password, $row['password'])) {
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['username'] = $row['username'];

        return true;
      } else {
        return false;
      }
    } else {
      return false;
    }
  }
}
