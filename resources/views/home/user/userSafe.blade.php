@extends('home.user.userInfo')
@section("css")
<style>
    #safe a{
        color:#FF6700;
    }
</style>
@endsection
@section('content')
<div class="n-frame">
        <div class="title-item title_security_wap">
          <h4 class="title-big dis-inb">安全等级</h4>
          <em class="space6"></em>
          <p class="font-normal dis-inb wap_colb2"><em class="light-num" style="padding:0">
			  	
						<span class="score_1">50</span>
					
		  </em>分</p>
          <div class="slider-area dis-inb vert-m" style="width:360px;">
            <div class="slider-bar-bg"></div>
            <div class="slider-bar-line score_bg_1" style="width:50%;"></div>
            <em class="drag-ico" style="left:50%"></em>
          </div>
          <p class="font-normal dis-inb security_level_txt">
		  
				<span class="score_outer_1">存在<em class="light-num">2</em>项风险</span>
			
		  </p>
        </div>
      	<ul class="device-detail-area">
          <li id="changePassword" class="click-row">
            <div class="font-img-item clearfix">
              <em class="fi-ico fi-ico-lock"></em>
              <p class="title-normal dis-inb">帐号密码</p>
			  
					<p class="font-default">
						用于保护帐号信息和登录安全
					</p>
				
			  
			  
					<span class="title-normal wap-desc">
						修改
					</span>
					
				<i class="arrow_r"></i>
        	  </div>
			  
					
				
            <div class="ada-btn-area" id="btnUpdatePassword">
              <a __href="/pass/changePassword?userId=1157822905" class="n-btn">修改</a>
            </div>
          </li>
          <li id="changeEmail" class="click-row">
            <div class="font-img-item clearfix">
              <em class="fi-ico fi-ico-email"></em>
              <p class="title-normal dis-inb">安全邮箱</p>
							
								<span class="warning-tip">&nbsp;</span>
							
			  <span class="title-normal wap-desc">
			  <span class="color-active">未绑定</span>
					
			  </span>
			  
			  	
				
						<p class="font-default color-active">安全邮箱将可用于登录小米帐号和重置密码，建议立即设置</p>
					
				<i class="arrow_r"></i>				
          	</div>
            <div class="ada-btn-area" id="btnUpdateEmail">
				
					<!--无地址-->
						<a __href="/pass/bindAddress?userId=1157822905&amp;type=EM&amp;replace=false&amp;address=" class="n-btn">绑定</a>
					
            </div>
          </li>
          <li id="changeMobile" class="click-row">
            <div class="font-img-item clearfix">
				<em class="fi-ico fi-ico-phone"></em>
				<p class="title-normal dis-inb">安全手机</p>
								
				<span class="title-normal wap-desc">
				
						180******14<span class="ph_list_sum phone-list-sum" data-title="等&lt;span class=&#39;ff6&#39;&gt;{phsum}&lt;/span&gt;个"></span>
						
					 
				</span>
			  
				
					<div class="wap-info">
						180******14
						
					</div>
					 
				
						
							<p class="font-default">安全手机可以用于登录小米帐号，重置密码或其他安全验证</p>
						
						
					 
				<i class="arrow_r"></i>
            </div>
            <div class="ada-btn-area" id="btnUpdatePhone">
              <a class="n-btn btnBindMobile" __href="/pass/bindAddress?userId=1157822905&amp;type=PH&amp;replace=false" data-mode="add">添加</a>
            
              <a class="n-btn btnChangeMobile" __href="/pass/bindUserAddress?userId=1157822905&amp;type=PH" data-mode="update">
                修改
              </a>
            
            </div>
          </li>
          <li id="setMibao" class="click-row">
            <div class="font-img-item clearfix">
              <em class="fi-ico fi-ico-secret"></em>
              <p class="title-normal dis-inb">密保问题</p>
			  	<span class="warning-tip">&nbsp;</span><p class="font-default color-active">密保问题用于安全验证，建议立即设置</p>
					
				<span class="title-normal wap-desc color-active">未设置</span>
					
				<i class="arrow_r"></i>				
            </div>
            <div class="ada-btn-area" id="btnSetMibao">
			  	<a id="mibao_link" __href="https://sq.id.mi.com/setQuestion?userId=1157822905&amp;_locale=zh_CN" class="n-btn">设置</a>
					 
            </div>
          </li>
      	</ul>
		<!--
        <div class="title-item">
          <h4 class="title-big dis-inb">
			  	
					 
		  </h4>
        </div>
		-->
	</div>
    <div class="n-frame dis_none_pc">
      <div class="title-item title_security_wap">
				<h4 class="title-big dis-inb">其他</h4>
			</div>
      <ul class="device-detail-area">
        <li>
          <div class="font-img-item clearfix">
            <em class="fi-ico fi-ico-info"></em>
            <p class="title-normal dis-inb">修改个人资料</p>
            <span class="title-normal wap-desc"></span>
            <i class="arrow_r"></i>
            <a class="pos_opc" href="https://account.xiaomi.com/pass/auth/profile/home">修改个人资料</a>
          </div>
        </li>
        <li>
          <div class="font-img-item clearfix">
            <em class="fi-ico fi-ico-auth"></em>
            <p class="title-normal dis-inb">绑定授权</p>
            <span class="title-normal wap-desc"></span>
            <i class="arrow_r"></i>
            <a class="pos_opc" href="https://account.xiaomi.com/pass/auth/sns/home">绑定授权</a>
          </div>
        </li>
      </ul>
    </div>
    <div class="logout_wap">
      <a class="btnadpt bg_white" href="https://account.xiaomi.com/pass/logout?userId=1157822905&callback=https://account.xiaomi.com">退出</a>
    </div>
@endsection
