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
    - Assembly CSS (/assets/css/assembly.css)
    - Assembly controller (/application/controllers/Assembly.php)
    - assembly view (/application/views/assembly.php)
    - assembly_anon view for logged out users (/application/views/assembly_anon.php)
    - assembly_heads view fragment (/application/views/assembly_heads.php)
    - assembly_bodies view fragment (/application/views/assembly_bodies.php)
    - assembly_legs view fragment (/application/views/assembly_legs.php)
    - assembly_completed view fragment (/application/views/assembly_completed.php) (doesn't work)
    - completed model (/application/models/completed.php)
    - added a second query to collections model (/application/models/collections.php)

    NB: I tried multiple ways to accomplish bot assembly functionality but was ultimately
        unable to. I spent hours undoing and redoing different parts of my code trying to make
        something work. I have included commented out code so that you can see where I was trying
        to go with it, and that I have, in fact, spent time on it. However, Erick did a lot of work
        and his actually functions so I am hoping that he does not get penalised for my failings. - MD

Fernandez de Arteaga, Erick:
    - Base controller (/application/controllers/MY_Controller.php)
    - _template view (/application/views/_template.php)
    - logged_in view (/application/views/logged_in.php)
    - logged_out view (/application/views/logged_out.php)
    - Base CSS setup (/assets/css/main.css)
    - Welcome controller (/application/controllers/Welcome.php)
    - welcome view (/application/views/welcome.php)
    - welcome_status view fragment (/application/views/welcome_status.php)
    - welcome_players view fragment (/application/views/welcome_players.php)
    - Portfolio controller (/application/controllers/Portfolio.php)
    - portfolio view (/application/views/portfolio.php)
    - portfolio_select view fragment (/application/views/portfolio_select.php)
    - portfolio_activity view fragment (/application/views/portfolio_activity.php)
    - portfolio_holdings view fragment (/application/views/portfolio_holdings.php)
    - Portfolio CSS setup (/assets/css/portfolio.css)
    - Assemble controller (/application/controllers/Assemble.php)
    - assemble view (/application/views/assemble.php)
    - assemble_builder view fragment (/application/views/assemble_builder.php)
    - assemble_preview view fragment (/application/views/assemble_preview.php)
    - assemble_denied view fragment (/application/views/assemble_denied.php)
    - Players model (/application/models/players.php)
    - Series model (/application/models/series.php)
    - Collections model (/application/models/collections.php)
    - Transactions model (/application/models/transactions.php)

--------------------------------------------------------------------------------
    For Developers
--------------------------------------------------------------------------------

    ----------------------------------------------------------------------------
        Coding Conventions
    ----------------------------------------------------------------------------
    
    - Allman-style braces
    - Tabs for indentation
    - lowerCamelCase for variables and methods (except those relating to view 
        fragments)
    - CodeIgniter conventions for file naming (except those relating to 
        view fragments)
    - {main view name}_{view fragment name} (i.e., snake_case) naming for view 
        fragments (e.g., welcome_status.php)
    - Pseudo-variables and methods for creating view fragments take the same 
        name as the view fragment (e.g., {welcome_status}, welcome_status(), 
        etc.)

    ----------------------------------------------------------------------------
        Global Session, State, and Pseudo- Variables to Know
    ----------------------------------------------------------------------------
    
    Session User
        CI Session:             "sessionUser"
        $_POST:                 "sessionUser"
        View Pseudo-Variable:   "sessionUser"

    Link to Current Controller
        View Pseudo-Variable:   "thisPage"