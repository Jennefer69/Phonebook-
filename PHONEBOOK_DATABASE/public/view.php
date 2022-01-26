
<?php

/**
  * Delete a user
  */

require "../config.php";
require "../common.php";



try {
  $connection = new PDO($dsn, $username, $password, $options);

  $sql = "SELECT * FROM contacts";

  $statement = $connection->prepare($sql);
  $statement->execute();

  $result = $statement->fetchAll();
} catch(PDOException $error) {
  echo $sql . "<br>" . $error->getMessage();
}
?>
<?php require "templates/header.php"; ?>





    <table>
      <thead>
<tr>
  <th>#</th>
  <th>First Name</th>
  <th>Last Name</th>
  <th>Mobile Number</th>
  <th>Home Number</th>
  <th>Date</th>
</tr>
      </thead>
      <tbody>
  <?php foreach ($result as $row) { ?>
      <tr>
<td><?php echo escape($row["id"]); ?></td>
<td><?php echo escape($row["firstname"]); ?></td>
<td><?php echo escape($row["lastname"]); ?></td>
<td><?php echo escape($row["address"]); ?></td>
<td><?php echo escape($row["mobilenumber"]); ?></td>
<td><?php echo escape($row["homenumber"]); ?></td>
<td><?php echo escape($row["date"]); ?> </td>
      </tr>
    <?php } ?>
      </tbody>
  </table>

<a href="index.php">Back to home</a>

<?php require "templates/footer.php"; ?>



<input name="csrf" type="hidden" value="<?php echo escape($_SESSION['csrf']); ?>">
