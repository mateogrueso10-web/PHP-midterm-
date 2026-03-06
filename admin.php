<?php
require "connect.php";

// Get all registrations
$stmt = $pdo->query("SELECT * FROM registrations");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Admin Panel</h2>
<!-- Display registrations in a table -->
<table border="1">
<!-- Table headers -->
<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>Actions</th>
</tr>
<!-- Loop through registrations and display them -->
<?php foreach($rows as $row){ ?>

<tr>
<!-- Display registration details -->
<td><?php echo $row['id']; ?></td>

<td><?php echo $row['first_name'] . " " . $row['last_name']; ?></td>

<td><?php echo $row['email']; ?></td>

<td><?php echo $row['phone']; ?></td>

<td>
<!-- Edit and Delete links -->
<a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
<a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
</td>

</tr>

<?php } ?>
<!-- End of table -->
</table>