
<!DOCTYPE html>
<?php require "connect.php"; ?> <!-- Connect to the database using the connect.php file -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Event Registration</title>
     <!--add bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <!-- Event registration form -->
    <h1>Event Registration</h1>
    <!-- Form to collect user input for event registration -->
    <form action="process.php" method="POST">

        <label for="first_name">First Name:</label><br> <!-- Label for first name input -->
        <input type="text" id="first_name" name="first_name"><br><br> <!-- Input field for first name -->

        <label for="last_name">Last Name:</label><br> <!-- Label for last name input -->
        <input type="text" id="last_name" name="last_name"><br><br> <!-- Input field for last name -->

        <label for="email">Email:</label><br> <!-- Label for email input -->
        <input type="text" id="email" name="email"><br><br> <!-- Input field for email -->

        <label for="phone">Phone:</label><br> <!-- Label for phone input -->
        <input type="text" id="phone" name="phone"><br><br> <!-- Input field for phone number -->

        <button type="submit">Register</button> <!-- Submit button to register for the event -->

    </form>

    <p>
        <a href="admin.php">Go to Admin Page</a> <!-- Link to navigate to the admin page -->
    </p>

</body>
</html>
