@foreach($actionButtons as $actionButton)
    @include('layouts.action', [
        'route' => $actionButton->route,
        'style' => $actionButton->style,
        'label' => $actionButton->label,
        'icon' => $actionButton->icon
     ])
@endforeach
