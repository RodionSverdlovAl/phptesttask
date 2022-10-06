// регистрация
$('.registration-btn').click(function(e){
    e.preventDefault();

    $(`input`).removeClass('error');
    $('.name').text('');
    $('.login').text('');
    $('.email').text('');
    $('.password').text('');
    $('.password_confirm').text('');

    let login = $('input[name="login"]').val(),
        password = $('input[name="password"]').val(),
        confirm_password = $('input[name="password_confirm"]').val(),
        email = $('input[name="email"]').val(),
        name = $('input[name="full_name"]').val();

    if(login.length===0){
        console.log('поле логина не заполнено');
        $(`input[name="login"]`).addClass('error')
    }
    if(password.length===0){
        console.log('поле пароля не заполнено');
        $(`input[name="password"]`).addClass('error')
    }
    if(confirm_password.length===0){
        console.log('поле подтверждения пароля не заполнено');
        $(`input[name="password_confirm"]`).addClass('error')
    }
    if(email.length===0){
        console.log('поле электронной почты не заполнено');
        $(`input[name="email"]`).addClass('error')
    }
    if(name.length===0){
        console.log('поле имени не заполнено');
        $(`input[name="full_name}"]`).addClass('error')
    }


    $.ajax({
        url: '/auth/reg',
        type: 'POST',
        dataType: 'json',
        data: {
            login: login,
            password: password,
            confirm_password: confirm_password,
            email: email,
            name: name
        },
        success (data){
            if(data.status){
                document.location.href = '/login';
                console.log("статус: " + data.status);
            }else{
                if(data.field === 1){
                    $('.name').text(data.massage);
                    $(`input[name="full_name}"]`).addClass('error')
                }
                if(data.field === 2){
                    $('.login').text(data.massage);
                    $(`input[name="login"]`).addClass('error')
                }
                if(data.field === 3){
                    $('.email').text(data.massage);
                    $(`input[name="email"]`).addClass('error')
                }
                if(data.field === 4){
                    $('.password').text(data.massage);
                    $(`input[name="password"]`).addClass('error')
                }
                if(data.field === 5){
                    $('.password_confirm').text(data.massage);
                    $(`input[name="password_confirm"]`).addClass('error')
                }
                console.log(data.massage);
                $('.msg').text(data.massage);
            }
        }
    });
})

// авторизация

$('.login-btn').click(function(e){
    e.preventDefault();
    $(`input`).removeClass('error');
    $('.login').text('');
    $('.password').text('');

    let login = $('input[name="login"]').val(),
        password = $('input[name="password"]').val();

    if(login.length===0){
        console.log('поле логина не заполнено');
        $(`input[name="login"]`).addClass('error')
    }
    if(password.length===0){
        console.log('поле пароля не заполнено');
        $(`input[name="password"]`).addClass('error')
    }

    $.ajax({
        url: '/auth/auth',
        type: 'POST',
        dataType: 'json',
        data: {
            login: login,
            password: password,
        },
        success (data){
            if(data.status){
                document.location.href = '/';
                console.log("статус: " + data.status);
            }else{
                if(data.field === 2){
                    $('.login').text(data.massage);
                    $(`input[name="login"]`).addClass('error')
                }
                if(data.field === 4){
                    $('.password').text(data.massage);
                    $(`input[name="password"]`).addClass('error')
                }
                console.log(data.massage);
                $('.msg').text(data.massage);
            }
        }
    });
})