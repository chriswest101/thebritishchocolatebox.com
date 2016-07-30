{if $smarty.session.checkout.delivery.id && $checkoutStage == "confirm"}
    <div>
        <input type="radio" name="courier" id="courier{$courier.id}" class="radio" value="{$courier.id}" checked="" disabled="" />
        <label for="courier{$courier.id}">{$courier.courier_name} {priceFormat value=$courier.cost currency=$smarty.session.currency class="pricesale"}</label>
    </div>   
{else}
    {foreach from=$couriers key=key item=courier}
        <div>
            <input type="radio" name="courier" id="courier{$courier.id}" class="radio" value="{$courier.id}" onclick="updateDelivery('{$courier.id}')" {if $courier.id == $smarty.session.checkout.delivery.id}checked=""{/if}{if !$smarty.session.checkout.delivery.id && $courier.id == 2}checked=""{/if} />
            <label for="courier{$courier.id}">{$courier.courier_name} {priceFormat value=$courier.cost currency=$smarty.session.currency class="pricesale"}</label>
        </div>
    {/foreach}
{/if}