<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Contracts\ProductRepositoryInterface;
use Cart;
      
class CartController extends Controller
{
    protected $product;

    public function __construct(ProductRepositoryInterface $product){
        $this->product = $product;      
    }

    public function index()
    {
        return view('client.cart');
    }

    public function create()
    {
        //
    }

    public function store($id)
    {
        $product = $this->product->find($id);
        $cartInfo = array(
            'id'         => $id,
            'name'       => $product->prod_title,
            'price'      => $product->prod_price,
            'quantity'   => '1',
            'attributes' => array(
                'img' => $product->prod_img
            )
        );
        Cart::add($cartInfo);
        return redirect('cart/show');
    }

    public function show()
    {
        $data['total'] = Cart::getTotal();
        $data['items'] = Cart::getContent();
        return view('client.cart',$data);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request)
    {    
        Cart::update($request->rowId, array(
          'quantity' => array(
              'relative' => false,
              'value' => $request->quantity
          ),
        ));
        return back()->with('message','Cập nhập giở hàng thành công');
    }

    public function destroy($id)
    {
        if ($id == 'all') {
            Cart::clear();
            return back()->with('message','Xóa giở hàng thành công');
        }else{
            Cart::remove($id);
            return back()->with('message','Xóa sản phẩm trong giở hàng thành công');
        }
    }

    public function complete()
    {
        //
    }


}
