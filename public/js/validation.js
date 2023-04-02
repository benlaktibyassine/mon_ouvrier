
$(function(){
    let nomError = true;
    let prenomError = true;
    let emailError = true;
    let jobError = true;
    let passError = true;
    let cPassError = true;

    const regexEmail = /^(^[a-z][a-zA-Z0-9-_.]+@(gmail|outlook|yahoo).(com|fr|ma))$/;
    const regexPassword =/^([A-Za-z0-9]{6,16})$/;





    $('.nom').blur(function (){
        if($(this).val().length <= 3){
            $(this).css('border','1px solid red').parent().find('.valid').removeClass("d-none");
            nomError = true;
        }
        else{
            $(this).css('border','1px solid green').parent().find('.valid').addClass("d-none");
            nomError = false;
        }
    })

    $('.prenom').blur(function (){
        if($(this).val().length <= 3){
            $(this).css('border','1px solid red').parent().find('.valid').removeClass("d-none");
            prenomError = true;

            console.log($(this));
        }
        else{
            $(this).css('border','1px solid green').parent().find('.valid').addClass("d-none");
            prenomError = false;
        }

    })

    $('.email').blur(function (){
        if(!regexEmail.test($(this).val())){
            $(this).css('border','1px solid red').parent().find('.valid').removeClass("d-none");
            emailError = true;
            console.log('emailError');
        }
        else{
            $(this).css('border','1px solid green').parent().find('.valid').addClass("d-none");
            emailError = false;
            console.log('not error');
        }

    })

    $('.job').blur(function (){
        if($(this).val().length <= 3){
            $(this).css('border','1px solid red').parent().find('.valid').removeClass("d-none");
            jobError = true;
        }
        else{
            $(this).css('border','1px solid green').parent().find('.valid').addClass("d-none");
            jobError = false;
        }

    })

    $('.pass').blur(function (){
        if(!regexPassword.test($(this).val())){
            $(this).css('border','1px solid red').parent().find('.valid').removeClass("d-none");
            passError = true;
        }
        else{
            $(this).css('border','1px solid green').parent().find('.valid').addClass("d-none");
            passError = false;
        }

    })

    $('.cpass').blur(function (){
        if($(this).val().length <= 2 || $(this).val() != $('.pass').val()){
            $(this).css('border','1px solid red').parent().find('.valid').removeClass("d-none");
            cPassError = true;
        }
        else{
            $(this).css('border','1px solid green').parent().find('.valid').addClass("d-none");
            cPassError = false;
        }

    })
    $('.submit').click(function(event){
        if(nomError === true || prenomError == true || emailError == true ||
             jobError == true || passError == true || cPassError == true){
                 $(".nom, .prenom, .pass, .email, .job, .cpass").blur();
                event.preventDefault();
        }
    })
})


