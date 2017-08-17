@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
@include('vendor.ueditor.assets')
@stop

@section('content')
    <head>
        <title>发布新闻</title>
    </head>
    <body>
    <div>
        <h1>新闻发布</h1>
        <form action="/news_action" method="post">
            新闻标题&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;<input type="text" style="margin-bottom: 20px;width: 500px;" name="title" value=""/>
            <!-- 实例化编辑器 -->
            <script type="text/javascript">
                var ue = UE.getEditor('container');
                ue.ready(function() {
                    ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
                });
            </script>

            <!-- 编辑器容器 -->
            <script id="container" name="content" type="text/plain"></script>
            <input type="submit"  style="width:100px;" value="提交"/>
        </form>
        </div>
    </body>
@stop