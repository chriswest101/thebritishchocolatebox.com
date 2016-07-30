
<form id="checkoutDetails" action="checkout" method="post">
    {if $stage != "checkout"}
        <h3 class="cartTD">Your Details</h3>
        <table>
            <tr>
                <th>Email Address</th>
                <td class="cartTD"><input type="text" name="email_address" value="" required/></td>
            </tr>
            <tr>
                <th>Password</th>
                <td class="cartTD"><input type="password" name="password" id="password" value="" required/></td>
            </tr>
            <tr>
                <th>Confirm Password</th>
                <td class="cartTD"><input type="password" name="password_confirm" value="" class="confirmPass" /></td>
            </tr>
        </table>
    {/if}
    <h3 class="cartTD">Your Address</h3>
    <table>
        <tr>
            <th>Email Address</th>
            <td class="cartTD"><input type="text" name="email_address" value="" required/></td>
        </tr>
        <tr>
            <th>Your Name</th>
            <td class="cartTD"><input type="text" name="name" value="{if $smarty.session.address.name}{$smarty.session.address.name}{/if}" required/></td>
        </tr>
        <tr>
            <th>Address Line 1</th>
            <td class="cartTD"><input type="text" name="address_1" value="{if $smarty.session.address.address_1}{$smarty.session.address.address_1}{/if}" required/></td>
        </tr>
        <tr>
            <th>Address Line 2</th>
            <td class="cartTD"><input type="text" name="address_2" value="{if $smarty.session.address.address_2}{$smarty.session.address.address_2}{/if}" /></td>
        </tr>
        <tr>
            <th>Town/City</th>
            <td class="cartTD"><input type="text" name="town" value="{if $smarty.session.address.town}{$smarty.session.address.town}{/if}" required/></td>
        </tr>
        <tr>
            <th>{if $smarty.session.location == "USA"}State{else}County{/if}</th>
            <td class="cartTD">
                <select name="state">
                    {foreach from=$states key=key item=state}
                        <option value="{$state.state}" {if $smarty.session.address.county == $state.state}selected=""{/if} >{$state.state}</option>
                    {/foreach}
                </select>
            </td>
        </tr>
        <tr>
            <th>{if $smarty.session.location == "USA"}Zip Code{else}Postcode{/if}</th>
            <td class="cartTD"><input type="text" name="postcode" value="{if $smarty.session.address.postcode}{$smarty.session.address.postcode}{/if}" /></td>
        </tr>
        <tr>
            <th>Country</th>
            <td class="cartTD">
                <select name="country">
                    {foreach from=$countries key=key item=country}
                        <option value="{$country.name}" {if $country.country_code == $smarty.session.location}selected=""{/if}>{$country.name}</option>
                    {/foreach}
                </select>
            </td>
        </tr>
        <tr>
            <th>&nbsp;</th>
            <td class="cartTD alignRight" style="border-bottom:none;"><input type="submit" value="Save Details" name="{if $editAddress}enterEditAddress{else}enterCustDetails{/if}" /></td>
        </tr>
    </table>
</form>