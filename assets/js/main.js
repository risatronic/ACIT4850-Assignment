/*==============================================================================
 *  MAIN.JS SCRIPT
 *  
 *      Doig, Marisa
 *      Fernandez de Arteaga, Erick
==============================================================================*/

/*------------------------------------------------------------------------------
 *  Functions
------------------------------------------------------------------------------*/

/**
 *  onClick for Log In button.
 */
function loggingIn()
{
    // Reload page with user $_GET parameter set.
    var user = document.getElementById("inputUser").value;
    window.location = "/?user=" + user;
}

/**
 *  onClick for Log Out button.
 */
function loggingOut()
{
    // Reload page with user $_GET parameter set to logout.
    window.location = "/?user=logout";
}