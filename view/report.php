<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../asset/report.css">
    <script src="https://kit.fontawesome.com/03a89292db.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <h2>Dashboard</h2>

        <div>
            <a href="../controller/AuthController.php?action=logout">Cerrar sesión</a>
        </div>
        
        <!-- Filter -->
        <form method="GET" action="">
        <?php
            $year = isset($year) ? $year : ''; // Valor predeterminado
        ?>
            <input type="text" name="YEAR" placeholder="Filtrar por anio" value="<?php echo htmlspecialchars($year); ?>">
            <button type="submit">Buscar</button>
        </form>

        <!-- Table -->
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>anio</th>
                    <th>name</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($results) && is_array($results) && count($results) > 0): ?>
                    <?php foreach ($results as $result): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($result['ID']); ?></td>
                            <td><?php echo htmlspecialchars($result['NAME']); ?></td>
                            <td><?php echo htmlspecialchars($result['DATE']); ?></td>
                            <td><?php echo htmlspecialchars($result['category']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4">No se encontraron resultados.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <!-- Pag -->
        <div class="pagination">
            <?php if (isset($page) && $page > 1): ?>
                <a href="?page=<?php echo $page - 1; ?>&year=<?php echo urlencode($year); ?>">Anterior</a>
            <?php endif; ?>

            <?php if (isset($totalPages)  && $totalPages > 0): ?>
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <a href="?page=<?php echo $i; ?>&year=<?php echo urlencode($year); ?>" class="<?php echo ($i === $page) ? 'active' : ''; ?>">
                    <?php echo $i; ?>
                </a>
            <?php endfor; ?>

            <?php if (isset($page) && $page < $totalPages): ?>
                <a href="?page=<?php echo $page + 1; ?>&year=<?php echo urlencode($year); ?>">Siguiente</a>
            <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
