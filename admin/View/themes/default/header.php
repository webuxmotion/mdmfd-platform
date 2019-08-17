<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Админ-панель</title>
    
    <?php Asset::render('css'); ?>

</head>
<body>
    <header>
        <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
            <div class="container">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="#">Admin CMS</a>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav mr-auto">
                        <?php foreach (Customize::getInstance()->getAdminMenuItems() as $key => $item): ?>
                            <li class="nav-item"> 
                                <a class="nav-link" href="<?= $item['urlPath'] ?>">
                                    <i class="<?= $item['classIcon'] ?>"></i>
                                    <?= $lang->dashboardMenu[$key] ?>
                                </a>
                            </li>
                        <?php endforeach; ?> 
                    </ul>
                </div>
                
                <div class="right-toolbar">
                    <a href="/admin/logout/">
                        <i class="icon-logout icons"></i> Logout
                    </a>
                </div>
            </div>
        </nav>
    </header>
