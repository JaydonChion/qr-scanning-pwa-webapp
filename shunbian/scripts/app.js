import QrScanner from "../qrscannerfile/qr-scanner.min.js";
QrScanner.WORKER_PATH = "../qrscannerfile/qr-scanner-worker.min.js";
const video = document.getElementById("qr-video");
// const camHasCamera = document.getElementById('cam-has-camera');
const camQrResult = document.getElementById("cam-qr-result");
const closeFormButton = document.getElementById("closeBut");
const QRManualBut = document.getElementById("manualBut");
const deleteItem = document.getElementById("deleteBut");
const toolbarButDet = document.getElementById("toolbarBut");
const closeFormButton2 = document.getElementById("closeBut2");

var mode = 0;

const scanner = new QrScanner(video, result => setResult(camQrResult, result));
scanner.start();

closeFormButton.addEventListener("click", closeForm);
closeFormButton2.addEventListener("click", closeForm2);

deleteItem.addEventListener("click", deleteVeggie);

QRManualBut.addEventListener("click", function() {

        document.getElementById("myForm").style.display = "block";
    
});

toolbarButDet.addEventListener("click", function() {
    var x = document.getElementById("selectDivision");
    // if (x.style.display === "none") {
    //     x.style.display = "block";
    //     mode = 0;
    // } else {
    //     x.style.display = "none";
    //     mode = 1;
    // }

    if(mode==1){
        mode=0;
    document.getElementById("qr-video").style.display = "block";
    document.getElementById("qrcode").style.display = "none";
    document.getElementById("instruction").style.display = "none";
    document.getElementById("blockdisplay").style.display = "block";


    }else{
        mode =1;
    document.getElementById("qr-video").style.display = "none";
    document.getElementById("qrcode").style.display = "block";
    document.getElementById("blockdisplay").style.display = "none";
    document.getElementById("instruction").style.display = "block";

    }


});

//########## check result #############//

function setResult(label, result) {
//     if (mode == 0) {
//         openForm(result);
//     } else if (mode == 1) {
//         openForm2(result);
//     }

    label.textContent = result;
    label.style.color = "teal";
    clearTimeout(label.highlightTimeout);
    label.highlightTimeout = setTimeout(
        () => (label.style.color = "inherit"),
        100
    );
}

// ####### Web Cam Scanning #######//

document
    .getElementById("inversion-mode-select")
    .addEventListener("change", event => {
        scanner.setInversionMode(event.target.value);
    });

//################pop up form ###########//

function openForm(serialNum) {
    document.getElementById("myForm").style.display = "block";

    document.getElementById("vSerialID").value = serialNum;
}

function closeForm() {
    document.getElementById("myForm").style.display = "none";
}

function openForm2(serialNum) {
    document.getElementById("myForm2").style.display = "block";

    document.getElementById("vSerialID2").value = serialNum;
}

function closeForm2() {
    document.getElementById("myForm2").style.display = "none";
}

//############# delete veggie field #############//
function deleteVeggie() {
    //do something to delete veggie field with this particular serial number in database
}

//##########install pop up in homescreen########//

// if (location.protocol != 'https:')
// {
//  location.href = 'https:' + window.location.href.substring(window.location.protocol.length);
// }




//generate qr code

var elText = localStorage.getItem("serial");

var qrcode = new QRCode(document.getElementById("qrcode"), {
    width : 250,
    height : 250
});

function makeCode () {      
    
    if (elText=="") {
        alert("Fail to generate barcode");
        return;
    }
    
    qrcode.makeCode(elText);
    document.getElementById("qrcode").style.display = "none";

}

makeCode();


//get more data



