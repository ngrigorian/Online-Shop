$(document).ready(function(){
    $('#sendMess').on("click", function(){
        let nEmail = $('.nEmail').val();

        if(trim(nEmail == '')){
            $('.err').text("Email Exist!");
            return false;
        } else{
            
        }
    })

    $.ajax({
        url: "main.php",
        type: 'POST',
        cache: false,
        dataType: 'html',
        data: {"nEmail": nEmail},
        beforeSend: function(){
            $("#sendMess").prop("disabled", true);
        },
        success: function(data){
            alert(data);
            $("#sendMess").prop("disabled", false);
        }
    });
})
