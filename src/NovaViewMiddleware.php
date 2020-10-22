<?php

namespace Vitorhugodotpt\NovaViewMiddleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        if (count($segments) === 2 && $segments[0] === 'resources' && Auth::check()) {

            try {
                $resource = $this->resource($segments[1]);
                $model = $resource::$model;
                $canView = $resource::$viewMiddleware ?? false;
                if (! $canView && ! Auth::user()->can('view', $model)) {
                    return redirect('/403');
                }
            }catch (\Throwable $e) {
                \Log::info('NovaViewMiddleware', [$e->getMessage()]);
            }

        }

        return $next($request);
    }

    /**
     * @param $routeSegment
     * @return string
     */
    private function resource($routeSegment)
    {
        $resource = 'App\\Nova\\'.Str::singular(Str::studly($routeSegment));
        if(!class_exists($resource)) {
            $resource = 'App\\Nova\\'.Str::studly($routeSegment);
        }
        return $resource;
    }
}
