<?php

namespace App\Orchid\Screens;

use App\Product;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Layout;
use App\Orchid\Screens\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use App\Contract\Route\Name\ProductInterface as ProductRouteNamesInterface;

class ProductEditScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Добавление товара';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = '';

    /**
     * @var bool
     */
    public $exists = false;

    /**
     * Query data.
     *
     * @param Product $product
     * @return array
     */
    public function query(Product $product): array
    {
        $this->exists = $product->exists;

        if ($this->exists) {
            $this->name = 'Редактирование товара';
        }

        return [
            'product' => $product
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
            Link::name('💾 Сохранить')
//                ->icon('icon-plus')
                ->class('btn-primary')
                ->method('createOrUpdate')
                ->canSee(!$this->exists),

            Link::name('💾 Обновить')
//                ->icon('icon-note')
                ->class('btn-primary')
                ->method('createOrUpdate')
                ->canSee($this->exists),

            Link::name('Удалить')
                ->class('btn-danger')
                ->icon('icon-trash')
                ->method('remove')
                ->canSee($this->exists),

            Link::name('Отмена')
                ->icon('icon-close')
                ->method('cancel'),

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
            Layout::rows([
                Input::make('product.name')
                    ->title('Название')
                    ->placeholder('Название товара'),

                TextArea::make('product.note')
                    ->title('Примечание')
                    ->placeholder('Примечание к товару'),
            ])
        ];
    }

    /**
     * @param Product $product
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function createOrUpdate(Product $product, Request $request)
    {
        try {
            $requestData = $request->get('product');
            $product->fill($requestData)->save();

            $operation = $product->exists ? 'update' : 'create';
            Alert::info("You have successfully {$operation} an product.");
        } catch (Exception $exception) {
            Alert::error($exception->getMessage());

            return Redirect::back()->withInput();
        }

        return redirect()->route(ProductRouteNamesInterface::LIST);
    }

    /**
     * @param Product $product
     *
     * @return RedirectResponse
     * @throws Exception
     */
    public function remove(Product $product)
    {
        $product->delete()
            ? Alert::info('You have successfully deleted the post.')
            : Alert::warning('An error has occurred')
        ;

        return redirect()->route(ProductRouteNamesInterface::LIST);
    }

    /**
     * @return RedirectResponse
     */
    public function cancel()
    {
        return redirect()->route(ProductRouteNamesInterface::LIST);
    }
}
