
<?php
class Database
{
  private $host = "localhost";
  private $db_name = "d_php4";
  private $username = "root";
  private $password = "";
  public $conn;

  public function connect()
  {
    $this->conn = null;

    try {
      $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $exception) {
      echo "Connection error: " . $exception->getMessage();
    }

    return $this->conn;
  }
}

class User
{
  private $conn;
  private $table = "users";

  public $id;
  public $name;
  public $email;

  public function __construct($db)
  {
    $this->conn = $db;
  }

  // Aquí recreamos el CRUD basado en Programación Orientada a Objetos

  // Create
  public function create()
  {
    $query = "INSERT INTO " . $this->table . " (name, email) VALUES (:name, :email)";
    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(":name", $this->name);
    $stmt->bindParam(":email", $this->email);

    if ($stmt->execute()) {
      return true;
    }
    return false;
  }

  // Read
  public function read()
  {
    $query = "SELECT * FROM " . $this->table;
    $stmt = $this->conn->prepare($query);
    $stmt->execute();

    return $stmt;
  }

  // Update
  public function update()
  {
    $query = "UPDATE " . $this->table . " SET name = :name, email = :email WHERE id = :id";
    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(":name", $this->name);
    $stmt->bindParam(":email", $this->email);
    $stmt->bindParam(":id", $this->id);

    if ($stmt->execute()) {
      return true;
    }
    return false;
  }

  // Delete
  public function delete()
  {
    $query = "DELETE FROM " . $this->table . " WHERE id = :id";
    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(":id", $this->id);

    if ($stmt->execute()) {
      return true;
    }
    return false;
  }
}

// Ejemplo de uso
$database = new Database();
$db = $database->connect();

$user = new User($db);

// Crear un nuevo usuario
$user->name = "John Doe";
$user->email = "john.doe@example.com";
if ($user->create()) {
  echo "<h1>Creación de usuario</h1>";
  echo "<p>Usuario creado satisfactoriamente!</p>";
}

// Leer todos los usuarios
$stmt = $user->read();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  extract($row);
  echo "<h1>Lectura de todos los usuarios</h1>";
  echo "<p>ID: $id, Nombre: $name, Email: $email</p>";
}

// Actualizar un usario
$user->id = 1; // Suponiendo que el usuario con ID 1 existe
$user->name = "Jane Doe";
$user->email = "jane.doe@example.com";
if ($user->update()) {
  echo "<h1>Actualización de usuario</h1>";
  echo "<p>Usuario actualizado satisfactoriamente!</p>";
}

// Eliminar un usuario
$user->id = 1; // Suponiendo que el usuario con ID 1 existe
if ($user->delete()) {
  echo "<h1>Eliminación de usuario</h1>";
  echo "<p>Usuario eliminado satisfactoriamente!</p>";
}
?>