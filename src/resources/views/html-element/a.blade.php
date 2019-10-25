<a
    href="{{route($route, $id)}}"
    @isset($class)class="{{$class}}"@endisset
    @isset($title)title="{{$title}}"@endisset
    @isset($onclick)onclick="{{$onclick}}"@endisset
>@isset($text){!! $text !!}@endisset</a>
