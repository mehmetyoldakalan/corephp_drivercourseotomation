<?php
include "db.php";
$girissor=$db->prepare("SELECT * FROM personel where personel_mail=:personel_mail");
$girissor->execute(array(
    'personel_mail'=>$_SESSION['personel_mail']
));
$durum=$girissor->rowCount();
if ($durum==0) {
    header("Location:index");
}


?>