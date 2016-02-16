<form id="portfolioForm" action="{thisPage}" method="post">
    View portfolio for 
    <select name="portfolioPlayer">
        <option disabled selected> -- Choose a player to view -- </option>
        {players}
        <option value="{Player}">{Player}</option>
        {/players}
    </select>
    <input name="submit" type="submit" value="Go"/>
</form>

