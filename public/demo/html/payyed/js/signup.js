// Modal
function modal(msg, title="Alert") {
    new Attention.Alert({
        title: title,
        content: msg,
        afterClose: ()=>{}
        ,
    });
}

$("#signupForm").on("submit", (e)=>{
    let name = $("#fullName").val();
    let email = $("#emailAddress").val();
    let password = $("#loginPassword").val();

    let data = {
        name,
        email,
        password
    };

    let btn = $("#signup")[0];
    btn.disabled = true;
    btn.innerHTML = "Signing up ...";

    $.ajax({
        url: "server.php",
        type: "POST",
        data: {
            command: "signup",
            ...data,
        },
        success: function(result) {
            let json = JSON.parse(result);
            if(json.error){
                modal(json.message,"Error");
            }else{
                modal(json.message);
                setTimeout(function(){
                    document.location.href = "login.php";
                },2000);
            }

            btn.disabled = false;
            btn.innerHTML = "Sign Up";
        },
        error: function(){
            btn.disabled = false;
            btn.innerHTML = "Sign Up";
        }
    });
}
)

$("#loginForm").on("submit", (e)=>{
    let email = $("#emailAddress").val();
    let password = $("#loginPassword").val();

    let data = {
        email,
        password
    };

    let btn = $("#login")[0];
    btn.disabled = true;
    btn.innerHTML = "Logining ...";

    $.ajax({
        url: "server.php",
        type: "POST",
        data: {
            command: "login",
            ...data,
        },
        success: function(result) {
            let json = JSON.parse(result);
            if(json.error){
                modal(json.message,"Error");
            }else{
                modal(json.message);
                setTimeout(function(){
                    document.location.href = "dashboard.php";
                },2000);
            }

            btn.disabled = false;
            btn.innerHTML = "Login";
        },
        error: function(){
            btn.disabled = false;
            btn.innerHTML = "Login";
        }
    });
})