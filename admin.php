<?php
require "connect.php";
include "header.php";

// Get all registrations
$stmt = $pdo->query("SELECT * FROM registrations");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Admin Panel</h2>
<!-- Display registrations in a table -->
<table border="1" cellpadding="10" cellspacing="0" class="table table-striped" class="table table-success table-striped-columns" class="table table-bordered border-primary">
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

<tr >
<!-- Display registration details -->
<td><?php echo htmlspecialchars($row['id']); ?></td>

<td><?php echo htmlspecialchars($row['first_name'] . " " . $row['last_name']); ?></td>

<td><?php echo htmlspecialchars($row['email']); ?></td>

<td><?php echo htmlspecialchars($row['phone']); ?></td>

<td>
<!-- Edit and Delete links -->
<a href="edit.php?id=<?= $member['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
<a href="delete.php?id=<?= $member['id'] ?>" class="btn btn-sm btn-danger">Delete</a>
</td>

</tr>

<?php } ?>
<!-- End of table -->
</table>