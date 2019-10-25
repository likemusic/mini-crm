<a href="{{route($route, $id)}}" @isset($class)class="{{$class}}"@endisset @isset($title)title="{{$title}}"@endisset>@isset($text){!! $text !!}@endisset</a>
