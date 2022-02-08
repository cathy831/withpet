<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SpotRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'spot.spot_name' => 'required|string|max:50',
            'spot.address' => 'required|string|max:100',
            'spot.open_close' => 'required|string|max:100',
            'spot.off' => 'required|string|max:100',
        ];
    }
}
