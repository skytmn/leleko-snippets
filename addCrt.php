<?
foreach($Client_data->Cartridges->Cartridge as $Cartridgy) {

$cli_inn = (int) $Client_data->ClientINN;
$crt_id = (int) $Cartridgy->id_crt;
$crt_num = (int) $Cartridgy->Number;
$crt_model = (string) $Cartridgy->Model;
$crt_unit = (string) $Cartridgy->Podrazdelenie;
$crt_zapravka = (string) $Cartridgy->Zapravka;
$crt_vosstanovlenie = (string) $Cartridgy->Vosstonovlenie;
$crt_zamenaopc = (string) $Cartridgy->ZamenaBarabanaOPC;
$crt_zamenarakela = (string) $Cartridgy->ZamenaRakelaVB;
$crt_zamenavalazar = (string) $Cartridgy->ZamenaValaZariada;
$crt_zamenadozlezv = (string) $Cartridgy->ZamenaDozLezvia;
$crt_zamenamagvala = (string) $Cartridgy->ZamenaMagnitnogoVala;
$crt_zamenaproavrol = (string) $Cartridgy->ZamenaProavlRolika;
$crt_zamenachipa = (string) $Cartridgy->ZamenaChipa;
$crt_zamenacorpkart = (string) $Cartridgy->ZamenaCorpusaCartridga;
$crt_zamenaroltonera = (string) $Cartridgy->ZamenaRolikaPodachiTonera;
$crt_vozvrat = (string) $Cartridgy->Vozvrat;
$crt_pogarantii = (string) $Cartridgy->PoGarantii;
$crt_document = (string) $Cartridgy->Document;
$crt_status = (string) $Cartridgy->Status;

$crt_date = (string) $Cartridgy->Date;
	if ($crt_date == '00.00.0000') {
	  $crt_date = '2000.01.01 00:00:00';
	} else {
	  $crt_date_arr = explode('.', $crt_date);
	  $crt_date = $crt_date_arr[2].'-'.$crt_date_arr[1].'-'.$crt_date_arr[0].' 00:00:00';
	}

$crt_manager = (string) $Cartridgy->Manager;
$crt_zapravil = (string) $Cartridgy->Zapravil;


//$cartr = $modx->getObject('CdbCartridges', 1); // цифра - это id-шник
//$obj = $cartr->toArray();
//echo "<pre>";
//print_r($obj);
//echo "</pre>";
//die();
$row = $modx->getObject('CdbCartridges', array('cartno' => $crt_num));

if(!$row) {
  $row = $modx->newObject('CdbCartridges');  
}

$status = $modx->getObject('CdbCartridgesStatus', array('cartno' => $crt_num,
							'status' => $crt_status,
							'date'   => $crt_date));
print '<pre>';
print_r($status->toArray());
die();

if (!$status) {
  $statusExisting = '';
  $status = $modx->newObject('CdbCartridgesStatus');
  $status->fromArray('cartno' => $crt_num,
		     'status' => $crt_status,
		     'date' => $crt_date);

  $statusDateTime = strtotime($crt_date);
  $currentStatusDateTime = strtotime($row->get('date'));
  
  if ($statusDateTime > $currentStatusDateTime) {
  	$row->set('Status', $crt_status);
  	$row->set('date',   $crt_date, );
  }

  
} else {
  $statusExisting = '. Status already existing';
}

$cartParams = array('inn' => $cli_inn, 
                  'cartno' => $crt_num, 
		  'Model' => $crt_model,
		  'Podrazdelenie' => $crt_unit,
		  'Zapravka' => $crt_zapravka, 
		  'Vosstonovlenie' => $crt_vosstanovlenie, 
		  'ZamenaBarabanaOPC' => $crt_zamenaopc, 
		  'ZamenaRakelaVB' => $crt_zamenarakela, 
		  'ZamenaValaZariada' => $crt_zamenavalazar, 
		  'ZamenaDozLezvia' => $crt_zamenadozlezv, 
		  'ZamenaMagnitnogoVala' => $crt_zamenamagvala, 
		  'ZamenaProavlRolika' => $crt_zamenaproavrol, 
		  'ZamenaChipa' => $crt_zamenachipa, 
		  'ZamenaCorpusaCartridga' => $crt_zamenacorpkart, 
		  'ZamenaRolikaPodachiTonera' => $crt_zamenaroltonera,
		  'Vozvrat' => $crt_vozvrat,
		  'PoGarantii' => $crt_pogarantii,
		  'Document' => $crt_document,
		  'Manager' => $crt_manager,
		  'Zapravil' => $crt_zapravil
		  );

$row->fromArray($cartParams);
$row->save();

echo $row->get('cartno').", status: ".$status->get('status')." (".$status->get('date').")".$statusExisting."<br>";


		} 

	} 
}
echo "<br>";
echo "<b><small>Данные обработаны.</small></b>";
