<?php

namespace App\Http\Controllers\Api;

use App\Models\Website;
use Illuminate\Http\Request;
use App\Models\WebsiteDetail;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Barryvdh\Debugbar\Facades\Debugbar;

class StoreWebsite extends Controller {
    public function index( Website $website ) {

        return response()->json( [
            'id' => $website->slug,
            'data' => $website->detail->data,
            'pagesHtml' => $website->detail->pagesHtml

        ], 200 );

    }

    public function store( Request $request ) {
        $validated = $request->validate( [
            'data' => 'required',
            'pagesHtml' => 'required',
        ] );

        $website = Website::where( 'slug', $request->id )->first();

        if ( !$website ) {
            return response()->json( [ 'message' => 'Website not fond' ], 404 );
        }

        $website->detail()->updateOrCreate( [ 'website_id' => $website->id ], $validated );

        return response()->json( [ 'message' => 'Halaman berhasil disimpan!' ], 200 );
    }
}
