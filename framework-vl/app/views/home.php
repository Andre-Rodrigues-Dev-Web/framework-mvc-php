<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--SEO-->
        <title>- Blog Notícias</title>
    </head>
    <body>
        <section>
            <?php includeView('menu'); ?>
            <main>
                <div class="noticias">
                    <?php foreach ($noticias as $noticia): ?>
                        <div class="noticia">
                            <h2><?php echo $noticia['titulo']; ?></h2>
                            <p><?php echo $noticia['conteudo']; ?></p>
                            <p>Publicado por: <?php echo $noticia['autor']; ?></p>
                            <p>Data de Publicação: <?php echo $noticia['data']; ?></p>
                            <hr>
                        </div>
                    <?php endforeach; ?>
                </div>
            </main>
        </section>
    </body>
</html>
