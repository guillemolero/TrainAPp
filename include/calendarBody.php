<body class="loading">
    <?php include 'calendarModal.php'; ?>
    <div id="wrapper">
            <div id="bg"></div>
            <div id="overlay"></div>
            <div id="main">

                    <!-- Header -->
                            <header id="header">
                                    <h1><?php echo $nombre; ?></h1>
                                    <nav>
                                            <ul>
                                                    <li><a href="calendar.php" class="icon fa-calendar"><span class="label">Calendario</span></a></li>
                                                    <li><a href="#" class="icon fa-area-chart"><span class="label">Gráficos</span></a></li>
                                                    <li><a href="#" class="icon fa-line-chart"><span class="label">Estadísticas</span></a></li>
                                                    <li><a href="functions/logout.php" class="icon fa-power-off"><span class="label">Cerrar sesión</span></a></li>
                                            </ul>
                                    </nav>

                                    <div class="container">
                                        <center>
                                        <div id="calendar">

                                        </div>
                                            </center>
                                    </div>
                            </header>


                    <!-- Footer -->
                            <footer id="footer">
                                    <span class="copyright">&copy; Untitled. Design: <a href="http://html5up.net">HTML5 UP</a>.</span>
                            </footer>

            </div>
    </div>
    <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
    
    <?php include 'calendarScript.php'; ?>


</body>