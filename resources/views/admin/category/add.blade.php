@extends('layouts.default')
@section('content')

    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('/info')}}">首页</a> &raquo; <a href="{{url('/category')}}">分类管理</a> &raquo; 新增分类
    </div>
    <!--面包屑导航 结束-->

	<!--结果集标题与导航组件 开始-->
	<div class="result_wrap">
        <div class="result_title">
            <h3>快捷操作</h3>
        </div>
        <div class="result_content">
            <div class="short_wrap">
                <a href="{{url('/category/create')}}"><i class="fa fa-plus"></i>新增分类</a>
                <a href="{{url('category')}}"><i class="fa fa-list"></i>分类列表</a>
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
                        <th><i class="require">*</i>分类名称：</th>
                        <td>
                            <input type="text" class="lg" name="cate_name" value="{{old('cate_name')}}">
                            <p>标题可以写30个字</p>
                        </td>
                    </tr>
                    <tr>
                        <th width="120"><i class="require">*</i>分类：</th>
                        <td>
                            <select name="cate_pid">
                                <option value="">==请选择==</option>
                                <option value="0">顶级分类</option>
                                @foreach($categories as $cate)
                                    <option value="{{$cate->id}}">{{$cate->cate_name}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>排序：</th>
                        <td>
                            <input type="text" name="sort" value="{{old('sort')}}">
                        </td>
                    </tr>
                    {{--<tr>--}}
                        {{--<th><i class="require">*</i>价格：</th>--}}
                        {{--<td>--}}
                            {{--<input type="text" class="sm" name="">元--}}
                            {{--<span><i class="fa fa-exclamation-circle yellow"></i>这里是短文本长度</span>--}}
                        {{--</td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<th><i class="require">*</i>缩略图：</th>--}}
                        {{--<td><input type="file" name=""></td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<th>单选框：</th>--}}
                        {{--<td>--}}
                            {{--<label for=""><input type="radio" name="">单选按钮一</label>--}}
                            {{--<label for=""><input type="radio" name="">单选按钮二</label>--}}
                        {{--</td>--}}
                    {{--</tr>--}}
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
                            <textarea name="cate_description">{{old('cate_description')}}</textarea>
                        </td>
                    </tr>
                    {{--<tr>--}}
                        {{--<th>详细内容：</th>--}}
                        {{--<td>--}}
                            {{--<textarea class="lg" name="content"></textarea>--}}
                            {{--<p>标题可以写30个字</p>--}}
                        {{--</td>--}}
                    {{--</tr>--}}
                    <tr>
                        <th></th>
                        <td>
                            <input role="button" class="btn btn-primary" type="button" value="提交" id="submit">
                            <input type="button" class="btn btn-default back" onclick="history.go(-1)" value="返回">
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
                url: "{{url('/category')}}",
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