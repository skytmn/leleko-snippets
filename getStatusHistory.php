<?php
$output = "";
$crt_num = (int) $_GET['cart'];
$c = $modx->newQuery('CdbCartridgesStatus');
$c->sortby('date','DESC');
$c->where('cartno' => $crt_num);
$statuses = $modx->getCollection('CdbCartridgesStatus', $c);

foreach ($statuses as $status) {
  $statusArr = $status->toArray();
  $statusArr['date'] = date("d.m.Y", strtotime($statusArr['date']));
  $output .= $modx->getChunk('tpl.statusesList', $statusArr);
  
  /*
  Чанк tpl.statusesList:
  
  <p>Статус <b> [[+status]]</b>. Изменен: [[+date]]</p>
  
  */
}
return $output;
