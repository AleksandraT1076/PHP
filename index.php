<?php

session_start();

$user="";

if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit();
}
if (isset($_COOKIE["admin"]))
    {
        $user=$_COOKIE["admin"];
    }
    
    
    ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Instrumenti</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    </head>
    
    <body>
        
    <nav class="navbar navbar-expand-lg navbar-light" id="navCont" style="height: 100px;background-color: #990000;">
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <h6 id="por" style="font-weight: 400;  margin-left:50px; border-radius: 25px; padding: 15px; background: white;"><?= $user;?></h6>
            <div class="navbar-nav p-lg-0" style="margin-left: 65%; padding-top: 3%;">
                <button id="btnDodajForma" type="button"  class="btn btn-success" data-toggle="modal" data-target="#dodajForma">Dodaj instrument</button>
                <button id="btnIzmeniForma" type="button" class="btn btn-success"  data-toggle="modal" data-target="#izmeniForma">Izmeni instrument</button>
                <button id="btnObrisiForma" type="button" class="btn btn-success"  data-toggle="modal" data-target="#obrisiForma">Obrisi instrument</button>
                <br><br>
            </div>
        </div>
    </nav>

    <section class="section" id="pretraga" style="padding-top: 40px">
        <div class="container" style="margin-top: 10px">
            <div class="row">
                <div class="col-lg-4 offset-lg-4 text-center">
                    <div class="section-heading">
                        <div class="row" style="margin-top: 0%;">
                            
                            <img src="assets/css/b.png" style="width: 70%; margin:auto; margin-bottom: 10px;">
                            <label for="pretraziTip">Tip</lbel>
                            <select class="form-control" id="pretraziTip"  style="width:350px" onchange="pretraga()"></select>
                            <label for="pretraziCena">Cena</label>
                            <select class="form-control" id="pretraziCena" onchange="pretraga()">
                                <option value="asc">Rastući poredak</option>
                                <option value="desc">Opadajući poredak</option>
                            </select>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        
        <div class="tab" id="instrumenti" style="padding-top: 10px; width: 75%; margin: auto; text-align: center;"></div>
    </section>


<!-------------------------------------------- DODAJ --------------------------------------------------->
    <div class="modal fade" id="dodajForma" role="dialog">
        <div class="modal-dialog" style="border-radius: 500px !important">
            <div class="modal-content" style="width: 565px;">
                <div class="modal-header" style="background-color:#990000;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="container form">
                        <form action="#" method="post" id="dodajForm">
                            <div class="row" style="color: black;">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        
                                        <label for="dodajModel">Model</label>
                                        <input type="text" id="dodajModel" class="form-control" require>
                                        
                                        <label for="dodajProizvodjac">Proizvodjac</label>
                                        <select name="dodajProizvodjac" id="dodajProizvodjac" style="border: 1px solid black" class="form-control"></select>
                                  
                                        <label for="dodajTip">Tip</label>
                                        <select name="dodajTip" id="dodajTip" style="border: 1px solid black" class="form-control"></select>
                                        
                                        <label for="dodajCena">Cena</label>
                                        <input type="number" id="dodajCena" class="form-control" require>
                                        
                                    </div>
                                </div>
                                <div class="col-md-4" style="width: 90%; margin: auto; margin-top: 10px;">
                                    <br>
                                    <button id="btnDodaj" type="submit" class="btn btn-success btn-block" style="background-color: #990000;" onclick="dodaj()">Dodaj</button>
                                    <br><br>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!------------------ IZMENI -------------------------------->
    <div class="modal fade" id="izmeniForma" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content" style="width: 565px;">
                <div class="modal-header" style="background-color:#990000">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="container form">
                        <form action="#" method="post" id="izmeniForm">
                            <div class="row" style="color: black;">
                                <div class="col-md-12">
                                    <div class="form-group">

                                        <label for="izmeniInstrument">Instrument</label>
                                        <select name="izmeniInstrument" id="izmeniInstrument" style="border: 1px solid black" class="form-control"> </select><br>

                                        <label for="izmeniCena">Cena</label>
                                        <input type="number" class="form-control" id="izmeniCena">

                                    </div>
                                </div>
                                <div class="col-md-4" style="width: 90%; margin: auto; margin-top: 10px">
                                    <br>
                                    <button id="btnIzmeni" type="button" class="btn btn-success btn-block" style="background-color: #990000;" onclick="izmeni()">Izmeni</button>
                                    <br><br>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!----------------------------------- OBRISI -------------------------------------------------------->
    <div class="modal fade" id="obrisiForma" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content" style="width: 565px;">
                <div class="modal-header" style="background-color:#990000">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" >
                    <div class="container form">
                        <form action="#" method="post" id="obrisiForm">
                            <div class="row" style="color: black;">
                                <div class="col-md-12">
                                    <div class="form-group">

                                        <label for="obrisiInstrument">Instrument</label>
                                        <select name="obrisiInstrument" id="obrisiInstrument" style="border: 1px solid black" class="form-control"> </select><br>

                                    </div>
                                    <div class="col-md-4"  style="width: 90%; margin: auto;">

                                        <br>
                                        <button id="btnObrisi" type="button" class="btn btn-success btn-block" style="background-color: #990000;" onclick="obrisi()">Obrisi</button>
                                        <br><br>

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="assets/js/jquery-2.1.0.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
 
 

    <script>
        
        function vratiTipove() {
            $.ajax({
                url: 'vratiTipove.php',
                success: function (data) {
                    $("#dodajTip").html(data);
                }
            })
        }
        
        function vratiProizvodjace() {
            $.ajax({
                url: 'vratiProizvodjace.php',
                success: function (data) {
                    $("#dodajProizvodjac").html(data);
                }
            })
        }

        function vratiInstrumente() {
            $.ajax({
                url: 'vratiInstrumente.php',
                success: function (data) {
                    $("#izmeniInstrument").html(data);
                    $("#obrisiInstrument").html(data);
                }
            })
        }

        function vratiTipovePretraga() {
            $.ajax({
                url: 'vratiTipove.php',
                success: function (data) {
                     let tipovi = "<option value='0'>Svi</option>" + data; 
                    $("#pretraziTip").html(tipovi);
                }
            })
        }

        
        function pretraga() {
            
            let tip = $("#pretraziTip").val();
            let cena = $("#pretraziCena").val();
            
            $.ajax({
                url: 'pretraga.php',
                data: {
                    tip: tip,
                    cena: cena
                },
                success: function (data) {
                    $("#instrumenti").html(data);
                }
            })
        }

        function ucitaj() {
            
            let tip = "0";
            let cena = "asc";
            
            $.ajax({
                url: 'pretraga.php',
                data: {
                    tip: tip,
                    cena: cena
                },
                success: function (data) {
                    $("#instrumenti").html(data);
                }
            })
        }

        ucitaj();
        vratiTipovePretraga();
        vratiProizvodjace();
        vratiTipove();
        vratiInstrumente();
   
   
        
        function dodaj() {
            let model = $("#dodajModel").val();
            let cena = $("#dodajCena").val();
            let proizvodjac = $("#dodajProizvodjac").val();
            let tip = $("#dodajTip").val();
            
            $.ajax({
                url: 'dodaj.php',
                method: 'post',
                data: {
                    model: model,
                    cena: cena,
                    proizvodjac: proizvodjac,
                    tip: tip
                },
                success: function (data) {
                    vratiInstrumente();
                    ucitaj();
                }
            })
        }

        function izmeni() {
            let instrument = $("#izmeniInstrument").val();
            let cena = $("#izmeniCena").val();
            $.ajax({
                url: 'izmeni.php',
                method: 'post',
                data: {
                    instrument: instrument,
                    cena: cena
                },
                success: function (data) {
                    vratiInstrumente();
                    ucitaj();
                }
            })
        }

        function obrisi() {
            let instrument = $("#obrisiInstrument").val();
            $.ajax({
                url: 'obrisi.php',
                method: 'post',
                data: {
                    instrument: instrument
                },
                success: function (data) {
                    vratiInstrumente();
                    ucitaj();
                }
            })
        }





    </script>
  </body>
</html>