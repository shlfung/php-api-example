<?php
// Connect to SQLite database
$db = new PDO('sqlite:database.db');

// Create table if it doesn't exist
$db->exec('CREATE TABLE IF NOT EXISTS users (id INTEGER PRIMARY KEY, name TEXT, email TEXT)');

// Handle GET request to retrieve all users
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $stmt = $db->prepare('SELECT * FROM users');
    $stmt->execute();
    $users = $stmt->fetchAll();
    echo json_encode($users);
}

// Handle GET request to retrieve "Hello World"
if ($_SERVER['REQUEST_METHOD'] === 'GET' && $_GET['endpoint'] == 'hello') {
    echo json_encode(['message' => 'Hello World']);
}


// Handle POST request to create a new user
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $stmt = $db->prepare('INSERT INTO users (name, email) VALUES (?, ?)');
    $stmt->execute([$name, $email]);
    echo json_encode(['message' => 'User created successfully']);
}

// Handle PUT request to update a user
if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    $id = $_PUT['id'];
    $name = $_PUT['name'];
    $email = $_PUT['email'];
    $stmt = $db->prepare('UPDATE users SET name = ?, email = ? WHERE id = ?');
    $stmt->execute([$name, $email, $id]);
    echo json_encode(['message' => 'User updated successfully']);
}

// Handle DELETE request to delete a user
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $id = $_DELETE['id'];
    $stmt = $db->prepare('DELETE FROM users WHERE id = ?');
    $stmt->execute([$id]);
    echo json_encode(['message' => 'User deleted successfully']);
}
?>