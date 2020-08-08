<?php 

class api_response{

	public function __construct(){}

	public static function mostrar($result, $array){
		$json = array();
		while($row = mysqli_fetch_array($result)) {
			$fila = array();
			for($i = 0; $i < count($array); $i++){
				$fila[$array[$i]] = $row[$i];
			}
			array_push($json, $fila);
		}

		$jsonstring = json_encode($json);
		return $jsonstring;
	}
}

?>