@props(['value', 'type' => 'default', 'color' => 'default', 'size' => 'default', 'rounded' => 'default'])

@php
    if ($type == 'flat') {
        switch ($color) {
            case 'default':
            default:
                $classColor = 'primary-100';
                $classColorText = 'primary';
                break;
            case 'primary':
                $classColor = 'primary-100';
                $classColorText = 'primary';
                break;
            case 'secondary':
                $classColor = 'secondary-100';
                $classColorText = 'secondary';
                break;
            case 'success':
                $classColor = 'success-100';
                $classColorText = 'success';
                break;
            case 'warning':
                $classColor = 'warning-100';
                $classColorText = 'warning';
                break;
            case 'error':
                $classColor = 'error-100';
                $classColorText = 'error';
                break;
            case 'neutral':
                $classColor = 'neutral-100';
                $classColorText = 'neutral';
                break;
            case 'white':
                $classColor = 'white';
                $classColorText = 'slate-500';
                break;
            case 'black':
                $classColor = 'slate-100';
                $classColorText = 'black';
                break;
            case 'slate':
                $classColor = 'slate-100';
                $classColorText = 'slate-600';
                break;
            case 'gray':
                $classColor = 'gray-100';
                $classColorText = 'gray-600';
                break;
            case 'zinc':
                $classColor = 'zinc-100';
                $classColorText = 'zinc-600';
                break;
            case 'stone':
                $classColor = 'stone-100';
                $classColorText = 'stone-600';
                break;
            case 'red':
                $classColor = 'red-100';
                $classColorText = 'red-600';
                break;
            case 'orange':
                $classColor = 'orange-100';
                $classColorText = 'orange-600';
                break;
            case 'amber':
                $classColor = 'amber-100';
                $classColorText = 'amber-600';
                break;
            case 'lime':
                $classColor = 'lime-100';
                $classColorText = 'lime-600';
                break;
            case 'green':
                $classColor = 'green-100';
                $classColorText = 'green-600';
                break;
            case 'emerald':
                $classColor = 'emerald-100';
                $classColorText = 'emerald-600';
                break;
            case 'teal':
                $classColor = 'teal-100';
                $classColorText = 'teal-600';
                break;
            case 'cyan':
                $classColor = 'cyan-100';
                $classColorText = 'cyan-600';
                break;
            case 'sky':
                $classColor = 'sky-100';
                $classColorText = 'sky-600';
                break;
            case 'blue':
                $classColor = 'blue-100';
                $classColorText = 'blue-600';
                break;
            case 'indigo':
                $classColor = 'indigo-100';
                $classColorText = 'indigo-600';
                break;
            case 'violet':
                $classColor = 'violet-100';
                $classColorText = 'violet-600';
                break;
            case 'purple':
                $classColor = 'purple-100';
                $classColorText = 'purple-600';
                break;
            case 'fuchsia':
                $classColor = 'fuchsia-100';
                $classColorText = 'fuchsia-600';
                break;
            case 'pink':
                $classColor = 'pink-100';
                $classColorText = 'pink-600';
                break;
            case 'rose':
                $classColor = 'rose-100';
                $classColorText = 'rose-600';
                break;
        }
    } else {
        switch ($color) {
            case 'default':
            default:
                $classColor = 'primary';
                break;
            case 'primary':
                $classColor = 'primary';
                break;
            case 'secondary':
                $classColor = 'secondary';
                break;
            case 'success':
                $classColor = 'success';
                break;
            case 'warning':
                $classColor = 'warning';
                break;
            case 'error':
                $classColor = 'error';
                break;
            case 'neutral':
                $classColor = 'neutral';
                break;
            case 'white':
                $classColor = 'white';
                break;
            case 'black':
                $classColor = 'black';
                break;
            case 'slate':
                $classColor = 'slate-500';
                break;
            case 'gray':
                $classColor = 'gray-500';
                break;
            case 'zinc':
                $classColor = 'zinc-500';
                break;
            case 'stone':
                $classColor = 'stone-500';
                break;
            case 'red':
                $classColor = 'red-500';
                break;
            case 'orange':
                $classColor = 'orange-500';
                break;
            case 'amber':
                $classColor = 'amber-500';
                break;
            case 'lime':
                $classColor = 'lime-500';
                break;
            case 'green':
                $classColor = 'green-500';
                break;
            case 'emerald':
                $classColor = 'emerald-500';
                break;
            case 'teal':
                $classColor = 'teal-500';
                break;
            case 'cyan':
                $classColor = 'cyan-500';
                break;
            case 'sky':
                $classColor = 'sky-500';
                break;
            case 'blue':
                $classColor = 'blue-500';
                break;
            case 'indigo':
                $classColor = 'indigo-500';
                break;
            case 'violet':
                $classColor = 'violet-500';
                break;
            case 'purple':
                $classColor = 'purple-500';
                break;
            case 'fuchsia':
                $classColor = 'fuchsia-500';
                break;
            case 'pink':
                $classColor = 'pink-500';
                break;
            case 'rose':
                $classColor = 'rose-500';
                break;
        }
    }
    switch ($type) {
        case 'default':
        default:
            $xx = 'bg-' . $classColor . ' border-none text-white';
            if ($classColor == 'white') {
                $xx = 'bg-white border text-slate-500';
            }
            break;
        case 'outline':
            $xx = 'border border-' . $classColor . ' text-' . $classColor;
            break;
        case 'flat':
            $xx = 'bg-' . $classColor . ' border-none ' . ' text-' . $classColorText;
            break;
    }
    //dump($xx);
    switch ($size) {
        case 'sm':
            $classSize = 'text-xs h-5';
            break;
        case 'md':
            $classSize = 'text-sm h-6';
            break;
        case 'lg':
            $classSize = 'text-base h-7';
            break;
        case 'default':
        default:
            $classSize = 'text-xs h-5';
            break;
    }
    switch ($rounded) {
        case 'none':
            $classRounded = 'rounded-none';
            break;
        case 'sm':
            $classRounded = 'rounded-sm';
            break;
        case 'base':
            $classRounded = 'rounded';
            break;
        case 'md':
            $classRounded = 'rounded-md';
            break;
        case 'lg':
            $classRounded = 'rounded-lg';
            break;
        case 'xl':
            $classRounded = 'rounded-xl';
            break;
        case '2xl':
            $classRounded = 'rounded-2xl';
            break;
        case '3xl':
            $classRounded = 'rounded-3xl';
            break;
        case 'full':
            $classRounded = 'rounded-full';
            break;
        case 'default':
        default:
            $classRounded = 'rounded-md';
            break;
    }
@endphp

<div
    class="inline-flex justify-center items-center tracking-tight px-1.5 py-0.5 {{ $xx }} {{ $classSize }} {{ $classRounded }}">
    {{ $value ?? $slot }}
</div>
{{-- <div {{ $attributes->merge(['class' => 'badge leading-3 whitespace-nowrap badge-primary']) }}>
    {{ $value ?? $slot }}
</div> --}}

{{-- <div @class([
    'badge leading-3 whitespace-nowrap px-2.5 py-0.5',
    'bg-primary border-none text-primary-content' => $isDefault,
    'bg-primary border-none text-primary-content' => $isPrimary,
    'bg-secondary border-none text-secondary-content' => $isSecondary,
])> --}}

{{-- $attributes->where('class', 'badge'),
    $attributes->where('class', 'badge-primary'),
    $attributes->where('class', 'badge-secondary'),
    $attributes->where('class', 'badge-success'),
    $attributes->where('class', 'badge-info'),
    $attributes->where('class', 'badge-warning'),
    $attributes->where('class', 'badge-danger'),
    $attributes->where('class', 'badge-light'),
    $attributes->where('class', 'badge-dark'),
    $attributes->where('class', 'badge-gray'),
    $attributes->where('class', 'badge-green'),
    $attributes->where('class', 'badge-blue'),
    $attributes->where('class', 'badge-indigo'),
    $attributes->where('class', 'badge-purple'),
    $attributes->where('class', 'badge-pink'),
    $attributes->where('class', --}}

{{-- 
color='neutral'
color='white'
color='black'
color='slate'
color='gray'
color='zinc'
color='stone'
color='red'
color='orange'
color='amber'
color='lime'
color='green'
color='emerald'
color='teal'
color='cyan'
color='sky'
color='blue'
color='indigo'
color='violet'
color='purple'
color='fuchsia'
color='pink'
color='rose'
--}}
{{-- 
=> default
'bg-primary text-primary ';
'bg-secondary text-secondary ';
'bg-success text-success ';
'bg-warning text-warning ';
'bg-error text-error ';
'bg-neutral text-neutral ';
'bg-white text-white ';
'bg-black text-black ';
'bg-slate-500 text-slate-500 ';
'bg-gray-500 text-gray-500 ';
'bg-zinc-500 text-zinc-500 ';
'bg-stone-500 text-stone-500 ';
'bg-red-500 text-red-500 ';
'bg-orange-500 text-orange-500 ';
'bg-amber-500 text-amber-500 ';
'bg-lime-500 text-lime-500 ';
'bg-green-500 text-green-500 ';
'bg-emerald-500 text-emerald-500 ';
'bg-teal-500 text-teal-500 ';
'bg-cyan-500 text-cyan-500 ';
'bg-sky-500 text-sky-500 ';
'bg-blue-500 text-blue-500 ';
'bg-indigo-500 text-indigo-500 ';
'bg-violet-500 text-violet-500 ';
'bg-purple-500 text-purple-500 ';
'bg-fuchsia-500 text-fuchsia-500 ';
'bg-pink-500 text-pink-500 ';
'bg-rose-500 text-rose-500 '; 

=> outline
'border-primary text-primary ';
'border-secondary text-secondary ';
'border-success text-success ';
'border-warning text-warning ';
'border-error text-error ';
'border-neutral text-neutral ';
'border-white text-white ';
'border-black text-black ';
'border-slate-500 text-slate-500 ';
'border-gray-500 text-gray-500 ';
'border-zinc-500 text-zinc-500 ';
'border-stone-500 text-stone-500 ';
'border-red-500 text-red-500 ';
'border-orange-500 text-orange-500 ';
'border-amber-500 text-amber-500 ';
'border-lime-500 text-lime-500 ';
'border-green-500 text-green-500 ';
'border-emerald-500 text-emerald-500 ';
'border-teal-500 text-teal-500 ';
'border-cyan-500 text-cyan-500 ';
'border-sky-500 text-sky-500 ';
'border-blue-500 text-blue-500 ';
'border-indigo-500 text-indigo-500 ';
'border-violet-500 text-violet-500 ';
'border-purple-500 text-purple-500 ';
'border-fuchsia-500 text-fuchsia-500 ';
'border-pink-500 text-pink-500 ';
'border-rose-500 text-rose-500 '; 

=> flat
'bg-primary-100 text-primary ';
'bg-secondary-100 text-secondary ';
'bg-success-100 text-success ';
'bg-warning-100 text-warning ';
'bg-error-100 text-error ';
'bg-neutral-100 text-neutral ';
'bg-white text-white-500 ';
'bg-black text-black ';
'bg-slate-100 text-slate-600 ';
'bg-gray-100 text-gray-600 ';
'bg-zinc-100 text-zinc-600 ';
'bg-stone-100 text-stone-600 ';
'bg-red-100 text-red-600 ';
'bg-orange-100 text-orange-600 ';
'bg-amber-100 text-amber-600 ';
'bg-lime-100 text-lime-600 ';
'bg-green-100 text-green-600 ';
'bg-emerald-100 text-emerald-600 ';
'bg-teal-100 text-teal-600 ';
'bg-cyan-100 text-cyan-600 ';
'bg-sky-100 text-sky-600 ';
'bg-blue-100 text-blue-600 ';
'bg-indigo-100 text-indigo-600 ';
'bg-violet-100 text-violet-600 ';
'bg-purple-100 text-purple-600 ';
'bg-fuchsia-100 text-fuchsia-600 ';
'bg-pink-100 text-pink-600 ';
'bg-rose-100 text-rose-600 '; 

--}}
