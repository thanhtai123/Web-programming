function submit1() {
    var fname = document.getElementById("fname1").value
    var lname = document.getElementById("lname1").value
    var pass = document.getElementById("pass1").value
    var text1 = document.getElementById("exampleFormControlTextarea1").value
    if (fname.length < 2) {
        window.alert("First name is too short!!!");
    } else if (fname.length > 30) {
        window.alert("First name is too long!!!");
    } else if (lname.length < 2) {
        window.alert("Last name is too short!!!");
    } else if (lname.length > 30) {
        window.alert("Last name is too long!!!");
    } else if (!radio1()) {
        window.alert("Please choose your gender!!");
    } else if (!email1()) {
        window.alert("invalid email!!!");
    } else if (pass.length < 2) {
        window.alert("Password is too short!!!");
    } else if (pass.length > 30) {
        window.alert("Password is too long!!!");
    } else if (text1.length > 10000) {
        window.alert("About text is too long!!!")
    } else {
        window.alert("Complete!");
    }

}

function reset1() {
    document.getElementById("fname1").value = "";
    document.getElementById("lname1").value = "";
    document.getElementById("pass1").value = "";
    document.getElementById("email1").value = "";
    document.getElementById("exampleFormControlTextarea1").value = "";
    document.getElementById('customRadioInline1').checked = false;
    document.getElementById('customRadioInline2').checked = false;
    document.getElementById('customRadioInline3').checked = false;
    document.getElementById('loc1').selectedIndex = 0;
    document.getElementById('example-date-input').value = "2000-01-01";
}

function radio1() {
    var rs = 0;

    if (document.getElementById('customRadioInline1').checked) {
        //Male radio button is checked
        return true;
    } else if (document.getElementById('customRadioInline2').checked) {
        //Female radio button is checked
        return true;
    } else if (document.getElementById('customRadioInline3').checked) {
        //Female radio button is checked
        return true;
    } else {
        return false;
    }
}

function email1() {
    var emailstr = document.getElementById("email1").value;
    var i, j, k;
    var a = 0;
    for (i = 0; i < emailstr.length; i++) {
        if (emailstr.charAt(i) == "@") {
            if (i == 0) return false;
            for (j = i + 1; j < emailstr.length; j++) {
                if (emailstr.charAt(j) == "@") return false;
                if (emailstr.charAt(j) == ".") {
                    a++;
                    if (j == emailstr.length - 1) a++;
                }
            }
            if (a == 1) return true;
            return false;
        }
    }
    return false;

}