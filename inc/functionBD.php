<?php 
class GestarBD{

    private $conect;  
    private $base_datos;
    private $servidor;
    private $usuario;
    private $pass;
    function __construct()
    {
        include 'config.php';
        $this->servidor = $config['servidor'];
        $this->usuario = $config['usuario'];
        $this->pass = $config['pass'];
        $this->base_datos = $config['basedatos'];
        $this->conectar_base_datos();
    }

    private function conectar_base_datos() {
        $this->conect = new mysqli($this->servidor, $this->usuario, $this->pass, $this->base_datos);

        if ($this->conect->connect_error) {
            echo "Error al conectar: " . $this->conect->connect_error;
            exit();
        }

        $this->conect->set_charset('utf8');
    }

    public function consulta($consulta)
    {
        $this->consulta = $this->conect->query($consulta);

        if (!$this->consulta) {
            echo "Error en la consulta: " . $this->conect->error;
            return false;
        }

        return $this->consulta;
    }

    public function mostrar_registros()
    {
        if ($row = $this->consulta->fetch_array(MYSQLI_ASSOC)) {
            return $row;
        } else {
            return false;
        }
    }

    public function mostrar_row()
    {
        if ($maxrow = $this->consulta->fetch_row()) {
            $idmaxrow = $maxrow[0];
            return $idmaxrow;
        } else {
            return false;
        }
    }

    public function numeroFilas()
    {
        if ($fila = $this->consulta->num_rows) {
            return $fila;
        } else {
            return false;
        }
    }

    public function numero_campos()
    {
        if ($campos = $this->consulta->field_count) {
            return $campos;
        } else {
            return false;
        }
    }

    public function SelectText($campos, $tabla, $where, $order, $datoOrder, $tipoOrder)
    {
        $select = "SELECT $campos FROM $tabla ";
        if ($where) {
            $select .= "WHERE $where ";
        }
        if ($order) {
            $select .= "ORDER BY $datoOrder $tipoOrder";
        }       
        return $select;
    }

    public function InsertText($tabla, $campos, $datos)
    {
        $insert = "INSERT INTO $tabla ($campos) VALUES ($datos)";
        return $insert;
    }

    public function ActualizarText($tabla, $arraydatos, $where)
    {
        $update = "UPDATE $tabla SET ";
        foreach ($arraydatos as $key => $value) {
            $update .= "$key = '$value', ";
        }
        $update = rtrim($update, ', ');
        $update .= " WHERE $where";
        return $update;
    }

    public function EliminarText($tabla, $where)
    {
        $delete = "DELETE FROM $tabla WHERE $where";
        return $delete;
    }

    public function INNER_JOIN3T($datos, $tabla1, $tabla2, $datosT2, $tabla3, $datosT3, $where)
    {
        $inner_join = "SELECT $datos FROM $tabla1 INNER JOIN $tabla2 ON $datosT2";
        if ($tabla3 && $datosT3) {
            $inner_join .= " INNER JOIN $tabla3 ON $datosT3";
        }
        if ($where) {
            $inner_join .= " WHERE $where";
        }
        return $inner_join;
    }

    public function INNER_JOIN($datos, $from, $arrayTablas, $where)
    {
        $inner_join = "SELECT $datos FROM $from";
        foreach ($arrayTablas as $tabla => $relacion) {
            $inner_join .= " INNER JOIN $tabla ON $relacion";
        }
        if ($where) {
            $inner_join .= " WHERE $where";
        }
        return $inner_join;
    }
}
?>
