@extends('home.user.userInfo')
@section("css")
<style>
    #info a{
        color:#FF6700;
    }
</style>
@endsection
@section('content')
<div class="n-frame">
	<div class="uinfo c_b">
        <div class="">
        <div class="main_l">
          <div class="naInfoImgBox t_c">
            <div class="na-img-area marauto">
              <!--na-img-bg-area不能插入任何子元素-->
              <div class="na-img-bg-area"></div>
              <em class="na-edit"></em>
            </div>
            <div class="naImgLink">
            	<a class="color4a9" href="" title="设置头像">设置头像</a>
			</div>
          </div>        
        </div>
        <div class="main_r">
          <div class="framedatabox">
            <div class="fdata">
              <a class="color4a9 fr" href="#" title="编辑" id="editInfo" data-toggle="modal" data-target="#AddModal">
              	<i class="iconpencil"></i>
              	编辑
              </a>
              <h3>基础资料</h3>    
            </div>
            <div class="fdata lblnickname">
              <p>
              	<span>姓名：</span>
              	<span class="value" _empty="">
              		<span style="color:#999;">请设置名字</span>
				</span></p>     
            </div>
            <div class="fdata lblbirthday">
              <p>
              	<span>生日：</span>
              	<span class="value" _empty=""></span>
              </p>     
            </div>
            <div class="fdata lblgender">
              <p>
              	<span>性别：</span>
              	<span class="value" _empty=""></span>
              </p>     
            </div>
			<div class="btn_editinfo"><a id="editInfoWap" class="btnadpt bg_normal" href="">编辑基础资料</a></div>
          </div>
        </div>
        </div>
		<div class="logout_wap">
			<a class="btnadpt bg_white" href="/pass/logout?userId=1157822905&amp;callback=https://account.xiaomi.com">退出</a>
		</div>
      </div>
	 </div>


<!-- 编辑个人信息资料 s -->
<div class="popup_mask">
<div class="bkc"></div>
<div class="mod_wrap">
<div class="mod_acc_tip layereditinfo" class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="mod_tip_hd">
    <h4>编辑基础资料</h4>
    <a class="btn_mod_close" href="" title=""><span>关闭</span></a>
  </div>
  <div class="mod_tip_bd">
    <form action="" method="">      
    <div class="wapbox editbasicinfo">
      <dl class="infobox c_b">
        <dt>姓名：</dt>
        <dd>
          <label class="labelbox"><input class="nickname" type="text" name="nickname" maxlength="20" placeholder="姓名"></label>
        </dd>      
        <dt>生日：</dt>
        <dd>
          <ul class="birth-box c_b">
            <li class="biry">
              <div>
                <span class="titsbirth c_b">
                  <em class="birthcon">年</em>
                  <i class="icon_cirarr"></i>
                </span>
              </div>
              <div class="tits_list select-year" style="display: none;"><div class="select_panel select-year-panel"><p value="2016">2016</p><p value="2015">2015</p><p value="2014">2014</p><p value="2013">2013</p><p value="2012">2012</p><p value="2011">2011</p><p value="2010">2010</p><p value="2009">2009</p><p value="2008">2008</p><p value="2007">2007</p><p value="2006">2006</p><p value="2005">2005</p><p value="2004">2004</p><p value="2003">2003</p><p value="2002">2002</p><p value="2001">2001</p><p value="2000">2000</p><p value="1999">1999</p><p value="1998">1998</p><p value="1997">1997</p><p value="1996">1996</p><p value="1995">1995</p><p value="1994">1994</p><p value="1993">1993</p><p value="1992">1992</p><p value="1991">1991</p><p value="1990">1990</p><p value="1989">1989</p><p value="1988">1988</p><p value="1987">1987</p><p value="1986">1986</p><p value="1985">1985</p><p value="1984">1984</p><p value="1983">1983</p><p value="1982">1982</p><p value="1981">1981</p><p value="1980">1980</p><p value="1979">1979</p><p value="1978">1978</p><p value="1977">1977</p><p value="1976">1976</p><p value="1975">1975</p><p value="1974">1974</p><p value="1973">1973</p><p value="1972">1972</p><p value="1971">1971</p><p value="1970">1970</p><p value="1969">1969</p><p value="1968">1968</p><p value="1967">1967</p><p value="1966">1966</p><p value="1965">1965</p><p value="1964">1964</p><p value="1963">1963</p><p value="1962">1962</p><p value="1961">1961</p><p value="1960">1960</p><p value="1959">1959</p><p value="1958">1958</p><p value="1957">1957</p><p value="1956">1956</p><p value="1955">1955</p><p value="1954">1954</p><p value="1953">1953</p><p value="1952">1952</p><p value="1951">1951</p><p value="1950">1950</p><p value="1949">1949</p><p value="1948">1948</p><p value="1947">1947</p><p value="1946">1946</p><p value="1945">1945</p><p value="1944">1944</p><p value="1943">1943</p><p value="1942">1942</p><p value="1941">1941</p><p value="1940">1940</p><p value="1939">1939</p><p value="1938">1938</p><p value="1937">1937</p><p value="1936">1936</p><p value="1935">1935</p><p value="1934">1934</p><p value="1933">1933</p><p value="1932">1932</p><p value="1931">1931</p><p value="1930">1930</p><p value="1929">1929</p><p value="1928">1928</p><p value="1927">1927</p><p value="1926">1926</p><p value="1925">1925</p><p value="1924">1924</p><p value="1923">1923</p><p value="1922">1922</p><p value="1921">1921</p><p value="1920">1920</p><p value="1919">1919</p><p value="1918">1918</p><p value="1917">1917</p><p value="1916">1916</p><p value="1915">1915</p><p value="1914">1914</p><p value="1913">1913</p><p value="1912">1912</p><p value="1911">1911</p><p value="1910">1910</p><p value="1909">1909</p><p value="1908">1908</p><p value="1907">1907</p><p value="1906">1906</p><p value="1905">1905</p><p value="1904">1904</p><p value="1903">1903</p><p value="1902">1902</p><p value="1901">1901</p><p value="1900">1900</p></div>
                <div class="cancel_panel">
                  <div class="cancel_box">
                    <a class="btnadpt bg_white btn-cancel" href="javascript:void(0);">取消</a>
                  </div>
                </div>
              </div>
            </li>
            <li class="month_day birm">              
              <div>
                <span class="titsbirth c_b">
                  <em class="birthcon">月</em>
                  <i class="icon_cirarr"></i>
                </span>                  
              </div>
              <div class="tits_list select-month" style="display: none;">
                <div class="select_panel">
                  <p value="01">01</p>
                  <p value="02">02</p>
                  <p value="03">03</p>
                  <p value="04">04</p>
                  <p value="05">05</p>
                  <p value="06">06</p>
                  <p value="07">07</p>
                  <p value="08">08</p>
                  <p value="09">09</p>
                  <p value="10">10</p>
                  <p value="11">11</p>
                  <p value="12">12</p>
                </div>
                <div class="cancel_panel">
                  <div class="cancel_box">
                    <a class="btnadpt bg_white btn-cancel" href="javascript:void(0);">取消</a>
                  </div>
                </div>
              </div>
            </li>
            <li class="month_day bird">                
              <div>
                <span class="titsbirth c_b">
                  <em class="birthcon">日</em>
                  <i class="icon_cirarr"></i>
                </span>                 
              </div>
              <div class="tits_list bird select-date" style="display: none;">
                <div class="select_panel">
                  <p value="01">01</p>
                  <p value="02">02</p>
                  <p value="03">03</p>
                  <p value="04">04</p>
                  <p value="05">05</p>
                  <p value="06">06</p>
                  <p value="07">07</p>
                  <p value="08">08</p>
                  <p value="09">09</p>
                  <p value="10">10</p>
                  <p value="11">11</p>
                  <p value="12">12</p>
                  <p value="13">13</p>
                  <p value="14">14</p>
                  <p value="15">15</p>
                  <p value="16">16</p>
                  <p value="17">17</p>
                  <p value="18">18</p>
                  <p value="19">19</p>
                  <p value="20">20</p>
                  <p value="21">21</p>
                  <p value="22">22</p>
                  <p value="23">23</p>
                  <p value="24">24</p>
                  <p value="25">25</p>
                  <p value="26">26</p>
                  <p value="27">27</p>
                  <p value="28">28</p>
                  <p value="29">29</p>
                  <p value="30">30</p>
                  <p value="31">31</p>
                </div>
                <div class="cancel_panel">
                  <div class="cancel_box">
                    <a class="btnadpt bg_white btn-cancel" href="javascript:void(0);">取消</a>
                  </div>
                </div>
              </div>
            </li>
          </ul>         
        </dd>        
        <dt>性别：</dt>
        <dd class="checkbox infosex">
          <span value="m"><i class="icon_select iconinfosex"></i><em>男</em></span>
          <span value="f"><i class="icon_select iconinfosex"></i><em>女</em></span>
        </dd>
      </dl>
      <div class="err_tip empty_name err_tip_independ" style="display:none;" _text="名字不能为空">名字不能为空</div> 
	  <div class="err_tip sys_err err_tip_independ" style="display:none;" _text="系统错误，请稍候再试">系统错误，请稍候再试</div> 
	  <div class="err_tip empty_param err_tip_independ" style="display:none;" _text="参数为空">参数为空</div> 
	  <div class="err_tip bad_param err_tip_independ" style="display:none;" _text="参数错误">参数错误</div> 
	  <div class="err_tip bad_nickname err_tip_independ" style="display:none;" _text="名字长度不合法，应为2-20个字符">名字长度不合法，应为2-20个字符</div>
	  <div class="err_tip bad_birthday err_tip_independ error-birth" style="display:none;" _text="生日格式不合法">生日格式不合法</div>
	  <div class="err_tip bad_gender err_tip_independ" style="display:none;" _text="性别参数不合法">性别参数不合法</div>
    <div class="err_tip empty_birthday err_tip_independ error-birth" style="display:none;" _text="请完整选择生日信息">请完整选择生日信息</div>
    <div class="err_tip invalid_birthday err_tip_independ error-birth" style="display:none;" _text="请提供您的真实信息">请提供您的真实信息</div>
    </div>      
    <div class="tip_btns">
      <a class="btn_tip btn_commom" href="" title="保存">保存</a>
      <!-- <input class="btn_tip btn_commom" type="submit" value="保存"> -->
      <a class="btn_tip btn_back" href="" title="取消">取消</a>
    </div>
    </form> 
  </div>  
</div>
</div>
</div>
<!-- 编辑个人信息资料 e -->
<!-- 设置头像 s -->
<div class="popup_mask">
<div class="bkc"></div>
<div class="mod_wrap">
<div class="mod_acc_tip layeruploadface">
  <div class="mod_tip_hd">
    <h4>
		  
			  设置头像
			
	</h4>
    <a class="btn_mod_close" href="" title=""><span>关闭</span></a>
  </div>
  <div class="mod_tip_bd preupload">
	<iframe style="display:none;" width="0" height="0" name="uploadPhoto" id="uploadPhoto"></iframe>
	<!--
    <form action="/user/profile/requestUpload" method="POST">   
		<input type="hidden" name="userId" value="1157822905">
		<input type="hidden" name="quality" value="1.0">
		<input type="hidden" name="isRedirect" value="true">
		<input type="hidden" name="passport_ph" value="">
		<input type="hidden" name="passToken" value="">
	</form> 
	-->
	<form action="https://account.xiaomi.com/pass/auth/profile/requestUpload" method="POST" enctype="multipart/form-data" target="uploadPhoto" id="photoUploader">   
    <div class="wapbox accset">
      <dl>
        <dt><strong class="wap_title_big">请上传图片：</strong></dt>
        <dd>
          <div class="uplode_img">
		  <!--
            <a class="btn_tip btn_commom" href="" title="上传头像">上传头像</a>
			-->
			<input type="button" onclick="return false;" class="btn_tip btn_commom" value="上传头像">
            <input class="uplodefile" name="userfile" type="file" autocomplete="off" disableautocomplete="">
          </div>
          <p>jpg 或 png，大小不超过2M</p>
        </dd>              
      </dl>
      <div class="err_tip wng_fmt err_tip_independ" style="display:none;" _text="图片格式不符合要求！">图片格式不符合要求！</div>       
	  <div class="err_tip sys_err err_tip_independ" style="display:none;" _text="系统错误，请稍候再试">系统错误，请稍候再试</div> 
	  <div class="err_tip file_too_large err_tip_independ" style="display:none;" _text="文件太大，上传失败">文件太大，上传失败</div> 
    </div>      
    <div class="tip_btns">      
      <!-- <input class="btn_tip btn_commom" type="submit" value="保存"> -->
      <a class="btn_tip btn_back" href="" title="取消">取消</a>
    </div>
    </form> 
  </div>  
  <div class="mod_tip_bd uploading" style="display:none;">  
	<div class="wapbox">
    <div class="mar30 t_c">
      <!-- loading图片 -->
      <img width="88" height="88" src="/home/Images/loading.gif" alt="">
      <div class="naccprocess">
        <p class="ft20" style="display:none;"><span></span>%</p>
        <p>上传中</p>
      </div>
    </div>      
    <div class="err_tip wng_fmt err_tip_independ" style="display:none; margin-left:100px;" _text="图片格式不符合要求！">图片格式不符合要求！</div>       
	<div class="err_tip file_too_large err_tip_independ" style="display:none; margin-left:100px;" _text="文件太大，上传失败">文件太大，上传失败</div> 
	<div class="err_tip sys_err uploaderror err_tip_independ" style="display:none;" _text="系统错误，请稍候再试">系统错误，请稍候再试</div>
	  <div class="err_tip missing_param err_tip_independ" style="display:none; margin-left:100px;" _text="缺少参数">缺少参数</div>
	  <div class="err_tip missing_file err_tip_independ" style="display:none; margin-left:100px;" _text="找不到指定文件">找不到指定文件</div>
	  <div class="err_tip unsupported_mime_type err_tip_independ" style="display:none; margin-left:100px;" _text="不支持的MIME TYPE">不支持的MIME TYPE</div>
	</div>
    <div class="tip_btns">      
      <!-- <input class="btn_tip btn_commom" type="submit" value="保存"> -->
      <a id="abortUpload" class="btn_tip btn_back" href="" title="取消">取消</a>
    </div>
  </div>

  <div class="mod_tip_bd uploaded">
	<div class="wapbox">
		<div class="clipimg t_c">
			<!-- 图片放置位置       -->
			<div class="uploadimgs">
			  <img alt="">
			  <!--
			  <div class="clip"></div>
			  -->
			</div>
			<div style="" class="movebox">
				<i class="icon_square icon_square_rightbot"></i>
			</div> 	
		</div>
		<div class="cliperror">
			<div class="err_tip sys_err err_tip_independ" style="display:none;" _text="系统错误，请稍候再试">系统错误，请稍候再试</div> 
			<div class="err_tip bad_param err_tip_independ" style="display:none;" _text="参数错误">参数错误</div> 
			<div class="err_tip upload_failed err_tip_independ" style="display:none;" _text="上传失败">上传失败</div> 
		</div>
	</div>
    <div class="tip_btns">      
      <input class="btn_tip btn_commom" type="submit" value="确定">
      <a class="btn_tip btn_back" href="" title="重新上传" id="reuploadPhoto">重新上传</a>
    </div>
  </div>  
</div>
</div>
</div>
<div id="l11n-node" style="display:none;" _l11n-jsp_2014_select="请选择" _l11n-jsp_birthday_date="日" _l11n-jsp_birthday_month="月" _l11n-jsp_birthday_year="年" _l11n-jsp_sac_reset="取消"></div>
<!-- 设置头像 e -->
@endsection
