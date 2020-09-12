<?php 

class api_response{
	// se instancia un constructor
	public function __construct(){}
	// se define la función que tomará los datos que llegan desde el controlador para convertirlos en json
	public static function mostrar($result, $array){
		$json = array();
		while($row = mysqli_fetch_array($result)) { // ciclo para recorrer los datos según la consulta
			$fila = array();
			for($i = 0; $i < count($array); $i++){ // ciclo para recorrer el array del controlador
				$fila[$array[$i]] = $row[$i]; // se allmacena cada fila en el array definido según la 										posición del array del controlador
			}
			array_push($json, $fila); // Se almacena el array fila en un nuevo array
		}

		$jsonstring = json_encode($json); // Se convierte en json y posteriormente se retorna
		return $jsonstring;
	}
}

?>