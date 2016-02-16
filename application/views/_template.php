<!DOCTYPE html>
<!--============================================================================
    _TEMPLATE VIEW
	
        Doig, Marisa
        Erick Fernandez de Arteaga
=============================================================================-->
<html lang="en">

<!--============================================================================
	Head
=============================================================================-->
<head>
    <title>{pagetitle}</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
    <!-- CSS -->
    <link rel="stylesheet" href="/assets/css/main.css"/>
    <link rel="stylesheet" href="/assets/css/portfolio.css"/>
</head>

<!--============================================================================
	Body
=============================================================================-->
<body>

<!--============================================================================
	Header
=============================================================================-->
    <header>
        <h1 id="title">{pagetitle}</h1>
        <h2 id="subtitle" class="oblique">{pagesubtitle}</h2>
    </header>
	
<!--============================================================================
	Navigation Bar
=============================================================================-->
    <div id='nav'>
        {menubar}
    </div>

<!--============================================================================
	Login
=============================================================================-->
    <div id='login'>
        {login}
    </div>
    <hr/>
<!--============================================================================
	Main
=============================================================================-->
    <section id="main">
	{content}
    </section>

<!--============================================================================
	Footer
=============================================================================-->
    <footer>
        <hr>
        <p id="copyright">&copy; Marisa Doig, Erick Fernandez de Arteaga; 
            <script type="text/javascript">
                document.write(new Date().getFullYear());
            </script>
        </p>
    </footer>

<!--=========================================================================-->
</body>
</html>