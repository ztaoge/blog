$(document).ready(function() {
    //登录
    $("#signin").click(function() {
        if ($("#username").val() == '') {
            var span = $("#username").next();
            span.html('<label style="color:red;">用户名不能为空</label>');
        } else if ($("#passwd").val() == '') {
            var span = $("#passwd").next();
            span.html('<label style="color:red;">密码不能为空</label>');
        } else {
            //alert($("#username").val() + $("#passwd").val());
            $.ajax({
                beforeSend:function(){
                },
                async:false,
                type:'post',
                data:{'username':$("#username").val(),'passwd':$("#passwd").val()},
                url:'signin.php',
                success:function(data) {
                    if (data == 'success') {
                        //TODO:跳转到index.php
                         location.reload();
                    } else {
                        var span = $("#username").next();
                        span.html('<label style="color:red;">用户名或密码错误</label>');

                    }
                },
            });
        }
    });
    //登出
    $("#logout").click(function() {
        document.cookie='username=;expires=Thu, 01 Jan 1970 00:00:00 GMT'
        location.reload();
    });

});