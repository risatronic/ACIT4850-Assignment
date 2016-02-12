================================================================================
                        Bot Card Trading Centre
================================================================================
ACIT 4850
ACIT 4A

Team Members:
    Doig, Marisa
    Fernandez de Arteaga, Erick

--------------------------------------------------------------------------------
    Work Completed
--------------------------------------------------------------------------------

Doig, Marisa:
    -

Fernandez de Arteaga, Erick:
    - Base controller (/application/controllers/MY_Controller.php)
    - _template view (/application/views/_template.php)
    - logged_in view (/application/views/logged_in.php)
    - logged_out view (/application/views/logged_out.php)
    - Home page controller (/application/controllers/Welcome.php)
    - Home page view (/application/views/welcome.php)
    - Home page status panel (/application/views/welcome_status.php)
    - Home page players panel (/application/views/welcome_players.php)
    - Players model (/application/models/players.php)
    - Series model (/application/models/series.php)
    - Global CSS setup (/assets/css/main.css)

--------------------------------------------------------------------------------
    For Developers
--------------------------------------------------------------------------------

    ----------------------------------------------------------------------------
        Coding Conventions
    ----------------------------------------------------------------------------
    
    - Allman-style braces
    - Tabs for indentation
    - Snake case for variables and methods (except those relating to subviews)
    - CodeIgniter conventions for file naming (except those relating to 
        subviews)
    - {main view name}_{subview name} naming for subviews 
        (e.g., welcome_status.php)
    - Pseudo-variables and methods for creating subviews take the same name as 
        the subview (e.g., {welcome_status}, welcome_status(), etc.)

    ----------------------------------------------------------------------------
        Global Session, State, and Pseudo- Variables to Know
    ----------------------------------------------------------------------------
    
    Session User
        CI Session:             "sessionUser"
        $_POST:                 "sessionUser"
        View Pseudo-Variable:   "sessionUser"

    ----------------------------------------------------------------------------
        Tips & Tricks
    ----------------------------------------------------------------------------

    - You can use the pseudo-variable {thisPage} in any view to fill
        in the URI extension for the current controller (only uses the first 
        segment of the URL, so assumes no subfolders and no parameters). This 
        is handy for forming HTML links.