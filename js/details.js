var mobile = document.getElementById("mobile")
    if (mobile.value == "") {
        window.alert("please enter your 10 digits mobile no.");
        mobile.focus();
        return false;
    }

    var dob = document.getElementById("dob")
    if (dob.value == "") {
        window.alert("please enter your Date of Birth");
        dob.focus();
        return false;
    }

    var address = document.getElementById("address")
    if (address.value == "") {
        window.alert("please enter your address details");
        address.focus();
        return false;
    }

    function getYear() {
        var semester = document.getElementById('sem'.value);
        var year = 0;
        if(semester == 1 || semester == 2){
            year = "First Year";
        }
        else if(semester == 3 || semester == 4){
            year = "Second Year";
        }
        else if(semester == 5 || semester == 6){
            year = "Third Year";
        }
        else if(semester == 7 || semester == 8){
            year = "Final Year";
        }
        document.getElementById('year').value = year;
    }

