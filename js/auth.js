const { data, error } = require("jquery");

document.addEventListener(' ', () => {
    const btnLogin = document.getElementById('btn_login');
    const email = document.getElementById('email');
    const password = document.getElementById('password');

    btnLogin.addEventListener('click', () => {
        const email = email.value;
        const password = password.value;

        if (!email || password === null) {
            alert('Please enter values.');
            return;
        }
        fetch('index.php', {
            method: 'POST',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            body: `email=${encodeURIComponent(email)}&password=${encodeURIComponent(password)}&login=''`
        }).then(response => {
        if (!response.ok) {
         throw new Error('Network response was not ok');
         }
         return response.json()
        }).then(data=>{
            console.log(data.toString());
        }).catch(error=>{
            console.log(error.toString());
        })
    });
});


// $('#btn-login').submit(function () {
//     var email = $('#email').val();
//     var pass = $('#password').val();

//     var data= {
//         email: email,
//         password: pass,
//         login: ''};
//         console.log("ressssssponse: "+data.toString());

//     $.ajax({
//         type: 'post',
//         url: 'ajax.php',
//         dataType: 'JSON',
//         data: data,
//         success: function (response) {
//             if (response.done == true) {
//                 window.location.href = 'index.php?home';
//             } else {
//                 $('.response').html('<div class="alert bg-danger alert-dismissable" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>' + response.data + '</div>');
//             }
//         },
//         error: function (response) {
//             if (response.done == true) {
//                 console.log("error: "+response.toString());

//                 window.location.href = 'login.php';
//             } else {
//                 $('.response').html('<div class="alert bg-danger alert-dismissable" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>' + response.data + '</div>');
//             }
//         }
//     });
// });
