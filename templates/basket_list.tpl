<section id="basketList">
    <table>
        <thead>
            <th>&nbsp;</th>
            <th>Name</th>
            <th>Qty</th>
            {if $stage == "cart"}
                <th>Options</th>
            {/if}
            <th>Total</th>
        </thead>
        {foreach from=$cart key=key item=item}
            <tr>
                <td class="cartTD">
                    <img src="img/products/{$item.image_path}" width="50" />
                </td>
                <td class="cartTD">
                    {$item.name}
                </td>
                <td class="cartTD" {if $stage == "cart"}colspan="2"{/if}>
                    <form class="inlineBlock" action="cart" method="post">
                        {if $stage == "cart"}
                            <input type="number" name="qty" value="{$item.qty}" class="inputQty" min="1" max="15" />
                            
                            <input type="hidden" name="prod_code" value="{$item.prod_code}" />
                            <input type="submit" value="Update" class="smallButton" name="update" />
                        {else}
                            {$item.qty}
                        {/if}
                    </form>
                    {if $stage == "cart"}
                        <form class="inlineBlock" action="cart" method="post">
                            <input type="hidden" name="prod_code" value="{$item.prod_code}" />
                            <input type="submit" value="Remove" class="smallButton" name="remove" />
                        </form>
                    {/if}
                </td>
                <td class="cartTD">
                    {if $item.sale_total != 0.00}
                        {priceFormat value=$item.price_total currency=$smarty.session.currency class="pricestrike"}
                        {priceFormat value=$item.sale_total currency=$smarty.session.currency class="pricesale"}
                    {else}
                        {priceFormat value=$item.price_total currency=$smarty.session.currency}
                    {/if}
                </td>
            </tr>
        {/foreach}
    </table>
</section>