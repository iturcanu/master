<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Posts</title>
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <h3>Aici</h3>

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email Address</th>
            <th>Mobile Number</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
            foreach ($users as $row) {
                echo '<tr>';
                echo '<td>'. $row['first_name'] . '</td>';
                echo '<td>'. $row['last_name'] . '</td>';
                echo '<td>'. $row['register_date'] . '</td>';
                echo '<td>
                           <a class="btn" href="edit?id='. $row['id'] . '">Read</a>
                           <a class="btn btn-success" href="edit?id='. $row['id'] . '">Update</a>
                           <a class="btn btn-danger" href="delete.php?id='. $row['id'] . '">Delete</a>
                    </td>';
                echo '</tr>';
            }

        ?>
</body>
</html>