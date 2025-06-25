@props(['header', 'description', 'bg'])

<div class="{{$bg}} p-3 rounded-lg shadoow-lg flex flex-col items-center">
    <p class="text-2xl">{{$header}}</p>
    <span class="text-xl font-bold">{{$description}}</span>
</div>
