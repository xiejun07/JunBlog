<?php
namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;

class CategoryRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $request = $this->validationData();
        // 如果有sort字段，规则为必须为数值
        $sort_rule = $request['sort'] ? 'numeric' : '';
        // 如果有cate_description字段
        $description_rule = $request['cate_description'] ? 'max:255' : '';

        return [
            'cate_name' => 'required|max:15',
            'cate_pid' => 'required|numeric',
            'sort' => $sort_rule,
            'cate_description' => $description_rule,
        ];
    }

    public function messages()
    {
        $request = $this->validationData();
        // 如果有sort值时，验证提示信息
        $sort_message = $request['sort'] ? '排序值必须为数值' : '';
        // 如果有cate_description字段
        $cate_description_message = $request['cate_description'] ? '分类描述需在255字符以内' : '';

        return [
            'cate_name.required' => '分类名称必填',
            'cate_name.max' => '分类名称小于30字符',
            'cate_pid.required' => '父级分类必选',
            'cate_pid.numeric' => '分类值输入不合法',
            'sort.numeric' => $sort_message,
            'cate_description.max' => $cate_description_message,
        ];
    }

    public function formatErrors(Validator $validator)
    {
        $errors = $validator->errors()->all();
        return $errors;
    }

}