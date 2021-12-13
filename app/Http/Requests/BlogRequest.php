<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BlogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return TRUE;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'GET':
            {
                return [
                    'sort_by' => [ 'nullable', Rule::in( [ 'asc', 'desc' ] ) ],
                ];
            }
            case 'DELETE':

            case 'PUT':
            case 'PATCH':
            {
                return [];
            }
            case 'POST':
            {
                return [
                    'title' => 'required|string|min:3|max:191',
                    'desc' => 'required|string',
                ];
            }

            default:
                break;
        }
    }

}
