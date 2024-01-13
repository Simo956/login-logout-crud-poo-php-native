<?php

class EmployeeManager
{
    private $connection;

    public function __construct($servername, $username, $password, $database)
    {
        $this->connection = new mysqli($servername, $username, $password, $database);

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public function addEmployee($name, $email, $phone, $address)
    {
        if (empty($name) || empty($email) || empty($phone) || empty($address)) {
            return "All fields are required!";
        }

        $sql = "INSERT INTO employee (name, email, phone, address) VALUES ('$name', '$email', '$phone', '$address')";
        $result = $this->connection->query($sql);

        if (!$result) {
            return "Invalid query : " . $this->connection->error;
        }

        return "Employee Added Successfully!";
    }

    public function getEmployeeList()
    {
        $sql = "SELECT * from employee";
        $result = $this->connection->query($sql);

        if (!$result) {
            return "Invalid query : " . $this->connection->error;
        }

        $employeeList = [];

        while ($row = $result->fetch_assoc()) {
            $employeeList[] = $row;
        }

        return $employeeList;
    }

    // Similar methods for updateEmployee, deleteEmployee, and getEmployeeById can be added.

    public function closeConnection()
    {
        $this->connection->close();
    }
}

?>
