<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\CommonController;
use App\Http\Services\ConfigService;

class ConfigController extends CommonController
{
    protected $configService;

    public function __construct(ConfigService $configService)
    {
        $this->configService = $configService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $configs = $this->configService->getList();
        return view('admin.config.list', compact('configs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.config.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $config = $this->configService->getConfigModel()->create($request->except('_token'));
        return $config ? $this->commonAjaxReturn() : back()->withInput();
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
        $config = $this->configService->getConfigModel()->find($id);
        return view('admin.config.edit', compact('config'));
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
        $res = $this->configService->getConfigModel()->where('id', $id)->update($request->except('_token'));
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
        $res = $this->configService->getConfigModel()->where('id', $id)->delete();
        return $res ? $this->commonAjaxReturn() : $this->commonAjaxReturn(false, '删除失败！请稍后再试');
    }

    /**
     * 批量删除
     */
    public function batchDel(Request $request)
    {
        $res = $this->configService->batchDelConfigs($request->input('id_arr'));
        return $res ? $this->commonAjaxReturn() : $this->commonAjaxReturn(false, '批量删除失败！请稍后再试');
    }

    public function bindValue(Request $request)
    {
        $res = $this->configService->saveConfValue($request->input('value'), $request->input('id'));
        return $res ? $this->commonAjaxReturn() : $this->commonAjaxReturn(false, '绑定配置值失败，请稍后重试！');
    }
}
