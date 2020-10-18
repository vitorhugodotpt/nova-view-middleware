<?php

namespace Vitorhugodotpt\NovaViewMiddleware;

use App;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NovaViewMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $segments = $request->segments();

        if(count($segments) === 2 && $segments[0] === 'resources' && \Auth::check()) {
            $resource = "App\\Nova\\" . Str::ucfirst($segments[1]);
            $model = $resource::$model;

            $canView = $resource::$viewMiddleware ?? false;
            if(!$canView && !Auth::user()->can('view', $model)) {
                return redirect('/403');
            }
        }
        return $next($request);
    }
}
