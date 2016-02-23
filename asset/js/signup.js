$(document).ready(function() {
	$("#username").blur(function() {
		var username = $("#username").val();
		var span = $("#username").next()
		if (username == '') {
			span.html('<label>用户名不能为空</label>');
		} else if (username.length > 10) {
			span.html('<label>用户名不能大于10位</label>');
		} else if (false) {
			//TODO : 用AJAX查询是否有相同的用户名存在
			
		} else {
			span.html('<label style="color:green;">用户名正确</label>');
		}	
	});
	$("#passwd").blur(function() {
		//
	});
});





