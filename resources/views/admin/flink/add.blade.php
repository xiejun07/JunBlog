@extends('layouts.default')
@section('content')

    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('/info')}}">首页</a> &raquo; <a href="{{url('/flink')}}">友情链接管理</a> &raquo; 添加友链
    </div>
    <!--面包屑导航 结束-->

	<!--结果集标题与导航组件 开始-->
	<div class="result_wrap">
        <div class="result_title">
            <h3>快捷操作</h3>
        </div>
        <div class="result_content">
            <div class="short_wrap">
                <a href="{{url('/flink/create')}}"><i class="fa fa-plus"></i>新增友链</a>
                <a href="{{url('/flink')}}"><i class="fa fa-list"></i>友情链表</a>
                <a href="{{url('/info')}}"><i class="fa fa-undo"></i>回到首页</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->
    
    <div class="result_wrap">
        <form method="post" id="create_form">
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>

                    <tr>
                        <th><i class="require">*</i>名称：</th>
                        <td>
                            <input type="text" class="lg" name="link_name">
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>标题：</th>
                        <td>
                            <input type="text" class="lg" name="link_title">
                        </td>
                    </tr>
                    <tr>
                        <th>排序：</th>
                        <td>
                            <input type="text" name="link_sort">
                            <span><i class="fa fa-exclamation-circle yellow"></i>这里是默认长度</span>
                        </td>
                    </tr>
                    <tr>
                        <th>URL：</th>
                        <td>
                            <textarea name="link_url"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <input type="button" value="提交" class="btn btn-primary" id="submit">
                            <input type="button" class="back btn btn-default" onclick="history.go(-1)" value="返回">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>


@section('script')
<script>
    $('#submit').bind('click', function(){
        var form = $('#create_form').serialize();
        $.ajax({
            type: "post",
            url: "{{url('/flink')}}",
            data: form,
            beforeSend: function() {
                $('#submit').css('disable', 'disable');
                $('#submit').val('正在提交...');
            },
            success: function (msg) {
                if (msg.status) {
                    layer.msg(msg.content, {icon:1});
                }
            },
            complete: function() {
                $('#submit').css('disable', '');
                $('#submit').val('提交');
            },
            error: function(dataError) {
                console.log(dataError);
                if (dataError.status == 422) {
                    layer.msg(dataError.responseJSON[0], {icon:2});
                }
            }
        });
    });
</script>

@endsection

@endsection