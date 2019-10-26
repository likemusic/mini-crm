@foreach($actionButtons as $actionButton)
    @include('layouts.action', [
        'style' => $actionButton->style,
        'label' => $actionButton->label,
        'icon' => $actionButton->icon,
        'method' => $actionButton->method,
        'onclick' => $actionButton->onclick,
        'route' => $routes[$actionButton->name]
     ])
@endforeach
