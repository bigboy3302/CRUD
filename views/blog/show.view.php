<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bloga ieraksts</title>
</head>
<body>
    <h1>Bloga ieraksts</h1>
    <!-- Ja $post ir objekts, tad izmanto $post->content, ja tas ir masīvs, tad $post['content'] -->
    <p><?php echo htmlspecialchars($post['content'] ?? $post->content); ?></p> <!-- Pārbaudīt gan masīvu, gan objektu -->
    
    <a href="/edit/<?php echo $post['id'] ?? $post->id; ?>">Rediģēt</a>  <!-- Pārliecinies par pareizo piekļuvi ID -->
    <a href="/destroy/<?php echo $post['id'] ?? $post->id; ?>">Dzēst</a>  <!-- Pārliecinies par pareizo piekļuvi ID -->
    <a href="/">Atpakaļ uz visiem ierakstiem</a>
</body>
</html>
