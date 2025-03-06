<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rediģēt ierakstu</title>
</head>
<body>
    <h1>Rediģēt ierakstu</h1>
    <form action="/update/<?php echo $post['id']; ?>" method="POST">
        <textarea name="content" rows="4" cols="50"><?php echo htmlspecialchars($post['content']); ?></textarea><br>
        <button type="submit">Saglabāt izmaiņas</button>
    </form>
    <a href="/">Atpakaļ uz visiem ierakstiem</a>
</body>
</html>
