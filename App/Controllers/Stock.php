<?php

/**
 * The Stock controller class.
 *
 * This class handles user interactions with stock data,
 * including displaying a table of stocks, adding new stocks,
 * updating existing stocks, and removing stocks.
 *
 * @package App\Controllers
 */

namespace App\Controllers;

use App\Model\StockModel as Stock_model;

/**
 * The Stock controller class.
 */
class Stock
{
  /**
   * The StockModel instance used for interacting with stock data.
   *
   * @var Stock_model
   */
  private $model;

  /**
   * Construct a new Stock controller instance.
   *
   * Creates a new StockModel instance for interacting with stock data.
   */
  function __construct()
  {
    $this->model = new Stock_model();
  }

  /**
   * Display the stock table for a given user.
   *
   * Retrieves a list of stocks for the given user ID and
   * displays them in a table using the Dashboard view.
   *
   * @param int $user_id The ID of the user to display stocks for.
   * @return void
   */
  function displayStockTable($user_id)
  {
    $stocks = $this->model->getStocks($user_id);
    require_once APPROOT . "/View/Dashboard.php";
  }

  /**
   * Add a new stock for a given user.
   *
   * Adds a new stock to the database for the given user ID
   * with the given name and price, and displays a confirmation
   * message using the Stockentry view.
   *
   * @param int $user_id The ID of the user to add the stock for.
   * @param string $stock_name The name of the new stock.
   * @param float $stock_price The price of the new stock.
   * @return void
   */
  function addStock($user_id, $stock_name, $stock_price)
  {
    $this->model->addStock($user_id, $stock_name, $stock_price);
    require_once APPROOT . "/View/Stockentry.php";
  }

  /**
   * Update an existing stock.
   *
   * Updates the stock with the given ID to have the given name
   * and price, and displays a confirmation message using the
   * Stockentry view.
   *
   * @param int $id The ID of the stock to update.
   * @param string $stock_name The new name of the stock.
   * @param float $stock_price The new price of the stock.
   * @return void
   */
  function updateStock($id, $stock_name, $stock_price)
  {
    $this->model->updateStock($id, $stock_name, $stock_price);
    require_once APPROOT . "/View/Stockentry.php";
  }

  /**
   * Remove an existing stock.
   *
   * Removes the stock with the given ID from the database and
   * displays the updated stock table using the Dashboard view.
   *
   * @param int $id The ID of the stock to remove.
   * @return void
   */
  function removeStock($id)
  {
    $this->model->removeStock($id);
    require_once APPROOT . "/View/Dashboard.php";
  }
}
