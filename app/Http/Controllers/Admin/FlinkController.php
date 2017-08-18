<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\CommonController;
use App\Http\Services\FlinkService;

class FlinkController extends CommonController
{
    protected $flinkService;

    public function __construct(FlinkService $flinkService)
    {
        $this->flinkService = $flinkService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $flinks = $this->flinkService->getList();
        return view('admin.flink.list', compact('flinks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.flink.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $flink = $this->flinkService->getFlinkModel()->create($request->except('_token'));
        return $flink ? $this->commonAjaxReturn() : back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $link = $this->flinkService->getFlinkModel()->find($id);
        return view('admin.flink.edit', compact('link'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $res = $this->flinkService->getFlinkModel()->where('id', $id)->update($request->except('_token'));
        return $res ? $this->commonAjaxReturn() : $this->commonAjaxReturn(false, '编辑失败！请稍后再试');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = $this->flinkService->getFlinkModel()->where('id', $id)->delete();
        return $res ? $this->commonAjaxReturn() : $this->commonAjaxReturn(false, '删除失败！请稍后再试');
    }

    /**
     * 批量删除
     */
    public function batchDel(Request $request)
    {
        $res = $this->flinkService->batchDelFlinks($request->input('id_arr'));
        return $res ? $this->commonAjaxReturn() : $this->commonAjaxReturn(false, '批量删除失败！请稍后再试');
    }
}
