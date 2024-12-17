<?php

namespace App\Admin\Http\Requests\Attribute;

use App\Admin\Http\Requests\BaseRequest;

class AttributeRequest extends BaseRequest
{
    public function methodPost()
    {
        return [
            'name' => 'required|unique:attributes,name',
            'type' => 'required',
            'position' => 'required',
            'description' => 'nullable',
        ];
    }

    public function methodPut()
    {
        return [
            'id' => 'required|exists:attributes,id',
            'name' => 'required|unique:attributes,name,' . $this->id,
            'type' => 'required',
            'position' => 'required',
            'description' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên thuộc tính không được để trống',
            'name.unique' => 'Tên thuộc tính đã tồn tại',
            'type.required' => 'Loại thuộc tính không được để trống',
            'position.required' => 'Vị trí không được để trống',
        ];
    }
}