<?php
session_start();
ob_start();
require_once "db.php";
include "sessionControl.php";
$kursiyerSor=$db->prepare("SELECT * FROM kursiyer");
$kursiyerSor->execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
		<title></title>
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/kursiyer.CSS"/>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	</head>
<body>
<?php
@$process=$_GET['process'];
switch ($process) {
    case 'kursiyerUpdate':?>
        <table class="table table-hovertable">
					  <thead>
					    <tr>
					      <th>bilgi</th>
					      <th>değer</th>
					      
					      				      
						</tr>
					  </thead>
                      <?php
                      @$guncelleid=$_POST['id'];
                        $kursiyerGuncelleSor=$db->prepare("SELECT * FROM kursiyer where kursiyer_id=:id");
                        $kursiyerGuncelleSor->execute(array(
                            'id'=>$guncelleid
                        ));
                        $kursiyerGuncelle=$kursiyerGuncelleSor->fetch(PDO::FETCH_ASSOC)
                      ?>
					  		
					  			<tbody>
								<form action="process" method="POST">
								<input type="hidden" name="kursiyerGuncelleid" value="<?php echo $kursiyerGuncelle['kursiyer_id']?>">
								<tr>
									<td>
									Tc no
									</td>
									<td>
									<input type="text" name="kursiyerGuncelletc" value="<?php echo $kursiyerGuncelle['kursiyer_tc'];?>">
									</td>
								</tr>
								<tr>
									<td>
									İsim
									</td>
									<td>
									<input type="text" name="kursiyerGuncelleisim" value="<?php echo $kursiyerGuncelle['kursiyer_isim'];?>">
									</td>
								</tr>
								<tr>
									<td>
									Soyisim
									</td>
									<td>
									<input type="text" name="kursiyerGuncelleSoyisim" value="<?php echo $kursiyerGuncelle['kursiyer_soyisim'];?>">
									</td>
								</tr>
								<tr>
									<td>
									Telefon numarası
									</td>
									<td>
									<input type="mail" name="kursiyerGuncelleTelefon" value="<?php echo $kursiyerGuncelle['kursiyer_telefon'];?>">
									</td>
								</tr>
								<tr>
									<td>
									Doğum tarihi
									</td>
									<td>
									<input type="date" name="kursiyerGuncelleDgmtrh" value="<?php echo $kursiyerGuncelle['kursiyer_dogtar'];?>">
									</td>
								</tr>
								<tr>
									<td>
									Doğum yeri
									</td>
									<td>
									<input type="text" name="kursiyerGuncelleDgmyeri" value="<?php echo $kursiyerGuncelle['kursiyer_dogyer'];?>">
									</td>
								</tr>
								<tr>
									<td>
									Medeni durum
									</td>
									<td>
									<select name="kursiyer_medeni_durum">
											<option value="1"<?php echo $kursiyerGuncelle['kursiyer_medenidurum']== '1' ?'selected=""':''?>>evli</option>
											<option value="2"<?php echo $kursiyerGuncelle['kursiyer_medenidurum']== '2' ?'selected=""':''?>>bekar</option>
										</select>
									
									</td>
								</tr>
								<tr>
									<td>
									Kan grubu
									</td>
									<td>
										<select name="kursiyer_kan_grubu">
											<option value="0RH-"<?php echo $kursiyerGuncelle['kursiyer_kangrubu']== '0RH-' ?'selected=""':''?>>0RH-</option>
											<option value="0RH+"<?php echo $kursiyerGuncelle['kursiyer_kangrubu']== '0RH+' ?'selected=""':''?>>0RH+</option>
											<option value="ARH-"<?php echo $kursiyerGuncelle['kursiyer_kangrubu']== 'ARH-' ?'selected=""':''?>>ARH-</option>
											<option value="ARH+"<?php echo $kursiyerGuncelle['kursiyer_kangrubu']== 'ARH+' ?'selected=""':''?>>ARH+</option>
											<option value="BRH-"<?php echo $kursiyerGuncelle['kursiyer_kangrubu']== 'BRH-' ?'selected=""':''?>>BRH-</option>
											<option value="BRH+"<?php echo $kursiyerGuncelle['kursiyer_kangrubu']== 'BRH+' ?'selected=""':''?>>BRH+</option>
											<option value="ABRH-"<?php echo $kursiyerGuncelle['kursiyer_kangrubu']== 'ABRH-' ?'selected=""':''?>>ABRH-</option>
											<option value="ABRH+"<?php echo $kursiyerGuncelle['kursiyer_kangrubu']== 'ABRH+' ?'selected=""':''?>>ABRH+</option>
										</select>									
									</td>
								</tr>
								<tr>
									<td>
									Kurs kayıt tarihi
									</td>
									<td>
									<input disabled type="date" value="<?php echo $kursiyerGuncelle['kursiyer_kayittarihi'];?>">
									</td>
								</tr>
								<tr>
									<td>
									Araç tipi
									</td>
									<td>
										<select name="kursiyer_arac_tipi">
											<option value="1"<?php echo $kursiyerGuncelle['kursiyer_aractipi']== '1' ?'selected=""':''?>>otomatik</option>
											<option value="2"<?php echo $kursiyerGuncelle['kursiyer_aractipi']== '2' ?'selected=""':''?>>manuel</option>
										</select>
									
									</td>
								</tr>
								<tr>
									<td>
									Ehliyet sınıfı
									</td>
									<td>
									<input disabled type="text" value="<?php echo $kursiyerGuncelle['kursiyer_ehliyetsinifi'];?>">
									</td>
								</tr>
								<tr>
									<td>
									Sağlık raporu
									</td>
									<td>
										<select name="kursiyer_saglik_raporu">
											<option value="1"<?php echo $kursiyerGuncelle['kursiyer_saglikraporu']== '1' ?'selected=""':''?>>var</option>
											<option value="2"<?php echo $kursiyerGuncelle['kursiyer_saglikraporu']== '2' ?'selected=""':''?>>yok</option>
										</select>
									
									</td>
								</tr>
								<tr>
									<td>
									Öğrenim durumu
									</td>
									<td>
									<input type="text" disabled value="<?php echo $kursiyerGuncelle['kursiyer_ogrdurum'];?>">
									</td>
								</tr>
								<tr>
									<td>
									Ödeme durumu
									</td>
									<td>
									<select name="kursiyer_odeme_durum">
										<option value="ödendi"<?php echo $kursiyerGuncelle['kursiyer_odemedurum']=='ödendi'?'selected=""':'';?>> <i style="color:green;">ödendi</i> </option>
										<option value="ödenmedi"<?php echo $kursiyerGuncelle['kursiyer_odemedurum']=='ödenmedi'?'selected=""':'';?>> <i style="color:red;">ödenmedi</i> </option>
									</select>
									
									</td>
								</tr>	
								<tr>
									<td>
									<button type="submit" name="kursiyerGuncelle" class="btn btn-success ">Onayla</button>
									</td>
								</tr>						
								</form>
							  </tbody>
					  		
					   </table>
        <?php break;
    
    case 'kursiyerInsert':?>
         <table class="table table-hovertable">
					  <thead>
					    <tr>
					      <th>bilgi</th>
					      <th>değer</th>
					      
					      				      
						</tr>
					  </thead>                    
					  		
					  			<tbody>
								<form action="process" method="POST">
								
								<tr>
									<td>
									Tc no
									</td>
									<td>
									<input required type="text" name="kursiyerEkletc" >
									</td>
								</tr>
								<tr>
									<td>
									İsim
									</td>
									<td>
									<input required type="text" name="kursiyerEkleisim" >
									</td>
								</tr>
								<tr>
									<td>
									Soyisim
									</td>
									<td>
									<input required type="text" name="kursiyerEkleSoyisim">
									</td>
								</tr>
								<tr>
									<td>
									Telefon numarası
									</td>
									<td>
									<input  required type="mail" name="kursiyerEkleTelefon">
									</td>
								</tr>
								<tr>
									<td>
									Doğum tarihi
									</td>
									<td>
									<input required type="date" name="kursiyerEkleDgmtrh">
									</td>
								</tr>
								<tr>
									<td>
									Doğum yeri
									</td>
									<td>
									<input required type="text" name="kursiyerEkleDgmyeri" >
									</td>
								</tr>
								<tr>
									<td>
									Medeni durum
									</td>
									<td>
									<select name="kursiyer_medeni_durum">
											<option value="1">evli</option>
											<option value="2">bekar</option>
										</select>
									
									</td>
								</tr>
								<tr>
									<td>
									Kan grubu
									</td>
									<td>
										<select name="kursiyer_kan_grubu">
											<option value="0RH-">0RH-</option>
											<option value="0RH+">0RH+</option>
											<option value="ARH-">ARH-</option>
											<option value="ARH+">ARH+</option>
											<option value="BRH-">BRH-</option>
											<option value="BRH+">BRH+</option>
											<option value="ABRH-">ABRH-</option>
											<option value="ABRH+">ABRH+</option>
										</select>									
									</td>
								</tr>
								<tr>
									<td>
									Kurs kayıt tarihi
									</td>
									<td>
									<input disabled type="text" placeholder="sistem tarafından atanır" >
									</td>
								</tr>
								<tr>
									<td>
									Araç tipi
									</td>
									<td>
										<select name="kursiyer_arac_tipi">
											<option value="1">otomatik</option>
											<option value="2">manuel</option>
										</select>
									
									</td>
								</tr>
								<tr>
									<td>
									Ehliyet sınıfı
									</td>
									<td>
									<select name="kursiyer_ehliyet_sinifi">
											<option value="M">M</option>
											<option value="A1">A1</option>
											<option value="A2">A2</option>
											<option value="A">A</option>
											<option value="B1">B1</option>
											<option value="B">B</option>
											<option value="BE">BE</option>
											<option value="C1E">C1E</option>
											<option value="CE">CE</option>
											<option value="D1">D1</option>
											<option value="D1E">D1E</option>
											<option value="D">D</option>
											<option value="DE">DE</option>
											<option value="F">F</option>
											<option value="G">G</option>
										</select>	
									</td>
								</tr>
								<tr>
									<td>
									Sağlık raporu
									</td>
									<td>
										<select name="kursiyer_saglik_raporu">
											<option value="1">var</option>
											<option value="2">yok</option>
										</select>
									
									</td>
								</tr>
								<tr>
									<td>
									Öğrenim durumu
									</td>
									<td>
									<input required name="kursiyer_ogr_durum" type="text">
									</td>
								</tr>
								<tr>
									<td>
									Ödeme durumu
									</td>
									<td>
									<select name="kursiyer_odeme_durum">
										<option value="ödendi"> <i style="color:green;">ödendi</i> </option>
										<option value="ödenmedi"> <i style="color:red;">ödenmedi</i> </option>
									</select>
									
									</td>
								</tr>	
								<tr>
									<td>
									<button type="submit" name="kursiyerEkle" class="btn btn-success ">Onayla</button>
									</td>
								</tr>						
								</form>
							  </tbody>
					  		
					   </table>
        <?php break;;
   
   
   
                        
   default:?>   
	<div class="container">


					<div class="row">
                   
						<div style="float: right; margin-right: 5px; position: relative; ">
							<button style="width: 100px; margin-top: 30px;"onclick="window.location.href='kursiyer-info?process=kursiyerInsert'" id="kursiyerEkle"  type="button" class="btn btn-primary btn-md">
					    	<i>Kursiyer ekle</i>
							</button><br>
                           
						</div>
                        <div style="float: right; margin-right: 5px; position: relative; ">
							<button style="width: 100px; margin-top: 30px;"onclick="window.location.href='anasayfa'"  type="button" class="btn btn-success btn-md">
					    	<i>anasayfa</i>
							</button><br>
                           
						</div>
				    <h1>Kursiyer Tablosu</h1>
					<div id="durum"></div>
					<?php
						if(isset($_GET['status'])){
							if($_GET['status']=="updateSuccess"){
								?>
									<script>
										swal({
											title: "Başarılı",
											text: "Kursiyer Başarıyla Güncellendi",
											icon: "success",
											button:"tamam"
											});
									</script>
								<?php		
							}
							elseif($_GET['status']=="updateUnsuccess"){
								?>
									<script>
										swal({
											title: "Başarısız",
											text: "Kursiyer Güncellenemedi",
											icon: "error",
											button:"tamam"
											});
									</script>
								<?php
							}
							elseif($_GET['status']=="insertSuccess"){
								?>
									<script>
										swal({
											title: "Başarılı",
											text: "Kursiyer Başarıyla Eklendi",
											icon: "success",
											button:"tamam"
											});
									</script>
								<?php
							}
							elseif($_GET['status']=="insertUnsuccess"){
								?>
									<script>
										swal({
											title: "Başarısız",
											text: "Kursiyer Eklenemedi",
											icon: "error",
											button:"tamam"
											});
									</script>
								<?php
							}
							elseif($_GET['status']=="deleteSuccess"){
								?>
									<script>
										swal({
											title: "Başarılı",
											text: "Kursiyer Başarıyla Silindi",
											icon: "success",
											button:"tamam"
											});
									</script>
								<?php
							}
							elseif($_GET['status']=="deleteUnsuccess"){
								?>
									<script>
										swal({
											title: "Başarısız",
											text: "Kursiyer Silinemedi",
											icon: "error",
											button:"tamam"
											});
									</script>
								<?php
							}
						}
					?>
                    
                    
                    
					<table class="table table-hovertable">
					  <thead>
					    <tr>
                          <th>Tc</th>
					      <th>İsim</th>
					      <th>Soyisim</th>
					      <th>telefon</td>					     
					      <th>doğum tarihi</th>
                          <th>doğum yeri</th>
                          <th>medeni durum</th>
                          <th>kan grubu</th>
                          <th>kayıt tarihi</th>
                          <th>araç tipi</th>
                          <th>ehilyet sınıfı</th>
                          <th>sağlık raporu</th>
                          <th>oğrenim durumu</th>
                          <th>ödeme durumu</th>
					      <th>güncelle</th>
					      <th>sil</th>				      
					    </tr>
					  </thead>
					  <?php 
					  		while ($kursiyerYaz=$kursiyerSor->fetch(PDO::FETCH_ASSOC)) {?>
					  			<tbody>
							    <tr>
                                  <td><?php echo $kursiyerYaz['kursiyer_tc'];?></td>
							      <td><?php echo $kursiyerYaz['kursiyer_isim'];?></td>
							      <td><?php echo $kursiyerYaz['kursiyer_soyisim'];?></td>
							      <td><?php echo $kursiyerYaz['kursiyer_telefon'];?></td>							     
							      <td><?php echo $kursiyerYaz['kursiyer_dogtar'];?></td>
                                  <td><?php echo $kursiyerYaz['kursiyer_dogyer'];?></td>
                                  <td><?php echo $kursiyerYaz['kursiyer_medenidurum']=='1'?'evli':'bekar';?></td>
                                  <td><?php echo $kursiyerYaz['kursiyer_kangrubu'];?></td>
                                  <td><?php echo $kursiyerYaz['kursiyer_kayittarihi'];?></td>
                                  <td><?php echo $kursiyerYaz['kursiyer_aractipi']=='1'?'otomatik':'manuel';?></td>
                                  <td><?php echo $kursiyerYaz['kursiyer_ehliyetsinifi'];?></td>
                                  <td><?php echo $kursiyerYaz['kursiyer_saglikraporu']=='1'?'var':'yok';?></td>
                                  <td><?php echo $kursiyerYaz['kursiyer_ogrdurum'];?></td>
                                  <td><?php echo $kursiyerYaz['kursiyer_odemedurum'];?></td>
                                  
							    <form action="kursiyer-info?process=kursiyerUpdate" method="POST">
							    	<input type="hidden" name="id" value="<?php echo $kursiyerYaz['kursiyer_id']; ?>">
							      <td><button onclick="window.location.href='kursiyer-info?process=update'"  type="submit" class="btn btn-success btn-md"><i>Güncelle</i></button></td>
							  	</form>

							  	<form action="process" method="POST"> 
							  		<input type="hidden" name="kursiyer_id" value="<?php echo $kursiyerYaz['kursiyer_id']; ?>">
							      <td><button name="kursiyerSil" type="submit" class="btn btn-danger btn-md"><i>Sil</i></button>
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