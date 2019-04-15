
<?php
  session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>shunBian</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" type="text/css" href="../styles/inline.css" />

    <!-- Add to home screen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="apple-mobile-web-app-title" content="PasarOnline" />
    <link rel="apple-touch-icon" href="../images/icons/icon-152x152.png" />
    <meta name="msapplication-TileImage" content="../images/icons/icon-144x144.png" />
    <meta name="msapplication-TileColor" content="#2F3BA2" /> 
    <link rel="stylesheet" href="https://unpkg.com/onsenui/css/onsenui.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/onsenui/css/onsen-css-components.min.css" />
    <script src="https://unpkg.com/onsenui/js/onsenui.min.js"></script>
    <script type="text/javascript" src="../qrcodegen/jquery.min.js"></script>
	<script type="text/javascript" src="../qrcodegen/qrcode.js">
	</script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script>

        if ("serviceWorker" in navigator) {
            navigator.serviceWorker
                .register("../sw.js")
                .then(() => console.log("Service Worker Registered"))
                .catch(e => console.log(e));
        }


    </script>
 
    <link rel="manifest" href="../manifest.json" />
</head>

<body>
    <ons-page>
        <ons-toolbar>
            <div class="center">Confirmation</div>
                <div class="right">
			      <ons-toolbar-button id="toolbarBut">
			      	<div style="padding: 20px; margin-right: 0px;">
			      		<ons-switch></ons-switch>
			      	</div>
			        <!-- <ons-icon icon="ion-navicon, material:md-menu"></ons-icon> -->
			      </ons-toolbar-button>
			    </div>
        </ons-toolbar>

        <ons-tabbar swipeable position="auto">
            <ons-tab page="tab1.html" label="Confirmation" icon="ion-home, material:md-home" active-icon="md-face" active></ons-tab>
            <ons-tab page="tab2.html" label="Job List" icon="clock" active-icon="md-face"></ons-tab>
            <ons-tab page="tab3.html" label="List" icon="list" active-icon="md-face">
            </ons-tab>
        </ons-tabbar>
    </ons-page>

    <template id="tab1.html">
		<ons-page id="addItem">
<!-- 	style="width:100px; height:100px; margin-top:15px;"
 -->			<div>
				<video muted playsinline id="qr-video" class="centerVideo">Video not showing</video>
				<div id="qrcode" class="centerQR"></div>
			</div>
			<div id="blockdisplay" class="selectDivShow">
			<div id="selectDivision" class="centerdiv">
				<div class="select">
					<select id="inversion-mode-select" class="select-text">
						<option value="original" selected="original">Scan original</option>
						<option value="invert">Scan with inverted colors</option>
						<option value="both">Scan both</option>
						</select>
						<label class="select-label"><b>Select Barcode Type:</b></label>
						<span class="select-highlight"></span>
						<span class="select-bar"></span>
						<br />
					</div>
				</div>


				<div class="centerText">
					<b style="color: #000; font-size:14px"
						>Detected QR code:
					</b>
					<span id="cam-qr-result">None</span>
				</div>
			</div>

				<div id="instruction" class="centerText2"><b>Please scan to confirm your job done</b></div>

				<div class="form-popup" id="myForm">
					<form action="/action_page.php" class="form-container">
						<h3>Confirmation</h3>

						<b>Serial</b>
						<input
							type="number"
							placeholder="Enter Serial Number"
							name="vSerial"
							id="vSerialID"
							required
						/>

						<b>Veggie Name</b>
						<input
							type="text"
							placeholder="Enter Veggie Name"
							id="vVeggieName"
							name="vName"
						/>

						<b>Weight</b>
						<input
							type="number"
							placeholder="Enter Weight(KG)"
							id="vVeggieWeight"
							name="vWeight"
						/>

						<div align="center">
							<button type="submit" class="btn">Add</button>
							<span
								><button
									type="button"
									class="btn cancel"
									id="closeBut"
								>
									Close
								</button></span>
								<span
								><button
									type="button"
									class="btn delete"
									id="deleteBut"
								>
									Delete
								</button></span>
						</div>
					</form>
				</div>

				<div class="form-popup" id="myForm2">
					<form action="" class="form-container">
						<h3>Delete Confirmation</h3>

						<b>Are you sure you want to remove this item?</b>

						<input
							type="number"
							placeholder="Enter Serial Number"
							name="vSerial2"
							id="vSerialID2"
							required
						/>

						<div align="center">
							<button type="submit" class="btn">Confirm</button>
							<span
								><button
									type="button"
									class="btn cancel"
									id="closeBut2"
								>
									Close
								</button></span>
						</div>
					</form>
				</div>

				<ons-fab id="manualBut" position="bottom right">
					<ons-icon icon="md-plus"> </ons-icon>
				</ons-fab>



				<ons-modal direction="up">
				  <div style="text-align: center">
				    <p>
				      <p style="text-align: center; padding: 10px;">You have been inactive for a while, please turn off screen to prevent phone from spoiling easiliy</p>
				      <p style="text-align: center; padding: 10px;">Touch anywhere to continue</p>
				      <ons-icon icon="md-spinner" size="28px" spin></ons-icon> Loading...
				    </p>
				  </div>
				</ons-modal>

			</ons-page>
		</template>

    <template id="tab2.html">
			<ons-page id="deleteItem">
					
					<div class="showtable">
						<table id ="thetable" class="data-table">
							<thead>
								<tr>
									<th>Title</th>
									<th>Location</th>
									<th>Wage</th>
									<th>Start Time</th>
								</tr>
							</thead>
							<tbody>

							<?php 
								include '../phpscripts/init.php';


 

								$query = "SELECT * FROM workInstance";


								$result = mysqli_query($con,$query);
 			if(mysqli_num_rows($result) > 0 ){

						while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
								echo "<tr><td>" . $row['Title'] . "</td><td>" . $row['Location'] . "</td><td>" . $row['Wage'] . "</td><td>" . $row['StartTime']. "</td></tr>";  
								}

							}else{

								echo "no items";
							}

										mysqli_close($con);


								    ?>


							</tbody>
						</table>
					</div>

			</ons-page>
		</template>

    <template id="tab3.html">
			<ons-page id="listItem">
				<p style="text-align: center;">
					This is the third page.
				</p>
			</ons-page>
		</template>


    <script src="https://unpkg.com/ionicons@4.5.5/dist/ionicons.js"></script>


    <script type="module" src="../scripts/app.js" async=""></script>
    <script type="text/javascript" src="../scripts/app2.js" async=""></script>



    <script type="text/javascript">
    	 window.onload = function(){
    	
    	 var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("POST", "../phpscripts/checklogin.php",true);
      xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xmlhttp.send();
            xmlhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
        		if(this.responseText!=1){
              window.location.replace("index.html");
        		}
        }else{

        }

    }

  }


    </script>


</body>

</html>