@props(['title', 'description', 'width' => 'xl'])

@php
    //is_null($this->user->private_key
    if ($width) {
        // $attributes->put('style', "width: {$width}px");
    }
    switch ($width) {
        case 'sm':
            $widthClasses = 'max-w-xl';
            break;
        case 'md':
            $widthClasses = 'max-w-3xl';
            break;
        case 'lg':
            $widthClasses = 'max-w-5xl';
            break;
        default:
        case 'xl':
            $widthClasses = 'max-w-7xl';
            break;
    }
@endphp
<div class="py-12">
    <div {{ $attributes->merge(['class' => $widthClasses . ' mx-auto sm:px-6 lg:px-8']) }}>
        {{ $slot }}
    </div>
</div>
