<div >

        <!-- Quantity -->
        <div class="d-flex mb-2 align-items-baseline" style="width:100px">
          <button class="btn px-3 me-2"
          wire:click="update({{$item['id']}} , 1);">
            <i class="fa fa-minus"></i>
          </button>

          <div class="form-outline">
            <input id="form1" min="1" onkeyup="if(value<0) value=0;"  wire:change="update({{$item['id']}} , 0)" wire:model="quantity" value="" type="number" class="form-control" style="min-width: 70px" />
          </div>

          <button class="btn  px-3 ms-2" 
          wire:click="update({{$item['id']}} , 3)">
            <i class="fa fa-plus"></i>
          </button>
        </div>
        <!-- Quantity -->
       
        <!-- Price -->
     
        <!-- Price -->

      <p class="d-inline-flex flex-end align-self-center text-center my-0 mont-font">
        <strong>${{$totalPrice}}</strong>
      </p>
</div>
