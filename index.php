<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MongoDB Explorer</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body { font-family: Arial, sans-serif; }
        .sidebar { width: 250px; height: 100vh; background: #f8f9fa; padding: 15px; position: fixed; overflow-y: auto; }
        .main-content { margin-left: 260px; padding: 20px; }
        .sidebar a { display: block; padding: 10px; color: #333; text-decoration: none; }
        .sidebar a:hover, .sidebar .active { background: #007bff; color: white; border-radius: 5px; }
        .navbar { background: #007bff; color: white; }
        .table-container { margin-top: 20px; }
        .current-db { font-weight: bold; color: #007bff; padding: 5px 10px; }
        .alert { display: none; }
    </style>
</head>
<body>
    
    <!-- Sidebar -->
    <div class="sidebar">
        <h4>MongoDB Explorer</h4>
        <button class="btn btn-success btn-sm w-100 mb-2" data-bs-toggle="modal" data-bs-target="#createDbModal">Create New DB</button>
        <select class="form-select mb-3" id="dbDropdown">
            <option selected>Choose DB</option>
            <option value="db_users">db_users</option>
            <option value="db_products">db_products</option>
            <option value="db_orders">db_orders</option>
        </select>
        <hr>
        <h5>Current Database:</h5>
        <div class="current-db">db_users</div>
        <hr>
        <h5>Collections</h5>
        <ul class="list-unstyled">
            <li><a href="#" class="active">users</a></li>
            <li><a href="#">products</a></li>
            <li><a href="#">orders</a></li>
        </ul>
        <button class="btn btn-primary btn-sm w-100 mt-2" data-bs-toggle="modal" data-bs-target="#createCollectionModal">Create New Collection</button>
    </div>
    
    <!-- Main Content -->
    <div class="main-content">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">MongoDB Admin</a>
            </div>
        </nav>
        
        <div class="container mt-4">
            <h2>Dashboard</h2>
            <p>Welcome to MongoDB Explorer. Select an option from the sidebar.</p>
            
            <div class="alert alert-success" id="successMessage">Database created successfully!</div>
            
            <div class="table-container">
                <h3>Recent Documents</h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Collection</th>
                            <th>Document ID</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>users</td>
                            <td>61f78a2c3b6a4</td>
                            <td>
                                <button class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> View</button>
                                <button class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Edit</button>
                                <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>products</td>
                            <td>62f84b1d4c7b2</td>
                            <td>
                                <button class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> View</button>
                                <button class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Edit</button>
                                <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <!-- Create New Database Modal -->
    <div class="modal fade" id="createDbModal" tabindex="-1" aria-labelledby="createDbModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createDbModalLabel">Create New Database</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="createDbForm">
                        <div class="mb-3">
                            <label for="dbName" class="form-label">Database Name</label>
                            <input type="text" class="form-control" id="dbName" placeholder="Enter database name">
                            <div class="text-danger" id="dbError" style="display:none;">Please enter a database name</div>
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('createDbForm').addEventListener('submit', function(event) {
            event.preventDefault();
            let dbName = document.getElementById('dbName').value.trim();
            let dbError = document.getElementById('dbError');
            let successMessage = document.getElementById('successMessage');
            let dbDropdown = document.getElementById('dbDropdown');
            
            if (dbName === '') {
                dbError.style.display = 'block';
                return;
            }
            dbError.style.display = 'none';
            
            // Simulate database creation
            let newOption = document.createElement('option');
            newOption.value = dbName;
            newOption.textContent = dbName;
            dbDropdown.appendChild(newOption);
            
            successMessage.style.display = 'block';
            setTimeout(() => { successMessage.style.display = 'none'; }, 3000);
            
            document.getElementById('createDbModal').querySelector('.btn-close').click();
            document.getElementById('createDbForm').reset();
        });
    </script>
</body>
</html>
