<?php
// consulta_avanzada.php
include 'connection.php';

$sql = "SELECT HOTEL.nombre, COUNT(RESERVA.id_reserva) as num_reservas
        FROM RESERVA
        JOIN HOTEL ON RESERVA.id_hotel = HOTEL.id_hotel
        GROUP BY HOTEL.nombre
        HAVING num_reservas > 2";
        
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Hotel: " . $row["nombre"]. " - Número de reservas: " . $row["num_reservas"]. "<br>";
    }
} else {
    echo "No hay hoteles con más de dos reservas.";
}

$conn->close();
?>
