
{if $smarty.session.checkout.discount.id}
    <h3 class="inlineBlock">{$smarty.session.checkout.discount.name}: -{priceFormat value=$smarty.session.checkout.discount.discount_savings currency=$smarty.session.currency class="pricesale"}</h3>
    {if $stage == "checkout"}
        <form action="checkout?removeDiscount" method="post" class="inlineBlock">
            <input type="submit" value="Remove" class="smallButton" />
        </form>
    {/if}
{else}
    {if $notFoundDiscount}
        <h4>Sorry that discount code is not valid or is no longer available</h4>
    {/if}
    {if $stage == "checkout"}
        <form action="checkout" method="post">
            <table>
                <tr>
                    <td class="cartTD alignRight" style="vertical-align: middle;max-width:2.5em;border-bottom: none;">Discount Code</td>
                    <td class="cartTD" style="vertical-align: middle;border-bottom: none;"><input type="text" value="" name="code" size="1" /></td>
                    <td class="cartTD" style="vertical-align: middle;border-bottom: none;"><input type="submit" value="Add" name="discount" class="smallButton"/></td>
                </tr>
            </table>
        </form>
    {/if}
{/if}
