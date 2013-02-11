<?
$modx->addPackage('cartridges', $modx->getOption('core_path').'components/cartridges/model/','modx_cartridges_');
$row = $modx->getObject('CdbCartridges', $cli_inn);
if(!$row) {
$row = $modx->newObject('CdbCartridges');}
$row->fromArray(array('inn' => $cli_inn, 
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
		//			  'time' => $crt_time,
					  'Manager' => $crt_manager,
					  'Zapravil' => $crt_zapravil
					  ));
$row->save();
