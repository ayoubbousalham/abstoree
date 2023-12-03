<div>
   <div class="container" style="padding:30px 0 ;"></div>
   <div class="col-md-12"  style="padding:30px 0 0 300px;">
       <div class="panel panel default">
           <div class="panel-heading">
               <div class="row">
                   <h1>All Categories</h1>
               </div>
           </div>
           <div class="panel-body">
               <table class="table table striped">
                    <thead>
                         <tr>
                             <th>ID</th>
                             <th>NAME</th>
                             <th>SLUG</th>
                             <th>ACTIONS</th>
                         </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $categorie)
                         <tr>
                             <td>{{$categorie->id}}</td>
                             <td>{{$categorie->name}}</td>
                             <td>{{$categorie->slug}}</td>
                             <td >
                                 <a style="padding-right:10px;" href="{{route('admin.categorie.add')}}"><i class="fa fa-plus-square-o fa-2x"></i></a>
                                 <a style="padding-right:10px;" href="{{route('admin.categorie.Edit',['categorie_slug'=>$categorie->slug])}}"><i class="fa fa-wrench fa-2x"></i></a>
                                 <a style="padding-right:10px;" onclick="confirm('Are You Sure,You Want Delete This Categorie ?') || event.stopImmediatePropagation() " href="" wire:click.prevent="deletecategorie({{$categorie->id}})"><i class="fa fa-trash-o fa-2x text-danger"></i></a>
                             </td>
                             </tr>
                        @endforeach
                    </tbody>
               </table>
               {{$categories->links()}}
           </div>
       </div>
   </div>
</div>
