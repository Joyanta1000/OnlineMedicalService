<?php

namespace App\Http\Middleware;

use App\Models\User as ModelsUser;
use Illuminate\Http\Request;
use App\User;
use Closure;
use Auth;
use Cache;
use Carbon\Carbon;
use Doctrine\Common\Cache\Cache as CacheCache;
use Illuminate\Filesystem\Cache as FilesystemCache;
use Illuminate\Support\Facades\Cache as FacadesCache;
// use Illuminate\Contracts\Session\Session;
use Session;

class ActivityByUser
{
    public function handle(Request $request, Closure $next)
    {
        if (Session::has('email')) {
            $expiresAt = Carbon::now()->addMinutes(1); // keep online for 1 min
            FacadesCache::put('user-is-online-' . session()->get('id'), true, $expiresAt);
            // last seen
            ModelsUser::where('id', session()->get('id'))->update(['last_seen' => (new \DateTime())->format("Y-m-d H:i:s")]);
        }
        return $next($request);
    }
}
