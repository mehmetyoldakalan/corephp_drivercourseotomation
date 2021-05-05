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
        
	</head>
<body>
<?php
@$process=$_GET['process'];
switch ($process) {
    case 'payment':
        $id=$_POST['id'];
        $kursiyer_sor=$db->prepare("SELECT * FROM kursiyer where kursiyer_id=:kursiyer_id");
        $kursiyer_sor->execute(array(
            'kursiyer_id'=>$id
        ));
        $kursiyer_yaz=$kursiyer_sor->fetch(PDO::FETCH_ASSOC);
        $ucret=$kursiyer_yaz['kursiyer_ucret'];
        $isim=$kursiyer_yaz['kursiyer_isim'];
        $soyisim=$kursiyer_yaz['kursiyer_soyisim'];
        $tc=$kursiyer_yaz['kursiyer_tc'];
		//$kdv_dahil_ucret=($ucret)+($ucret*20/100);
		
		?>
		<style>
		#odeme{
			margin-left: 0%;		
			
		}
		</style>
		<script>
		$(document).ready(function(){
			$("#ucret_tur").on("change",function () {
				var ucret_tur=$("#ucret_tur").val();
			
				if(ucret_tur=="taksit_ucret"){
					$("#odeme_giris").removeAttr("disabled")
				}				
			  });
        var ucret_miktar=$("#kursiyer_ucret").val();
        
        if(ucret_miktar>0){
          $("#odeme_onayla").removeAttr("disabled")
        }
			
		});
		</script>
			<div class="container" >
  <div class="row">
    <div class="span12">
	
      <form action="process" method="POST">
	  <input type="hidden" name="kursiyer_id" value="<?php echo $kursiyer_yaz['kursiyer_id'];?>">
        <fieldset>
          <legend>Ödeme Al</legend>
       
          <div class="control-group">
            <label class="control-label">Kursiyer Bilgileri</label>
			<div class="controls">
              kursiyer tc : <input type="text" class="input-block-level" disabled required value="<?php echo $kursiyer_yaz['kursiyer_tc'];?>">
            </div>
            <div class="controls">
              kursiyer isim : <input type="text" class="input-block-level" disabled required value="<?php echo $kursiyer_yaz['kursiyer_isim'];?>">
            </div>
			<div class="controls">
              kursiyer soyisim : <input type="text" class="input-block-level" disabled required value="<?php echo $kursiyer_yaz['kursiyer_soyisim'];?>">
            </div>
			<div class="controls">
              kursiyer ehliyet sınıfı : <input type="text" class="input-block-level" disabled required value="<?php echo $kursiyer_yaz['kursiyer_ehliyetsinifi'];?>">
            </div>
			<div class="controls">
              kursiyer ödeme miktarı <input type="text" class="input-block-level" disabled name="kursiyer_ucret" id="kursiyer_ucret" required value="<?php echo $kursiyer_yaz['kursiyer_ucret'];?>">
            </div>
          </div>
		
          <div class="control-group">
            <label class="control-label">Ödeme Bilgileri</label>
            <div class="controls">
              <div class="row-fluid">
			  <div class="span">
                  <select name="odeme_turu" id="ucret_tur"required	>
				  <option value="">Lütfen Ödeme Türünü Seçiniz</option>
				  <option value="butun_ucret">bütün ücret ödenecek</option>
				  <option value="taksit_ucret">taksit olarak ödenecek</option>
				  </select>
                </div>
                <div class="span">
                  <select name="odeme_yontemi" id="ucret_tur"required	>
				  <option value="">Lütfen Ödeme Yöntemi Seçiniz</option>
				  <option value="nakit">nakit</option>
				  <option value="kredi-karti">kredi kartı</option>
				  </select>
                </div>
				
				<div class="span">
                  <input type="text" class="input-block-level" style="color:red;" value="toplam miktar : <?php echo $ucret."₺";?>"  disabled required>
                </div>
                <div class="span3">
                  <input type="text" name="odenen_tutar" class="input-block-level" placeholder="ödenecek tutarı giriniz" id="odeme_giris" disabled required>
                </div>
				
               
              </div>
            </div>
          </div>
       
          <br>
       
          <div class="control-group">
            <label class="control-label">Ödemeyi Onayla</label>
            <div class="controls">
              <div class="row-fluid">
                <button type="submit" id="odeme_onayla" disabled name="odeme_onayla" class="btn btn-success">Onayla</button>
                
              </div>
            </div>
          </div>
       
        </fieldset>
      </form>
    </div>
  </div>
</div>
		<?php
        break;
    

   
                        
   default:?>   
    <div class="container">


					<div class="row">
                   
						
                        <div style="float: right; margin-right: 5px; position: relative; ">
							<button style="width: 100px; margin-top: 30px;"onclick="window.location.href='anasayfa'"  type="button" class="btn btn-primary btn-md">
					    	<i>anasayfa</i>
							</button><br>
                           
						</div>
				    <h1>Ödeme Tablosu</h1>
                    <i id="silDurum" style="font-size: 20px;"></i>
                    <?php
                        if (isset($_GET['status'])) {
                            if ($_GET['status']=="paymentok") {?>
                               <script>
                                   swal({
                                      title: "Başarılı",
                                      text: "Ödeme Başarıyla Tamamlandı",
                                      icon: "success",
                                      button:"tamam"
                                      });
                               </script>
                            <?php }
                            else if($_GET['status']=="paymenterror"){?>
                                <script>
                                    $("#silDurum").css('color', 'red').html("ödeme sırasında bir hata oluştu").fadeIn(2000).fadeOut(6000);
                                </script>
                             <?php }
                        }
                    ?>
                    
                    
					<table class="table table-hovertable">
					  <thead>
					    <tr>
					      <th>Tc</th>
					      <th>İsim</th>
					      <th>Soyisim</td>	
                          <th>Ehliyet sınıfı</th>				     
					      <th>İşlem</th>
                          				      
					    </tr>
					  </thead>
					  <?php 
					  		while ($kursiyerYaz=$kursiyerSor->fetch(PDO::FETCH_ASSOC)) {?>
					  			<tbody>
							    <tr>
							      <td><?php echo $kursiyerYaz['kursiyer_tc'];?></td>
							      <td><?php echo $kursiyerYaz['kursiyer_isim'];?></td>
							      <td><?php echo $kursiyerYaz['kursiyer_soyisim'];?></td>	,
                                  <td><?php echo $kursiyerYaz['kursiyer_ehliyetsinifi'];?></td>						     
							      
							    <form action="kursiyer-odeme?process=payment" method="POST">
							    	<input type="hidden" name="id" value="<?php echo $kursiyerYaz['kursiyer_id']; ?>">
							      <td><button type="submit" class="btn btn-success btn-md"><i>Ödeme al</i></button></td>
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