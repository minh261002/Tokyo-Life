<?php

namespace App\Admin\Http\Requests\AttributeVariation;

use App\Admin\Http\Requests\BaseRequest;

class AttributeVariationRequest extends BaseRequest
{
    public function methodPost()
    {
        return [
            'attribute_id' => 'required|exists:attributes,id',
            'name' => 'required',
            'position' => 'required',
            'meta_value' => 'nullable',
            'description' => 'nullable',
        ];
    }

    public function methodPut()
    {
        return [
            'id' => 'required|exists:attribute_variations,id',
            'attribute_id' => 'required|exists:attributes,id',
            'name' => 'required',
            'position' => 'required',
            'meta_value' => 'nullable',
            'description' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'attribute_id.required' => 'Vui lòng chọn thuộc tính',
            'attribute_id.exists' => 'Thuộc tính không tồn tại',
            'name.required' => 'Vui lòng nhập tên giá trị',
            'position.required' => 'Vui lòng nhập vị trí',
        ];
    }
}