<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Uber Viajes</title>

    <!-- Base URL para rutas absolutas -->
    <base href="<?= BASE_URL ?>">

    <!-- Vincular CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header class="site-header">
    <div class="header-container">
        <h1 class="logo">🚖 Uber <span>Viajes</span></h1>
        <nav class="navbar">
            <a href="<?= BASE_URL ?>home">Inicio</a>
            <a href="<?= BASE_URL ?>agregar">Nuevo viaje</a>
            <a href="<?= BASE_URL ?>listar">Ver viajes</a>
            <a href="<?= BASE_URL ?>conductores">Conductores</a>
            <?php if ((isset($usuario))): ?>
                                    <span class="nav-link">Hola, <?= $usuario->nombre; ?></span>
                                <a class="nav-link" aria-current="page" href="logout">Salir</a>
                            <?php else: ?>
                                <a class="nav-link" aria-current="page" href="login">Ingresar</a>
                            <?php endif; ?>


        </nav>
    </div>
</header>
