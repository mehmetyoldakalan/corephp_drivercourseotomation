<?php
session_start();
ob_start();
require_once "db.php";
include "sessionControl.php";
$sinavSor=$db->prepare("SELECT * FROM sinav_bilgileri");
$sinavSor->execute();
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
	</head>
<body>
<?php
@$process=$_GET['process'];
switch ($process) {
    case 'attendees':?>
        <table class="table table-hovertable">
					  <thead>
					    <tr>
					      <th>Tc</th>
					      <th>İsim</th>
						  <th>Soyisim</th>
						  <th>Ehliyet sınıfı</th>
					      
					      				      
						</tr>
					  </thead>
                      <?php
                      @$ehliyet_sinifi=$_POST['sinav_kategori'];
					  
                        $kursiyerSor=$db->prepare("SELECT * FROM kursiyer where kursiyer_ehliyetsinifi=:kursiyer_ehliyetsinifi");
                        $kursiyerSor->execute(array(
                            'kursiyer_ehliyetsinifi'=>$ehliyet_sinifi
                        ));
                        
                      ?>
					  		<?php
							 while($kursiyerYaz=$kursiyerSor->fetch(PDO::FETCH_ASSOC)){?>
								 <tbody>
							    <tr>
                                  <td><?php echo $kursiyerYaz['kursiyer_tc'];?></td>
								  <td><?php echo $kursiyerYaz['kursiyer_isim'];?></td>
							      <td><?php echo $kursiyerYaz['kursiyer_soyisim'];?></td>
							      <td><?php echo $kursiyerYaz['kursiyer_ehliyetsinifi'];?></td>	    

							  	

							    </tr>	    
							  </tbody>
							 <?php 
							 } 
							  ?>
					  			
					  		
					   </table>
        <?php break;
    
    case 'addQuiz':?>
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
									Sınav isim
									</td>
									<td>
									<input required type="text" name="sinav_isim" >
									</td>
								</tr>
								<tr>
									<td>
									Sınav kategorisi
									</td>
									<td>
									<select required name="sinav_kategori">
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
									Sınav tarihi
									</td>
									<td>
									<input required type="date" name="sinav_tarih" >
									</td>
								</tr>
								
								
								
									
								<tr>
									<td>
									<button type="submit" name="sinavEkle" class="btn btn-success ">Sınav Ekle</button>
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
							<button style="width: 100px; margin-top: 30px;"onclick="window.location.href='sinav-bilgileri?process=addQuiz'" id="kursiyerEkle"  type="button" class="btn btn-primary btn-md">
					    	<i>Sınav ekle</i>
							</button><br>
                           
						</div>
                        <div style="float: right; margin-right: 5px; position: relative; ">
							<button style="width: 100px; margin-top: 30px;"onclick="window.location.href='anasayfa'"  type="button" class="btn btn-success btn-md">
					    	<i>anasayfa</i>
							</button><br>
                           
						</div>
				    <h1>Sınav Tablosu</h1>
					<div id="durum">
					
					</div>
					<?php
						if(isset($_GET['status'])){
							if ($_GET['status']=="quizdeleted") {
								?>
								<script>
									$("#durum").css('color','white').html("sınav başarıyla silindi").fadeIn(300).fadeOut(6000);
								</script>
								<?php
							}
							elseif ($_GET['status']=="quizadded") {
								?>
								<script>
									$("#durum").css('color','white').html("sınav başarıyla eklendi").fadeIn(300).fadeOut(6000);
								</script>
								<?php
							}
						}
					?>
               
                    <table class="table table-hovertable">
					  <thead>
					    <tr>
                          <th>Sınav ismi</th>
						  <th>Sınav kategori</th>
					      <th>Sınav tarihi</th>
					      
					      					     
					      				      
					    </tr>
					  </thead>
					  <?php 
					  		while ($sinavYaz=$sinavSor->fetch(PDO::FETCH_ASSOC)) {?>
					  			<tbody>
							    <tr>
                                  <td><?php echo $sinavYaz['sinav_isim'];?></td>
								  <td><?php echo $sinavYaz['sinav_kategori'];?></td>
							      <td><?php echo $sinavYaz['sinav_tarih'];?></td>
							      	

								<form action="sinav-bilgileri?process=attendees" method="POST">
							    	<input type="hidden" name="sinav_kategori" value="<?php echo $sinavYaz['sinav_kategori']; ?>">
							      <td><button type="submit" class="btn btn-primary btn-md"><i>Katılacak öğrenciler</i></button></td>
							  	</form>

							    

							  	<form action="process" method="POST"> 
							  		<input type="hidden" name="sinav_id" value="<?php echo $sinavYaz['sinav_id']; ?>">
							      <td><button name="sinavSil" type="submit" class="btn btn-danger btn-md"><i>Sil</i></button>
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