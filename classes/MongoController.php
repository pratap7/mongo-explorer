<?php
require_once 'MongoDBManager.php';

class MongoController {
    private $mongo;

    public function __construct() {
        $this->mongo = new MongoDBManager();
    }

    public function handleRequest() {
        $action = $_GET['action'] ?? '';
        $db = $_GET['db'] ?? '';
        $collection = $_GET['collection'] ?? '';
        $id = $_GET['id'] ?? '';

        switch ($action) {
            case 'list_databases':
                echo json_encode($this->mongo->listDatabases());
                break;

            case 'create_database':
                $this->mongo->createDatabase($db);
                header("Location: ../views/list_databases.php");
                break;

            case 'delete_database':
                $this->mongo->deleteDatabase($db);
                header("Location: ../views/list_databases.php");
                break;

            case 'list_collections':
                echo json_encode($this->mongo->listCollections($db));
                break;

            case 'create_collection':
                $this->mongo->createCollection($db, $_POST['collection_name']);
                header("Location: ../views/list_collections.php?db=$db");
                break;

            case 'delete_collection':
                $this->mongo->deleteCollection($db, $collection);
                header("Location: ../views/list_collections.php?db=$db");
                break;

            case 'list_documents':
                echo json_encode($this->mongo->listDocuments($db, $collection));
                break;

            case 'insert_document':
                $data = json_decode($_POST['data'], true);
                $this->mongo->insertDocument($db, $collection, $data);
                header("Location: ../views/list_documents.php?db=$db&collection=$collection");
                break;

            case 'delete_document':
                $this->mongo->deleteDocument($db, $collection, $id);
                header("Location: ../views/list_documents.php?db=$db&collection=$collection");
                break;

            default:
                echo "Invalid action.";
        }
    }
}

$controller = new MongoController();
$controller->handleRequest();
