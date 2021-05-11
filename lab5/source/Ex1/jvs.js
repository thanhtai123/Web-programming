function add() {
    var a = document.getElementById("firstOperand").value;
    var b = document.getElementById("secondOperand").value;
    var rs = 0;
    if (isNaN(a)) {
        window.alert("Error!!!\n a is not a number!");
    } else if (isNaN(b)) {
        window.alert("Error!!!\n b is not a number!");
    } else {
        rs = Number(a) + Number(b);
        document.getElementById("rs").value = rs;
    }

}

function sub() {
    var a = document.getElementById("firstOperand").value;
    var b = document.getElementById("secondOperand").value;
    var rs = 0;
    if (isNaN(a)) {
        window.alert("Error!!!\n a is not a number!");
    } else if (isNaN(b)) {
        window.alert("Error!!!\n b is not a number!");
    } else {
        rs = Number(a) - Number(b);
        document.getElementById("rs").value = rs;
    }
}

function div() {
    var a = document.getElementById("firstOperand").value;
    var b = document.getElementById("secondOperand").value;
    var rs = 0;
    if (isNaN(a)) {
        window.alert("Error!!!\n a is not a number!");
    } else if (isNaN(b)) {
        window.alert("Error!!!\n b is not a number!");
    } else if (Number(b) == 0) {
        window.alert("Error!!!\n cannot divide by zero!")
    } else {
        rs = Number(a) / Number(b);
        document.getElementById("rs").value = rs;
    }
}

function mul() {
    var a = document.getElementById("firstOperand").value;
    var b = document.getElementById("secondOperand").value;
    var rs = 0;
    if (isNaN(a)) {
        window.alert("Error!!!\n a is not a number!");
    } else if (isNaN(b)) {
        window.alert("Error!!!\n b is not a number!");
    } else {
        rs = Number(a) * Number(b);
        document.getElementById("rs").value = rs;
    }
}

function power() {
    var a = document.getElementById("firstOperand").value;
    var b = document.getElementById("secondOperand").value;
    var rs = 1;
    if (isNaN(a)) {
        window.alert("Error!!!\n a is not a number!");
    } else if (isNaN(b)) {
        window.alert("Error!!!\n b is not a number!");
    } else {
        a = Number(a);
        b = Number(b)
        if (b >= 0) {
            var i;
            for (i = 0; i < b; i++) {
                rs = rs * a;
            }
        } else {
            var i;
            for (i = 0; i < -b; i++) {
                rs = rs * a;
            }
            rs = 1 / rs;
        }
    }
    document.getElementById("rs").value = rs;
}