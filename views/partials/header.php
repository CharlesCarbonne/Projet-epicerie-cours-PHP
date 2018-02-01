<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.css">

    <title>Hello, world!</title>
</head>
<body>
<div class="container text-center">
    <div class="row">
        <div class="col-md-12">
            <div>
                <!-- Optional JavaScript -->
                <!-- jQuery first, then Popper.js, then Bootstrap JS -->
                <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
                        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
                        crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
                        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
                        crossorigin="anonymous"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
                        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
                        crossorigin="anonymous"></script>


                <nav class="navbar navbar-expand-lg navbar-light bg-light">

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="../index.php">Index</a>
                            </li>


                            <div class="dropdown show">
                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Selection type produit
                                </a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <?php
                                    foreach ($types as $type):
                                    $nomType = $type->getNomType();
                                    ?>
                                        <a class="dropdown-item" href="index.php?type=<?= $nomType ?>"><?= $nomType ?></a>
                                    <?php endforeach; ?>
                                </div>
                            </div>



                            <li class="nav-item">
                                <a class="nav-link" href="../create.php">Create</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../delete.php">Delete</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../update.php">Update</a>
                            </li>


                            <form class="form-inline my-2 my-lg-0" method="POST">
                                <input class="form-control mr-sm-2" type="text" name="search" value="<?php $search ?>"
                                       id="nom" placeholder="Nom d'un Article" aria-label="Search">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                            </form>

                            <li class="nav-item">
                                <a class="nav-link" href="../disconnect.php">Deconnexion</a>
                            </li>

                    </div>
                </nav>

            </div>