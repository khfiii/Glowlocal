<?php

use App\Models\ProductType;

test('checkCollection', function () {

  

    expect(ProductType::find(1)->name)->toEqual('ebook');
});