<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Application</title>
    <link rel="stylesheet" href="./index.css">
</head>

<body>
    <div>
        <h1 class="text-center">CRUD Application with Pagination</h1>

        <!-- Add User Form -->
        <div class="form-container">
            <div>
                <form action="add_user.php" method="POST">
                    <div class="form-group">
                        <label for="first_name">First Name:</label>
                        <input type="text" id="first_name" name="first_name" required>
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name:</label>
                        <input type="text" id="last_name" name="last_name">
                    </div>
                    <div class="form-group">
                        <label for="age">Age:</label>
                        <input type="number" id="age" name="age" required>
                    </div>
                    <button type="submit">Add User</button>
                </form>
            </div>
        </div>
        <div class="row-count">
            <p>Number of Rows:</p>
            <input type="number" id="row-count" name="row-count" required>
        </div>

        <!-- Display Users and Pagination -->
        <?php
        require_once 'db.php';
        require_once 'users_pagination.php';
        ?>

    </div>
</body>

</html>