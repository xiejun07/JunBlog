@extends('layouts.default')
@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('/info')}}">首页</a> &raquo; <a href="{{url('/conf')}}">网站配置</a> &raquo; 编辑配置
    </div>
    <!--面包屑导航 结束-->

	<!--结果集标题与导航组件 开始-->
	{{--<div class="result_wrap">--}}
        {{--<div class="result_title">--}}
            {{--<h3>快捷操作</h3>--}}
        {{--</div>--}}
        {{--<div class="result_content">--}}
            {{--<div class="short_wrap">--}}
                {{--<a href="{{url('/conf/create')}}"><i class="fa fa-plus"></i>新增配置</a>--}}
                {{--<a href="#"><i class="fa fa-recycle"></i>批量删除</a>--}}
                {{--<a href="#"><i class="fa fa-refresh"></i>更新排序</a>--}}
            {{--</div>--}}
        {{--</div>--}}
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
                            <input type="text" class="lg" name="conf_title" value="{{$config->conf_title}}">
                            <p>标题可以写20个字</p>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>名称：</th>
                        <td>
                            <input type="text" class="lg" name="conf_name" value="{{$config->conf_name}}">
                            <p>标题可以写20个字</p>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>排序：</th>
                        <td>
                            <input type="text" class="sm" name="conf_sort" value="{{$config->conf_sort}}">
                            <span><i class="fa fa-exclamation-circle yellow"></i>这里是短文本长度</span>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>配置类型：</th>
                        <td>
                            <label for="type0"><input @if($config->conf_type == 0) checked @endif type="radio" name="conf_type" value="0" id="type0">input</label>
                            <label for="type1"><input @if($config->conf_type == 1) checked @endif  type="radio" name="conf_type" value="1" id="type1">radio</label>
                            <label for="type2"><input @if($config->conf_type == 2) checked @endif  type="radio" name="conf_type" value="2" id="type2">textarea</label>
                        </td>
                    </tr>

                    <tr id="hide_tr" @if($config->conf_type != 1) style="display: none" @endif>
                        <th><i class="require">*</i>配置选值：</th>
                        <td>
                            <input type="text" class="lg" name="conf_fields" value="{{$config->conf_fields}}">
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
                            <textarea name="conf_description">{{$config->conf_description}}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <input role="button" class="btn btn-primary" id="submit" type="button" value="提交" onclick="updateConfig({{$config->id}})">
                            <input type="button" class="btn btn-default back" onclick="closeSelf()" value="返回">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>



@section('script')
    <script>
        function updateConfig(conf_id) {
            var form = $('#create_form').serialize();
            $.ajax({
                type: "put",
                url: "{{url('/conf')}}" + '/' +conf_id,
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

        $('input[name=conf_type]').on('change', function(){
            var _this = $(this);
            if (_this.val() == 1) {
                $('#hide_tr').show();
            }else{
                $('#hide_tr').hide();
            }
        });
    </script>
@endsection
@endsection