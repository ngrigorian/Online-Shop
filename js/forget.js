$(document).ready(function(){
    $('#sendMess').on("click", function(){
        let pass = $('#nPassword').val();
        let cnfPass = $('#cnfPassword').val();

        if(pass == ''){
            $('#errors').text("Please Complete your New Password!");
            return false;
        } else if(cnfPass == ''){
            $('#errors').text("Please Confirm your New Password!");
            return false;
        }
    })

    $.ajax({
        url: "main.php",
        type: 'POST',
        cache: false,
        dataType: 'html',
        data: {"pass": pass, "cnfPass": cnfPass},
        beforeSend: function(){
            $("#sendMess").prop("disabled", true);
        },
        success: function(data){
            alert(data);
            $("#sendMess").prop("disabled", false);
        }
    });
})


