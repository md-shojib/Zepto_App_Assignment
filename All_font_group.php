<?php
session_start();

if (!isset($_SESSION['fonts']) || !is_array($_SESSION['fonts'])) {
    echo "No fonts to display.";
    exit();
}

$fonts = $_SESSION['fonts'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action']) && isset($_POST['index'])) {
        $index = intval($_POST['index']);
        if ($_POST['action'] == 'delete' && isset($fonts[$index])) {
            unset($fonts[$index]);
            $_SESSION['fonts'] = array_values($fonts);
            header('Location: display.php');
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Font List</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f6;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #007BFF;
            color: #fff;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        td {
            text-align: center;
        }
        button {
            background-color: #dc3545;
            color: #fff;
            border: none;
            padding: 5px 10px;
            font-size: 14px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #c82333;
        }
        .edit-button {
            background-color: #007BFF;
        }
        .edit-button:hover {
            background-color: #0056b3;
        }
        .actions {
            display: flex;
            justify-content: center;
            gap: 10px;
        }
        .actions form {
            display: inline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Font List</h1>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Font Name</th>
                    <th>Font Number</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($fonts as $index => $font): ?>
                    <tr>
                        <td>Font <?php echo $index + 1; ?></td>
                        <td><?php echo htmlspecialchars($font); ?></td>
                        <td><?php echo $index + 1; ?></td>
                        <td class="actions">
                            <form method="post">
                                <input type="hidden" name="index" value="<?php echo $index; ?>">
                                <input type="submit" name="action" value="edit" class="edit-button">
                            </form>
                            <form method="post">
                                <input type="hidden" name="index" value="<?php echo $index; ?>">
                                <input type="submit" name="action" value="delete">
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
