// сортировка по дате
var minDateFilter;
var maxDateFilter;

$.fn.dataTableExt.afnFiltering.push(
//  function( oSettings, aData, iDataIndex ) {
//    if ( typeof aData._date == 'undefined' ) {
function( oSettings, aData, iDataIndex ) {
//alert(aData._date);
//alert(aData._date == null);
//alert(iDataIndex);

     if ( aData._date == null ) {
      aData._date = new Date(aData[1]).getTime();
    }

    if ( minDateFilter && !isNaN(minDateFilter) ) {
      if ( aData._date < minDateFilter ) {
        return false;
      }
    }
    
    if ( maxDateFilter && !isNaN(maxDateFilter) ) {
      if ( aData._date > maxDateFilter ) {
        return false;
      }
    }
    
    return true;
  }
);
