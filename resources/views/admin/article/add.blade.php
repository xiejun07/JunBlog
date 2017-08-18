@extends('layouts.default')
@section('content')

    <style>
        .content {
            width: 80%;
        }
        .edui-combox-body {
            line-height: 20px;
        }
        .edui-button-body {
            line-height: 22px;
        }
        .edui-splitbutton-body {
            line-height: 22px;
        }
        .edui-menubutton-body {
            line-height: 22px;
        }
    </style>

    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('/info')}}">首页</a> &raquo; <a href="#">文章管理</a> &raquo; 添加文章
    </div>
    <!--面包屑导航 结束-->

	<!--结果集标题与导航组件 开始-->
	<div class="result_wrap">
        <div class="result_title">
            <h3>快捷操作</h3>
        </div>
        <div class="result_content">
            <div class="short_wrap">
                <a href="{{url('/article/create')}}"><i class="fa fa-plus"></i>新增文章</a>
                <a href="{{url('/article')}}"><i class="fa fa-list"></i>文章列表</a>
                <a href="{{url('/info')}}"><i class="fa fa-undo"></i>回到首页</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->
    
    <div class="result_wrap">
        <form method="post" id="create_form">
            <table class="add_tab">
                <tbody>
                    <tr>
                        <th><i class="require">*</i>标题：</th>
                        <td>
                            <input type="text" class="lg" name="art_title">
                            <p>标题可以写50个字</p>
                        </td>
                    </tr>
                    <tr>
                        <th width="120"><i class="require">*</i>分类：</th>
                        <td>
                            <select name="cate_id">
                                <option value="">==请选择==</option>
                                @foreach($categories as $cate)
                                    <option value="{{$cate->id}}">{{$cate->cate_name}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    {{--@inject('articleTypes', 'App\Http\Services\ArticleType')--}}
                    {{--<tr>--}}
                        {{--<th width="120"><i class="require">*</i>状态：</th>--}}
                        {{--<td>--}}
                            {{--<select name="is_public">--}}
                                {{--<option value="">==请选择==</option>--}}
                                {{--@foreach($articleTypes::$articleTypes as $key => $type)--}}
                                    {{--<option value="{{$key}}">{{$type}}</option>--}}
                                {{--@endforeach--}}
                            {{--</select>--}}
                        {{--</td>--}}
                    {{--</tr>--}}
                    <tr>
                        <th><i class="require">*</i>标签：</th>
                        <td>
                            <input type="text" class="lg" name="art_tags">
                            <p>标签以英文输入的‘,’隔开</p>
                        </td>
                    </tr>
                    {{--<tr>--}}
                        {{--<th>作者：</th>--}}
                        {{--<td>--}}
                            {{--<input type="text" name="">--}}
                            {{--<span><i class="fa fa-exclamation-circle yellow"></i>这里是默认长度</span>--}}
                        {{--</td>--}}
                    {{--</tr>--}}
                    <tr>
                        <th><i class="require">*</i>排序：</th>
                        <td>
                            <input type="text" class="sm" name="art_sort">
                            <span><i class="fa fa-exclamation-circle yellow"></i>这里是短文本长度</span>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>上传主图：</th>
                        <td>
                            <input type="file" name="fileData" style="float: left">
                            <input type="hidden" name="art_icon" value=""/>
                            <div id="img_view" style="float: left"></div>
                        </td>
                    </tr>
                    @inject('articleTypes', 'App\Http\Services\ArticleType')
                    <tr>
                        <th><i class="require">*</i>状态：</th>
                        <td>
                            @foreach($articleTypes::$articleTypes as $key => $type)
                                <label for="{{'is_public'.$key}}"><input type="radio" name="is_public" id="{{'is_public'.$key}}" value="{{$key}}">{{$type}}</label>
                            @endforeach
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
                        <th>简介：</th>
                        <td>
                            <textarea name="art_description"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>文章内容：</th>
                        <td>
                            <!-- 加载编辑器的容器 -->
                            <script id="container" name="content" type="text/plain" class="content"></script>
                            {{--<textarea class="lg" name="content"></textarea>--}}
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <input type="button" class="btn btn-primary" value="提交" id="submit_create">
                            <input type="button" class="btn btn-default back" onclick="history.go(-1)" value="返回">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>


@section('script')
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('container');
        ue.ready(function(){
            ue.setHeight(600);
            ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');//此处为支持laravel5 csrf ,根据实际情况修改,目的就是设置 _token 值.
        });
    </script>

    <script>
        // 全局设置ajax带上csrf_token
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN':'{{csrf_token()}}'
            }
        });
        // 点击异步上传文件
        $('input[name=fileData]').on('change', function() {
            var index = '';
            var obj = this;
            var formData = new FormData();
            formData.append('fileData', this.files[0]);
            $.ajax({
                url: '{{url('/article/uploadImg')}}',
                type: 'post',
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function(XMLHttpRequest){
                    index = layer.load(1, {time: 5*1000});
                },
                success: function (data) {
                    // 关掉圈圈转
                    layer.close(index);
                    if (data.status) {
                        // 保存路径放到input中提交表单存库
                        $('input[name=art_icon]').val(data.pathContent);
                        layer.msg(data.content);
                        // 图片上传之后的回显
                        var _html = '<img src="'+ data.pathContent +'" height="200"/>';
                        $('#img_view').html(_html);
                    }else {
                        layer.msg(data.content);
                    }
                }
            });
        });

        // 点击提交保存文章
        $('#submit_create').on('click', function(){
            var form = new FormData($('#create_form')[0]);
            $.ajax({
                url: '{{url('/article/store')}}',
                type: 'post',
                data: form,
                processData: false,
                contentType: false,
                success: function (data) {
                    if (data.status) {
                        layer.msg('新建文章保存成功!', {icon:1});
                    }else{
                        layer.msg(data.content, {icon:2});
                    }
                }
            });
        });
    </script>
@endsection

@endsection