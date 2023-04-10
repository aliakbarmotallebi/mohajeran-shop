<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [];
    }


    /**
     * @return mixed
     */
    public function getSkip()
    {
        return $this->input('skip', 0);
    }

    /**
     * @return mixed
     */
    public function getSort()
    {
        return $this->input('sort');
    }

    /**
     * @return mixed
     */
    public function getCount()
    {
        return $this->input('count', 10);
    }

}
