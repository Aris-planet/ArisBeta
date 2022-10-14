


<?php
session_start();

function createForm(){
?>
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <table align="center">
          <tr><td class="psn-o" colspan="2"><h4>Ey...! Put a secret name</h4></td></tr>
          <tr>
          <td class="ar-n"><input class="text" type="text" name="name" placeholder="Your Aris-Name for chat"></td></tr>
          <tr><td class="ltc" colspan="2" align="center">
             <input class="text-ltc" type="submit" name="submitBtn" value="Lets Chat">
          </td></tr>
        </table>
      </form>
<?php
}

if (isset($_GET['u'])){
   unset($_SESSION['nickname']);
}

// Procesar información de inicio de sesión
if (isset($_POST['submitBtn'])){
      $name    = isset($_POST['name']) ? $_POST['name'] : "Aris";
      $_SESSION['nickname'] = $name;
}

$nickname = isset($_SESSION['nickname']) ? $_SESSION['nickname'] : "Hidden";   
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ES" "DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="Images/logo2.ico" type="image/x-icon">
    <title>Aris</title>
    <!-- style css link -->
    <link rel="stylesheet" type="text/css" href="Foros.css">
    <!-- fontawesome css link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://kit.fontawesome.com/e0827f34a5.js" crossorigin="anonymous"></script>
   
   <link href="/style/globe.png" rel="shortcut icon">
    <script language="javascript" type="text/javascript">
    
      var httpObject = null;
      var link = "";
      var timerID = 0;
      var nickName = "<?php echo $nickname; ?>";

      // Obtener el objeto HTTP
      function getHTTPObject(){
         if (window.ActiveXObject) return new ActiveXObject("Microsoft.XMLHTTP");
         else if (window.XMLHttpRequest) return new XMLHttpRequest();
         else {
            alert("Tu navegador no soporta AJAX.");
            return null;
         }
      }   

      // Cambiar el valor del campo outputText
      function setOutput(){
         if(httpObject.readyState == 4){
            var response = httpObject.responseText;
            var objDiv = document.getElementById("result");
            objDiv.innerHTML += response;
            objDiv.scrollTop = objDiv.scrollHeight;
            var inpObj = document.getElementById("msg");
            inpObj.value = "";
            inpObj.focus();
         }
      }

      // Cambiar el valor del campo outputText
      function setAll(){
         if(httpObject.readyState == 4){
            var response = httpObject.responseText;
            var objDiv = document.getElementById("result");
            objDiv.innerHTML = response;
            objDiv.scrollTop = objDiv.scrollHeight;
         }
      }

      // Implementar la lógica 
      function doWork(){    
         httpObject = getHTTPObject();
         if (httpObject != null) {
            link = "message.php?nick="+nickName+"&msg="+document.getElementById('msg').value;
            httpObject.open("GET", link , true);
            httpObject.onreadystatechange = setOutput;
            httpObject.send(null);
         }
      }

      // Implementar la lógica   
      function doReload(){    
         httpObject = getHTTPObject();
         var randomnumber=Math.floor(Math.random()*10000);
         if (httpObject != null) {
            link = "message.php?all=1&rnd="+randomnumber;
            httpObject.open("GET", link , true);
            httpObject.onreadystatechange = setAll;
            httpObject.send(null);
         }
      }

      function UpdateTimer() {
         doReload();   
         timerID = setTimeout("UpdateTimer()", 5000);
      }
    
    
      function keypressed(e){
         if(e.keyCode=='13'){
            doWork();
         }
      }
    //-->
    </script>   
</head>

   

   
<body onload="UpdateTimer();">

   <!--HEADER STARTS-->


   <header>
      <div class="header-t">

          <div class="ht-img">
              <img src="Images/logo2.png" alt="">
          </div>

          <nav>
              <a href="#"><i class="fa-solid fa-house"></i></a>
              <a href="#"><i class="fa-solid fa-rocket"></i></a>
              <a href="#"><i class="fa-solid fa-book"></i></a>
              <a href="#"><i class="fa-solid fa-comments"></i></a>
              <a href="#"><i class="fa-solid fa-earth-americas"></i></a>
              <a class="c-ss" href="#"><i class="fa-solid fa-circle-xmark"></i></a>
          </nav>

          <div class="hdt-prof">
              <a href="#">
                  <img src="Images/caosan.png" alt="">
              </a>
          </div>

      </div>
      
  </header>
   <!--HEADER STARTS-->


   <div id="main">
      
   
     <div class="home-ls">
        <div class="hls-d">
           <h1><i class="fas fa-comments"></i> Users on this forums</h1>
           <div class="hls-ima">
              <a href="#"><img src="Images/us.png" alt="">Aris</a>
              <a href="#"><img src="Images/us.png" alt="">Aris</a>
              <a href="#"><img src="Images/us.png" alt="">Aris</a>
              <a href="#"><img src="Images/us.png" alt="">Aris</a>
              <a href="#"><img src="Images/us.png" alt="">Aris</a>
              <a href="#"><img src="Images/us.png" alt="">Aris</a>
              <a href="#"><img src="Images/us.png" alt="">Aris</a>
              <a href="#"><img src="Images/us.png" alt="">Aris</a>
              <a href="#"><img src="Images/us.png" alt="">Aris</a>
              <a href="#"><img src="Images/us.png" alt="">Aris</a>
              <a href="#"><img src="Images/us.png" alt="">Aris</a>
              <a href="#"><img src="Images/us.png" alt="">Aris</a>
              <a href="#"><img src="Images/us.png" alt="">Aris</a>
           </div>
        </div>
     </div>







      <div class="home-ce">


             <div id="caption">
                  <h2>FrontEnd - Forum</h2>
             </div>


      
          <?php 

             if (!isset($_SESSION['nickname']) ){ 
               createForm();
               } else  { 
               $name    = isset($_POST['name']) ? $_POST['name'] : "Unnamed";
               $_SESSION['nickname'] = $name;
             ?>

      
          <div id="result">
               <?php 
                    $data = file("msg.html");
                     foreach ($data as $line) {
                  	echo $line;
                      }
                   ?>
             </div>

           <div style="padding-top:15px;" id="sender" onkeyup="keypressed(event);">

              <b>Message:</b><input  type="text" name="msg" size="30" id="msg" />

               <button  onclick="doWork();"><i class="fa-solid fa-code"></i></button>

            </div>   
               <?php            
                   }

                ?>
       </div>   

       <div class="home-ls">
         <div class="hls-d">
            <h1><i class="fas fa-comments"></i> Users on this forums</h1>
            <div>
               <img src="" alt=""><a href="#"></a>
               <img src="" alt=""><a href="#"></a>
               <img src="" alt=""><a href="#"></a>
               <img src="" alt=""><a href="#"></a>
               <img src="" alt=""><a href="#"></a>
               <img src="" alt=""><a href="#"></a>
               <img src="" alt=""><a href="#"></a>
            </div>
         </div>
      </div>

   </div>
</body>   