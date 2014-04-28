<?php


generatePng(array(
	'labels' => "'Restriction cognitive', 'Emotionnalité', 'Perfectionnisme', 'Contraintes sociales', 'Sédentarité'",
	'min' => 0,
	'max' => 3,
	'serie' => '1,2,3,2,1',
	'params' => array(
		'output' => 'output-generated', 
		'template' => file_get_contents('params.json')
	)
));







function generatePng($datas) {
	if(!isset($datas['labels']) || !isset($datas['min']) || !isset($datas['serie']) || !isset($datas['max'])) {
		return FALSE;
	} else {
		$sNewJson = str_replace('#serie#', $datas['serie'], $datas['params']['template']);
                $sNewJson = str_replace('#max#', $datas['max'], $sNewJson);
                $sNewJson = str_replace('#min#', $datas['min'], $sNewJson);
                $sNewJson = str_replace('#labels#', $datas['labels'], $sNewJson);

                if(file_put_contents('params2.json', $sNewJson) === FALSE) {
                       echo "Erreure pour generer params2.json avec $sNewJson";
                }
                $fileName = str_replace(',','-',$datas['serie']);
		$output = isset($datas['params']['output']) ? $datas['params']['output'] : 'output';
                echo exec("phantomjs highcharts-convert.js -infile params2.json -outfile " . $output . "/" . $fileName . ".png -scale 1 -width 800 -constr Chart -callback callback.js ") . "\n \n";
	}

}

?>
