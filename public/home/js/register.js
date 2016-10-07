   $("input[name='username']").focus(function(){
    $('label[id="checkname"]').next('span').remove();
  }).blur(function(){
    $('label[id="checkname"]').next('span').remove();
    var v = $(this).val();
    if(v == ''){
      $("<span>　用户名不能为空</span>").css('color','red').insertAfter('label[id="checkname"]');
    }else if(v.match(/^\w{4,16}$/) == null){
      $("<span>账号信息必须为4~16位有效字符</span>").css('color','red').insertAfter('label[id="checkname"]');
    };
  });

  $("input[name='email']").focus(function(){
    $('label[id="checkemail"]').next('span').remove();
  }).blur(function(){
    $('label[id="checkemail"]').next('span').remove();
    var v = $(this).val();
    if(v == ''){
      $("<span>　邮箱地址不能为空</span>").css('color','red').insertAfter('label[id="checkemail"]');
    }else if(v.match(/^(\w)+(\.\w+)*@(\w)+((\.\w+)+)$/) == null){
      $("<span>邮箱地址不规范</span>").css('color','red').insertAfter('label[id="checkemail"]');
    };
  });

   $("input[name='password']").focus(function(){
    $('label[id="checkpass"]').next('span').remove();
  }).blur(function(){
    $('label[id="checkpass"]').next('span').remove();
    var v = $(this).val();
    if(v == ''){
      $("<span>　密码不能为空</span>").css('color','red').insertAfter('label[id="checkpass"]');
    };
  });

  $("input[name='repass']").focus(function(){
    $('label[id="repass"]').next('span').remove();
  }).blur(function(){
    $('label[id="repass"]').next('span').remove();
    var v = $(this).val();
    var pass = $("input[name='password']").val();
    // alert(pass);
    if(v != pass){
      $("<span>　请再次确认密码</span>").css('color','red').insertAfter('label[id="repass"]');
    };
  });

  $("input[name='icode']").focus(function(){
    $('div[id="checkcode"]').next('span').remove();
  }).blur(function(){
    $('div[id="checkcode"]').next('span').remove();
    // var v = $(this).val();
    // alert(v);
    if($(this).val() != "<?php echo $_SESSION['piccode'] ?>" ){
      $("<span>验证码不正确</span>").css('color','red').insertAfter('div[id="checkcode"]');
    };
  });
