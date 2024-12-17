<?php

namespace App\Admin\Services\Attribute;

use Illuminate\Http\Request;

interface AttributeServiceInterface
{
    public function store(Request $request);

    public function update(Request $request);

}