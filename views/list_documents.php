<?php
require '../classes/MongoDBManager.php';

$mongo = new MongoDBManager();
$dbName = $_GET['db'];
$collectionName = $_GET['collection'];
$documents = $mongo->listDocuments($dbName, $collectionName);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documents</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h2>Documents in <?php echo $collectionName; ?></h2>
    <a href="list_collections.php?db=<?php echo $dbName; ?>" class="btn btn-secondary">Back</a>
    <a href="../actions/insert_document.php?db=<?php echo $dbName; ?>&collection=<?php echo $collectionName; ?>" class="btn btn-success">Add Document</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Document</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($documents as $doc) { ?>
                <tr>
                    <td><?php echo json_encode($doc); ?></td>
                    <td>
                        <a href="../actions/delete_document.php?db=<?php echo $dbName; ?>&collection=<?php echo $collectionName; ?>&id=<?php echo $doc->_id; ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>
