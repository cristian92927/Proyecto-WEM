<?php
class conexion{
    private $_mensaje;

    public function SetMensaje($mensaje){
        $this->_mensaje=$mensaje;  }

    public function getMensaje(){
        echo $this->_mensaje;
        echo'<br>' }
        
     public Function EstablecerConexion(){
         //conectar el servidor con la bases de datos
        $conexion = mysql_connet ("localhost","root","") or die ("No se puede conectar con el servidor MYSQL");
        //seleccionar la base de datos
        mysql_select_db("proyecto-wem") or die("No se puede abrir la base de datos");

        return $conexion;
     }   

     public Function ConsultarSQL($SentenciaSQL)
     {
         try
         {
            //Establecer Conexion con el servidor de base de datos
            $conexion=$this->EstablecerConexion();
            //Enviar la consulta
            $consulta=mysql_query($SentenciaSQL, $conexion) or die ("Se ha presentado un error y no se pudo realizar  la consulta");
            //cerrar conexion
            mysql_close($conexion);

            return $consulta;
         }
         catch (Exeption $e)
         {
            $_mensaje = "Se presento el siguiente Error: " .$e->getMessage();
         }
     }
}
?>