$(document).ready(function() {
	//function check_username(username) {
	//	var response = [];
	//	$.get("signup.php", {username:username},function(data, textStatus){
	//		response = data;
	//	})
	//	return response;
	//}
	//console.log(check_username('zzz'));

	$("#username").blur(function() {
		var username = $("#username").val();
		var span = $("#username").next()

		function check_username(username) {
			var flag = '';
			$.ajax({
				async:false,
				type:'get',
				data:{username:username},
				url:'../../blog/signup.php',
				success:function(data) {
					flag = data;
				}
			});
			return flag;
		}

		if (username == '') {
			span.html('<label style="color:red;">用户名不能为空</label>');
		} else if (username.length > 10) {
			span.html('<label style="color:red;">用户名不能大于10位</label>');
		} else if (check_username(username) == 201) {
			//TODO : 用AJAX查询是否有相同的用户名存在
			span.html('<label style="color:red;">该用户名已存在</label>');

		} else {
			span.html('<label style="color:green;">用户名正确</label>');
		}
	});

	$("#passwd").blur(function() {
		var passwd = $("#passwd").val();
		var span = $("#passwd").next();
		if (passwd == '') {
			span.html('<label style="color:red;">密码不能为空</label>');
		} else if (passwd.length > 12) {
			span.html('<label style="color:red;">密码不能大于12位</label>');
		} else {
			span.html('<label style="color:green;">该密码可用</label>');
		}
	});

	$("#passwd_confirm").keyup(function() {
		var passwd = $("#passwd").val();
		var passwd_confirm = $("#passwd_confirm").val();
		var span = $("#passwd_confirm").next();
		if (passwd != passwd_confirm || passwd == '') {
			span.html('<label style="color:red;">两次输入不一致,请检查</label>');
		} else {
			span.html('<label style="color:green;">该密码可用</label>');
			$("#submit").attr('disabled', false);
		}
	});
});





