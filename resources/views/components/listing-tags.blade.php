@props(['extrasCsv'])

@php
    $extras = explode(',', $extrasCsv);
@endphp
<ul class="flex">

    @foreach ($extras as $extra)
        <li class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">
            <a href="/?extras={{ $extra }}">{{ $extra }}</a>
        </li>
    @endforeach

</ul>
