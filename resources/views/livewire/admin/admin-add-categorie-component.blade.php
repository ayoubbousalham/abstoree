<div>
   <div class="container" style="padding:30px 0;"></div>
   <div class="col-md-12">
       <div class="panel panel">
           <div class="panel-header">
                <div class="row">
                    <div class="col-md-6 ">
                       <h1  style="padding:0 0 20px 200px;">Add New Categorie</h1>
                    </div>  
                    <div class="col-md-2">
                       <a  href="{{route('admin.categories')}}" class="btn btn-success pull-right">All Categories</a>
                     </div>
                   
                </div>
            </div>
            
             
           <div class="panel-body">
               @if(Session::has('$message'))
                  <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
               @endif
               <form class="form-horizontal" wire:submit.prevent="storeCategorie">
                   <div class="form-group">
                       <label class="col-md-4 control-label">Categorie Name</label>
                       <div class="col-md-4">
                           <input type="text" placeholder="Categorie Name" class="form-control input-md" wire:model="name" wire:keyup="generateslug">
                           @error('name') <p class="text-danger">{{$message}}</p> @enderror
                       </div>
                   </div>
                   <div class="form-group">
                       <label class="col-md-4 control-label">Categorie Slug</label>
                       <div class="col-md-4">
                           <input type="text" placeholder="Categorie Name" class="form-control input-md" wire:model="slug">
                           @error('slug') <p class="text-danger">{{$message}}</p> @enderror
                       </div>
                   </div>
                   <div class="form-group">
                       <label class="col-md-4 control-label"></label>
                       <div class="col-md-4">
                           <button type="submit"  class="btn btn-success">submit</button>
                       </div>
                   </div>
               </form>    
           </div>
       </div>
   </div>
</div>
