dom();

function dom() {
    var APP_URL = window.location.pathname;

    if (APP_URL == "/countries") {
        document.getElementById("country").classList.add("nav-treeview");
    }
    if (APP_URL == "/add_country") {
        document.getElementById("country").classList.add("nav-treeview");
    }
    if (APP_URL == "/cities") {
        document.getElementById("city").classList.add("nav-treeview");
    }
    if (APP_URL == "/add_city") {
        document.getElementById("city").classList.add("nav-treeview");
    }
    if (APP_URL == "/thanas") {
        document.getElementById("thana").classList.add("nav-treeview");
    }
    if (APP_URL == "/add_thana") {
        document.getElementById("thana").classList.add("nav-treeview");
    }
}

function country() {
    $("#country").removeClass("disabled");
    $("#country").addClass("nav nav-treeview");
}

function city() {
    $("#city").removeClass("disabled");
    $("#city").addClass("nav nav-treeview");
}

function thana() {
    // alert("Thana");
    $("#thana").removeClass("disabled");
    $("#thana").addClass("nav nav-treeview");
}