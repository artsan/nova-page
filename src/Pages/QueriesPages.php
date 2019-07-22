<?php

namespace Whitecube\NovaPage\Pages;

use Route;
use Laravel\Nova\Http\Requests\ResourceIndexRequest;

trait QueriesPages
{
    /**
     * Retrieves registered pages with a route type for request
     *
     * @param  \Laravel\Nova\Http\Requests\ResourceIndexRequest  $request
     * @return \Illuminate\Support\Collection
     */
    public function queryRoutesIndex(ResourceIndexRequest $request) {
        $query = $this->newQueryWithoutScopes();
        return $query->whereType('route')->get(false)->map(function($template) {
            return new PageResource($template);
        });
    }

    /**
     * Retrieves registered pages with a route type count for request
     *
     * @param  \Laravel\Nova\Http\Requests\ResourceIndexRequest  $request
     * @return \Illuminate\Support\Collection
     */
    public function queryRoutesCount(ResourceIndexRequest $request)
    {
        return $this->newQueryWithoutScopes()->whereType('route')->get(false)->count();
    }
}
