<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id = trim($_POST["id"]);
  $email = trim($_POST["email"]);
  $password = password_hash($_POST["password"], PASSWORD_BCRYPT);
  $role = trim($_POST["role"];

  $file = "user.json";
  $users = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

foreach ($users as $user) {
  if ($user['id] ==  $id) {
    echo "ID is registered";
    exit();
  }
}
 
$users[] = ["id" => $id, "email" => $email, "password" => $password, "role" => $role];

file_put_contents($file, json_encode($users, JSON_PRETTY_PRINT));

echo "Registration Successful. Please Login.";
}
?>
