<?php
$host = 'localhost';
$username = 'root';
$password = 'root';
try
{
$conn = new PDO("mysql:host=$host", $username, $password);
echo "Connected to $host successfully.";
// createDatabase("mydb");
// createTables("mydb");
// addUser("James", "Kirk", "kirk.j@sf.com", "enterprise");
// addUser("Kathryn", "Janeway", "janeway.k@sf.com",
"voyager");
// addUser("Patrick", "Stewart", "stewart.p@sf.com",
"enterprise");
// getUser(1);
// getUser(3);
authenticateUser("stewart.p@sf.com" ,"enterprise");
// dropTable("user");
}
catch (PDOException $pe)
{
die("Could not connect to $host :" . $pe->getMessage());
}
function showDatabases()
{
$sql = "SHOW DATABASES";
$pdo = new pdo('mysql:host=localhost;',
'root', 'root');
$pdo->setAttribute(PDO::ATTR_ERRMODE,
PDO::ERRMODE_WARNING);
$stmt = $pdo->prepare($sql);
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);
while ($row = $stmt->fetch())
{
print("<h3>" . $row['Database'] . "</h3>");
}
}

function createDatabase($databaseName)
{
$sql = "CREATE DATABASE IF NOT EXISTS $databaseName";
$pdo = new pdo('mysql:host=localhost;',
'root', 'root');
$pdo->setAttribute(PDO::ATTR_ERRMODE,
PDO::ERRMODE_WARNING);
$pdo->query($sql);
// showDatabases();
}
function createTables($dbName)
{
$sql = "CREATE TABLE user (
userId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
forename VARCHAR(30) NOT NULL,
surname VARCHAR(30) NOT NULL,
email VARCHAR(30) NOT NULL UNIQUE,
password VARCHAR(128) NOT NULL)";
$pdo = new pdo('mysql:host=localhost;dbname=' . $dbName . '',
'root', 'root');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
$pdo->query($sql);
}
function addUser($forename, $surname, $email, $password)
{
$sql = "INSERT INTO user (forename, surname, email, password)
VALUES (:forename, :surname, :email, :password)";
$pdo = new pdo('mysql:host=localhost;dbname=mydb',
'root', 'root');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
$password = password_hash($password, PASSWORD_DEFAULT);
$stmt = $pdo->prepare($sql);
$stmt->execute([
'forename' => $forename,
'surname' => $surname,
'email' => $email,
'password' => $password
]);
}

function getUser($id)
{
$sql = "SELECT forename, surname, email, password
FROM user
WHERE userId = :id";
$pdo = new pdo('mysql:host=localhost;dbname=mydb',
'root', 'root');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
$stmt = $pdo->prepare($sql);
$stmt->execute([
'id' => $id
]);
$stmt->setFetchMode(PDO::FETCH_ASSOC);
while ($row = $stmt->fetch())
{
echo("<br>" . $row['forename'] . " " . $row['surname'] .
" " .$row['email'] . " " . $row['password']);
}
}
function authenticateUser($email, $password)
{
$sql = "SELECT password
FROM user
WHERE email = :email";
$pdo = new pdo('mysql:host=localhost;dbname=mydb',
'root', 'root');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
$stmt = $pdo->prepare($sql);
$stmt->execute([
'email' => $email
]);
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$row = $stmt->fetch();
if (password_verify($password, $row['password']))
echo("authentication successful");
else
echo("incorrect email or password");
}

function dropTable($name)
{
$sql = "DROP TABLE $name";
$pdo = new pdo('mysql:host=localhost;dbname=mydb',
'root', 'root');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
$pdo->query($sql);
}
?>