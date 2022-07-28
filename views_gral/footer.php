    <footer>
    
        <!-- NAVEGACIÓN-->
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top">Crud LC Portfolio</a>
                <button class="navbar-toggler text-uppercase font-weight-bold bg-danger text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item mx-0 mx-lg-1">
                            <a class="nav-link py-3 px-0 px-lg-3 rounded" href="../views_admin/index_admin.php">
                                <script src="https://cdn.lordicon.com/xdjxvujz.js"></script>
                                <lord-icon
                                    src="https://cdn.lordicon.com/igpbsrza.json"
                                    trigger="loop"
                                    delay="1000"
                                    colors="primary:#FFFFFF"
                                    style="width:25px;height:25px;">
                                </lord-icon>
                                Ver proyectos
                            </a>
                        </li>
                        <li class="nav-item mx-0 mx-lg-1">
                            <a class="nav-link py-3 px-0 px-lg-3 rounded" href="../views_admin/galeria.php">
                                <script src="https://cdn.lordicon.com/xdjxvujz.js"></script>
                                <lord-icon
                                    src="https://cdn.lordicon.com/stxtcyyo.json"
                                    trigger="loop"
                                    delay="1000"
                                    colors="primary:#FFFFFF"
                                    style="width:25px;height:25px">
                                </lord-icon>
                                Abm
                            </a>
                        </li>
                        <li class="nav-item mx-0 mx-lg-1">
                            <a class="nav-link py-3 px-0 px-lg-3 rounded" href="../connection/cerrar.php">   
                                <script src="https://cdn.lordicon.com/xdjxvujz.js"></script>
                                <lord-icon
                                    src="https://cdn.lordicon.com/dxjqoygy.json"
                                    trigger="loop"
                                    delay="1000"
                                    colors="primary:#ffffff,secondary:#ffffff"
                                    stroke="100"
                                    style="width:27px;height:27px">
                                </lord-icon>
                                Cerrar Sesión de User: <span><?php echo $_SESSION['usuario']; ?></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    </footer>


<!--</div>--><!--cierro el container -->
<!-- Bootstrap Js v5.1.3 -->
<script src="../assets/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/envio.js"></script>
</body>
</html>
