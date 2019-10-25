<a href="{{route($route,$attributes)}}" @isset($class)class="{{$class}}"@endisset>
    @isset($text) {{$text}} @else <i class="icon-menu"></i> @endisset
</a>
