<?
$row = $modx->getObject('CdbCartridges', array('cartno' => $crt_num));
if(!$row) {
  $row = $modx->newObject('CdbCartridges');
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
		  'Status' => $crt_status,
		  'date' => $crt_date, 
		  'Manager' => $crt_manager,
		  'Zapravil' => $crt_zapravil
		  );

$row->fromArray();
$row->save();
