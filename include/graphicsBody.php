<body class="loading">
    <div id="wrapper">
            <div id="bg"></div>
            <div id="overlay"></div>
            <div id="main">

                    <!-- Header -->
                            <header id="header">
                                    <h1><?php echo $nombre; ?></h1>
                                    <?php include 'globalMenu.php' ?>

                                    <div class="container">
                                        <center>
                                            <div id="graphicsContainer" >
                                            <div id="graficos">
                                                <?php include 'include/graphicsContent.php'; ?>
                                            </div>
                                            </div>
                                        </center>
                                    </div>
                            </header>
            </div>
    </div>
    <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
    
    <?php include 'graphicsScript.php'; ?>


</body>