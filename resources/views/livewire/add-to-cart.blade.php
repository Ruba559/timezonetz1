<div>
    @if ($current == 2)
        <div class="row justify-content-center align-items-baseline">

            <a href="" wire:click.prevent="save()" class="btn bg-gold text-white radius-10 mx-2"><span
                    class="fa fa-shopping-cart"></span>@lang('product.add_to_cart')</a>

            <a href="" class="btn bg-green text-white radius-10 mx-2"><span class="fa fa-whatsapp"></span></a>
            @if ($product->favorites->isNotEmpty())
                @if ($product->favorites[0]->user_id == 1)
                    <a href="" wire:click.prevent="removeFavorite()"
                        class="btn bg-red text-white radius-10 mx-2"><span class="fa fa-heart-o"></span></a>
                @endif
            @else
                <a href="" wire:click.prevent="addToFavorite()"
                    class="btn bg-red text-white radius-10 mx-2"><span class="fa fa-heart"></span></a>
            @endif


        </div>
    @endif

    @if ($current == 1)

    
            <div class="buttons mx-auto row mt-2 text-center justify-content-center align-items-baseline">
                <a href="" wire:click.prevent="save()" class="btn bg-gold text-white px-3 radius-10"><span class="fa fa-shopping-cart mx-1   wire:loading.remove.target="disable" wire:target="save"></span><span wire:loading><span
                            class="fa fa-spinner mx-2"></span></span>@lang('product.add_to_cart')</a>
                    @if ($product->favorites->isNotEmpty() && $product->favorites[0]->user_id == 1)
                <a href=""  wire:click.prevent="removeFavorite()" class="btn bg-black text-gold  radius-10 mx-2"><span class="fa fa-heart "></span></a>

                @else
                <a href=""  wire:click.prevent="addToFavorite()" class="btn bg-black text-gold  radius-10 mx-2"><span class="fa fa-heart-o "></span></a>
                @endif
            </div>

    @endif
</div>
