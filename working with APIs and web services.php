<?php
// Creating a simple RESTful API with PHP

// In-memory data store (simulates a database)
$users = [
    ["id" => 1, "name" => "John Doe"],
    ["id" => 2, "name" => "Joe Smith"],
    ["id" => 3, "name" => "Jane Duck"],
];

// Set response content type to JSON
header('Content-Type: application/json');

// Get the request method (GET, POST, PUT, DELETE)
$method = $_SERVER['REQUEST_METHOD'];

// Get the part of the URL after the script name
$request = explode('/', trim($_SERVER['PATH_INFO'], '/'));

// Handle the request method
switch ($method) {
    case 'GET':
        // If a specific user ID is provided, return that user
        if (isset($request[0]) && is_numeric($request[0])) {
            $userId = (int)$request[0]; // Convert the ID from the URL to an integer
            // Find the user by ID
            $user = array_filter($users, fn($u) => $u['id'] == $userId);
            if (!empty($user)) {
                // Return the user data in JSON format
                echo json_encode(array_values($user)[0]);
            } else {
                // Return 404 if user not found
                http_response_code(404);
                echo json_encode(["message" => "User not found"]);
            }
        } else {
            // Return all users if no specific ID is provided
            echo json_encode($users);
        }
        break;

    case 'POST':
        // Get the raw data from the request body
        $input = json_decode(file_get_contents('php://input'), true);
        // Create a new user with the provided name
        $newUser = ["id" => count($users) + 1, "name" => $input['name']];
        // Add the new user to the users array
        $users[] = $newUser;
        // Return a 201 Created response with the new user data
        http_response_code(201);
        echo json_encode($newUser);
        break;

    case 'PUT':
        // Check if a user ID is provided in the URL
        if (isset($request[0]) && is_numeric($request[0])) {
            $userId = (int)$request[0];
            // Get the data from the request body
            $input = json_decode(file_get_contents('php://input'), true);
            // Find the user and update their name
            foreach ($users as &$user) {
                if ($user['id'] == $userId) {
                    $user['name'] = $input['name'];
                    echo json_encode($user);
                    break;
                }
            }
        } else {
            // Return 404 if user not found
            http_response_code(404);
            echo json_encode(["message" => "User not found"]);
        }
        break;

    case 'DELETE':
        // Check if a user ID is provided in the URL
        if (isset($request[0]) && is_numeric($request[0])) {
            $userId = (int)$request[0];
            // Filter out the user with the given ID (delete user)
            $users = array_filter($users, fn($u) => $u['id'] != $userId);
            echo json_encode(["message" => "User deleted"]);
        } else {
            // Return 404 if user not found
            http_response_code(404);
            echo json_encode(["message" => "User not found"]);
        }
        break;

    default:
        // Return 405 for unsupported HTTP methods
        http_response_code(405);
        echo json_encode(["message" => "Method Not Allowed"]);
        break;
}
?>
