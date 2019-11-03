<?php

declare(strict_types=1);

namespace App\Entity\MainPage;

use App\Menu\Main\Provider as MainMenuProvider;
use Illuminate\Http\Request;
use Orchid\Platform\Dashboard;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layout;
use Orchid\Screen\Screen;

class PlatformScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Главная';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'Welcome';

    /** @var MainMenuProvider */
    private $mainMenuProvider;


    public function __construct(
        MainMenuProvider $mainMenuProvider,
        ?Request $request = null)
    {
        $this->mainMenuProvider = $mainMenuProvider;
        parent::__construct($request);
    }

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
            'menu' => $this->getMenu(),
        ];
    }

    private function getMenu()
    {
        return $this->mainMenuProvider->getMenuRenderedItems();
    }

    /**
     * Button commands.
     *
     * @return Link[]
     */
    public function commandBar(): array
    {
        return [
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
            Layout::view('sections.main'),
        ];
    }
}
