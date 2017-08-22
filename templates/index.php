<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>task8</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
              integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">

    </head>
    <body>

        <div class="container">
            <div class="row" style="margin-top: 5%">
                <form class="form-inline col-md-offset-3" method="post" action="index.php">
                    <div class="form-group">
                        <input type="text" class="form-control" name="curl">
                    </div>
                    <button type="submit" class="btn btn-default">Search</button>
                </form>
            </div>
        </div>
        <?php if (!$exception): ?>
            <?php foreach ($result as $values): ?>

                <div class="list-group">
                    <a href="<?= $values['link'] ?>" class="list-group-item">
                        <h4><?= $values['name'] ?></h4>
                        <p class="list-group-item-text"><?=$values['shortText'] ?></p>
                    </a>
                </div>

            <?php endforeach ?>
        <?php else: ?>
            <?= $exception ?>
        <?php endif ?>
    </body>
</html>
