@extends('layouts.default')
@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('/info')}}">首页</a> &raquo; <a href="{{url('/conf')}}">网站配置</a> &raquo; 配置列表
    </div>
    <!--面包屑导航 结束-->

	<!--结果页快捷搜索框 开始-->
	<div class="search_wrap">
        <form action="" method="post">
            <table class="search_tab">
                <tr>
                    <th width="120">选择分类:</th>
                    <td>
                        <select onchange="javascript:location.href=this.value;">
                            <option value="">全部</option>
                            <option value="http://www.baidu.com">百度</option>
                            <option value="http://www.sina.com">新浪</option>
                        </select>
                    </td>
                    <th width="70">关键字:</th>
                    <td><input type="text" name="keywords" placeholder="关键字"></td>
                    <td><input type="submit" name="sub" value="查询" class="btn btn-primary"></td>
                </tr>
            </table>
        </form>
    </div>
    <!--结果页快捷搜索框 结束-->

    <!--搜索结果页面 列表 开始-->
    <form method="post">
        <div class="result_wrap">
            <!--快捷导航 开始-->
            <div class="result_content">
                <div class="short_wrap">
                    <a href="{{url('/conf/create')}}"><i class="fa fa-plus"></i>新增配置</a>
                    <a href="javascript:;" onclick="batchDelConfig()"><i class="fa fa-recycle"></i>批量删除</a>
                    <a href="{{url('/info')}}"><i class="fa fa-undo"></i>回到首页</a>
                </div>
            </div>
            <!--快捷导航 结束-->
        </div>

        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        <th class="tc" width="5%"><input type="checkbox" name=""></th>
                        <th class="tc">排序</th>
                        <th class="tc">ID</th>
                        <th>标题</th>
                        <th>名称</th>
                        <th>描述</th>
                        <th>配置值</th>
                        <th>创建时间</th>
                        <th>更新时间</th>
                        <th>操作</th>
                    </tr>
                    @foreach($configs as $conf)
                    <tr>
                        <td class="tc"><input type="checkbox" name="id[]" value="{{$conf->id}}"></td>
                        <td class="tc">
                            <input type="text" name="ord[]" value="{{$conf->conf_sort}}" style="width: 30px;text-align: center">
                        </td>
                        <td class="tc">{{$conf->id}}</td>
                        <td>
                            <a href="#">{{$conf->conf_title}}</a>
                        </td>
                        <td>{{$conf->conf_name}}</td>
                        <td>{{$conf->conf_description}}</td>
                        @inject('configPresenters', 'App\Http\Presenters\ConfigPresenters')
                        <?php //$data = $configPresenters->bindConfigConfTypesPresenters($conf);dd($data); ?>
                        {{--@inject('ConfigConfTypesInputPresenters', 'App\Http\Presenters\ConfigConfTypesInputPresenters')--}}
                        <td style="width: 25%;text-align: center">{!! $configPresenters->showConfTypes($conf) !!}</td>
                        <td>{{$conf->created_at}}</td>
                        <td>{{$conf->updated_at}}</td>
                        <td>
                            <a href="javascript:;" onclick="bindConfValue({{$conf->id}}, this)">绑定配置值</a>
                            <a href="javascript:;" onclick="editConfig({{$conf->id}})">修改</a>
                            <a href="javascript:;" onclick="delConfig({{$conf->id}}, this)">删除</a>
                        </td>
                    </tr>
                    @endforeach
                </table>


{{--<div class="page_nav">--}}
{{--<div>--}}
{{--<a class="first" href="/wysls/index.php/Admin/Tag/index/p/1.html">第一页</a> --}}
{{--<a class="prev" href="/wysls/index.php/Admin/Tag/index/p/7.html">上一页</a> --}}
{{--<a class="num" href="/wysls/index.php/Admin/Tag/index/p/6.html">6</a>--}}
{{--<a class="num" href="/wysls/index.php/Admin/Tag/index/p/7.html">7</a>--}}
{{--<span class="current">8</span>--}}
{{--<a class="num" href="/wysls/index.php/Admin/Tag/index/p/9.html">9</a>--}}
{{--<a class="num" href="/wysls/index.php/Admin/Tag/index/p/10.html">10</a> --}}
{{--<a class="next" href="/wysls/index.php/Admin/Tag/index/p/9.html">下一页</a> --}}
{{--<a class="end" href="/wysls/index.php/Admin/Tag/index/p/11.html">最后一页</a> --}}
{{--<span class="rows">11 条记录</span>--}}
{{--</div>--}}
{{--</div>--}}

                <div style="text-align: center">
                    {{$configs->links()}}
                </div>

                {{--<div class="page_list">--}}
                    {{--<ul>--}}
                        {{--<li class="disabled"><a href="#">&laquo;</a></li>--}}
                        {{--<li class="active"><a href="#">1</a></li>--}}
                        {{--<li><a href="#">2</a></li>--}}
                        {{--<li><a href="#">3</a></li>--}}
                        {{--<li><a href="#">4</a></li>--}}
                        {{--<li><a href="#">5</a></li>--}}
                        {{--<li><a href="#">&raquo;</a></li>--}}
                    {{--</ul>--}}
                {{--</div>--}}
            </div>
        </div>
    </form>
    <!--搜索结果页面 列表 结束-->


@section('script')
<script>
    // 删除
    function delConfig(conf_id, that)
    {
        layer.confirm('确定执行删除操作？', {
            btn: ['确定','取消'] //按钮
        }, function(){
            $.post(
                    '{{url('/conf')}}' + '/' + conf_id,
                    {_token: '{{csrf_token()}}', _method: 'delete'},
                    function(data){
                        data.status ? layer.msg('删除成功！', {icon:6}) : layer.msg(data.content, {icon:5});
                        $(that).parents('tr').remove();
                    },
                    'json');
        }, function(index){
            layer.close(index);
        });
    }
    // 编辑弹层
    function editConfig(conf_id) {
        layer.open({
            type: 2,
            title: '编辑友情链接',
            shadeClose: false,
            closeBtn: true,
            shade: 0.8,
            area: ['780px', '60%'],
            content: '{{url('/conf')}}' + '/' + conf_id + '/edit'//iframe的url
        });
    }

    // 批量删除
    function batchDelConfig()
    {
        var ids = $('input[name*=id]:checked');
        var id_arr = [];
        $.each(ids, function(i){
            id_arr.push($(this).val());
        });
        console.log(id_arr);
        if (id_arr.length < 1) {
            layer.msg('请勾选后再批量操作！');
            return false;
        }
        layer.confirm('确定执行删除操作？', {
            btn: ['确定','取消'] //按钮
        }, function(){
            $.post(
                    '{{URL::route('config.batchDel')}}',
                    {id_arr:id_arr, _token:'{{csrf_token()}}'},
                    function(data){
                        data.status ? layer.msg('批量删除成功！', {icon:6}) : layer.msg(data.content, {icon:5});
                        location.reload();
                    }, 'json');
        }, function(index){
            layer.close(index);
        });

    }

    // 绑定配置值
    function bindConfValue(conf_id, that)
    {
        var value = '';
        var type = $('.conf_value'+ conf_id).attr('type');
        if (type == 'radio') {
            var value = $('.conf_value'+ conf_id+ ':checked').val();
        }else{
            var value = $('.conf_value'+ conf_id).val();
        }
        $.post(
                '{{url('conf/bindValue')}}',
                {value:value,id:conf_id,_token:'{{csrf_token()}}'},
                function(data){
                    data.status ? layer.msg('绑定成功！', {icon:6}) : layer.msg(data.content, {icon:5});
                    location.reload();
                }
        );
    }
</script>

@endsection
@endsection