<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Home</title>
</head>

<body>
    <h1>Hello <?= htmlspecialchars($name) ?></h1>
    <p>he loves <?= htmlspecialchars($color) ?></p>
    <p>Car : <?= $params['car'] ?></p>
    <p>model : <?= $params['model'] ?></p>
    <p>year : <?= $params['year'] ?></p>

</body>
</html>