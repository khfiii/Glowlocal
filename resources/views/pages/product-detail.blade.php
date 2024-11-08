<x-app-layout>
    @section('page-title', $product->title)

    <livewire:product-detail :product="$product"/>


  
</x-app-layout>
