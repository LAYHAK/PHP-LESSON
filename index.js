$(document).ready(function () {
    $("#login").click(function () {
        var email = $("#email").val();
        var password = $("#password").val();
        // Checking for blank fields.
        if (email == '' || password == '') {
            $('input[type="text"],input[type="password"]').css("border", "2px solid red");
            $('input[type="text"],input[type="password"]').css("box-shadow", "0 0 3px red");
            alert("Please fill all fields...!!!!!!");
        }
        if (email == "admin" && password == "admin") {
            alert("Login successfull");
        } else {
            alert("Login failed");
        }
    });
});

//? click btn click me to toggle the form
$(document).ready(function () {
    $("#hide").click(function () {
        $("#form").hide();
        $("p").hide();
    });
});
$(document).ready(function () {
    $("#show").click(function () {
        $("#form").show();
        $("p").show();
    });
});
$(document).ready(function () {
    $("#toggle").click(function () {
        $("#form").toggle();
        $("p").toggle();
    });
});



$(document).ready(function () {
    $("#fadeIn").click(function () {
        $("div").fadeOut('1000').fadeIn('1000');
    });
});

$(document).ready(function () {
    //slide up and down
    $("#slideUp").click(function () {
        $("div").slideUp();
    }
    );
});
$(document).ready(function () {
    $("#slideDown").click(function () {
        $("div").slideDown();
    });
} 
);
$(document).ready(function () {
    $("#slide").click(function () {
        $("div").slideToggle();
    });
}
);