<?php

function simple_interest($p,$r,$t)
{
  //returns [amount,simple interest]
  $si = ($p*$r*$t)/100.0 ;
  return [$p+$si,$si];
}

function compound_interest($p,$r,$t,$n) {
  // returns [amount,compound interest]
  $a = $p*pow((1+($r/$n)),($n*$t));
  return [$a,$a-$p];
}

function isValidEmail($email){

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    return false;
  }
  return true;
}

function generate_id(){
  //dont use
  return uniqid();
}


function loanPaymentPerTime($amt,$r,$t){

  $si = simple_interest($amt,$r,$t);

  return $si[0]/($t);
}

function addDate($dt,$type){

  $date=date_create($dt);

  if($type == "d"){
    date_add($date,date_interval_create_from_date_string("1 Day"));
  }
  elseif($type == "m"){
    date_add($date,date_interval_create_from_date_string("1 Month"));
  }
  elseif($type == "y"){
    date_add($date,date_interval_create_from_date_string("1 Year"));
  }
  elseif($type == "w"){
    date_add($date,date_interval_create_from_date_string("1 Week"));
  }

  return date_format($date,"Y-m-d");
}

function showDT($input){
  $date = strtotime($input);
  echo date('d/m/Y', $date);
}

function diffDate($dt1,$dt2,$type){

  $date1=date_create($dt1);
  $date2=date_create($dt2);
  $diff=date_diff($date1,$date2);
  $n=0;
  $days=$diff->format("%a");

  if($type == "d"){
    $n=$days;
  }
  elseif($type == "m"){
    $n=(int)($days/28);
  }
  elseif($type == "y"){
    $n=(int)($days/365);
  }
  elseif($type == "w"){
    $n=(int)($days/7);
  }
  else{
    $n=0;
  }

  return $n;
}

function checkDT($st,$en){

$start = strtotime($st);
$end = strtotime($en);
$today = strtotime(date('Y-m-d'));

if($start >= $end || $end < $today)
{
    return false;
}
return true;
}

?>
