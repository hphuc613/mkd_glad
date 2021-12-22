<?php

namespace Modules\Offer\Controllers;

use App\AppHelpers\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Base\Models\Status;
use Modules\Offer\Models\Offer;
use Modules\Offer\Models\OfferBundle;
use Modules\Offer\Requests\OfferRequest;
use Modules\Product\Models\Product;

class OfferController extends Controller
{

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        # parent::__construct();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $filter = $request->all();
        $data = Offer::filter($filter)->orderBy("title")->paginate(20);

        return view("Offer::index", compact("data", "filter"));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function getCreate(Request $request)
    {
        $product = Product::getArray(Status::STATUS_ACTIVE);
        return view("Offer::create", compact('product'));
    }

    /**
     * @param OfferRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postCreate(OfferRequest $request)
    {
        $data = $request->all();
        $product_ids = json_encode($data['product_ids'] ?? []);
        unset($data['image']);
        unset($data['product_ids']);
        $offer = Offer::query()->create($data);
        if ($request->hasFile('image')) {
            $image = $request->image;
            $offer->image = Helper::storageFile($image, time() . '_' . $image->getClientOriginalName(), 'Offer/' . $offer->id);
        }
        $offer->save();
        if ($offer) {
            OfferBundle::query()->create([
                'offer_id' => $offer->id,
                'product_ids' => $product_ids,
            ]);

        }
        $request->session()->flash('success', trans('Created successfully.'));

        return redirect()->route('get.offer.list');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getUpdate($id)
    {
        $data = Offer::query()->with('bundles')->find($id);
        $product_ids = $data->bundles->first()->product_ids;
        $product = Product::getArray(Status::STATUS_ACTIVE,false,Helper::isJson($product_ids, 1));
        $bundles = $this->getProductList($product_ids);

        return view("Offer::update", compact('data', 'product', 'bundles'));
    }

    public function postUpdate(OfferRequest $request, $id)
    {
        $data = $request->all();
        $product_ids = json_encode($data['product_ids'] ?? []);
        unset($data['image']);
        unset($data['product_ids']);
        $offer = Offer::query()->find($id);
        if ($request->hasFile('image')) {
            $image = $request->image;
            if (file_exists($offer->image)) {
                unlink($offer->image);
            }
            $offer->image = Helper::storageFile($image, time() . '_' . $image->getClientOriginalName(), 'Offer/' . $offer->id);
        }
        $offer->update($data);
        $offer_bundle = OfferBundle::query()->where('offer_id',$offer->id)->first();
        $offer_bundle->update([
            'product_ids' => $product_ids,
        ]);

        $request->session()->flash('success', trans('Updated successfully.'));

        return redirect()->route('get.offer.list');
    }

    /**
     * @param $product_ids
     * @return array
     */
    public function getProductList($product_ids)
    {
        $data = Helper::isJson($product_ids, 1);
        $list = [];
        if ($data) {
            foreach ($data as $id) {
                $product = Product::find($id);
                if (!empty($product)) {
                    $list[] = $product;
                }
            }
        }
        return $list;
    }

    public function delete(Request $request, $id){
        $offer = Offer::query()->find($id);
        $offer->delete();

        $request->session()->flash('success', trans('Deleted successfully.'));

        return back();
    }
}
