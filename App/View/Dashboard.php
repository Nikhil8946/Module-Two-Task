<!-- This is a HTML file for displaying the list of stocks in the Stocks App. -->
<!DOCTYPE html>
<html>

<head>
  <title>Stocks App - Login/Register</title>
  <link rel="stylesheet" type="text/css" href="/assets/css/Dashboard.css"> <!-- Linking to external stylesheet. -->
</head>

<body>
  <table>
    <thead>
      <tr>
        <th>Stock Name</th>
        <th>Stock Price</th>
        <th>Created Date</th>
        <th>Last Updated</th>
        <th>Remove entry</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($stocks as $stock) : ?> <!-- Looping through each stock and displaying the stock details in the table row. -->
        <tr>
          <td><?= $stock['stock_name'] ?></td>
          <td><?= $stock['stock_price'] ?></td>
          <td><?= $stock['created_at'] ?></td>
          <td><?= $stock['updated_at'] ?></td>
          <td>
            <?php if ($stock['user_id'] == $_SESSION['user_id']) : ?> <!-- Checking if the logged in user is the owner of the stock entry before displaying the Remove button. -->
              <form method="POST" action="/Stock/removestock">
                <input type="hidden" name="id" value="<?= $stock['id'] ?>">
                <button type="submit">Remove</button>
              </form>
            <?php endif; ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</body>

</html>