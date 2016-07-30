    <h3 class="cartTD">Already have an account?</h3>
    <form action="checkout" method="post">
        <table>
            {if $wrongDetails}
                <tr>
                    <td colspan="2" class="error" style="text-align:center;">Sorry the username or password was incorrect</td>
                </tr>
            {/if}
            <tr>
                <th>Email Address</th>
                <td class="cartTD" style="border:none;"><input type="text" name="email_address" value=""/></td>
            </tr>
            <tr>
                <th>Password</th>
                <td class="cartTD" style="border:none;"><input type="password" name="password" id="password" value=""/></td>
            </tr>
            <tr>
                <td colspan="2" class="alignRight"><input type="submit" name="signin" value="Sign In"/></td>
            </tr>
        </table>
    </form>