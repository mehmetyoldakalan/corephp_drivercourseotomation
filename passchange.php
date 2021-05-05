<?php
session_start();
ob_start();
include "db.php";
include "sessionControl.php";

?>


<html>
<head>
	<title>Sürücü kursu</title>
	<meta name="Abstract" content="Sitenizin özeti">
	<meta name="Author" content="Adınız, E-Posta Adresiniz"> 
	<meta name="Copyright" content="telif hakkı cümlesi">
	<meta name="description" content="Sitenizin içeriği hakkında geniş bilgi">	
	<meta name="keywords" content="kelime1 kelime2 kelime3 kelime4 kelime5"><!--sitenin anahtar kelimeleri-->
	<meta http-equiv="content-language" content="tr"><!--sitenin varsayılan dili -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>	
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script>
            $(document).ready(function(){
                
                $("#personel").click(function(){
                    $("#personelmenu").fadeToggle(300)
                });
                $("#kursiyer").click(function(){
                    $("#kursiyermenu").fadeToggle(300)
                });
                $("#notlarım").click(function(){
                    $("#notlarımMenu").fadeToggle(300)
                });
                $("#evrak").click(function(){
                    $("#evrakMenu").fadeToggle(300)
                });
                $("#isletme").click(function(){
                    $("#isletmeMenu").fadeToggle(300)
                });
                $("#ayarlar").click(function(){
                    $("#ayarlarMenu").fadeToggle(300)
                });
            });

        </script>
	<style>
		body{	
		text-decoration: none;
		background:url(https://hdqwalls.com/download/material-design-4k-2048x1152.jpg) fixed;
		}
    #sidebar{
      opacity: 0.8;
    }
	</style>
</head>
<?php
if(@$_SERVER['HTTP_REFERER']==null){
    ?>
        <script>
            alert("gelmemen gereken yerden geldin");
        </script>
    <?php
    header("Refresh:0 url=logout");
}
else{?>

<body>

    <style>

                                /* BASIC */

                                html {
                                  background-color: #56baed;
                                }

                               

                                a {
                                  color: #92badd;
                                  display:inline-block;
                                  text-decoration: none;
                                  font-weight: 400;
                                }

                                h2 {
                                  text-align: center;
                                  font-size: 16px;
                                  font-weight: 600;
                                  text-transform: uppercase;
                                  display:inline-block;
                                  margin: 40px 8px 10px 8px; 
                                  color: #cccccc;
                                }



                                /* STRUCTURE */

                                .wrapper {
                                  display: flex;
                                  align-items: center;
                                  flex-direction: column; 
                                  justify-content: center;
                                  width: 100%;
                                  min-height: 100%;
                                  padding: 20px;
                                }

                                #formContent {
                                  -webkit-border-radius: 10px 10px 10px 10px;
                                  border-radius: 10px 10px 10px 10px;
                                  background: #fff;
                                  padding: 30px;
                                  width: 90%;
                                  max-width: 450px;
                                  position: relative;
                                  padding: 0px;
                                  -webkit-box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
                                  box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
                                  text-align: center;
                                }

                                #formFooter {
                                  background-color: #f6f6f6;
                                  border-top: 1px solid #dce8f1;
                                  padding: 25px;
                                  text-align: center;
                                  -webkit-border-radius: 0 0 10px 10px;
                                  border-radius: 0 0 10px 10px;
                                }



                                /* TABS */

                                h2.inactive {
                                  color: #cccccc;
                                }

                                h2.active {
                                  color: #0d0d0d;
                                  border-bottom: 2px solid #5fbae9;
                                }



                                /* FORM TYPOGRAPHY*/

                                input[type=button], input[type=submit], input[type=reset]  {
                                  background-color: #56baed;
                                  border: none;
                                  color: white;
                                  padding: 15px 80px;
                                  text-align: center;
                                  text-decoration: none;
                                  display: inline-block;
                                  text-transform: uppercase;
                                  font-size: 13px;
                                  -webkit-box-shadow: 0 10px 30px 0 rgba(95,186,233,0.4);
                                  box-shadow: 0 10px 30px 0 rgba(95,186,233,0.4);
                                  -webkit-border-radius: 5px 5px 5px 5px;
                                  border-radius: 5px 5px 5px 5px;
                                  margin: 5px 20px 40px 20px;
                                  -webkit-transition: all 0.3s ease-in-out;
                                  -moz-transition: all 0.3s ease-in-out;
                                  -ms-transition: all 0.3s ease-in-out;
                                  -o-transition: all 0.3s ease-in-out;
                                  transition: all 0.3s ease-in-out;
                                }

                                input[type=button]:hover, input[type=submit]:hover, input[type=reset]:hover  {
                                  background-color: #39ace7;
                                }

                                input[type=button]:active, input[type=submit]:active, input[type=reset]:active  {
                                  -moz-transform: scale(0.95);
                                  -webkit-transform: scale(0.95);
                                  -o-transform: scale(0.95);
                                  -ms-transform: scale(0.95);
                                  transform: scale(0.95);
                                }

                                input[type=password] {
                                  background-color: #f6f6f6;
                                  border: none;
                                  color: #0d0d0d;
                                  padding: 15px 32px;
                                  text-align: center;
                                  text-decoration: none;
                                  display: inline-block;
                                  font-size: 16px;
                                  margin: 5px;
                                  width: 85%;
                                  border: 2px solid #f6f6f6;
                                  -webkit-transition: all 0.5s ease-in-out;
                                  -moz-transition: all 0.5s ease-in-out;
                                  -ms-transition: all 0.5s ease-in-out;
                                  -o-transition: all 0.5s ease-in-out;
                                  transition: all 0.5s ease-in-out;
                                  -webkit-border-radius: 5px 5px 5px 5px;
                                  border-radius: 5px 5px 5px 5px;
                                }

                                input[type=text]:focus {
                                  background-color: #fff;
                                  border-bottom: 2px solid #5fbae9;
                                }

                                input[type=text]:placeholder {
                                  color: #cccccc;
                                }



                                /* ANIMATIONS */

                                /* Simple CSS3 Fade-in-down Animation */
                                .fadeInDown {
                                  -webkit-animation-name: fadeInDown;
                                  animation-name: fadeInDown;
                                  -webkit-animation-duration: 1s;
                                  animation-duration: 1s;
                                  -webkit-animation-fill-mode: both;
                                  animation-fill-mode: both;
                                }

                                @-webkit-keyframes fadeInDown {
                                  0% {
                                    opacity: 0;
                                    -webkit-transform: translate3d(0, -100%, 0);
                                    transform: translate3d(0, -100%, 0);
                                  }
                                  100% {
                                    opacity: 1;
                                    -webkit-transform: none;
                                    transform: none;
                                  }
                                }

                                @keyframes fadeInDown {
                                  0% {
                                    opacity: 0;
                                    -webkit-transform: translate3d(0, -100%, 0);
                                    transform: translate3d(0, -100%, 0);
                                  }
                                  100% {
                                    opacity: 1;
                                    -webkit-transform: none;
                                    transform: none;
                                  }
                                }

                                /* Simple CSS3 Fade-in Animation */
                                @-webkit-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
                                @-moz-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
                                @keyframes fadeIn { from { opacity:0; } to { opacity:1; } }

                                .fadeIn {
                                  opacity:0;
                                  -webkit-animation:fadeIn ease-in 1;
                                  -moz-animation:fadeIn ease-in 1;
                                  animation:fadeIn ease-in 1;

                                  -webkit-animation-fill-mode:forwards;
                                  -moz-animation-fill-mode:forwards;
                                  animation-fill-mode:forwards;

                                  -webkit-animation-duration:1s;
                                  -moz-animation-duration:1s;
                                  animation-duration:1s;
                                }

                                .fadeIn.first {
                                  -webkit-animation-delay: 0.4s;
                                  -moz-animation-delay: 0.4s;
                                  animation-delay: 0.4s;
                                }

                                .fadeIn.second {
                                  -webkit-animation-delay: 0.6s;
                                  -moz-animation-delay: 0.6s;
                                  animation-delay: 0.6s;
                                }

                                .fadeIn.third {
                                  -webkit-animation-delay: 0.8s;
                                  -moz-animation-delay: 0.8s;
                                  animation-delay: 0.8s;
                                }

                                .fadeIn.fourth {
                                  -webkit-animation-delay: 1s;
                                  -moz-animation-delay: 1s;
                                  animation-delay: 1s;
                                }

                                /* Simple CSS3 Fade-in Animation */
                                .underlineHover:after {
                                  display: block;
                                  left: 0;
                                  bottom: -10px;
                                  width: 0;
                                  height: 2px;
                                  background-color: #56baed;
                                  content: "";
                                  transition: width 0.2s;
                                }

                                .underlineHover:hover {
                                  color: #0d0d0d;
                                }

                                .underlineHover:hover:after{
                                  width: 100%;
                                }



                                /* OTHERS */

                                *:focus {
                                    outline: none;
                                } 

                                #icon {
                                  width:60%;
                                }


    </style>
      <div class="wrapper fadeInDown">
          <div id="formContent">
            <i  class="alert alert-success ">Lütfen yeni şifrenizi giriniz</i>
            <form action="process" method="POST">
              
              <input type="password" name="personel_yeni_parola" class="fadeIn third" name="login" placeholder="Yeni parola">
              <input type="submit" name="personel_yeni_parola_onayla" class="fadeIn fourth" value="Onayla">
            </form>

           

          </div>
        </div>


<?php
    
}

?>


              
       
<?php
if(@$_GET['status']){
  if($_GET['status']=="ok"){
    ?>
      <script>
      swal({
        title:"başarılı",
        text:"başarılı bir şekilde ayarlarınız güncellendi",
        icon:"success"
      })
      </script>
    <?php
  }
  elseif($_GET['status']=="error"){
    ?>
      <script>
      swal({
        title:"başarısız",
        text:"işlem sırasında bir hata oluştu",
        icon:"error"
      });
      </script>
    <?php
  }
  elseif($_GET['status']=="invalid"){
    ?>
      <script>
      swal({
        title:"başarısız",
        text:"geçersiz parola",
        icon:"error"
      });
      </script>
    <?php
  }
}

?>

<div class="page-wrapper chiller-theme toggled">
  <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
    <i class="fas fa-bars"></i>
  </a>
  <nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
     
      <div class="sidebar-header">
        
        <div class="user-info">
          <span class="user-name"><?php echo $_SESSION['personel_mail'];?>
            <strong></strong>
          </span>
          <span class="user-role">Personel</span>
         
        </div>
      </div>
 
      <div class="sidebar-menu">
        <ul>
          <li class="header-menu">
            <span></span>
          </li>
          <li class="sidebar-dropdown">
            <a href="ayarlar">
              <i class="fa fa-home"></i>
              <span>Anasayfa</span>             
            </a>          
          </li>
        

         
          
         
          </li>
            <li class="sidebar-dropdown" id="ayarlar">
            <a href="#">
              <i class="fa fa-globe"></i>
              <span>Ayarlar</span>
            </a>
            <div class="sidebar-submenu" id="ayarlarMenu">
              <ul>
                <li>
                  <a href="ayarlar?get=kisisel-ayarlar">Kişisel ayarlar</a>
                </li>
                
              </ul>
              <ul>
                <li>
                  <a href="ayarlar?get=passchange">parola değiştir</a>
                </li>
                
              </ul>
            </div>
          </li>
          <li>
            <a href="anasayfa">
              <i class="fa fa-folder"></i>
              <span>Otomasyona dön</span>
            </a>
          </li>
         
          <li>
            <a href="logout">
              <i class="fa fa-folder"></i>
              <span>Çıkış</span>
            </a>
          </li>
        </ul>
      </div>
      <!-- sidebar-menu  -->
    </div>
    <!-- sidebar-content  -->

    <div class="sidebar-footer">
     
    <!--sidebar footer-->

    </div>

  </nav>
</body>
</html>