<body class="loading">
            
		<div id="wrapper">
			<div id="bg"></div>
			<div id="overlay"></div>
			<div id="main">

				<!-- Header -->
					<header id="header">
						<h1><?php echo $nombre; ?></h1>
						<?php include 'globalMenu.php'; ?>
                                                
                                                <div id="container">
                                                    <center>
                                                        <div id="historial">
                                                            <?php include 'include/statsContent.php'; ?>
                                                            <div id="resultadoHistorial"  style="overflow-y:scroll; max-height: 500px; width: 107%; padding-right: 5%;">
                                                                <table>
                                                                <?php include 'functions/statsFunctions.php'; ?>
                                                                </table>
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
		<?php include 'statsScript.php'; ?>
               
                
	</body>