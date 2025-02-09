# MongoDB Explorer

MongoDB Explorer is a lightweight PHP-based tool similar to phpMyAdmin, allowing users to create, edit, list, and delete databases, collections, and documents in MongoDB.

## Features
- View, create, and delete **databases**
- View, create, and delete **collections**
- Insert, update, and delete **documents**
- Clean and responsive **Bootstrap-based UI**
- Simple, minimalistic **MongoDB management**

## Requirements
- PHP 7.4+
- MongoDB Server
- MongoDB PHP Extension
- Composer
- XAMPP/LAMP/WAMP (for local development)

## Installation

1. **Clone the Repository:**
   ```sh
   git clone https://github.com/pratap7/mongo-explorer.git
   cd mongo-explorer
   ```

2. **Install Dependencies:**
   ```sh
   composer install
   ```

3. **Set Up Configuration:**
   - Edit `config.php` and set MongoDB connection details:
     ```php
     define('MONGO_URI', 'mongodb://localhost:27017');
     ```

4. **Run the Project:**
   - Place the project inside `htdocs` (for XAMPP)
   - Start the Apache server
   - Access the app in the browser:
     ```
     http://localhost/mongo-explorer/views/list_databases.php
     ```

## Project Structure
```
/mongo-explorer
│── /classes
│   ├── MongoDBManager.php  # Handles database operations
│   ├── MongoController.php # Manages actions
│── /views
│   ├── index.php              
│   ├── list_databases.php    # Displays all databases
│   ├── list_collections.php  # Displays collections
│   ├── list_documents.php    # Displays documents
│── /assets
│   ├── style.css              # Custom styling
│── config.php                 # MongoDB configuration
│── vendor/                    # Composer dependencies
│── composer.json              # Composer package file
```

## Usage Guide
- **Manage Databases:**
  - View all databases
  - Create a new database
  - Delete existing databases
- **Manage Collections:**
  - View collections in a database
  - Create a new collection
  - Delete a collection
- **Manage Documents:**
  - View documents in a collection
  - Insert a new document
  - Delete a document

## Screenshots
_Add screenshots here to showcase the UI_

## Contributing
Feel free to fork and contribute by submitting pull requests.

## License
MIT License

