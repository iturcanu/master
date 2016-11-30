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
            <th>Id</th>
            <th>Name</th>
            <th>Description</th>
            <th>Created</th>
        </tr>
        </thead>
        <tbody>
        <?php
            foreach ($users as $row) {
                echo '<tr>';
                echo '<td>'. $row['id'] . '</td>';
                echo '<td>'. $row['name'] . '</td>';
                echo '<td>'. $row['description'] . '</td>';
                echo '<td>'. $row['created'] . '</td>';
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