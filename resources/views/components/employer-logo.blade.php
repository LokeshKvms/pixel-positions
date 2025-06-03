@props(['employer','dim'=> '100'])
<img class="rounded-xl" src="{{ asset($employer->logo) }}" alt="logo" style="width: {{ $dim }}px; height: {{ $dim }}px;">