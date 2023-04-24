<!-- This is the HTML code for the Stock Entry Page -->
<!DOCTYPE html>
<html>

<head>
  <title>Stock Entry Page</title>
  <link rel="stylesheet" type="text/css" href="assets/css/Stockentry.css">
</head>

<body>
  <div class="container">
    <!-- Title of the page -->
    <h2>Stock Entry Page</h2>
    <!-- Form to add a new stock entry -->
    <form method="post" action="Stock/addstock">
      <label for="stock_name">Stock Name:</label>
      <input type="text" id="stock_name" name="stock_name" required>
      <label for="stock_price">Stock Price:</label>
      <input type="number" id="stock_price" name="stock_price" min="0" step="0.01" required>
      <button type="submit">Add Entry</button>
    </form>
    <br>
    <!-- Table to display previous stock entries -->
    <h3>Previous Entries</h3>
    <table>
      <thead>
        <tr>
          <th>Stock Name</th>
          <th>Stock Price</th>
          <th>Created Date</th>
          <th>Edit entry</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // loop through each stock entry and display it in the table
        foreach ($stocks as $stock) {
          echo "<tr>";
          echo "<td>" . $stock['stock_name'] . "</td>";
          echo "<td>" . $stock['stock_price'] . "</td>";
          echo "<td>" . $stock['created_at'] . "</td>";
          // link to edit the stock entry
          echo "<td><a href='/Stock/updatestock?id=" . $stock['id'] . "'>Edit</a></td>";
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</body>

</html>