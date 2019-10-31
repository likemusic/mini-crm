<?php

declare(strict_types=1);

namespace App\Section\MainPage;

use Orchid\Platform\Dashboard;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layout;
use Orchid\Screen\Screen;
use App\Contract\Common\IconNameInterface;

class PlatformScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Dashboard';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'Welcome';

    /**
     * Query data.
     *
     *
     * @return array
     */
    public function query(): array
    {
        return [
            'status' => Dashboard::checkUpdate(),
        ];
    }

    /**
     * Button commands.
     *
     * @return Link[]
     */
    public function commandBar(): array
    {
        return [
            Link::make('Website')
                ->href('http://orchid.software')
                ->icon(IconNameInterface::GLOBE_ALT),

            Link::make('GitHub')
                ->href('https://github.com/orchidsoftware/platform')
                ->icon(IconNameInterface::SOCIAL_GITHUB),
        ];
    }

    /**
     * Views.
     *
     * @return Layout[]
     */
    public function layout(): array
    {
        return [
            Layout::view('platform::partials.update'),
            Layout::view('platform::partials.welcome'),
        ];
    }
}
