<?php

namespace App\Http\Controllers;

use App\Models\Website;
use Illuminate\Http\Request;

class WebsiteController extends Controller {
    public function visit( $slug ) {
        $website = Website::where( 'slug', $slug )->with( 'detail' )->firstOrFail();

        $elementWebsite = $website->detail?->pagesHtml;

        return view( 'pages.page', compact( 'website', 'elementWebsite' ) );
    }

    public function manage( Website $website ) {
        return view( 'website' );
    }
}
