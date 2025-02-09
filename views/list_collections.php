<?php require '../classes/MongoDBManager.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Collections</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
<div class="container">
    <h2>Collections in <?php echo $_GET['db']; ?></h2>
    
    <form method="POST" action="../classes/MongoController.php?action=create_collection&db=<?php echo $_GET['db']; ?>" class="mb-3">
        <div class="input-group">
            <input type="text" name="collection_name" class="form-control" placeholder="Enter collection name" required>
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th>Collection Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $mongo = new MongoDBManager();
            foreach ($mongo->listCollections($_GET['db']) as $collection) {
                echo "<tr>
                        <td>{$collection->getName()}</td>
                        <td>
                            <a href='list_documents.php?db={$_GET['db']}&collection={$collection->getName()}' class='btn btn-success btn-sm'>View</a>
                            <a href='../classes/MongoController.php?action=delete_collection&db={$_GET['db']}&collection={$collection->getName()}' class='btn btn-danger btn-sm'>Delete</a>
                        </td>
                      </tr>";
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>
