
<?php
  session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://unpkg.com/onsenui/css/onsenui.min.css">
  <link rel="stylesheet" href="https://unpkg.com/onsenui/css/onsen-css-components.min.css">
  <script src="https://unpkg.com/onsenui/js/onsenui.min.js"></script>
  <link rel="manifest" href="../manifest.json">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script>
  if('serviceWorker' in navigator) {
    navigator.serviceWorker.register('../sw.js')
      .then(() => console.log("Service Worker Registered"))
      .catch(e => console.log(e));
  }


   $(document).ready(function(){

      $("#reset").click(function(){

          window.location.href = "reset.html"


      });

            $("#signup").click(function(){

          window.location.href = "register.html"


      });

  });



        function login(){

  var myPassword = document.getElementById('password').value;
  var myPhone = document.getElementById('phone').value;


  if (myPassword === '' || myPhone =='') {
    ons.notification.alert('Please fill in all the fields');
  } else {


          loginData(myPassword,myPhone);

  }
};

      


    function loginData(myPassword,myPhone){

       // var params ="name="+myName+"&password="+password+"&nric="+myNRIC+"&phone="+myPhone;
       var params = "password="+myPassword+"&phone="+myPhone;

      var xmlhttp = new XMLHttpRequest();

      xmlhttp.open("POST", "../phpscripts/login.php",true);
      xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xmlhttp.send(params);
      xmlhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
          //display.innerHTML = this.responseText;

          switch(this.responseText){
              case "valid":
                  getValue(myPhone);

                // window.location.href="userPage.html";
                break;
              case "notExist":
                alert("Account doesnt exist, please sign up");
                window.location.href="register.html";
                break;
              case "invalid":
                alert("Wrong Phone Number/ Password");
                break;
              default:
                window.location.href="index.html";
                break;
            }
        } else {
                    //display.innerHTML = "Loading...";


        }//;
      }
    }


    function getValue(myPhone){
      var paramsget = "phone="+myPhone;

      var xmlhttp = new XMLHttpRequest();

      xmlhttp.open("POST", "../phpscripts/getNum.php",true);
      xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xmlhttp.send(paramsget);
            xmlhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            if(isNaN(this.responseText)){
                // alert("Error occurs!");
                alert(this.responseText);

            }else{

              var serialNum = this.responseText;
              localStorage.setItem("serial", serialNum);
              setlogin();
              //window.location.replace("userPage.html");

            }

        }else{


        }
      }
    }


    function setlogin(){


      <?php 
        $_SESSION['logged'] = 1; 

      ?>

              window.location.replace("userPage.php");


  }
</script>

<style type="text/css">
	a{
		margin-right: 10px;

	}

  .textDisplay{

    font-size: 10px;
    margin: 0 auto;
  }

  .labelButtonLeft{
display: inline-block;
margin-right: 10px;
  }
  .labelButtonRight{
    display: inline-block;
    margin-left: 10px;

  }

</style>
</head>
<body>


<ons-page>
  <div style="text-align: center; margin-top: 70%;">
  	<form action="login.php" method="POST">
    <p>
      <ons-input id="phone" modifier="underbar" placeholder="Phone Number" float></ons-input>
    </p>
    <p>
      <ons-input id="password" modifier="underbar" type="password" placeholder="Password" float></ons-input>
    </p>
    <div class="textDisplay">
        <p id="reset" class="labelButtonLeft">Reset Password</p><p id="signup" class="labelButtonRight">Sign Up</p>
	</div>
    <p style="margin-top: 30px;">
      <ons-button onclick="login()">Sign in</ons-button>
    </p>

</form>
  </div>
</ons-page>

<script type="text/javascript">
         window.onload = function(){


          <?php 
             $_SESSION['logged'] = 0; 

      ?>


  }
</script>


</body>
</html>