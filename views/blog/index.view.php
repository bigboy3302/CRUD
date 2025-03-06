<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visi bloga ieraksti</title>
</head>
<body>
    <h1>Visi bloga ieraksti</h1>

    <!-- Poga jauna ieraksta pievienošanai -->
    <a href="/create">Pievienot jaunu ierakstu</a>

    <ul>
    <?php foreach ($posts as $post): ?>
        <li>
            <p><?php echo htmlspecialchars($post['content']); ?></p>
            
            <!-- Skatīt ierakstu -->
            <a href="/show/<?php echo $post['id']; ?>">Skatīt</a>
            
            <!-- Rediģēt ierakstu -->
            <a href="/edit/<?php echo $post['id']; ?>">Rediģēt</a>

            <!-- Dzēst ierakstu ar formu -->
            <form action="/destroy" method="POST" style="display:inline;">
                <!-- Hidden lauks ar id -->
                <input type="hidden" name="id" value="<?php echo $post['id']; ?>" />
                <button type="submit" onclick="return confirm('Vai tiešām vēlaties dzēst šo ierakstu?');" style="background-color: red; color: white; border: none; padding: 5px 10px; cursor: pointer;">
                    Dzēst
                </button>
            </form>
        </li>
    <?php endforeach; ?>
    </ul>

</body>
</html>
