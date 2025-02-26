<?php
// Habilitar el informe de errores
error_reporting(E_ALL);
ini_set('display_errors', 1);

class GestarBD {
    private $conect;  
    private $base_datos;
    private $servidor;
    private $usuario;
    private $pass;
    public $consulta; // Definición de la propiedad

    public function __construct() {
        include 'config.php';
        $this->servidor = $config['servidor'];
        $this->usuario = $config['usuario'];
        $this->pass = $config['pass'];
        $this->base_datos = $config['basedatos'];
        $this->conectar_base_datos();
    }

    private function conectar_base_datos() {
        $this->conect = new mysqli($this->servidor, $this->usuario, $this->pass, $this->base_datos);

        // Verificar la conexión
        if ($this->conect->connect_error) {
            die("Conexión fallida: " . $this->conect->connect_error);
        }

        echo "Conexión exitosa<br>"; // Mensaje de depuración
        $this->conect->set_charset('utf8');
    }

    public function consulta($consulta) {
        echo "Consulta: $consulta<br>"; // Mensaje de depuración
        $this->consulta = $this->conect->query($consulta);

        if (!$this->consulta) {
            die("Error en la consulta: " . $this->conect->error); // Muestra el error
        }

        return $this->consulta;
    }

    public function mostrar_registros() {
        if ($row = $this->consulta->fetch_assoc()) {
            return $row;
        } else {
            return false;
        }
    }

    public function mostrar_row() {
        if ($maxrow = $this->consulta->fetch_row()) {
            $idmaxrow = $maxrow[0];
            return $idmaxrow;
        } else {
            return false;
        }
    }

    public function numero_filas() {
        return $this->consulta ? $this->consulta->num_rows : false;
    }

    public function numero_campos() {
        return $this->consulta ? $this->consulta->field_count : false;
    }

    public function obtenerError() {
        return $this->conect->error;
    }

    public function SelectText($campos, $tabla, $where, $order, $datoOrder, $tipoOrder) {
        $select = "SELECT $campos FROM $tabla ";
        if ($where) {
            $select .= "WHERE $where ";
        }
        if ($order) {
            $select .= "ORDER BY $datoOrder $tipoOrder";
        }
        return $select;
    }

    public function InsertText($tabla, $campos, $datos) {
        $insert = "INSERT INTO $tabla ($campos) VALUES ($datos)";
        return $insert;
    }

    public function ActualizarText($tabla, $arraydatos, $where) {
        $update = "UPDATE $tabla SET ";
        foreach ($arraydatos as $key => $value) {
            $update .= "$key = '" . $this->conect->real_escape_string($value) . "', ";
        }
        $update = rtrim($update, ', ');
        $update .= " WHERE $where";
        return $update;
    }
}
?>

