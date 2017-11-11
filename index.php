<?php
include 'amspacket.php';
include 'ads.php';

$ad = new Ads(192,168,0,163,1,1,851);

if($ad->Connect("192.168.0.163", 0xBF02))
{
    $ad->SetOwnAmsAddr(192,168,0,162,1,1,3000);
    //var_dump($ad->AdsRead(0x00004020, 0, 4));
    $ad->AdsReadSymbol("MAIN.var1","int");
}
else
{
    echo "Connect fehlgeschlagen.";
}

?>