<?php

namespace App\Http\Requests\Install;

use Illuminate\Http\Request;

class InstallRequest extends Request
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
        return [
            'host'		                => 'required',
            'database_name'             => 'required',
            'username'                  => 'required',
            'password'                  => 'required',
        ];
    }
}