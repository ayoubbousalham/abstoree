<div>
   <div class="container" style="padding:30px 0;"></div>
   <div class="col-md-12">
       <div class="panel panel">
           <div class="panel-header">
               <div class="row">
                   <div class="col-md-6 ">
                       <h1  style="padding:0 0 20px 300px;">Update Product</h1>
                   </div>
                   <div class="col-md-2">
                       <a href="{{route('admin.products')}}" class="btn btn-success pull-right">All Products</a>
                   </div>
               </div>
                </div>
               
              
           
           <div class="panel-body">
           @if(Session::has('$message'))
                  <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
               @endif
               <form class="form-horizontal" wire:submit.prevent="Updateproduct ">
                   <div class="form-group">
                       <label class="col-md-4 control-label"> Name</label>
                       <div class="col-md-4">
                           <input type="text" placeholder="" class="form-control input-md" wire:model="name" wire:keyup="generateslug">
                           @error('name') <p class="text-danger">{{$message}}</p> @enderror
                       </div>
                   </div>
                   <div class="form-group">
                       <label class="col-md-4 control-label">slug</label>
                       <div class="col-md-4">
                           <input type="text" placeholder="" class="form-control input-md" wire:model="slug" >
                           @error('slug') <p class="text-danger">{{$message}}</p> @enderror
                       </div>
                   </div>
                   <div class="form-group">
                       <label class="col-md-4 control-label">Short Description</label>
                       <div class="col-md-4" wire:ignore>
                           <textarea type="text" placeholder="" id="short_description" class="form-control input-md" wire:model="short_description"></textarea>
                           @error('short_description') <p class="text-danger">{{$message}}</p> @enderror
                       </div>
                   </div>
                   <div class="form-group">
                       <label class="col-md-4 control-label"> Description</label>
                       <div class="col-md-4" wire:ignore>
                           <textarea type="text" placeholder="" id="description" class="form-control input-md" wire:model="description"></textarea>
                           @error('description') <p class="text-danger">{{$message}}</p> @enderror
                       </div>
                   </div>
                   <div class="form-group">
                       <label class="col-md-4 control-label">Regular Price</label>
                       <div class="col-md-4">
                           <input type="number" placeholder="" class="form-control input-md" wire:model="regular_price">
                           @error('regular_price') <p class="text-danger">{{$message}}</p> @enderror
                       </div>
                   </div>
                   <div class="form-group">
                       <label class="col-md-4 control-label">Sale Price</label>
                       <div class="col-md-4">
                           <input type="number" placeholder="" class="form-control input-md" wire:model="sale_price">
                           @error('sale_price') <p class="text-danger">{{$message}}</p> @enderror
                       </div>
                   </div>
                   <div class="form-group">
                       <label class="col-md-4 control-label">SKU</label>
                       <div class="col-md-4">
                           <input type="text" placeholder="" class="form-control input-md" wire:model="SKU">
                           @error('SKU') <p class="text-danger">{{$message}}</p> @enderror
                       </div>
                   </div>
                   <div class="form-group">
                       <label class="col-md-4 control-label">Stock</label>
                       <div class="col-md-4">
                           <select class="form-control" wire:model="stock_status">
                           <option value="">Instock/OutofStock</option>
                           <option value="1">instock</option>
                               <option value="0">Outstock</option>
                              
                               
                           </select>
                           @error('stock_status') <p class="text-danger">{{$message}}</p> @enderror
                       </div>
                   </div>
                   <div class="form-group">
                       <label class="col-md-4 control-label">Featured</label>
                       <div class="col-md-4">
                           <select class="form-control" wire:model="featured">
                           <option value="">Yes/No</option>
                           <option value="1">Yes</option>
                               <option value="0">No</option>
                             
                           </select>
                           @error('featured') <p class="text-danger">{{$message}}</p> @enderror
                       </div>
                   </div>
                   <div class="form-group">
                       <label class="col-md-4 control-label">Quantity</label>
                       <div class="col-md-4">
                           <input type="number" placeholder="" class="form-control input-md" wire:model="quantity" >
                           @error('quantity') <p class="text-danger">{{$message}}</p> @enderror
                       </div>
                   </div>
                   <div class="form-group">
                       <label class="col-md-4 control-label">Image</label>
                       <div class="col-md-4">
                           <input type="file" placeholder="" class=" input-file" wire:model="image">
                           @error('image') <p class="text-danger">{{$message}}</p> @enderror
                         
                       </div>
                   </div>
                   <div class="form-group">
                       <label class="col-md-4 control-label">Categorie</label>
                       <div class="col-md-4">
                          <select class="" wire:model="category_id">
                               <option value="Instock">select Categorie</option>
                               @foreach($categorie as $categorie)
                               <option value="{{$categorie->id}}">{{$categorie->name}}</option>
                               @endforeach
                           </select>
                           @error('category_id') <p class="text-danger">{{$message}}</p> @enderror
                        </div>
                   </div>
                   <div class="form-group">
                       <label class="col-md-4 control-label"></label>
                       <div class="col-md-4">
                           <button type="submit"  class="btn btn-success">Update</button>
                       </div>
                   </div>
               </form>    
           </div>
       </div>
   </div>
</div>
@push('scripts')
<script>
    $(function () {
        tinymce.init({
          selector: '#short_description',
    setup:function(editor) {
        editor.on('change',function(e){
            tinyMCE.triggerSave();
            var sd_data = $('#short_description').val();
            @this.set('short_description',sd_data);
        });
        }
        });
        tinymce.init({
          selector: '#description',
    setup:function(editor) {
        editor.on('change',function(e){
            tinyMCE.triggerSave();
            var d_data = $('#description').val();
            @this.set('description',d_data);
        });
        }
        
        
        });
    });

</script>

@endpush

