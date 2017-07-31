<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link type="text/css" rel="stylesheet" href="/css/assets/css/base.css"/>
    <link type="text/css" rel="stylesheet" href="/css/assets/css/layout.css"/>
    <link type="text/css" rel="stylesheet" href="/css/assets/css/style.css"/>
    <link type="text/css" rel="stylesheet" href="/css/assets/css/style1.css"/>
    <script type="text/javascript" src="/css/assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="/css/assets/js/abNav.js"></script>
    <title>详情</title>
    <meta name="Keywords" content="详情"/>
    <meta name="Description" content="详情"/>
</head>
<body>
<div id="head">
    <!--头部-->
    <div class="top">
        <div class="top1">
            <span class="top_left">欢迎访问XXX</span>
            <span class="top_right"><strong style="font-size: 14px;">Hotline：+86-755-3368 1399</strong></span>
        </div>
    </div>
    <!--logo-->
    <div class="logo">
        <div class="logo1">
            <div class="logo_img">
                <a href=""><img src="/css/assets/images/logo.jpg"/></a>
            </div>
            <div class="logo_right">
                <div class="logo_input">
                    <form action="In_c_file/search.asp" method="post" name="form1" style="margin:0;padding:0;">
                        <input type="text" name="search_text" id="search_text" class="souk" value="网站搜索"
                               onblur="if(!value){value=defaultValue;}"
                               onfocus="if(value==defaultValue){this.value='';}"/>
                        <input type="submit" name="button" id="button" value="" class="sous"/>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!--导航-->
    <div class="nav">
        <ul id="nav">
            <li><a href="">首 页</a></li>
            <li><a href="Aboutus.html">关于AMAE</a>
                <ul>
                    <li><a href="Aboutus.html">公司简介</a></li>
                    <li><a href="_yHnKHc.html">公司荣誉</a></li>
                </ul>
            </li>
            <li><a href="product/">产品中心</a>
                <ul>
                    <li><a href="Pro002/">实验室建设</a></li>
                    <li><a href="Pro751/">环境监测仪器</a></li>
                    <li><a href="Pro377/">职业卫生仪器</a></li>
                    <li><a href="Pro317/">海运监测设备</a></li>
                    <li><a href="Pro563/">可靠性设备</a></li>
                </ul>
            </li>
            <li><a href="company_news/">新闻中心</a>
                <ul>
                    <li><a href="company_news/">公司新闻11</a></li>
                    <li><a href="hangye/">行业新闻</a></li>
                </ul>
            </li>
            <li><a href="download/">客户服务</a>
                <ul>
                    <li><a href="download/">下载中心</a></li>
                    <li><a href="peixun/">培训与活动</a></li>
                    <li><a href="question/">常见问题</a></li>
                </ul>
            </li>
            <li><a href="_jLWMSC.html">人力资源</a>
                <ul>
                    <li><a href="_jLWMSC.html">企业文化</a></li>
                    <li><a href="Job/list_1.html">人才招聘</a></li>
                </ul>
            </li>
            <li><a href="contact.html">联系我们</a>
                <ul>
                    <li><a href="contact.html">联系我们</a></li>
                    <li><a href="message.html">在线留言</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!--中间内容-->
<div id="about_center">
    <div class="about_center1">
        <p class="position"><span><a href="">&nbsp;&nbsp;首页&nbsp;&nbsp;</a>&gt;<a href="news/">&nbsp;&nbsp;新闻中心&nbsp;&nbsp;</a>&gt;&nbsp;&nbsp;公司新闻</span>
        </p>
        <!--公司简介左边内容-->
        <div class="about_Introduction_left">
            <div class="left_title">
                <div class="abNav">
                    <ul>
                        <li>
                            <div class="naTit">
                                <span><a href="/gcjs">工程建设</a></span>
                            </div>
                        </li>
                        <li>
                            <div class="naTit">
                                <span><a href="/zfcg">铁路工程</a></span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--公司简介右边内容-->
        <table id="tblInfo" cellspacing="1" cellpadding="1" width="100%" align="center" border="0" runat="server">
            <tr>
                <td id="tdTitle" align="center" runat="server" height="40">
                    <b style="font-size: 26px;">
                        {{$data->title}}
                    </b>
                    <br>
                </td>
            </tr>

            <tr>
                <td height="60" align="center">
                    <div id="ivs_title">
                        <table border="0" cellspacing="0" cellpadding="0" width="100%">
                            <tbody>
                            <tr>
                                <td style="display:none"> {{$data->project}}</td>
                            </tr>
                            </tbody>
                        </table>
                        <iframe id="f1" name="f1" frameborder="0" style=" margin-bottom:5px; padding:0 auto auto 0;"
                                marginwidth="0" scrolling="no" height="64px" width="356px" src=""></iframe>
                    </div>
                </td>
            </tr>

            <tr>
                <td height="450" valign="top" class="infodetail" id="TDContent" align="left">
                    <div style="overflow-x: auto; width: 935px; margin: 0 auto; text-align: left;">
                        <!--EpointContent-->
                        <div id="ivs_content"><p class="ParagraphIndent"
                                                 style="text-align: center; padding-bottom: 2px; padding-left: 2px; padding-right: 2px; font-family: 黑体; font-size: 18pt; padding-top: 2px">
                                {{$data->project}}</p><br>
                            <p class="ParagraphIndent"
                               style="line-height: 26pt; text-indent: 32pt; font-family: 宋体; font-size: medium; vertical-align: baseline; mso-bidi-font-size: 10.0pt; mso-line-height-rule: exactly; mso-char-indent-count: 2.0">
                                <span style="font-family: 黑体; font-size: 16pt; mso-bidi-font-size: 10.0pt; mso-hansi-font-family: 黑体">各投标人：</span>
                            </p><br>
                            <p class="ParagraphIndent"
                               style="line-height: 26pt; text-indent: 32pt; font-family: 宋体; font-size: medium; vertical-align: baseline; mso-bidi-font-size: 10.0pt; mso-line-height-rule: exactly; mso-char-indent-count: 2.0">
                                <u>{{$data->tenderee}}</u>发布<u>{{$data->project}}</u>评标结果公示的通知，内容如下：</p><br>
                            <p class="ParagraphIndent"
                               style="line-height: 26pt; text-indent: 32pt; font-family: 宋体; font-size: medium; vertical-align: baseline; mso-bidi-font-size: 10.0pt; mso-line-height-rule: exactly; mso-char-indent-count: 2.0">
                                <u>{{$data->project}}</u>已经评审结束，现将招标人确定的评标结果公示如下：</p><br>
                            <p class="ParagraphIndent"
                               style="line-height: 26pt; text-indent: 32pt; font-family: 宋体; font-size: medium; vertical-align: baseline; mso-bidi-font-size: 10.0pt; mso-line-height-rule: exactly; mso-char-indent-count: 2.0">
                                标段名称及中标候选人：</p><br>
                            <p></p>
                            <table align="center" border="1" cellspacing="0" width="93%">
                                <tbody>
                                <tr>
                                    <td align="center" width="10%" style="height: 20px;font-size: medium;">名次</td>
                                    <td align="center" width="40%" style="height: 20px;font-size: medium;">单位名称</td>
                                    <td align="center" width="10%" style="height: 20px;font-size: medium;">投标报价（元）</td>
                                </tr>
                                <?php $bidders = json_decode($data->bidders,true);?>
                                @foreach($bidders as $k => $v)
                                <tr>
                                    <td align="center"><span style="height: 20px;font-size: medium;">{{$v['rank']}}</span></td>
                                    <td align="center"><span
                                                style="height: 20px;font-size: medium;">{{$v['company']}}</span></td>
                                    <td align="center"><span style="height: 20px;font-size: medium;">{{$v['price']}}</span></td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>

                            </p><br>
                            <p class="ParagraphIndent" align="right">2017年7月31日</p></div>
                        <script type="text/javascript"
                                src="http://yyfw.epoint.com.cn/FrontVoice/JavaScript/jquery.js"></script>
                        <script type="text/javascript"> var voiceconverturl = 'http://yyfw.epoint.com.cn/FrontVoice/DefaultFlash.aspx?altstop=1';</script>
                        <script type="text/javascript"
                                src="http://yyfw.epoint.com.cn/FrontVoice/JavaScript/Voice.js"></script>
                        <script type="text/javascript"
                                src="http://yyfw.epoint.com.cn/FrontVoice/JavaScript/KeyNavigate.js"></script>
                        <!--EpointContent-->
                    </div>
                </td>
            </tr>
            <tr>
                <td align="center">

                </td>
            </tr>
            <tr>
                <td align="left">
                    <br>
                </td>
            </tr>
            <tr id="trAttach" runat="server">
                <td>
                    <table id="filedown" cellspacing="1" cellpadding="1" width="100%" border="0" runat="server">
                        <tbody>
                        <tr>
                            <td valign="top" align="left"></td>
                        </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td></td>
            </tr>
            <tr>
                <td height="10"></td>
            </tr>
            <tr>
                <td></td>
            </tr>
            </tbody></table>
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
                <li><a href="Aboutus.html">公司简介</a></li>
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
                <li><a href="company_news/">公司新闻</a></li>
                <li><a href="hangye/">行业新闻</a></li>
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
        <span class="copyright_left">CopyRight &copy; 2010 国际仪器集团有限公司  粤ICP备10237425号 版权所有</span>
        <span class="copyright_right">
			<a href="contact.html">联系我们</a>
			<a href="news/">法律公告</a> 
			<a href="">网站导航</a>
			<a href="message.html">意见反馈</a>
		</span>
    </div>
</div>
</body>
</html>