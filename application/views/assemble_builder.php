<form id="assembleBuilder" action="{thisPage}" method="post">
    <h3>Bot Head</h3>
    <br/>
    <select name="assembleHead">
        <option disabled selected> -- Choose a bot head -- </option>
        {assembleHeads}
        <option value="{Token}">{Piece}</option>
        {/assembleHeads}
    </select>
    <br/><br/><br/>
    <h3>Bot Body</h3>
    <br/>
    <select name="assembleBody">
        <option disabled selected> -- Choose a bot body -- </option>
        {assembleBodies}
        <option value="{Token}">{Piece}</option>
        {/assembleBodies}
    </select>
    <br/><br/><br/>
    <h3>Bot Legs</h3>
    <br/>
    <select name="assembleLegs">
        <option disabled selected> -- Choose some bot legs -- </option>
        {assembleLegs}
        <option value="{Token}">{Piece}</option>
        {/assembleLegs}
    </select>
    <br/><br/>
    <input name="submit" type="submit" value="Build"/>
</form>