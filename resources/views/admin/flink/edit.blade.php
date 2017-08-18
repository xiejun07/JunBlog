@extends('layouts.default')
@section('content')

    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('/info')}}">首页</a> &raquo; <a href="{{url('/flink')}}">友情链接管理</a> &raquo; 编辑友链
    </div>
    <!--面包屑导航 结束-->

	<!--结果集标题与导航组件 开始-->
	{{--<div class="result_wrap">--}}
        {{--<div class="result_title">--}}
            {{--<h3>快捷操作</h3>--}}
        {{--</div>--}}
        {{--<div class="result_content">--}}
            {{--<div class="short_wrap">--}}
                {{--<a href="#"><i class="fa fa-plus"></i>新增文章</a>--}}
                {{--<a href="#"><i class="fa fa-recycle"></i>批量删除</a>--}}
                {{--<a href="#"><i class="fa fa-refresh"></i>更新排序</a>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    <!--结果集标题与导航组件 结束-->
    
    <div class="result_wrap">
        <form method="post" id="create_form">
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>

                    <tr>
                        <th><i class="require">*</i>名称：</th>
                        <td>
                            <input type="text" class="lg" name="link_name" value="{{$link->link_name}}">
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>标题：</th>
                        <td>
                            <input type="text" class="lg" name="link_title" value="{{$link->link_title}}">
                        </td>
                    </tr>
                    <tr>
                        <th>排序：</th>
                        <td>
                            <input type="text" name="link_sort" value="{{$link->link_sort}}">
                            <span><i class="fa fa-exclamation-circle yellow"></i>这里是默认长度</span>
                        </td>
                    </tr>
                    <tr>
                        <th>URL：</th>
                        <td>
                            <textarea name="link_url">{{$link->link_url}}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <input role="button" class="btn btn-primary" id="submit" type="button" value="提交" onclick="updateCate({{$link->id}})">
                            <input type="button" class="btn btn-default back" onclick="closeSelf()" value="返回">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>


@section('script')
    <script>
        function updateCate(link_id) {
            var form = $('#create_form').serialize();
            $.ajax({
                type: "put",
                url: "{{url('/flink')}}" + '/' +link_id,
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