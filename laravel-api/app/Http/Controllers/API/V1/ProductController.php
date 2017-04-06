<?php

namespace App\Http\Controllers\API\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Requests\API\ProductRequest;

class ProductController extends Controller
{
    private $product;
    private $totalPage = 5;
    public  function  __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->product->paginate($this->totalPage);

        return response()->json(['data' => $products]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validate = validator($data , $this->product->rules() );

        //Valid erros
        if( $validate->fails() )
        {
            $messagens = $validate->messages();
            return  response()->json(['validate.error', $messagens],500);
        }

        //Erro create
        if(!$insert = $this->product->create($data))
            return  response()->json(['error' => 'error_insert'] , 500 );

        return response()->json([ 'data' => $insert ], 201 );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id )
    {
        $product = $this->product->find($id);

        if(!$product)
            return response()->json(['error'=>'product_not_faund'],404);

        return response()->json(['data'=>$product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Valid erros
        $data = $request->all();

        $validate = validator($data , $this->product->rules($id) );
        if( $validate->fails() )
        {
            $messagens = $validate->messages();
            return  response()->json(['validate.error', $messagens]);
        }

        $product = $this->product->find($id);
        if(!$product)
            return response()->json(['error'=>'product_not_faund'],404);


        $update = $product->update($data);
        if(!$update)
            return response()->json(['error'=>'product_not_update'],500);

        return response()->json(['response'=>$update]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $product = $this->product->find($id);
        if(!$product)
            return response()->json(['error'=>'product_not_faund'],404);

        $delete = $product->delete();
        if(!$delete)
            return response()->json(['error'=>'product_not_delete'],500);

        return response()->json(['response'=>$delete]);

    }

    public function  search(Request $request)
    {
        $data = $request->all();

        $validate = validator($data , $this->product->rulesSearch() );
        if( $validate->fails() )
        {
            $messagens = $validate->messages();
            return  response()->json(['validate.error', $messagens]);
        }

        $products = $this->product->search($data, $this->totalPage);


        return response()->json(['data' => $products]);

    }

}
