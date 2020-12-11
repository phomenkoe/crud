<?php
namespace Modules\Task\UI\Validation;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class TaskValidator {

    /**
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public static function make(array $data){
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'description' => 'string|max:1000',
            'status' => [
                'string',
                'max:255',
                Rule::in(['finished', 'in_work', 'on_pause']),
            ]
        ]);
    }

}
