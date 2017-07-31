@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>用户列表</h1>
@stop

@section('content')
    <!-- CSS goes in the document HEAD or added to your external stylesheet -->
    <style type="text/css">
        table.hovertable {
            font-family: verdana,arial,sans-serif;
            font-size:11px;
            color:#333333;
            border-width: 1px;
            border-color: #999999;
            border-collapse: collapse;
        }
        table.hovertable th {
            background-color:#c3dde0;
            border-width: 1px;
            padding: 8px;
            border-style: solid;
            border-color: #a9c6c9;
        }
        table.hovertable tr {
            background-color:#d4e3e5;
        }
        table.hovertable td {
            border-width: 1px;
            padding: 8px;
            border-style: solid;
            border-color: #a9c6c9;
        }
    </style>

    <div>
        <form action="/user_list" method="get">
            <input type="input" placeholder="请输入公司名字" name="name" value="{{$name}}"/>
            <input type="submit" value="搜索">
        </form>
    </div>
    <br>
    <table class="hovertable">
        <tr>
            <th>用户ID</th>
            <th>公司姓名</th>
            <th>注册邮箱</th>
            <th>联系电话</th>
        </tr>
        @foreach ($data as $user)
            <tr onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='#d4e3e5';">
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->phone}}</td>
            </tr>
        @endforeach
    </table>

    <div class="right_main">
        <div style="margin-top:10px">
            {{$data->render()}}
        </div>
    </div>
@stop