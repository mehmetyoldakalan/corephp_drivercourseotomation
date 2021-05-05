<?php
session_start();
ob_start();
include "db.php";
include "sessionControl.php";
?>


<html>
<head>
	<title>Sürücü kursu otomasyonu</title>
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


<body>
  
<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
              crossorigin="anonymous">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sürücü Kursu Otomasyonu V-1</title>
  
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

                @keyframes swing {
                0% {
                    transform: rotate(0deg);
                }
                10% {
                    transform: rotate(10deg);
                }
                30% {
                    transform: rotate(0deg);
                }
                40% {
                    transform: rotate(-10deg);
                }
                50% {
                    transform: rotate(0deg);
                }
                60% {
                    transform: rotate(5deg);
                }
                70% {
                    transform: rotate(0deg);
                }
                80% {
                    transform: rotate(-5deg);
                }
                100% {
                    transform: rotate(0deg);
                }
                }

                @keyframes sonar {
                0% {
                    transform: scale(0.9);
                    opacity: 1;
                }
                100% {
                    transform: scale(2);
                    opacity: 0;
                }
                }
                body {
                font-size: 0.9rem;
                }
                .page-wrapper .sidebar-wrapper,
                .sidebar-wrapper .sidebar-brand > a,
                .sidebar-wrapper .sidebar-dropdown > a:after,
                .sidebar-wrapper .sidebar-menu .sidebar-dropdown .sidebar-submenu li a:before,
                .sidebar-wrapper ul li a i,
                .page-wrapper .page-content,
                .sidebar-wrapper .sidebar-search input.search-menu,
                .sidebar-wrapper .sidebar-search .input-group-text,
                .sidebar-wrapper .sidebar-menu ul li a,
                #show-sidebar,
                #close-sidebar {
                -webkit-transition: all 0.3s ease;
                -moz-transition: all 0.3s ease;
                -ms-transition: all 0.3s ease;
                -o-transition: all 0.3s ease;
                transition: all 0.3s ease;
                }


                .page-wrapper {
                height: 100vh;
                }

                .page-wrapper .theme {
                width: 40px;
                height: 40px;
                display: inline-block;
                border-radius: 4px;
                margin: 2px;
                }

                .page-wrapper .theme.chiller-theme {
                background: #1e2229;
                }

              

                .page-wrapper.toggled .sidebar-wrapper {
                left: 0px;
                }

                @media screen and (min-width: 768px) {
                .page-wrapper.toggled .page-content {
                    padding-left: 300px;
                }
                }
             
                #show-sidebar {
                position: fixed;
                left: 0;
                top: 10px;
                border-radius: 0 4px 4px 0px;
                width: 35px;
                transition-delay: 0.3s;
                }
                .page-wrapper.toggled #show-sidebar {
                left: -40px;
                }
              

                .sidebar-wrapper {
                width: 260px;
                height: 100%;
                max-height: 100%;
                position: fixed;
                top: 0;
                left: -300px;
                z-index: 999;
                }

                .sidebar-wrapper ul {
                list-style-type: none;
                padding: 0;
                margin: 0;
                }

                .sidebar-wrapper a {
                text-decoration: none;
                }


                .sidebar-content {
                max-height: calc(100% - 30px);
                height: calc(100% - 30px);
                overflow-y: auto;
                position: relative;
                }

                .sidebar-content.desktop {
                overflow-y: hidden;
                }



                .sidebar-wrapper .sidebar-brand {
                padding: 10px 20px;
                display: flex;
                align-items: center;
                }

                .sidebar-wrapper .sidebar-brand > a {
                text-transform: uppercase;
                font-weight: bold;
                flex-grow: 1;
                }

                .sidebar-wrapper .sidebar-brand #close-sidebar {
                cursor: pointer;
                font-size: 20px;
                }
                .sidebar-wrapper .sidebar-header {
                padding: 20px;
                overflow: hidden;
                }

                .sidebar-wrapper .sidebar-header .user-pic {
                float: left;
                width: 60px;
                padding: 2px;
                border-radius: 12px;
                margin-right: 15px;
                overflow: hidden;
                }

                .sidebar-wrapper .sidebar-header .user-pic img {
                object-fit: cover;
                height: 100%;
                width: 100%;
                }

                .sidebar-wrapper .sidebar-header .user-info {
                float: left;
                }

                .sidebar-wrapper .sidebar-header .user-info > span {
                display: block;
                }

                .sidebar-wrapper .sidebar-header .user-info .user-role {
                font-size: 12px;
                }

                .sidebar-wrapper .sidebar-header .user-info .user-status {
                font-size: 11px;
                margin-top: 4px;
                }

                .sidebar-wrapper .sidebar-header .user-info .user-status i {
                font-size: 8px;
                margin-right: 4px;
                color: #5cb85c;
                }

        

                .sidebar-wrapper .sidebar-search > div {
                padding: 10px 20px;
                }

         

                .sidebar-wrapper .sidebar-menu {
                padding-bottom: 10px;
                }

                .sidebar-wrapper .sidebar-menu .header-menu span {
                font-weight: bold;
                font-size: 14px;
                padding: 15px 20px 5px 20px;
                display: inline-block;
                }

                .sidebar-wrapper .sidebar-menu ul li a {
                display: inline-block;
                width: 100%;
                text-decoration: none;
                position: relative;
                padding: 8px 30px 8px 20px;
                }

                .sidebar-wrapper .sidebar-menu ul li a i {
                margin-right: 10px;
                font-size: 12px;
                width: 30px;
                height: 30px;
                line-height: 30px;
                text-align: center;
                border-radius: 4px;
                }

                .sidebar-wrapper .sidebar-menu ul li a:hover > i::before {
                display: inline-block;
                animation: swing ease-in-out 0.5s 1 alternate;
                }

                .sidebar-wrapper .sidebar-menu .sidebar-dropdown > a:after {
                font-family: "Font Awesome 5 Free";
                font-weight: 900;
                content: "\f105";
                font-style: normal;
                display: inline-block;
                font-style: normal;
                font-variant: normal;
                text-rendering: auto;
                -webkit-font-smoothing: antialiased;
                -moz-osx-font-smoothing: grayscale;
                text-align: center;
                background: 0 0;
                position: absolute;
                right: 15px;
                top: 14px;
                }

                .sidebar-wrapper .sidebar-menu .sidebar-dropdown .sidebar-submenu ul {
                padding: 5px 0;
                }

                .sidebar-wrapper .sidebar-menu .sidebar-dropdown .sidebar-submenu li {
                padding-left: 25px;
                font-size: 13px;
                }

                .sidebar-wrapper .sidebar-menu .sidebar-dropdown .sidebar-submenu li a:before {
                content: "\f111";
                font-family: "Font Awesome 5 Free";
                font-weight: 400;
                font-style: normal;
                display: inline-block;
                text-align: center;
                text-decoration: none;
                -webkit-font-smoothing: antialiased;
                -moz-osx-font-smoothing: grayscale;
                margin-right: 10px;
                font-size: 8px;
                }

                .sidebar-wrapper .sidebar-menu ul li a span.label,
                .sidebar-wrapper .sidebar-menu ul li a span.badge {
                float: right;
                margin-top: 8px;
                margin-left: 5px;
                }

                .sidebar-wrapper .sidebar-menu .sidebar-dropdown .sidebar-submenu li a .badge,
                .sidebar-wrapper .sidebar-menu .sidebar-dropdown .sidebar-submenu li a .label {
                float: right;
                margin-top: 0px;
                }

                .sidebar-wrapper .sidebar-menu .sidebar-submenu {
                display: none;
                }

                .sidebar-wrapper .sidebar-menu .sidebar-dropdown.active > a:after {
                transform: rotate(90deg);
                right: 17px;
                }


                .sidebar-footer {
                position: absolute;
                width: 100%;
                bottom: 0;
                display: flex;
                }

                .sidebar-footer > a {
                flex-grow: 1;
                text-align: center;
                height: 30px;
                line-height: 30px;
                position: relative;
                }

                .sidebar-footer > a .notification {
                position: absolute;
                top: 0;
                }

                .badge-sonar {
                display: inline-block;
                background: #980303;
                border-radius: 50%;
                height: 8px;
                width: 8px;
                position: absolute;
                top: 0;
                }

                .badge-sonar:after {
                content: "";
                position: absolute;
                top: 0;
                left: 0;
                border: 2px solid #980303;
                opacity: 0;
                border-radius: 50%;
                width: 100%;
                height: 100%;
                animation: sonar 1.5s infinite;
                }


                .page-wrapper .page-content {
                display: inline-block;
                width: 100%;
                padding-left: 0px;
                padding-top: 20px;
                }

                .page-wrapper .page-content > div {
                padding: 20px 40px;
                }

                .page-wrapper .page-content {
                overflow-x: hidden;
                }



                ::-webkit-scrollbar {
                width: 5px;
                height: 7px;
                }
                ::-webkit-scrollbar-button {
                width: 0px;
                height: 0px;
                }
                ::-webkit-scrollbar-thumb {
                background: #525965;
                border: 0px none #ffffff;
                border-radius: 0px;
                }
                ::-webkit-scrollbar-thumb:hover {
                background: #525965;
                }
                ::-webkit-scrollbar-thumb:active {
                background: #525965;
                }
                ::-webkit-scrollbar-track {
                background: transparent;
                border: 0px none #ffffff;
                border-radius: 50px;
                }
                ::-webkit-scrollbar-track:hover {
                background: transparent;
                }
                ::-webkit-scrollbar-track:active {
                background: transparent;
                }
                ::-webkit-scrollbar-corner {
                background: transparent;
                }


               

                .chiller-theme .sidebar-wrapper {
                    background: #31353D;
                }

                .chiller-theme .sidebar-wrapper .sidebar-header,
                .chiller-theme .sidebar-wrapper .sidebar-search,
                .chiller-theme .sidebar-wrapper .sidebar-menu {
                    border-top: 1px solid #3a3f48;
                }

                .chiller-theme .sidebar-wrapper .sidebar-search input.search-menu,
                .chiller-theme .sidebar-wrapper .sidebar-search .input-group-text {
                    border-color: transparent;
                    box-shadow: none;
                }

                .chiller-theme .sidebar-wrapper .sidebar-header .user-info .user-role,
                .chiller-theme .sidebar-wrapper .sidebar-header .user-info .user-status,
                .chiller-theme .sidebar-wrapper .sidebar-search input.search-menu,
                .chiller-theme .sidebar-wrapper .sidebar-search .input-group-text,
                .chiller-theme .sidebar-wrapper .sidebar-brand>a,
                .chiller-theme .sidebar-wrapper .sidebar-menu ul li a,
                .chiller-theme .sidebar-footer>a {
                    color: #818896;
                }

                .chiller-theme .sidebar-wrapper .sidebar-menu ul li:hover>a,
                .chiller-theme .sidebar-wrapper .sidebar-menu .sidebar-dropdown.active>a,
                .chiller-theme .sidebar-wrapper .sidebar-header .user-info,
                .chiller-theme .sidebar-wrapper .sidebar-brand>a:hover,
                .chiller-theme .sidebar-footer>a:hover i {
                    color: #b8bfce;
                }

                .page-wrapper.chiller-theme.toggled #close-sidebar {
                    color: #bdbdbd;
                }

                .page-wrapper.chiller-theme.toggled #close-sidebar:hover {
                    color: #ffffff;
                }

                .chiller-theme .sidebar-wrapper ul li:hover a i,
                .chiller-theme .sidebar-wrapper .sidebar-dropdown .sidebar-submenu li a:hover:before,
                .chiller-theme .sidebar-wrapper .sidebar-search input.search-menu:focus+span,
                .chiller-theme .sidebar-wrapper .sidebar-menu .sidebar-dropdown.active a i {
                    color: #16c7ff;
                    text-shadow:0px 0px 10px rgba(22, 199, 255, 0.5);
                }

                .chiller-theme .sidebar-wrapper .sidebar-menu ul li a i,
                .chiller-theme .sidebar-wrapper .sidebar-menu .sidebar-dropdown div,
                .chiller-theme .sidebar-wrapper .sidebar-search input.search-menu,
                .chiller-theme .sidebar-wrapper .sidebar-search .input-group-text {
                    background: #3a3f48;
                }

                .chiller-theme .sidebar-wrapper .sidebar-menu .header-menu span {
                    color: #6c7b88;
                }

                .chiller-theme .sidebar-footer {
                    background: #3a3f48;
                    box-shadow: 0px -1px 5px #282c33;
                    border-top: 1px solid #464a52;
                }

                .chiller-theme .sidebar-footer>a:first-child {
                    border-left: none;
                }

                .chiller-theme .sidebar-footer>a:last-child {
                    border-right: none;
                }
        </style>
</head>
<body>
<?php
@$get=$_GET['get'];
  switch ($get) {
    case 'kisisel-ayarlar':
     ?>
     <table class="container col-md-6">
					  <thead>
					    <tr>
					      <th>İsim</th>
					      <th>Soyisim</th>
                <th>Mail adresi</th>
						  
					      
					      				      
						</tr>
					  </thead>
					  		<?php
                  $mail=$_SESSION['personel_mail']; 
                  $ayar_sor=$db->prepare("SELECT * FROM personel where personel_mail=:mail");
                  $ayar_sor->execute(array(
                    'mail'=>$mail
                  ));
                  $ayar_yaz=$ayar_sor->fetch(PDO::FETCH_ASSOC);
                  
                ?>
							
								 <tbody>
                                 <form action="process" method="POST">
							    <tr>
                                  <input type="hidden" name="personel_ayar_id" value="<?php echo $ayar_yaz['personel_id']?>">
                                  <td><input type="text" name="personel_ayar_isim" value="<?php echo $ayar_yaz['personel_isim'];?>"></td>
								                  <td><input type="text" name="personel_ayar_soyisim" value="<?php echo $ayar_yaz['personel_soyisim'];?>"></td>
                                  <td><input type="text" name="personel_ayar_mail" value="<?php echo $ayar_yaz['personel_mail'];?>"></td>                                  
                                  <td><button type="submit" name="personel_ayar_guncelle" class="btn btn-success">Güncelle</button></td>
							    </tr>	
                                </form>    
							  </tbody>
							
							 
					  			
					  		
					   </table>
    <?php
      break;
      case 'passchange':
          ?>
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
                  <i  class="alert alert-success ">Lütfen mevcut şifrenizi onaylayınız</i>
                  <form action="process" method="POST">
                    
                    <input type="password" name="parola" class="fadeIn third" name="login" placeholder="parola">
                    <input type="submit" name="parola_kontrol" class="fadeIn fourth" value="Onayla">
                  </form>

                 

                </div>
              </div>
              
          <?php
        break;    
 
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
  elseif($_GET['status']=="passchanged"){
    ?>
      <script>
      swal({
        title:"başarılı",
        text:"Parola başarıyla güncellendi",
        icon:"success"
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