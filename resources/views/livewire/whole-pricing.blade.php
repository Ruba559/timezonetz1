<div>
<form wire:submit.prevent="updateAllProducts" class="form-inline" >
       
       <div class="form-group">
         <label for="inputPassword2" class="sr-only">التسعيرالشامل</label>
         <input type="text" wire:model="whole_pricing" class="form-control" id="inputPassword2" placeholder="Enter the price in percent" >
       </div>  
    
       <button type="submit" class="btn btn-primary mb-2" ><span wire:loading wire:target="updateAllProducts">Processing</span>
       <span wire:loading.remove wire:target="updateAllProducts">update</span></button>
     </form>
  
   

  
   <table class="table table-sm align-middle mb-0 bg-white">
       <thead class="bg-light">
         <tr>
           <th >Name</th>
           <th >Price &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; Offer</th>
         </tr>
       </thead>
       <tbody>
           @foreach ($products as $item)
           <tr>
              
           <td>{{$item->name}}</td>
          
           <td>@livewire('pricing', ['item'=>$item] , key($item->id))</td>
    
           
         
           </tr>
           @endforeach
          
       </tbody>
     </table>
  
</div>
