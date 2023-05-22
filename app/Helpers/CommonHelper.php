<?php

function dateRangeGenerator($date1=null,$date2=null){
if ($date1 == $date2){
    return $date1->format('d M Y h:i a');
}
if(($date1->format('d M Y') == $date2->format('d M Y')) && ($date1->format('hisa') != $date2->format('hisa'))){
    return $date1->format('d M Y ').$date1->format('h:i a - ').$date2->format('h:i a');
}
if(($date1->format('M Y') == $date2->format('M Y')) && ($date1->format('dhisa') != $date2->format('dhisa'))){
    return $date1->format('d - ').$date2->format('d ').$date1->format('M Y ').$date1->format('h:i a - ').$date2->format('h:i a');
}
if(($date1->format('Y') == $date2->format('Y')) && ($date1->format('mdhisa') != $date2->format('mdhisa'))){
    return $date1->format('d M - ').$date2->format('d M ').$date1->format('Y ').$date1->format('h:i a - ').$date2->format('h:i a');
}
return $date1->format('d M Y h:i a - ').$date1->format('d M Y h:i a');
}
