<?php

use App\Contract\Entity\StockItem\Field\NameInterface;
use App\Model\Product;
use App\Model\StockItem;
use App\Model\Warehouse;
use Illuminate\Database\Seeder;

class StockItemsTableSeeder extends Seeder
{
    const MAX_QUANTITY = 1000;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = $this->getProducts();
        $warehouses = $this->getWarehouses();

        $this->addStockItems($products, $warehouses);

//        factory(StockItem::class, SeedCountInterface::PRODUCTS)->create();
//            ->each(function (ProductCategory $productCategory) {
//                $productCategory->posts()->save(factory(App\Post::class)->make());
//            });
    }

    private function getProducts()
    {
        return Product::all();
    }

    private function getWarehouses()
    {
        return Warehouse::all();
    }

    /**
     * @param Product[] $products
     * @param Warehouse[] $warehouses
     */
    private function addStockItems($products, $warehouses)
    {
        foreach ($products as $product) {
            $this->addProductStockItems($product, $warehouses);
        }
    }

    /**
     * @param Product $product
     * @param Warehouse[] $warehouses
     */
    private function addProductStockItems(Product $product, $warehouses)
    {
        foreach ($warehouses as $warehouse) {
            $this->addProductStockItem($product, $warehouse);
        }
    }

    private function addProductStockItem(Product $product, Warehouse $warehouse)
    {
        $quantity = $this->getRandomQuantity();

        $attributes = [
            NameInterface::PRODUCT_ID => $product->id,
            NameInterface::WAREHOUSE_ID => $warehouse->id,
            NameInterface::QUANTITY => $quantity,
        ];

        $stockItem = new StockItem($attributes);
        $stockItem->save();
    }

    private function getRandomQuantity()
    {
        return mt_rand(1, self::MAX_QUANTITY);
    }
}
