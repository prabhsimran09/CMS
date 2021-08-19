// $(".nav-bar-menu").click(function () {

//     let arr = $(".nav-bar-menu");
//     for (let i = 0; i < arr.length; i++) {
//         if ($(arr[i]).hasClass("selected")) {
//             $(arr[i]).removeClass("selected");
//         }
//     }
//     $(this).addClass("selected");
// });

function validation() {

    var id = document.querySelector(".login-form #username").value;
    var ps = document.querySelector(".login-form #pass").value;

    if (id.length == "" && ps.length == "") {

        alert("Username and Password fields are empty");
        return false;
    }
    else {
        if (id.length == "") {
            alert("User Name is empty");
            return false;
        }
        if (ps.length == "") {
            alert("Password field is empty");
            return false;
        }
    }
}