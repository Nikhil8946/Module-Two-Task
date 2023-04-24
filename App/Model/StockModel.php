

<?php

namespace App\Model;

use App\Libraries\Database;

/**
 * Class StockModel
 * @package App\Model
 */
class StockModel
{
  /**
   * @var Database
   */
  private $db;

  /**
   * StockModel constructor.
   */
  function __construct()
  {
    $this->db = new Database();
  }

  /**
   * Returns all stocks for a given user
   *
   * @param int $user_id The ID of the user whose stocks should be retrieved
   * @return array An array of all the user's stocks
   */
  function getStocks($user_id)
  {
    $query = "SELECT * FROM stocks WHERE user_id = :user_id";
    $stmt = $this->db->prepare($query);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();
    $stocks = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $stocks;
  }

  /**
   * Adds a new stock to the database
   *
   * @param int $user_id The ID of the user who is adding the stock
   * @param string $stock_name The name of the new stock
   * @param float $stock_price The price of the new stock
   */
  function addStock($user_id, $stock_name, $stock_price)
  {
    $query = "INSERT INTO stocks (user_id, stock_name, stock_price) VALUES ($user_id, '$stock_name', $stock_price)";
    $this->db->execute($query);
  }

  /**
   * Updates an existing stock in the database
   *
   * @param int $id The ID of the stock to update
   * @param string $stock_name The new name of the stock
   * @param float $stock_price The new price of the stock
   */
  function updateStock($id, $stock_name, $stock_price)
  {
    $query = "UPDATE stocks SET stock_name='$stock_name', stock_price=$stock_price, updated_at=NOW() WHERE id=$id";
    $this->db->execute($query);
  }

  /**
   * Removes a stock from the database
   *
   * @param int $id The ID of the stock to remove
   */
  function removeStock($id)
  {
    $query = "DELETE FROM stocks WHERE id = :id";
    $stmt = $this->db->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
  }
}
