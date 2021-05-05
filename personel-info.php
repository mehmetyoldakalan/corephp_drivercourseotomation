<?php
session_start();
ob_start();
require_once "db.php";
include "sessionControl.php";
$personelSor=$db->prepare("SELECT * FROM personel");
$personelSor->execute();


?>
<!DOCTYPE html>
<html lang="en">
<head>
		<title></title>
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/personel.CSS"/>
        
	</head>
<body>
<?php
@$process=$_GET['process'];
switch ($process) {
    case 'personelUpdate':?>
        <table class="table table-hovertable">
					  <thead>
					    <tr>
					      <th>İsim</th>
					      <th>Soyisim</th>
					      <th>Mail</td>					     
					      <th>Maaş</th>
					      <th>güncelle</th>
					      				      
					    </tr>
					  </thead>
                      <?php
                      @$guncelleid=$_POST['id'];
                        $personelGuncelleSor=$db->prepare("SELECT * FROM personel where personel_id=:id");
                        $personelGuncelleSor->execute(array(
                            'id'=>$guncelleid
                        ));
                        $personelGuncelle=$personelGuncelleSor->fetch(PDO::FETCH_ASSOC)
                      ?>
					  		
					  			<tbody>
							    <tr>
                                <form action="process" method="POST">
                                      <input type="hidden" name="personelGuncelleid" value="<?php echo $personelGuncelle['personel_id']; ?>">
							      <td><input type="text" name="personelGuncelleisim" value="<?php echo $personelGuncelle['personel_isim'];?>"></td>
							      <td><input type="text" name="personelGuncellesoyisim" value="<?php echo $personelGuncelle['personel_soyisim'];?>"></td>
							      <td><input type="mail" name="personelGuncellemail" value="<?php echo $personelGuncelle['personel_mail'];?>"></td>							     
							      <td><input type="text" name="personelGuncellemaas" value="<?php echo $personelGuncelle['personel_maas'];?>"></td>							    	
							      <td><button type="submit" name="personelGuncelle" class="btn btn-success btn-md"><i>Güncelle</i></button></td>
							    </form>

							  	

							    </tr>	    
							  </tbody>
					  		
					   </table>
        <?php break;
    
    case 'personelInsert':?>
        <table class="table table-hovertable">
					  <thead>
					    <tr>
					      <th>İsim</th>
					      <th>Soyisim</th>
					      <th>Mail</td>					     
					      <th>Maaş</th>
					      <th>Onayla</th>
					      				      
					    </tr>
					  </thead>
                      <?php
                      @$guncelleid=$_POST['id'];
                        $personelGuncelleSor=$db->prepare("SELECT * FROM personel where personel_id=:id");
                        $personelGuncelleSor->execute(array(
                            'id'=>$guncelleid
                        ));
                        $personelGuncelle=$personelGuncelleSor->fetch(PDO::FETCH_ASSOC)
                      ?>
					  		
					  			<tbody>
							    <tr>
                                <form action="process" method="POST">
                                      
							      <td><input type="text" name="personelEkleisim" placeholder="isim giriniz"></td>
							      <td><input type="text" name="personelEklesoyisim"placeholder="soyisim giriniz"></td>
							      <td><input type="mail" name="personelEklemail"placeholder="mail giriniz"></td>							     
							      <td><input type="text" name="personelEklemaas"placeholder="maaş giriniz"></td>							    	
							      <td><button type="submit" name="personelEkle" class="btn btn-success btn-md"><i>Personel Ekle</i></button></td>
							    </form>

							  	

							    </tr>	    
							  </tbody>
					  		
					   </table>
        <?php break;
   
   
   
                        
   default:?>   
<div class="container">


					<div class="row">
                   
						<div style="float: right; margin-right: 5px; position: relative; ">
							<button style="width: 100px; margin-top: 30px;"onclick="window.location.href='personel-info?process=personelInsert'" id="personelEkle"  type="button" class="btn btn-primary btn-md">
					    	<i>çalışan ekle</i>
							</button><br>
                           
						</div>
                        <div style="float: right; margin-right: 5px; position: relative; ">
							<button style="width: 100px; margin-top: 30px;"onclick="window.location.href='anasayfa'"  type="button" class="btn btn-success btn-md">
					    	<i>anasayfa</i>
							</button><br>
                           
						</div>
				    <h1>Çalışan Tablosu</h1>
                    <i id="silDurum" style="font-size: 20px;"></i>
                    <?php
                        if (isset($_GET['status'])) {
                            if ($_GET['status']=="success") {?>
                               <script>
                                   $("#silDurum").css('color', 'white').html("kayıt başarıyla silindi").fadeIn(2000).fadeOut(6000);
                               </script>
                            <?php }
                            else if($_GET['status']=="unsuccess"){?>
                                <script>
                                    $("#silDurum").css('color', 'red').html("kayıt silinirken hata oluştu").fadeIn(2000).fadeOut(6000);
                                </script>
                             <?php }
                        }
                    ?>
                    
                    
					<table class="table table-hovertable">
					  <thead>
					    <tr>
					      <th>İsim</th>
					      <th>Soyisim</th>
					      <th>Mail</td>					     
					      <th>Maaş</th>
                          <th>Kayıt tarihi</th>
					      <th>güncelle</th>
					      <th>sil</th>				      
					    </tr>
					  </thead>
					  <?php 
					  		while ($personelYaz=$personelSor->fetch(PDO::FETCH_ASSOC)) {?>
					  			<tbody>
							    <tr>
							      <td><?php echo $personelYaz['personel_isim'];?></td>
							      <td><?php echo $personelYaz['personel_soyisim'];?></td>
							      <td><?php echo $personelYaz['personel_mail'];?></td>							     
							      <td><?php echo $personelYaz['personel_maas'];?></td>
                                  <td><?php echo $personelYaz['personel_kayittarih'];?></td>
							    <form action="personel-info?process=personelUpdate" method="POST">
							    	<input type="hidden" name="id" value="<?php echo $personelYaz['personel_id']; ?>">
							      <td><button onclick="window.location.href='personel-info?process=update'"  type="submit" class="btn btn-success btn-md"><i>Güncelle</i></button></td>
							  	</form>

							  	<form action="process" method="POST"> 
							  		<input type="hidden" name="id" value="<?php echo $personelYaz['personel_id']; ?>">
							      <td><button name="personel_sil" type="submit" class="btn btn-danger btn-md"><i>Sil</i></button>
							      </td>	
							  	</form>

							    </tr>	    
							  </tbody>
					  		<?php }
					   ?>
					   </table>
					</div>
					</div>




<?php break;}?>
</body>
</html>