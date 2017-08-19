@extends('layouts.default')
@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('/info')}}">首页</a> &raquo; <a href="{{url('/conf')}}">网站配置</a> &raquo; 添加配置项
    </div>
    <!--面包屑导航 结束-->

	<!--结果集标题与导航组件 开始-->
	<div class="result_wrap">
        <div class="result_title">
            <h3>快捷操作</h3>
        </div>
        <div class="result_content">
            <div class="short_wrap">
                <a href="{{url('/conf/create')}}"><i class="fa fa-plus"></i>新增配置</a>
                <a href="{{url('/conf')}}"><i class="fa fa-list"></i>配置列表</a>
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
                        <th><i class="require">*</i>标题：</th>
                        <td>
                            <input type="text" class="lg" name="conf_title">
                            <p>标题可以写20个字</p>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>名称：</th>
                        <td>
                            <input type="text" class="lg" name="conf_name">
                            <p>标题可以写20个字</p>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>排序：</th>
                        <td>
                            <input type="text" class="sm" name="conf_sort">
                            <span><i class="fa fa-exclamation-circle yellow"></i>这里是短文本长度</span>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>配置类型：</th>
                        <td>
                            <label for="type0"><input type="radio" name="conf_type" value="0" id="type0" checked>input</label>
                            <label for="type1"><input type="radio" name="conf_type" id="type1" value="1">radio</label>
                            <label for="type2"><input type="radio" name="conf_type" id="type2" value="2">textarea</label>
                        </td>
                    </tr>
                    <tr id="hide_tr" style="display: none;">
                        <th><i class="require">*</i>配置选值：</th>
                        <td>
                            <input type="text" class="lg" name="conf_fields">
                            <p>不同选值之间用英文输入下的’,‘分隔</p>
                        </td>
                    </tr>
                    {{--<tr>--}}
                        {{--<th>复选框：</th>--}}
                        {{--<td>--}}
                            {{--<label for=""><input type="checkbox" name="">复选框一</label>--}}
                            {{--<label for=""><input type="checkbox" name="">复选框二</label>--}}
                        {{--</td>--}}
                    {{--</tr>--}}
                    <tr>
                        <th>描述：</th>
                        <td>
                            <textarea name="conf_description"></textarea>
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
                url: "{{url('/conf')}}",
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

        $('input[name=conf_type]').on('change', function(){
            if ($(this).val() == 1) {
                $('#hide_tr').show();
            }else {
                $('#hide_tr').hide();
            }
        });
    </script>
@endsection
@endsection