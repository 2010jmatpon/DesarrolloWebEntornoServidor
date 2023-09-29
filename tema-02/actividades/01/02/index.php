<!DOCTYPE html>
<html>

<head>
    <title>Actividad 2.1</title>
</head>

<body>
    <?php
    $titulo = "Actividad 2.1 - Juan Maria";
    $parrafo = "El juez que investiga el caso Negreira atribuye ahora, a todos los investigados en la causa, un delito de cohecho.<BR> Eso incluye al FC Barcelona como persona jurídica <BR> y también a dos de sus expresidentes, Sandro Rosell y Josep Maria Bartomeu.";
    ?>

    <h1>
        
        <?php echo $titulo; ?>
        
    </h1>
    <p>
        
        <?php echo $parrafo; ?>
        
    </p>
    <a href="https://elpais.com/deportes/2023-09-28/el-juez-atribuye-ahora-al-barca-un-delito-de-cohecho-por-los-pagos-del-caso-negreira.html">ElPaís</a>
    <?php echo '<img src="images/negreira.jpeg" width="50%" height="50%">';?>
</body>

</html>
