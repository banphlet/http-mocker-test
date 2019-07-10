'use strict'

$("#form").submit(function(){
    $("#error").css("display: none")
        $("#success").css("display", "none")

const values = {
 password: $("input[name=password]").val(),
 email: $("input[name=email]").val()
};


$.ajax({
type: "POST",
url: `${window.url}/login`,
data: values,
dataType: "json",
success: function (response) {
$("#success").css("display", "block")
 $("#error").css("display: none")
 setTimeout(() => {
    window.location.href = "/"
 }, 1000);
},
error: function (error){
const err = error.responseJSON && error.responseJSON.error.details
$("#error").css("display", "block");
$("#errorMessage").html(err)
$("#success").css("display", "none")
}
});

 })


