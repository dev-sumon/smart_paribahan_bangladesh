<?php

use Illuminate\Support\Facades\Auth;

if (!function_exists('setCreator')) {
    function setCreator($model)
    {
        foreach (array_keys(config('auth.guards')) as $guard) {
            if (Auth::guard($guard)->check()) {
                $model->created_by_id = Auth::guard($guard)->id();
                $model->created_by_guard = $guard;
                break;
            }
        }
    }
}

// public function setCreator()
//     {
//         foreach (array_keys(config('auth.guards')) as $guard) {
//             if (auth($guard)->check()) {
//                 $this->created_by_id = auth($guard)->id();
//                 $this->created_by_guard = $guard;
//                 break;
//             }
//         }
//     }


?>