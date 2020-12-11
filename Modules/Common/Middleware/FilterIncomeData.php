<?php

namespace Modules\Common\Middleware;

use \Illuminate\Http\Request;
use Modules\Common\Helpers\FilterMaliciousContent;
use Closure;

/**
 * Class FilterIncomeData
 * @package Deka\Common\Middleware
 */
class FilterIncomeData {

    /**
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next) {
        $route = $request->route();
        foreach ($route->parameters() as $key => $value){
            $route->setParameter($key, $this->clear($value));
        }

        $request->merge($this->clear($request->all()));

        return $next($request);
    }


    private function clear($data){
        if(is_array($data)){
            $result = [];
            foreach ($data as $key => $value){
                $result[$key] = is_array($value) ? $this->clear($value) : FilterMaliciousContent::clear($value);
            }
        } else {
            $result = FilterMaliciousContent::clear($data);
        }

        return $result;
    }

}
