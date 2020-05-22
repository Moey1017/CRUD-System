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
        <script src="js/load_index.js" type="text/javascript"></script>

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
            <div class="board">
                <div class="filter_head">
                    <h3>Filters</h3>
                    <div class="btn_reset" onclick="reset()">Reset</div>
                </div>
                <ul class="cost_board">
                    <li>Cost</li>
                    <li><div><img class="gold-icon" src="https://rerollcdn.com/ui/icon-gold.svg" alt="cost">1</div><div class="options" onclick="setCost(1)"></div></li>
                    <li><div><img class="gold-icon" src="https://rerollcdn.com/ui/icon-gold.svg" alt="cost">2</div><div class="options" onclick="setCost(2)"></div></li>
                    <li><div><img class="gold-icon" src="https://rerollcdn.com/ui/icon-gold.svg" alt="cost">3</div><div class="options" onclick="setCost(3)"></div></li>
                    <li><div><img class="gold-icon" src="https://rerollcdn.com/ui/icon-gold.svg" alt="cost">4</div><div class="options" onclick="setCost(4)"></div></li>
                    <li><div><img class="gold-icon" src="https://rerollcdn.com/ui/icon-gold.svg" alt="cost">5</div><div class="options" onclick="setCost(5)"></div></li>
                </ul>
            </div>
            <div class="champions_rows">
                <div class="champions_rows_header">
                    <h3>TFT Champions - Patch 10.6</h3>
                </div>
                <div id= "units"></div>
            </div>
        </div>
        <script src="js/index.js" type="text/javascript"></script>
    </body>


</html>
