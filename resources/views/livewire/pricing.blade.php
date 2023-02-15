<div>
<input type="text"  wire:change="update"  wire:model="price" value="{{$item->price}}" readonly="true"  ondblclick="this.readOnly=''" style="border: none;"/>
<input type="text"  wire:change="update"  wire:model="offer" value="{{$item->offer}}" readonly="true"  ondblclick="this.readOnly=''" style="border: none;"/>

</div>
