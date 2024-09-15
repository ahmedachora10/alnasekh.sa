<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackUserHistory
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Ignore if the request is an AJAX call or doesn't have a referrer
        if ($request->isMethod('get') && !$request->ajax()) {
            $previousUrl = url()->previous();
            $currentUrl = $request->fullUrl();

            // Check if the previous URL is not the same as the current one
            if ($previousUrl !== $currentUrl) {
                // Get the existing history from the session
                $history = collect(session()->get('my_history', []))->reverse();
                // $history[] = $previousUrl;

                dd($history, $history->filter(fn($item, $key) => $item == $currentUrl), $history->filter(fn($item, $key) => $item == $currentUrl)->first());

                if ($history->isEmpty()) {
                    session()->put('my_history', $history->push($previousUrl)->toArray());
                } elseif($currentUrl !== $history->reverse()->filter(fn($item, $key) => $key == 1)) {
                    session()->put('my_history', $history->push($previousUrl)->toArray());
                }
                session()->put('my_history', $history->push($previousUrl)->toArray());
            }

            // dump(session()->get('my_history'));
                        // dd(session()->get('history'), $previousUrl, $currentUrl, $currentUrl ,$history[count($history) - 2]);
        }

        return $next($request);
    }
}
