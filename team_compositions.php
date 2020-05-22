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
        <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
        <script src="js/load_compositions.js" type="text/javascript"></script>
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
                    <li>Tier</li>
                    <li><div>S</div><div class="options" onclick="setTier('S')"></div></li>
                    <li><div>A</div><div class="options" onclick="setTier('A')"></div></li>
                    <li><div>B</div><div class="options" onclick="setTier('B')"></div></li>
                    <li><div>C</div><div class="options" onclick="setTier('C')"></div></li>
                    <li><div>D</div><div class="options" onclick="setTier('D')"><div></li>
                                </ul>
                            </div>
                            <div class="champions_rows">
                                <div class="champions_rows_header">
                                    <h3>TFT Compositions - Max 8 Champions Per Team</h3><div onclick="deleteMode()" class="btn_delete" id="btn_delete"><p>Delete Mode</p></div>
                                </div>
                                <div id= "comps"></div>
                                <div class="create_comp">
                                    <a class="button" href="#popup1"><h2>Create new Composition/Add champion</h2></a>
                                    <div id="popup1" class="overlay">
                                        <div class="popup">
                                            <h2>Create new Composition/Add champion</h2>
                                            <a class="close" href="#">&times;</a>
                                            <div class="container">

                                                <div class="hidden_header">
                                                    <div class="login-button-container clearfix">

                                                        <div class="col-xs-6 create_header">
                                                            <button class="btn create__button active">
                                                                Create new Composition      
                                                            </button>
                                                        </div>

                                                        <div class="col-xs-6 create_header">
                                                            <button class="btn add__button">
                                                                Add Champion        
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="">
                                                    <div class="row login__form">
                                                        <form id="comp_form" action="php/insert_composition_transaction.php" method="post" accept-charset="UTF-8">
                                                            <div>
                                                                <fieldset class="form__fieldset required form__login">
                                                                    <legend class="form__legend--subtitle">Create new Composition</legend>

                                                                    <div class="form__field__wrapper form-item"> <label for="edit-email" class="text-input__label">Composition Name</label>
                                                                        <input class="form-control form-text required text-input__field" required type="text" id="edit-name" name="comp_name" autocomplete="off">
                                                                    </div>
                                                                    <div class="form__field__wrapper form-item"> <label for="edit-password" class="text-input__label" autofocus>Composition Tier</label>
                                                                        <div class="comp-select">
                                                                            <select id="comp_tier_option" name="comp_tier" form="comp_form">      
                                                                                <option value="S">SELECT TIER</option>
                                                                                <option value="S">S</option>
                                                                                <option value="A">A</option>
                                                                                <option value="B">B</option>
                                                                                <option value="C">C</option>
                                                                                <option value="D">D</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </fieldset>
                                                                <button id="submit_btn" class="inpt-btn btn btn-primary form-submit js-registerSubmit" type="submit" id="edit-submit" value="Add Composition">Add</button>
                                                            </div>
                                                        </form>
                                                    </div>

                                                    <div class="row register__form">
                                                        <div id="registration-form-wrapper">
                                                            <form id="champ_form" action="php/insert_unit_to_composition_transaction.php" method="post" accept-charset="UTF-8">
                                                                <div>
                                                                    <div class="form__register">
                                                                        <div class="clearfix"></div>
                                                                        <div class="divide-width">
                                                                            <div class="middle-bottom-inner-left">
                                                                                <div class="form__field__wrapper form-item"> <label for="edit-firstname" class="text-input__label">Compositions</label>
                                                                                    <select id="comps_name_options" name="comp_id" form="champ_form" onchange="ajaxGetUnitOptions(this.value)"></select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="divide-width divide-mrgn">
                                                                                <div class="middle-bottom-inner-left">
                                                                                    <div class="form__field__wrapper form-item"> <label for="edit-lastname" class="input__label">Champions</label>
                                                                                        <div id="champsform_comp_options"></div>
                                                                                        <select id="champs_name_options" name="unit_id" form="champ_form"></select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <button id="submit_btn" class="inpt-btn btn btn-primary form-submit js-registerSubmit" type="submit" id="edit-submit--2" name="op" value="Register">Add</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script src="js/team_compositions.js" type="text/javascript"></script>
                        </body>
                        </html>
