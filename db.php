<?php
$conn = mysqli_connect("localhost", "root", "", "parset");
if($conn->connect_error){
    die("Ошибка: " . $conn->connect_error);
}
echo "Подключение успешно установлено";
$conn->close();

