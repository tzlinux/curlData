<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
  <link type="text/css" rel="stylesheet" href="/css/assets/css/base.css" />
  <link type="text/css" rel="stylesheet" href="/css/assets/css/layout.css" />
  <link type="text/css" rel="stylesheet" href="/css/assets/css/style.css" />
 
  <script type="text/javascript" src="/css/assets/js/jquery.min.js"></script>
  <script type="text/javascript" src=/css/"assets/js/abNav.js"></script>
  <title>中标结果公示</title> 
  <meta name="Keywords" content="工程建设" /> 
  <meta name="Description" content="工程建设" /> 
 </head>
 <body>
 <style type="text/css">
     #pull_right{
         text-align:center;
     }
     .pull-right {
         /*float: left!important;*/
     }
     .pagination {
         display: inline-block;
         padding-left: 0;
         margin: 20px 0;
         border-radius: 4px;
     }
     .pagination > li {
         display: inline;
     }
     .pagination > li > a,
     .pagination > li > span {
         position: relative;
         float: left;
         padding: 6px 12px;
         margin-left: -1px;
         line-height: 1.42857143;
         color: #428bca;
         text-decoration: none;
         background-color: #fff;
         border: 1px solid #ddd;
     }
     .pagination > li:first-child > a,
     .pagination > li:first-child > span {
         margin-left: 0;
         border-top-left-radius: 4px;
         border-bottom-left-radius: 4px;
     }
     .pagination > li:last-child > a,
     .pagination > li:last-child > span {
         border-top-right-radius: 4px;
         border-bottom-right-radius: 4px;
     }
     .pagination > li > a:hover,
     .pagination > li > span:hover,
     .pagination > li > a:focus,
     .pagination > li > span:focus {
         color: #2a6496;
         background-color: #eee;
         border-color: #ddd;
     }
     .pagination > .active > a,
     .pagination > .active > span,
     .pagination > .active > a:hover,
     .pagination > .active > span:hover,
     .pagination > .active > a:focus,
     .pagination > .active > span:focus {
         z-index: 2;
         color: #fff;
         cursor: default;
         background-color: #428bca;
         border-color: #428bca;
     }
     .pagination > .disabled > span,
     .pagination > .disabled > span:hover,
     .pagination > .disabled > span:focus,
     .pagination > .disabled > a,
     .pagination > .disabled > a:hover,
     .pagination > .disabled > a:focus {
         color: #777;
         cursor: not-allowed;
         background-color: #fff;
         border-color: #ddd;
     }
     .clear{
         clear: both;
     }
     .search-vide{
         position: absolute;
         top: 0;
         right: 0;
         width: 440px;
         bottom: 0;
         margin: auto auto;
         font-size: 0;
     }
     .search-vide .key{
         width: 104px;
         height: 20px;
         vertical-align: middle;
         border: 1px solid #8bb9b4;
         text-indent: 0.5em;
         display: inline-block;
         margin-left: 10px;
     }
     .search-vide .search-btn{
         width: 30px;
         height: 22px;
         line-height: 22px;
         vertical-align: middle;

         background: #0081cb;
         color: #fff;
     }
 </style>
  <div id="head"> 
   <!--头部--> 
   <div class="top"> 
    <div class="top1"> 
     <span class="top_left">欢迎访问</span>
     <?php if(!session('user_name')) { ?>
        <span class="top_right"><a href="/zhuce">注册用户</a></span>
        <span class="top_right"><a href="/denglu">登录</a></span>
     <?php } else { ?>
        欢迎你&nbsp;&nbsp;&nbsp;<?php print_r(session('user_name')); ?>
        &nbsp;&nbsp;&nbsp;
            <a href="/clear">安全退出</a>
     <?php }?>
    </div>
   </div> 
   <!--logo--> 
   <div class="logo"> 
    <div class="logo1"> 
     <div class="logo_img">
      <a href=""><img src="assets/images/logo.jpg" /></a>
     </div> 
     <div class="logo_right"> 
      <div class="logo_input"> 
<!--        <form action="In_c_file/search.asp" method="post" name="form1" style="margin:0;padding:0;">
        <input type="text" name="search_text" id="search_text" class="souk" value="网站搜索" onblur="if(!value){value=defaultValue;}" onfocus="if(value==defaultValue){this.value='';}" />
        <input type="submit" name="button" id="button" value="" class="sous" />
       </form>  -->
      </div> 
      
     </div> 
    </div> 
   </div> 
   <!--导航--> 
   <div class="nav"> 
    <ul id="nav"> 
     <li><a href="">首 页</a></li> 
     <li><a href="/news">关于AMAE</a>
      <ul> 
       <li><a href="/news">公司简介</a></li>
       <li><a href="_yHnKHc.html">公司荣誉</a></li> 
      </ul> </li> 
     <li><a href="product/">产品中心</a> 
      <ul> 
       <li><a href="Pro002/">实验室建设</a></li> 
       <li><a href="Pro751/">环境监测仪器</a></li> 
       <li><a href="Pro377/">职业卫生仪器</a></li> 
       <li><a href="Pro317/">海运监测设备</a></li> 
       <li><a href="Pro563/">可靠性设备</a></li> 
      </ul> </li> 
     <li><a href="company_news/">新闻中心</a> 
      <ul> 
       <li><a href="">工程建设</a></li> 
       <li><a href="">行业新闻</a></li> 
      </ul> </li> 
     <li><a href="download/">客户服务</a> 
      <ul> 
       <li><a href="download/">下载中心</a></li> 
       <li><a href="peixun/">培训与活动</a></li> 
       <li><a href="question/">常见问题</a></li> 
      </ul> </li> 
     <li><a href="_jLWMSC.html">人力资源</a> 
      <ul> 
       <li><a href="_jLWMSC.html">企业文化</a></li> 
       <li><a href="Job/list_1.html">人才招聘</a></li> 
      </ul> </li> 
     <li><a href="contact.html">联系我们</a> 
      <ul> 
       <li><a href="contact.html">联系我们</a></li> 
       <li><a href="message.html">在线留言</a></li> 
      </ul> </li> 
    </ul> 
   </div> 
  </div> 
  <!--中间内容--> 
  <div id="about_center"> 
   <div class="about_center1"> 
		 <div class="show-layer">
			<p class="position">
				<span><a href="">&nbsp;&nbsp;首页&nbsp;&nbsp;</a>&gt;&nbsp;工程建设</span>
			</p> 
			<div class="search-vide">
				<form action="/gcjs" method="get">
                    <input name="title" placeholder="输入招标项目名称" value="{{$title}}"/>
                    <select name="acode">
                        <option value="">—全部—</option>
                        <option value="028" <?php echo $acode=='028' ? 'selected="selected"':'' ?>>成都市</option>
                        <option value="0813" <?php echo $acode=='0813' ? 'selected="selected"':'' ?>>自贡市</option>
                        <option value="0812" <?php echo $acode=='0812' ? 'selected="selected"':'' ?>>攀枝花市</option>
                        <option value="0830" <?php echo $acode=='0830' ? 'selected="selected"':'' ?>>泸州市</option>
                        <option value="0838" <?php echo $acode=='0838' ? 'selected="selected"':'' ?>>德阳市</option>
                        <option value="0816" <?php echo $acode=='0816' ? 'selected="selected"':'' ?>>绵阳市</option>
                        <option value="0839" <?php echo $acode=='0839' ? 'selected="selected"':'' ?>>广元市</option>
                        <option value="0825" <?php echo $acode=='0825' ? 'selected="selected"':'' ?>>遂宁市</option>
                        <option value="0832" <?php echo $acode=='0832' ? 'selected="selected"':'' ?>>内江市</option>
                        <option value="0833" <?php echo $acode=='0833' ? 'selected="selected"':'' ?>>乐山市</option>
                        <option value="0817" <?php echo $acode=='0817' ? 'selected="selected"':'' ?>>南充市</option>
                        <option value="0282" <?php echo $acode=='0282' ? 'selected="selected"':'' ?>>眉山市</option>
                        <option value="0831" <?php echo $acode=='0831' ? 'selected="selected"':'' ?>>宜宾市</option>
                        <option value="0826" <?php echo $acode=='0826' ? 'selected="selected"':'' ?>>广安市</option>
                        <option value="0818" <?php echo $acode=='0818' ? 'selected="selected"':'' ?>>达州市</option>
                        <option value="0835" <?php echo $acode=='0835' ? 'selected="selected"':'' ?>>雅安市</option>
                        <option value="0827" <?php echo $acode=='0827' ? 'selected="selected"':'' ?>>巴中市</option>
                        <option value="0281" <?php echo $acode=='0281' ? 'selected="selected"':'' ?>>资阳市</option>
                        <option value="0837" <?php echo $acode=='0837' ? 'selected="selected"':'' ?>>阿坝藏族羌族自治州</option>
                        <option value="0836" <?php echo $acode=='0836' ? 'selected="selected"':'' ?>>甘孜藏族自治州</option>
                        <option value="0834" <?php echo $acode=='0834' ? 'selected="selected"':'' ?>>凉山彝族自治州</option>
                    </select>
                    <select name="price">
                        <option <?php echo $price==0 ? 'selected="selected"':'';?> value="0">—全部—</option>
                        <option <?php echo $price==1 ? 'selected="selected"':'';?> value="1">500万以下</option>
                        <option <?php echo $price==2 ? 'selected="selected"':'';?> value="2">500万-1000万</option>
                        <option <?php echo $price==3 ? 'selected="selected"':'';?> value="3">1000万-5000万</option>
                        <option <?php echo $price==4 ? 'selected="selected"':'';?> value="4">5000万以上</option>
                    </select>
                    <button type="submit" class="search-btn">搜索</button>
				</form>
			</div>
		</div>
    <div class="about_Introduction"> 
     <!--公司简介左边内容--> 
     <div class="about_Introduction_left"> 
      <div class="left_title"> 
       <div class="abNav"> 
        <ul> 
         <li>
          <div class="naTit">
           <span><a href="/gcjs">工程建设</a></span>
          </div></li>
         <li>
          <div class="naTit">
           <span><a href="/zfcg">铁路工程</a></span>
          </div></li> 
        </ul> 
       </div> 
      </div> 
     </div> 
     <!--公司简介右边内容--> 
     <div class="about_Introduction_right"> 
      <div class="right_title"> 
       <span>工程建设</span> 
       <p style="border-bottom: 2px solid #0081cb;width: 76px;"></p> 
      </div>
      <?php if(!empty($data)) { ?>
          <div class="right_main">
           <ul class="newsList">
                @foreach ($data as $user)
                <li>&gt;
                    <span>{{date('Y-m-d',strtotime($user->created_at))}}</span>
                    <?php $len = mb_strlen($user->title); $index=33; ?>
                     @if ($len >$index)
                      <a href="/gcjs_info/{{$user->uuid}}" target="_blank"><?php echo mb_substr($user->title,0,$index).'...';?></a>
                     @else
                      <a href="/gcjs_info/{{$user->uuid}}" target="_blank">{{$user->title}}</a>
                     @endif
                </li>
                @endforeach
           </ul>
           <div style="margin-top:10px">
               {{$data->appends(['title'=>$title,'price'=>$price,'acode'=>$acode])->links()}}
           </div>
          </div>
     <?php } ?>
     </div>
    </div>
   </div> 
  </div> 
  <!--底部--> 
  <!--底部--> 
  <div id="footer"> 
   <!--底部导航--> 
   <div class="footer_nav"> 
    <div class="section information"> 
     <span>关于AMAE</span> 
     <ul> 
      <li><a href="/news">公司简介</a></li>
      <li><a href="_yHnKHc.html">公司荣誉</a></li> 
     </ul> 
    </div> 
    <div class="section information"> 
     <span>产品中心</span> 
     <ul> 
      <li><a href="Pro002/">实验室建设整体解决方案</a></li> 
      <li><a href="Pro751/">环境监测仪器</a></li> 
      <li><a href="Pro377/">职业卫生仪器</a></li> 
      <li><a href="Pro317/">海运监测设备</a></li> 
      <li><a href="Pro563/">可靠性设备</a></li> 
     </ul> 
    </div> 
    <div class="section information"> 
     <span>新闻中心</span> 
     <ul> 
      <li><a href="">工程建设</a></li>
      <li><a href="">行业新闻</a></li> 
     </ul> 
    </div> 
    <div class="section information"> 
     <span>客户服务</span> 
     <ul> 
      <li><a href="download/">下载中心</a></li> 
      <li><a href="peixun/">培训与活动</a></li> 
      <li><a href="question/">常见问题</a></li> 
     </ul> 
    </div> 
    <div class="section information"> 
     <span>人力资源</span> 
     <ul> 
      <li><a href="_jLWMSC.html">企业文化</a></li> 
      <li><a href="_hlQJar.html">人才招聘</a></li> 
     </ul> 
    </div> 
    <div class="section information"> 
     <span>联系我们</span> 
     <ul> 
      <li><a href="contact.html">联系我们</a></li> 
      <li><a href="message.html">在线留言</a></li> 
     </ul> 
    </div> 
   </div> 
   <!--版权所有--> 
   <div class="copyright"> 
    <span class="copyright_left">CopyRight &copy; 2010 国际仪器集团有限公司&nbsp;&nbsp;&nbsp;&nbsp;粤ICP备10237425号 版权所有</span> 
    <span class="copyright_right"><a href="contact.html">联系我们</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="news/">法律公告</a>&nbsp;&nbsp;|&nbsp;&nbsp; <a href="">网站导航</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="message.html">意见反馈</a></span> 
   </div> 
  </div>  
 </body>
</html>