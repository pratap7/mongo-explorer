<?php require '../classes/MongoDBManager.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>MongoDB Explorer</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
<div class="container">
    <h2>MongoDB Databases</h2>
    <a href="../classes/MongoController.php?action=create_database&db=newDB" class="btn btn-primary mb-3">Create Database</a>
    
    <table class="table">
        <thead>
            <tr>
                <th>Database Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $mongo = new MongoDBManager();
            foreach ($mongo->listDatabases() as $db) {
                echo "<tr>
                        <td>{$db->getName()}</td>
                        <td>
                            <a href='list_collections.php?db={$db->getName()}' class='btn btn-success btn-sm'>View</a>
                            <a href='../classes/MongoController.php?action=delete_database&db={$db->getName()}' class='btn btn-danger btn-sm'>Delete</a>
                        </td>
                      </tr>";
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>
