<div>
    <h4>Your Address</h4>
    <table>
        <tr>
            <td>{$smarty.session.address.name}</td>
        </tr>
        <tr>
            <td>{$smarty.session.address.address_1}</td>
        </tr>
        {if $smarty.session.address.address_2}
            <tr>
                <td>{$smarty.session.address.address_2}</td>
            </tr>
        {/if}
        {if $smarty.session.address.address_3}
            <tr>
                <td>{$smarty.session.address.address_3}</td>
            </tr>
        {/if}
        {if $smarty.session.address.town}
            <tr>
                <td>{$smarty.session.address.town}</td>
            </tr>
        {/if}
        {if $smarty.session.address.county}
            <tr>
                <td>{$smarty.session.address.county}</td>
            </tr>
        {/if}
        {if $smarty.session.address.postcode}
            <tr>
                <td>{$smarty.session.address.postcode}</td>
            </tr>
        {/if}
        {if $smarty.session.address.country}
            <tr>
                <td>{$smarty.session.address.country}</td>
            </tr>
        {/if}
        {if !$checkoutStage}
            <tr>
                <td><form action="checkout.php" method="post"><input type="submit" value="Edit" name="editAddress" /></form></td>
            </tr>
        {/if}
    </table>
</div>