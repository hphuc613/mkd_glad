<?php

namespace Modules\Product\Controllers;

use App\AppHelpers\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Modules\Base\Models\Status;
use Modules\Product\Models\Product;
use Modules\Product\Models\ProductCategory;
use Modules\Product\Models\ProductImage;
use Modules\Product\Requests\ProductRequest;
use Modules\Tag\Models\Tag;

class ProductController extends Controller {

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct() {
        # parent::__construct();
    }

    /**
     * @param Request $request
     * @return Factory|View
     */
    public function index(Request $request) {
        $filter     = $request->all();
        $categories = ProductCategory::getArray();
        $statuses   = Status::getStatuses();
        $data       = Product::filter($filter);
        $data       = $data->orderBy("name")->paginate(20);

        return view("Product::backend.product.index", compact("data", "categories", "statuses", "filter"));
    }

    /**
     * @param Request $request
     * @return Factory|View
     */
    public function getCreate(Request $request) {
        $categories = ProductCategory::getArray();
        $statuses   = Status::getStatuses();
        $tags       = Tag::getTagArray();

        return view("Product::backend.product.create", compact("categories", "statuses", "tags"));
    }

    /**
     * @param ProductRequest $request
     * @return RedirectResponse
     */
    public function postCreate(ProductRequest $request) {
        $data = $request->all();
        unset($data['tags']);
        unset($data['image']);
        $tag_ids           = Tag::createTags($request->tags);
        $product           = new Product($data);
        $product->capacity = json_encode($request->capacity);
        $product->save();
        if ($request->hasFile('image')) {
            $image          = $request->image;
            $image_name     = time() . '_' . $image->getClientOriginalName();
            $upload_address = 'Product/' . $product->id . '-' . $product->sku;
            $product->image = Helper::storageFile($image, $image_name, $upload_address);
        }
        $product->save();
        $product->tags()->sync($tag_ids);
        $request->session()->flash('success', trans('Created successfully.'));

        return redirect()->route('get.product.list');
    }

    /**
     * @param Request $request
     * @return Factory|View
     */
    public function getUpdate(Request $request, $id) {
        $data       = Product::query()->find($id);
        $categories = ProductCategory::getArray();
        $statuses   = Status::getStatuses();
        $tags       = Tag::getTagArray();

        return view("Product::backend.product.update", compact("data", "categories", "statuses", "tags"));
    }

    /**
     * @param ProductRequest $request
     * @return RedirectResponse
     */
    public function postUpdate(ProductRequest $request, $id) {
        $data = $request->all();
        unset($data['tags']);
        $tag_ids            = Tag::createTags($request->tags);
        $data['capacity']   = !empty($request->capacity) ? json_encode(array_combine($request->capacity, $request->capacity)) : "[]";
        $product            = Product::query()->find($id);
        $data['image']      = str_replace($product->sku, $request->sku, $product->image);

        $upload_address     = 'Product/' . $product->id . '-' . $request->sku;
        $upload_address_old = 'Product/' . $product->id . '-' . $product->sku;
        if ($upload_address !== $upload_address_old && file_exists($upload_address_old)) {
            rename('storage/upload/' . $upload_address_old, 'storage/upload/' . $upload_address); //Change file name when update sku
        }
        if ($request->hasFile('image')) {
            $image = $request->image;
            if (file_exists('storage/upload/' . $upload_address_old)) {
                unlink($product->image);
            }
            $image_name    = time() . '_' . $image->getClientOriginalName();
            $data['image'] = Helper::storageFile($image, $image_name, $upload_address);
        }
        $product->update($data);
        $product->tags()->sync($tag_ids);
        $request->session()->flash('success', trans('Updated successfully.'));

        return redirect()->route('get.product.update', $product->id);
    }

    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function delete(Request $request, $id) {
        $data = Product::query()->find($id)->delete();
        $data->tags()->sync([]);
        $data->delete();
        $request->session()->flash('success', trans('Deleted successfully.'));

        return back();
    }

    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function addImage(Request $request, $id) {
        $data = Product::query()->find($id);
        $data->images()->delete();
        foreach ($request->images as $image) {
            ProductImage::query()->firstOrCreate(['image' => $image, 'product_id' => $id]);
        }

        $request->session()->flash('success', trans('Updated successfully.'));

        return back();
    }
}
