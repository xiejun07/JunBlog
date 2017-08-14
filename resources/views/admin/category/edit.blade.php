@extends('layouts.default')
@section('content')

    <!--面包屑导航 开始-->
    {{--<div class="crumb_warp">--}}
        {{--<!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->--}}
        {{--<i class="fa fa-home"></i> <a href="#">首页</a> &raquo; <a href="#">商品管理</a> &raquo; 添加商品--}}
    {{--</div>--}}
    <!--面包屑导航 结束-->

	<!--结果集标题与导航组件 开始-->
	<div class="result_wrap" style="margin-top: -15px">
        <div class="result_title">
            <h3>快捷操作</h3>
        </div>
        <div class="result_content">
            <div class="short_wrap">
                <a href="#"><i class="fa fa-plus"></i>新增文章</a>
                <a href="#"><i class="fa fa-recycle"></i>批量删除</a>
                <a href="#"><i class="fa fa-refresh"></i>更新排序</a>
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
                            <input type="text" class="lg" name="cate_name" value="{{$data->cate_name}}">
                            <p>标题可以写30个字</p>
                        </td>
                    </tr>
                    <tr>
                        <th width="120"><i class="require">*</i>分类：</th>
                        <td>
                            <select name="cate_pid">
                                <option value="">==请选择==</option>
                                <option value="0" @if($data->cate_pid == 0) selected @endif>顶级分类</option>
                                @foreach($categories as $cate)
                                    <option value="{{$cate->id}}" @if($data->cate_pid == $cate->id) selected @endif>{{$cate->cate_name}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>排序：</th>
                        <td>
                            <input type="text" name="sort" value="{{$data->sort}}">
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
                            <textarea name="cate_description">{{$data->cate_description}}</textarea>
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
                            <input role="button" class="btn btn-primary" id="submit" type="button" value="提交" onclick="updateCate({{$data->id}})">
                            <input type="button" class="btn btn-default back" onclick="closeSelf()" value="返回">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>

@section('script')
    <script>
        function updateCate(cate_id) {
            var form = $('#create_form').serialize();
            $.ajax({
                type: "put",
                url: "{{url('/category')}}" + '/' +cate_id,
                data: form,
                beforeSend: function() {
                    $('#submit').attr('disabled', 'disabled');
                    $('#submit').val('正在提交...');
                },
                success: function (msg) {
                    if (msg.status) {
                        layer.msg(msg.content, {icon:1});
                        parent.location.reload();
                    }
                },
                complete: function() {
                    $('#submit').removeAttr('disabled');
                    $('#submit').val('提交');
                },
                error: function(dataError) {
                    console.log(dataError);
                    if (dataError.status == 422) {
                        layer.msg(dataError.responseJSON[0], {icon:2});
                    }
                }
            });
        }

        function closeSelf()
        {
            // 关闭弹出的子页面窗口
            var index = parent.layer.getFrameIndex(window.name); //获取窗口索引
            parent.layer.close(index);//关闭弹出的子页面窗口
        }
    </script>
@endsection

@endsection