@extends('layouts.default')
@section('content')

    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('/info')}}">首页</a> &raquo; <a href="{{url('/category')}}">分类管理</a> &raquo; 分类列表
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
                    <td><input type="text" class="daterange" name="daterange" placeholder="请选择时间段"/></td>
                    <td><input class="btn btn-primary" type="submit" name="sub" value="查询"></td>
                </tr>
            </table>
        </form>
    </div>
    <!--结果页快捷搜索框 结束-->

    <!--搜索结果页面 列表 开始-->
    <form action="#" method="post">
        <div class="result_wrap">
            <!--快捷导航 开始-->
            <div class="result_content">
                <div class="short_wrap">
                    <a href="{{url('/category/create')}}"><i class="fa fa-plus"></i>新增分类</a>
                    <a href="javascript:;" onclick="batchDelCategory()"><i class="fa fa-recycle"></i>批量删除</a>
                    <a href="#"><i class="fa fa-refresh"></i>更新排序</a>
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
                        <th>分类名称</th>
                        <th>父级分类</th>
                        <th>创建时间</th>
                        <th>更新时间</th>
                        <th>分类描述</th>
                        <th>操作</th>
                    </tr>

                    @foreach($categories as $cate)
                        <tr>
                            <td class="tc"><input type="checkbox" name="id[]" value="{{$cate->id}}"></td>
                            <td class="tc">
                                <input type="text" style="width: 35px;" name="ord[]" value="{{$cate->sort}}">
                            </td>
                            <td class="tc">{{$cate->id}}</td>
                            <td>
                                <a href="#">{{$cate->cate_name}}</a>
                            </td>
                            <td> @if($cate->cate_pid == 0) 顶级分类 @endif </td>
                            <td>{{$cate->created_at}}</td>
                            <td>{{$cate->updated_at}}</td>
                            <td>{{$cate->cate_description}}</td>
                            <td>
                                <a href="javascript:;" onclick="editCate({{$cate->id}})">修改</a>
                                <a href="javascript:;" onclick="delCate({{$cate->id}}, this)">删除</a>
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
    {{$categories->links()}}
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
    function delCate(cate_id, that)
    {
        layer.confirm('确定执行删除操作？', {
            btn: ['确定','取消'] //按钮
        }, function(){
            $.post(
                    '{{url('/category')}}' + '/' + cate_id,
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
    function editCate(cate_id) {
        layer.open({
            type: 2,
            title: '编辑分类',
            shadeClose: false,
            closeBtn: true,
            shade: 0.8,
            area: ['780px', '60%'],
            content: '{{url('/category')}}' + '/' + cate_id + '/edit'//iframe的url
        });
    }
    // 批量删除
    function batchDelCategory()
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
                    '{{URL::route('category.batchDel')}}',
                    {id_arr:id_arr, _token:'{{csrf_token()}}'},
                    function(data){
                        data.status ? layer.msg('批量删除成功！', {icon:6}) : layer.msg(data.content, {icon:5});
                        location.reload();
                    }, 'json');
        }, function(index){
            layer.close(index);
        });

    }
</script>
@endsection

@endsection