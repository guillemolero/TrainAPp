<body class="loading">
    <?php include 'calendarModal.php'; ?>
    <div id="wrapper">
            <div id="bg"></div>
            <div id="overlay"></div>
            <div id="main">

                    <!-- Header -->
                            <header id="header">
                                    <h1><?php echo $nombre; ?></h1>
                                    <?php include 'globalMenu.php'; ?>

                                    <div class="container">
                                        <center>
                                            <div  style="overflow-y: scroll; max-height: 500px; width: 118%; padding-right: 18%">
                                            <div id="calendar">

                                            </div>
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