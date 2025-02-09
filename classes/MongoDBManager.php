<?php
require_once '../config.php';

class MongoDBManager {
    private $client;

    public function __construct() {
        $this->client = new MongoDB\Client(MONGO_URI);
    }

    // List Databases
    public function listDatabases() {
        return $this->client->listDatabases();
    }

    // Create Database (MongoDB creates DB when collection is added)
    public function createDatabase($dbName) {
        return $this->client->$dbName->createCollection('init');
    }

    // Delete Database (Drop all collections)
    public function deleteDatabase($dbName) {
        $this->client->$dbName->drop();
    }

    // List Collections
    public function listCollections($dbName) {
        return $this->client->$dbName->listCollections();
    }

    // Create Collection
    public function createCollection($dbName, $collectionName) {
        return $this->client->$dbName->createCollection($collectionName);
    }

    // Delete Collection
    public function deleteCollection($dbName, $collectionName) {
        $this->client->$dbName->$collectionName->drop();
    }

    // List Documents
    public function listDocuments($dbName, $collectionName) {
        return $this->client->$dbName->$collectionName->find()->toArray();
    }

    // Insert Document
    public function insertDocument($dbName, $collectionName, $data) {
        return $this->client->$dbName->$collectionName->insertOne($data);
    }

    // Delete Document
    public function deleteDocument($dbName, $collectionName, $id) {
        return $this->client->$dbName->$collectionName->deleteOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
    }
}
