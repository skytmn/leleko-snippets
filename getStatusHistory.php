<?php
$output = "";
$crt_num = (int) $_GET['cart'];
$c = $modx->newQuery('CdbCartridgesStatus');
$c->sortby('date','DESC');
$c->where('cartno' => $crt_num);
$statuses = $modx->getCollection('CdbCartridgesStatus', $c);

foreach ($statuses as $status) {
  $output .= "<p>Статус <b>" . $status->get('status') .
  "</b>. Изменен: " . date("d.m.Y", strtotime($status->get('data'))) . "</p>\n";
}
return $output;
