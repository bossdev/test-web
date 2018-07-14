<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Repositories\Db\Product\ProductRepositoryInterface;
use App\Transformers\ProductTransformer;
use Yajra\Datatables\Datatables;
use Yajra\DataTables\Html\Builder;

class ProductController extends Controller
{
    function __construct(ProductRepositoryInterface $product){
        $this->product = $product;
    }

    function index(Builder $builder , Request $request){
        // if ($request->ajax()) {
        //     $data = $this->product->listProduct();
        //     $dt = Datatables::of($data)->toJson();
        //     return $dt;
        // }
        $builder = $builder
                    ->columns([
                        ['data' => 'id', 'title'=>'Id'],
                        ['data' => 'name', 'title'=>'Name'],
                        ['data' => 'price', 'title'=>'Price'],
                        ['data' => 'detail', 'title'=>'Detail'],
                        ['data' => 'created_at', 'title'=>'Created At'],
                        ['data' => 'updated_at', 'title'=>'Updated At']
                    ])
                    ->ajax([
                        'url' => route('product.loadData'),
                        'type' => 'GET',
                        'data' => 'function(d) { d.key = "value"; }',
                    ])
                    ->addColumn(['title' => 'action','defaultContent'=>'action'])
                    ->addAction(['data' => 'tools', 'title'=>'Tools','defaultContent'=>'is not '])
                    ->parameters([
                        'searching' => false
                    ])
                    ;
                    // ->addColumn(['data' => 'detail', 'name' => 'detail', 'title' => 'Detail'])
                    // ->addColumn('action'.function(){
                    //     return 'zzz';
                    // })
        $html = $builder;
        return view('product',compact('html'));
    }

    function list(){
        // $data = Product::get();
        // return $data;
        $data = $this->product->listProduct();

        // $resource = new Collection($data, new ProductTransformer());

        // $resource = Fractal::collection($data)->transformWith(new ProductTransformer())->toArray();
        // $resource = new Fractal\Resource\Item($data[0],new ProductTransformer);
        $resource = ProductTransformer::transform($data[0]);

        // $resource = $this->fractal->Collection($data, new ProductTransformer())['data'];
        return response()->json($resource);
    }

    function loadData(){
        $data = $this->product->listProduct();
        $dt = Datatables::of($data)
        // ->setTotalRecords(20)
        // ->setFilteredRecords(5)
                ->make(true);
        return $dt;
    }
}
