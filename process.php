<?php
session_start();
ob_start();
require_once "db.php";
include "sessionControl.php";
include "errorPage.php";

//***************************************************************
//personel giriş =>
if(isset($_POST['personelgiris'])){
    $mail=htmlspecialchars(strip_tags($_POST['mail']));
    $parola=htmlspecialchars(strip_tags(md5(md5($_POST['parola']))));
    $personelsor=$db->prepare("SELECT * FROM personel where
        personel_mail=:mail and
        personel_parola=:parola
    ");
    $personelsor->execute(array(
        'mail'=>$mail,
        'parola'=>$parola
    ));
    $durum=$personelsor->rowCount();
    if($durum<=0){
        header("Location:index.php?status=permissionDenied");
    }
    else{
        $_SESSION['personel_mail']=$mail;
        header("Location:anasayfa");
    }
}
//***********************************************************************
//personel sil-güncelle-ekle =>
if(isset($_POST['personel_sil'])) {
        $id=$_POST['id'];
        $personelSil=$db->prepare("DELETE from personel where personel_id=:id");
        $delete=$personelSil->execute(array(
            'id'=>$id
        ));
        if ($delete) {
            header("Location:personel-info?status=success");
        }else{
            header("Location:personel-info?status=unsuccess");
        }
      
}
if (isset($_POST['personelGuncelle'])) {
    $personel_id=$_POST['personelGuncelleid'];
    $personel_isim=htmlspecialchars(strip_tags($_POST['personelGuncelleisim']));
    $personel_soyisim=htmlspecialchars(strip_tags($_POST['personelGuncellesoyisim']));
    $personel_mail=htmlspecialchars(strip_tags($_POST['personelGuncellemail']));
    $personel_maas=htmlspecialchars(strip_tags($_POST['personelGuncellemaas']));
    $personelGuncelle=$db->prepare("UPDATE personel set 
        personel_isim=:personel_isim,
        personel_soyisim=:personel_soyisim,
        personel_mail=:personel_mail,
        personel_maas=:personel_maas
        where personel_id=$personel_id
    ");
    $update=$personelGuncelle->execute(array(
        'personel_isim'=>$personel_isim,
        'personel_soyisim'=>$personel_soyisim,
        'personel_mail'=>$personel_mail,
        'personel_maas'=>$personel_maas
    ));
    if ($update) {
        header("Location:personel-info");

    }else{
        echo "bir hata oluştu";
    }
}
if (isset($_POST['personelEkle'])) {
    $personel_isim=htmlspecialchars(strip_tags($_POST['personelEkleisim']));
    $personel_soyisim=htmlspecialchars(strip_tags($_POST['personelEklesoyisim']));
    $personel_mail=htmlspecialchars(strip_tags($_POST['personelEklemail']));
    $personel_maas=htmlspecialchars(strip_tags($_POST['personelEklemaas']));
    $personelEkle=$db->prepare("INSERT INTO personel set 
        personel_isim=:personel_isim,
        personel_soyisim=:personel_soyisim,
        personel_mail=:personel_mail,
        personel_maas=:personel_maas
    ");
    $insert=$personelEkle->execute(array(
        'personel_isim'=>$personel_isim,
        'personel_soyisim'=>$personel_soyisim,
        'personel_mail'=>$personel_mail,
        'personel_maas'=>$personel_maas
    ));
    if ($insert) {
        header("Location:personel-info");
    }else{
        echo "bir hata oluştu";
    }
}
//****************************************************************
//kursiyer güncelle-ekle-sil =>
if (isset($_POST['kursiyerGuncelle'])) {
    $kursiyer_tc=$_POST['kursiyerGuncelletc'];
    $kursiyer_isim=htmlspecialchars(strip_tags($_POST['kursiyerGuncelleisim']));
    $kursiyer_soyisim=htmlspecialchars(strip_tags($_POST['kursiyerGuncelleSoyisim']));
    $kursiyer_telefon=htmlspecialchars(strip_tags($_POST['kursiyerGuncelleTelefon']));
    $kursiyer_dogum_tarihi=$_POST['kursiyerGuncelleDgmtrh'];
    $kursiyer_dogum_yeri=$_POST['kursiyerGuncelleDgmyeri'];
    $kursiyer_medeni_durum=$_POST['kursiyer_medeni_durum'];
    $kursiyer_kan_grubu=$_POST['kursiyer_kan_grubu'];
    $kursiyer_arac_tipi=$_POST['kursiyer_arac_tipi'];
    $kursiyer_saglik_raporu=$_POST['kursiyer_saglik_raporu'];
    $kursiyer_odeme_durum=$_POST['kursiyer_odeme_durum'];
    $kursiyer_id=$_POST['kursiyerGuncelleid'];
    $kursiyer_guncelle=$db->prepare("UPDATE kursiyer set
        kursiyer_tc=:kursiyer_tc,
        kursiyer_isim=:kursiyer_isim,
        kursiyer_soyisim=:kursiyer_soyisim,
        kursiyer_telefon=:kursiyer_telefon,
        kursiyer_dogtar=:kursiyer_dogtar,
        kursiyer_dogyer=:kursiyer_dogyer,
        kursiyer_medenidurum=:kursiyer_medenidurum,
        kursiyer_kangrubu=:kursiyer_kangrubu,
        kursiyer_aractipi=:kursiyer_aractipi,
        kursiyer_saglikraporu=:kursiyer_saglikraporu,
        kursiyer_odemedurum=:kursiyer_odemedurum
        where kursiyer_id=$kursiyer_id
    ");
    $update=$kursiyer_guncelle->execute(array(
        'kursiyer_tc'=>$kursiyer_tc,
        'kursiyer_isim'=>$kursiyer_isim,
        'kursiyer_soyisim'=>$kursiyer_soyisim,
        'kursiyer_telefon'=>$kursiyer_telefon,
        'kursiyer_dogtar'=>$kursiyer_dogum_tarihi,
        'kursiyer_dogyer'=>$kursiyer_dogum_yeri,
        'kursiyer_medenidurum'=>$kursiyer_medeni_durum,
        'kursiyer_kangrubu'=>$kursiyer_kan_grubu,
        'kursiyer_aractipi'=>$kursiyer_arac_tipi,
        'kursiyer_saglikraporu'=>$kursiyer_saglik_raporu,
        'kursiyer_odemedurum'=>$kursiyer_odeme_durum
    ));
    if ($update) {
        header("Location:kursiyer-info?status=updateSuccess");
    }
    else{
        header("Location:kursiyer-info?status=updateUnsuccess");
    }
}
if (isset($_POST['kursiyerSil'])) {
    $kursiyer_id=$_POST['kursiyer_id'];
    $kursiyer_sil=$db->prepare("DELETE from kursiyer where kursiyer_id=:id");
    $delete=$kursiyer_sil->execute(array(
        'id'=>$kursiyer_id
    ));
    if($delete){
        header("Location:kursiyer-info?status=deleteSuccess");
    }else{
        header("Location:kursiyer-info?status=deleteUnsuccess");
    }
}
if (isset($_POST['kursiyerEkle'])) {
    $kursiyer_tc=htmlspecialchars(strip_tags($_POST['kursiyerEkletc']));
    $kursiyer_isim=htmlspecialchars(strip_tags($_POST['kursiyerEkleisim']));
    $kursiyer_soyisim=htmlspecialchars(strip_tags($_POST['kursiyerEkleSoyisim']));
    $kursiyer_telefon=htmlspecialchars(strip_tags($_POST['kursiyerEkleTelefon']));
    $kursiyer_dogum_tarihi=$_POST['kursiyerEkleDgmtrh'];
    $kursiyer_dogum_yeri=htmlspecialchars(strip_tags($_POST['kursiyerEkleDgmyeri']));
    $kursiyer_medeni_durum=$_POST['kursiyer_medeni_durum'];
    $kursiyer_kan_grubu=$_POST['kursiyer_kan_grubu'];
    $kursiyer_arac_tipi=$_POST['kursiyer_arac_tipi'];
    $kursiyer_ehliyet_sinifi=$_POST['kursiyer_ehliyet_sinifi'];
    $kursiyer_saglik_raporu=$_POST['kursiyer_saglik_raporu'];
    $kursiyer_ogr_durum=htmlspecialchars(strip_tags($_POST['kursiyer_ogr_durum']));
    $kursiyer_odeme_durum=$_POST['kursiyer_odeme_durum'];

    $ucretSor=$db->prepare("SELECT * FROM ucretler where ucret_sinif=:ucret_sinif");
    $ucretSor->execute(array(
        'ucret_sinif'=>$kursiyer_ehliyet_sinifi
    ));
    $ucretYaz=$ucretSor->fetch(PDO::FETCH_ASSOC);

    $kursiyer_ucret=$ucretYaz['ucret_miktar'];


    $kursiyer_ekle=$db->prepare("INSERT INTO kursiyer set
        kursiyer_tc=:kursiyer_tc,
        kursiyer_isim=:kursiyer_isim,
        kursiyer_soyisim=:kursiyer_soyisim,
        kursiyer_telefon=:kursiyer_telefon,
        kursiyer_dogtar=:kursiyer_dogtar,
        kursiyer_dogyer=:kursiyer_dogyer,
        kursiyer_medenidurum=:kursiyer_medenidurum,
        kursiyer_kangrubu=:kursiyer_kangrubu,
        kursiyer_aractipi=:kursiyer_aractipi,
        kursiyer_ehliyetsinifi=:kursiyer_ehliyetsinifi,
        kursiyer_saglikraporu=:kursiyer_saglikraporu,
        kursiyer_ogrdurum=:kursiyer_ogrdurum,
        kursiyer_odemedurum=:kursiyer_odemedurum,
        kursiyer_ucret=:kursiyer_ucret
    ");
    $insert=$kursiyer_ekle->execute(array(
        'kursiyer_tc'=>$kursiyer_tc,
        'kursiyer_isim'=>$kursiyer_isim,
        'kursiyer_soyisim'=>$kursiyer_soyisim,
        'kursiyer_telefon'=>$kursiyer_telefon,
        'kursiyer_dogtar'=>$kursiyer_dogum_tarihi,
        'kursiyer_dogyer'=>$kursiyer_dogum_yeri,
        'kursiyer_medenidurum'=>$kursiyer_medeni_durum,
        'kursiyer_kangrubu'=>$kursiyer_kan_grubu,
        'kursiyer_aractipi'=>$kursiyer_arac_tipi,
        'kursiyer_ehliyetsinifi'=>$kursiyer_ehliyet_sinifi,
        'kursiyer_saglikraporu'=>$kursiyer_saglik_raporu,
        'kursiyer_ogrdurum'=>$kursiyer_ogr_durum,
        'kursiyer_odemedurum'=>$kursiyer_odeme_durum,
        'kursiyer_ucret'=>$kursiyer_ucret
    ));
    if ($insert) {
        header("Location:kursiyer-info?status=insertSuccess");
    }else{
        header("Location:kursiyer-info?status=insertUnsuccess");
    }
}
//*************************************************************************
//kursiyer ödeme al =>
if(isset($_POST['odeme_onayla'])){
    $id=$_POST['kursiyer_id'];

    if ($_POST['odeme_turu']=="butun_ucret") {
        $odenen_tutar=$_POST['kursiyer_ucret'];
        $odeme_yontemi=$_POST['odeme_yontemi'];
        $odeme_tur="gelir";
        $ucretSor=$db->prepare("UPDATE kursiyer set 
        kursiyer_ucret=:kursiyer_ucret
        where kursiyer_id='$id'");
        $update=$ucretSor->execute(array(
            'kursiyer_ucret'=>0
        ));
        if ($update) {
            $ucretGuncelle=$db->prepare("UPDATE kursiyer set
             kursiyer_odemedurum=:kursiyer_odemedurum 
             where kursiyer_id='$id'");
            $update=$ucretGuncelle->execute(array(
                'kursiyer_odemedurum'=>"ödendi"
            ));
            $gelirEkle=$db->prepare("INSERT INTO kasa set
            odeme_tutar=:odeme_tutar,
            odeme_yontem=:odeme_yontem,
            odeme_tur=:odeme_tur
            ");
            $insert=$gelirEkle->execute(array(
                'odeme_tutar'=>$odenen_tutar,
                'odeme_yontem'=>$odeme_yontemi,
                'odeme_tur'=>$odeme_tur
            ));
            header("Location:kursiyer-odeme?process=paymentok");
        }
        else{
            header("Location:kursiyer-odeme?process=paymenterror");
        }
    }
    
    else if($_POST['odeme_turu']=="taksit_ucret"){
        $kursiyer_sor=$db->prepare("SELECT* FROM kursiyer where kursiyer_id='$id'");
        $kursiyer_sor->execute(array());
        $kursiyer_yaz=$kursiyer_sor->fetch(PDO::FETCH_ASSOC);

        $odenen_tutar=$_POST['odenen_tutar'];
        $odeme_yontemi=$_POST['odeme_yontemi'];
        $odeme_tur="gelir";
        $toplam_ucret=$kursiyer_yaz['kursiyer_ucret'];
        $kalan_ucret=($toplam_ucret)-($odenen_tutar);
        $ucretSor=$db->prepare("UPDATE kursiyer set
         kursiyer_ucret=:kursiyer_ucret 
         where kursiyer_id='$id'");
        $update=$ucretSor->execute(array(
            'kursiyer_ucret'=>$kalan_ucret
        ));
        if ($update) {

            $gelirEkle=$db->prepare("INSERT INTO kasa set
                odeme_tutar=:odeme_tutar,
                odeme_yontem=:odeme_yontem,
                odeme_tur=:odeme_tur
            ");
            $insert=$gelirEkle->execute(array(
                'odeme_tutar'=>$odenen_tutar,
                'odeme_yontem'=>$odeme_yontemi,
                'odeme_tur'=>$odeme_tur
            ));
            header("Location:kursiyer-odeme?status=paymentok");
        }else{
            header("Location:kursiyer-odeme?status=paymenterror");
        }
    }
}
//*******************************************************************
//sınav işlemleri =>
if(isset($_POST['sinavSil'])){
    $id=$_POST['sinav_id'];
    $sinavSor=$db->prepare("DELETE from sinav_bilgileri where sinav_id=:sinav_id");
    $delete=$sinavSor->execute(array(
        'sinav_id'=>$id
    ));
    if ($delete) {
        header("Location:sinav-bilgileri?status=quizdeleted");
    }
    else{
        echo "bir hata ile karşılaşıldı";
    }
}
if (isset($_POST['sinavEkle'])) {
    $sinav_isim=htmlspecialchars(strip_tags($_POST['sinav_isim']));
    $sinav_kategori=$_POST['sinav_kategori'];
    $sinav_tarih=$_POST['sinav_tarih'];
    $sinavEkle=$db->prepare("INSERT INTO sinav_bilgileri set 
        sinav_isim=:sinav_isim,
        sinav_kategori=:sinav_kategori,
        sinav_tarih=:sinav_tarih
    ");
    $insert=$sinavEkle->execute(array(
        'sinav_isim'=>$sinav_isim,
        'sinav_kategori'=>$sinav_kategori,
        'sinav_tarih'=>$sinav_tarih
    ));
    if ($insert) {
        header("Location:sinav-bilgileri?status=quizadded");
    }else{
        echo "bir hata ile karşı karşıyayız";
    }
}
//***************************************************************************
//ücret güncelle =>
if (isset($_POST['ucret_guncelle'])) {
    if(empty($_POST['ucret_miktar'])){
        header("Location:ucret-bilgileri?status=emptyPay");
    }
    else{
        $ucret_miktar=$_POST['ucret_miktar'];
        $ucret_id=$_POST['ucret_id'];
        $ucretGuncelle=$db->prepare("UPDATE ucretler set
            ucret_miktar=:ucret_miktar     
            where ucret_id=$ucret_id 
        ");
        $update=$ucretGuncelle->execute(array(
            'ucret_miktar'=>$ucret_miktar
        ));
        if($update){
            header("Location:ucret-bilgileri?status=updatesuccess");
        }
    }
}

if (isset($_POST['gider_ekle'])) {
    $odeme_tutar=htmlspecialchars(strip_tags($_POST['odeme_tutar']));
    $odeme_yontem=htmlspecialchars(strip_tags($_POST['odeme_yontem']));
    $odeme_tur="gider";
    $giderEkle=$db->prepare("INSERT INTO kasa set
        odeme_tutar=:odeme_tutar,
        odeme_yontem=:odeme_yontem,
        odeme_tur=:odeme_tur
    ");
    $insert=$giderEkle->execute(array(
        'odeme_tutar'=>$odeme_tutar,
        'odeme_yontem'=>$odeme_yontem,
        'odeme_tur'=>$odeme_tur
    ));
    if ($insert) {
        header("Location:muhasebe?status=ok");
    }else{
        header("Location:muhasebe?status=error");
    }
}



//******************************************************************
//ayarlar =>

if(isset($_POST['personel_ayar_guncelle']))
{
    $personel_ayar_isim=htmlspecialchars(strip_tags($_POST['personel_ayar_isim']));
    $personel_ayar_soyisim=htmlspecialchars(strip_tags($_POST['personel_ayar_soyisim']));
    $personel_ayar_mail=htmlspecialchars(strip_tags($_POST['personel_ayar_mail']));
    $personel_ayar_id=$_POST['personel_ayar_id'];
    $personelGuncelle=$db->prepare("UPDATE personel set
        personel_isim=:isim,
        personel_soyisim=:soyisim,
        personel_mail=:mail
    ");
    $update=$personelGuncelle->execute(array(
        'isim'=>$personel_ayar_isim,
        'soyisim'=>$personel_ayar_soyisim,
        'mail'=>$personel_ayar_mail
    ));
    if($update){
        header("Location:ayarlar?status=ok");
    }
    else{
        header("Location:ayarlar?status=error");
    }
}

//parola güncelle =>
if(isset($_POST['parola_kontrol'])){
    $parola=md5(md5(htmlspecialchars(strip_tags($_POST['parola']))));
    $kullanici_adi=$_SESSION['personel_mail'];
    $parolaKontrol=$db->prepare("SELECT * FROM personel where personel_mail=:mail and personel_parola=:parola");
    $parolaKontrol->execute(array(
        'mail'=>$kullanici_adi,
        'parola'=>$parola
    ));
    $sonuc=$parolaKontrol->rowCount();
    if($sonuc==1){
        header("Location:passchange");
    }
    else{
        header("Location:ayarlar?get=passchange&status=invalid");
    }
}


if(isset($_POST['personel_yeni_parola_onayla'])){
    $parola=md5(md5(htmlspecialchars(strip_tags($_POST['personel_yeni_parola']))));
    $personelParolaGuncelle=$db->prepare("UPDATE personel set
        personel_parola=:parola
    ");
    $update=$personelParolaGuncelle->execute(array(
        'parola'=>$parola
    ));
    if($update){
        header("Location:ayarlar?status=passchanged");
    }else{
        echo "bir hata oluştu";
    }
}












?>