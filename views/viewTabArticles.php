<!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<style>
    body {
        color: #404E67;
        background: #F5F7FA;
        font-family: 'Open Sans', sans-serif;
    }

    .table-wrapper {
        width: 700px;
        margin: 30px auto;
        background: #fff;
        padding: 20px;
        box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
    }

    .table-title {
        padding-bottom: 10px;
        margin: 0 0 10px;
    }

    .table-title h2 {
        margin: 6px 0 0;
        font-size: 22px;
    }

    .table-title .add-new {
        float: right;
        height: 30px;
        font-weight: bold;
        font-size: 12px;
        text-shadow: none;
        min-width: 100px;
        border-radius: 50px;
        line-height: 13px;
    }

    .table-title .add-new i {
        margin-right: 4px;
    }

    table.table {
        table-layout: fixed;

    }

    table.table tr th,
    table.table tr td {
        border-color: #e9e9e9;

    }

    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }

    table.table th:last-child {
        width: 100px;
    }

    table.table td a {
        cursor: pointer;
        display: inline-block;
        margin: 0 5px;
        min-width: 24px;
    }

    table.table td a.add {
        color: #27C46B;
    }

    table.table td a.edit {
        color: #FFC107;
    }

    table.table td a.delete {
        color: #E34724;
    }

    table.table td i {
        font-size: 19px;
    }

    table.table td a.add i {
        font-size: 24px;
        margin-right: -1px;
        position: relative;
        top: 3px;
    }

    table.table .form-control {
        height: 32px;
        line-height: 32px;
        box-shadow: none;
        border-radius: 2px;
    }

    table.table .form-control.error {
        border-color: #f50000;
    }

    table.table td .add {
        display: none;
    }
</style>
<div class="container-lg">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8">
                        <h2>Tab <b>Articles</b></h2>
                    </div>
                    <div class="col-sm-4">
                        <a href="post&create" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New </a>
                    </div>
                </div>
            </div>
            <table class="table table-bordered ">
                <thead>
                    <tr align="center">
                        <th>id</th>
                        <th>Titre</th>
                        <th>description</th>
                        <th>Date de création</th>
                        <th>image</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody id="output">
                    <?php
                    foreach ($articles as $article) {


                    ?>
                        <tr align="center">
                            <td><?= $article->id() ?></td>
                            <td><?= $article->titre() ?></td>
                            <td><?= $article->description() ?></td>
                            <td><?= $article->date_de_creation() ?></td>
                            <td><img src=<?= $article->image() ?> alt=<?= $article->titre() . " Image" ?>></td>
                            <td>
                                <form method="post">
                                    <a href="Tab&articles&edit=<?= $article->id()  ?>"> <i class="material-icons" title="Edit">&#xE254; </i></a>
                                    <a href="Tab&articles&delete=<?= $article->id() ?>"> <i class="material-icons" title="Delete">&#xE872; </i></a>
                                </form>
                            </td>
                        </tr>
                    <?php

                    }
                    echo "</tr>";
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</div>