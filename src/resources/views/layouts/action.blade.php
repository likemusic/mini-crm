@php
    $class = 'btn btn-' . $style;
    $text = '<i class="'. $icon .'"></i>';
@endphp

@include('html-element.a', [
    'class' => $class,
    'title' => $label,
    'text' => $text,
    'method' => $method,
    'onclick' => $onclick
])
