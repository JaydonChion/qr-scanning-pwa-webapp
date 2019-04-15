//#############timer to show modal ###############//

 

document.addEventListener("prechange", function(event) {
    document.querySelector(
        "ons-toolbar .center"
    ).innerHTML = event.tabItem.getAttribute("label");
});

//#############timer to show modal ###############//
var modal = document.querySelector("ons-modal");

var timeoutID;

function setup() {
    this.addEventListener("mousemove", resetTimer, false);
    this.addEventListener("mousedown", resetTimer, false);
    this.addEventListener("keypress", resetTimer, false);
    this.addEventListener("DOMMouseScroll", resetTimer, false);
    this.addEventListener("mousewheel", resetTimer, false);
    this.addEventListener("touchmove", resetTimer, false);
    this.addEventListener("MSPointerMove", resetTimer, false);

    startTimer();
}
setup();

function startTimer() {
    // wait 2 seconds before calling goInactive
    timeoutID = window.setTimeout(goInactive, 60000);
}

function resetTimer(e) {
    window.clearTimeout(timeoutID);

    goActive();
}

function goInactive() {
    // do something
    modal.show();
}

function goActive() {
    // do something
    modal.hide();
    startTimer();
}


