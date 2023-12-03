<div>
   <div class="container" style="padding:30px 0 ;"></div>
   <div class="col-md-12"  style="padding:30px 0 0 px;">
       <div class="panel panel default">
           <div class="panel-heading">
               <div class="row">
                   <h1 style="padding-left:80px;" >All Products</h1>
               </div>
           </div>
           <div class="panel-body">
               <table class="table table striped">
                    <thead>
                         <tr>
                             <th>ID</th>
                             <th>NAME</th>
                             <th>IMAGE</th>
                             <th>STOCK</th>
                             <th>PRICE</th>
                             <th>SALE PRICE</th>
                             <th>CATEGORIE</th>
                             <th>DATE CREATED</th>
                             <th>ACTIONS</th>
                         </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                         <tr>
                             <td>{{$product->id}}</td>
                             <td>{{$product->name}}</td>
                             <td><img src="{{asset('assets/images/')}}/{{$product->image}}" width="60"></td>
                             <td>{{$product->stock_status}}</td>
                             <td>{{$product->regular_price}}</td>
                             <td>{{$product->sale_price}}</td>
                             <td>{{$product->categorie->name}}</td>
                             <td>{{$product->created_at}}</td>
                             <td >
                                 <a style="padding-right:10px;" href="{{route('admin.product.add')}}"><i class="fa fa-plus-square-o fa-2x"></i></a>
                                 <a style="padding-right:10px;" href="{{route('admin.product.Edit',['product_slug'=>$product->slug])}}" ><i class="fa fa-wrench fa-2x"></i></a>
                                 <a style="padding-right:10px;" href="" onclick="confirm('Are You Sure,You Want Delete This Categorie ?') || event.stopImmediatePropagation() "  wire:click.prevent="deleteproduct({{$product->id}})" ><i class="fa fa-trash-o fa-2x text-danger"></i></a>
                             </td>
                             </tr>
                        @endforeach
                    </tbody>
               </table>
               {{$products->links()}}
           </div>
       </div>
   </div>
</div>
