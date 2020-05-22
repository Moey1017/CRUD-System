<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>TeamFight Statics</title>
        <link rel="stylesheet" href="css/main.css">
        <link rel="icon" href="https://www.escharts.com/storage/app/uploads/public/5d2/355/0d1/5d23550d15183441256444.png" type="image/gif" sizes="16x16">
        <script src="js/load_content.js" type="text/javascript"></script>
        <script>
            let cost = 0;
            window.onload = onAllAssetsLoaded();
            function onAllAssetsLoaded() {
                ajaxDisplayUnitPage(); // change here
            }
        </script>

    </head>
    <body>

        <div class="nav_bar">
            <div class="nav_header">Team Fight Tactics</div>
            <ul class="nav_list">
                <li><a href="index.php">All Champion</a></li>
                <li><a href="team_compositions.php">Team compositions</a></li>
                <li><a href="index.php">Download</a></li>
            </ul>
        </div>
        <div class="contents">
            <div id="unit_page"></div>
        </div>
    </body>


</html>
