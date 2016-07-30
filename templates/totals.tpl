
<table>
    {if $smarty.session.checkout.totals.savings_total != $smarty.session.checkout.totals.gross_total}
        <tr>       
            <th colspan="10" class="alignRight"><h4>Discount</h4></th>
            <td colspan="1" class="cartTD" style="max-width: 6em;">-{priceFormat value=$smarty.session.checkout.totals.savings_total currency=$smarty.session.currency class="pricesale"}</td>
        </tr>
    {/if}
    <tr>
        <th colspan="10" class="alignRight"><h4>Delivery</h4></th>
        <td colspan="1" class="cartTD" style="max-width: 6em;">{priceFormat value=$smarty.session.checkout.totals.delivery currency=$smarty.session.currency}</td>
    </tr>
    <tr>
        <th colspan="10" class="alignRight"><h4>VAT</h4></th>
        <td colspan="1" class="cartTD" style="max-width: 6em;">{priceFormat value=$smarty.session.checkout.totals.order_vat currency=$smarty.session.currency}</td>
    </tr>
    <tr>
        <th colspan="10" class="alignRight"><h4>Total</h4></th>
        <td colspan="1" class="cartTD" style="max-width: 6em;">{priceFormat value=$smarty.session.checkout.totals.gross_total currency=$smarty.session.currency}</td>
    </tr>
</table>