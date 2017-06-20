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
                                            <div id="calendarContainer">
                                            <div id="calendar">

                                            </div>
                                            </div>
                                        </center>
                                    </div>
                            </header>

            </div>
    </div>
    <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
    
    <?php include 'calendarScript.php'; ?>


</body>