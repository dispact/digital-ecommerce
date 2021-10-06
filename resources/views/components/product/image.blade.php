<img 
	src="{{ str_contains($product->image, 'http') ? $product->image : Storage::url($product->image) }}" 
	alt="{{ $product->title }}" 
	{{ $attributes->only('class') }}
>