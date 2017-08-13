@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>发布新闻</h1>
@stop

@section('content')
        <style>
            body{
                background-color: rgba(128, 128, 128, 0.3);
            }
        </style>
        <script>
            function foo(){
                if(myform.title.value==""){
                    alert('请填写你的新闻标题');
                    myform.title.focus();
                    return false;
                }
                if(myform.content.value==""){
                    alert('新闻内容不能为空哦');
                    myform.content.focus();
                    return false;
                }
            }
        </script>

    <body>
    <form  method="post" action="/news_action" onsubmit=" return foo();" name="myform">
        <h1>发布新闻系统</h1>
        <p>标题：<input type="text" name="title"/></p>
        <p>内容：<textarea cols=80 rows=10 name="content"></textarea></p>
        <p><button>发布新闻</button></p>
    </form>
    </body>
    </html>
@stop