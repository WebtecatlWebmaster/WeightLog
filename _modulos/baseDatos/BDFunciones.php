<?php
require 'BDConfiguracion.php';
class BaseDatosFunciones
{
    private $conexion;
    private $conexionSatisfactoria=FALSE;

    public function actualizar($sql)
    {
        //Devuelve el número de registros afectados tras la instruccion SQL Update.
        $registroModificado=0;        
        $this->conectar();        
        if($this->conexionSatisfactoria)
        {
            mysqli_query($this->conexion,$sql);    
            $registroModificado = mysqli_affected_rows($this->conexion);                     
            $this->desconectar();
        }
        return $registroModificado;
    }

    public function borrar($sql)
    {
        //Devuelve el número de registros afectados tras la instruccion SQL Delete.
        $registroModificado=0;
        $this->conectar();        
        if($this->conexionSatisfactoria)
        {
            mysqli_query($this->conexion,$sql);    
            $registroModificado = mysqli_affected_rows($this->conexion);                     
            $this->desconectar();
        }
        else
        {
            $registroModificado=-1;
        }
        return $registroModificado;
    }
    
    public function consultar($sql)
    {
        //Devuelve el resulset tras la instruccion SQL Select.
        $this->conectar();
        if($this->conexionSatisfactoria)
        {
            $items = array();
            $rsItems = mysqli_query($this->conexion,$sql);
            if(mysqli_num_rows($rsItems) > 0)
            {
                while($rsItem = mysqli_fetch_assoc($rsItems))
                {
                    $items[]=$rsItem;   
                }
                mysqli_free_result($rsItems);
                $this->desconectar();
            }
        }
        else
        {
            $items=NULL;
        }
        return $items;
    }
    
    public function insertar($sql)
    {
        //Devuelve el número de registros afectados tras la instruccion SQL insert.
        //Este metodo se usa cuando no se requiere obtener el valo de la llave primaria declarada en la tabla.
        $registroModificado=0;
        $this->conectar();
        if($this->conexionSatisfactoria)
        {                    
            mysqli_query($this->conexion,$sql);
            $registroModificado = mysqli_affected_rows($this->conexion);
            $this->desconectar();
        }
        else
        {
            $registroModificado=-1;
        }
        return $registroModificado;       
    }

    public function insertarID($sql)
    {
        //Devuelve el valor de la llave primaria declara en la tabla
        $idUltimoRegistro=0;
        $this->conectar();
        if($this->conexionSatisfactoria)
        {            
            mysqli_query($this->conexion,$sql);    
            $idUltimoRegistro = mysqli_insert_id($this->conexion);             
            $this->desconectar();
        }
        else
        {
            $idUltimoRegistro=-1;
        }
        return $idUltimoRegistro;
    }
    
    private function conectar()
    {
        //Abrir un conexion a base de datos.
        $conexion=mysqli_connect(BDIP,BDUSUARIO,BDCONTRASENA,BASEDATOS);
        if($conexion)
        {
            $this->conexion=$conexion;
            $this->conexionSatisfactoria=TRUE;
        }
    }
    
    private function desconectar()
    {
        //Cerar la conexion a la base de datos.
        mysqli_close($this->conexion);
    }
}
?>