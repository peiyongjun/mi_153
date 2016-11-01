$("input[name='username']").focus(function() {
	$("input[name='but']").attr('disabled', false);
	$('label[id="checkname"]').next('span').remove();
}).blur(function() {
	$('label[id="checkname"]').next('span').remove();
	var v = $(this).val();
	if (v == '') {
		$("<span>　用户名不能为空</span>").css('color', 'red').insertAfter('label[id="checkname"]');
		$("input[name='but']").attr('disabled', true);
	} else if (v.match(/^\w{4,16}$/) == null) {
		$("<span>账号信息必须为4~16位有效字符</span>").css('color', 'red').insertAfter('label[id="checkname"]');
		$("input[name='but']").attr('disabled', true);
	}else {
		$.ajax({
			type:"get",
			data:{username:v},
			url:"/checkUsername",
			dataType:'html',
			success:function(data)
	        {
	        	if(data == 1){
	        		$("<span>&nbsp;&nbsp;该用户名可用</span>").css('color', 'green').insertAfter('label[id="checkname"]');
	        	}else if(data == 2){
	        		$("<span>&nbsp;&nbsp;该用户名已存在</span>").css('color', 'red').insertAfter('label[id="checkname"]');
	        		$("input[name='but']").attr('disabled', true);
	        	}
	        }    
		});
	};
});

$("input[name='email']").focus(function() {
	$('label[id="checkemail"]').next('span').remove();
	$("input[name='but']").attr('disabled', false);
}).blur(function() {
	$('label[id="checkemail"]').next('span').remove();
	var v = $(this).val();
	if (v == '') {
		$("<span>　邮箱地址不能为空</span>").css('color', 'red').insertAfter('label[id="checkemail"]');
		$("input[name='but']").attr('disabled', true);
	} else if (v.match(/^(\w)+(\.\w+)*@(\w)+((\.\w+)+)$/) == null) {
		$("<span>邮箱地址不规范</span>").css('color', 'red').insertAfter('label[id="checkemail"]');
		$("input[name='but']").attr('disabled', true);
	};
});

$("input[name='password']").focus(function() {
	$('label[id="checkpass"]').next('span').remove();
	$("input[name='but']").attr('disabled', false);
}).blur(function() {
	$('label[id="checkpass"]').next('span').remove();
	var v = $(this).val();
	if (v == '') {
		$("<span>　密码不能为空</span>").css('color', 'red').insertAfter('label[id="checkpass"]');
		$("input[name='but']").attr('disabled', true);
	};
});

$("input[name='repass']").focus(function() {
	$('label[id="repass"]').next('span').remove();
	$("input[name='but']").attr('disabled', false);
}).blur(function() {
	$('label[id="repass"]').next('span').remove();
	var v = $(this).val();
	var pass = $("input[name='password']").val();
	// alert(pass);
	if (v != pass) {
		$("<span>　请再次确认密码</span>").css('color', 'red').insertAfter('label[id="repass"]');
		$("input[name='but']").attr('disabled', true);
	};
});