<?php

class EmployeeDeleter
{
    private $connection;

    public function __construct($servername, $username, $password, $database)
    {
        // Create Connection
        $this->connection = new mysqli($servername, $username, $password, $database);

        // Check connection established or not!
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public function deleteEmployee()
    {
        if (isset($_GET["id"])) {
            $id = $_GET['id'];

            $sql = "DELETE FROM employee WHERE id=$id";
            $result = $this->connection->query($sql);

            // Uncomment the following lines if you want to handle errors
            // if (!$result) {
            //     die("Invalid query : " . $this->connection->error);
            // }

            header("location: ./index.php");
            exit;
        }
    }

    public function __destruct()
    {
        $this->connection->close();
    }
}

$employeeDeleter = new EmployeeDeleter("localhost", "root", "", "employee_management");
$employeeDeleter->deleteEmployee();

?>
