<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Incluir head -->
    <?php include "layouts/head.html" ?>
    <title>Actividad 3.3 Bucles while</title>
</head>

<body>
    <!-- Capa principal -->
    <div class="container">

        <!-- cabecera documento -->
        <header class="pb-3 mb-4 border-bottom">
            <i class="bi bi-bootstrap-reboot"></i>
            <span class="fs-6">Plantilla Bootstrap</span>
        </header>
        <!-- menu -->

        <table class="table table-primary">         
                <tbody>
                    <?php 
                        $i = 1;
                        $j =1;
                        $fila =1;
                    ?>
                    <tr>
                        <?php while ($i<= 100):
                                if ($j == 11):
                                    $j=1; ?>
                                    </tr>
                                    <tr>
                                <?php endif; ?> 
                            <td><?=$i ?>
                            
                        <?php
                            $i++;
                            $j++;
                            
                        endwhile;?>
                    </tr>
                    
                </tbody>
            </table>

        <!-- Pié del documento -->
        <?php include 'views/layouts/footer.html' ?>

    </div>

    <!-- javascript bootstrap 532 -->
    <?php include 'views/layouts/javascript.html' ?>
</body>

</html>