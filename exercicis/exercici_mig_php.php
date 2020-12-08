<!DOCTYPE html>
<html lang="ca">

<head>
    <!--Required meta tags-->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="author" content="Juan Mallet" />
    <meta name="description" content="Exercici mig PHP, renoi, cada vegada són més difícils! Si us plau Miquel posa'm bona nota" />
    <title>Exercici mig PHP</title>
    <link rel="icon" type="image/x-icon" href="https://images.vexels.com/media/users/3/166470/isolated/preview/73835fa38fba6d35aff9de603dc5044a-icono-de-lenguaje-de-programaci--n-php-by-vexels.png" />
    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
    <!--Font Awesome CDN-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <!--jQuery-->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <!--Estils-->
    <style type="text/css">
        body {
            overflow-x: hidden;
            /* Deshabilitem l'scroll horizontal */
            background-color: #d4d4dc;
        }

        .form-container {
            min-height: 100vh;
            /* Centrem el contingut verticalment */
        }

        #form {
            width: 100%;
            background-color: white;
            padding-top: 20px;
            padding-bottom: 40px;
            margin-left: auto;
            margin-right: auto;
            width: 400px;
            border-radius: 10px;
            /* Ombra */
            -webkit-box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
            box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
        }

        .title {
            border-bottom: 2px solid #d4d4dc;
            margin-bottom: 20px;
        }

        .title h2 {
            padding-left: 70px;
            margin-bottom: 15px;
        }

        /* Inputs text */
        .input-group {
            justify-content: center !important;
        }

        .input-group-text {
            width: 50px;
            padding-top: 3px !important;
            padding-bottom: 3px !important;
        }

        .input-group-text label {
            margin-bottom: 0px;
        }

        .input-group input[type=text] {
            border: 1px solid #ced4da;
            border-radius: 0rem .25rem .25rem 0rem;
            padding-left: 10px;
        }

        /* Desplegable disciplina esportiva */
        .input-group>.custom-select {
            flex: none;
            width: 260px;
            height: 38px;
            font-size: 1rem;
            padding-top: 5px;
            color: #666;
            border-radius: 5px;
        }

        /* Input imatge */
        .image-upload-container {
            height: 100px;
        }

        .image-upload {
            width: 345px;
        }

        #file {
            border: 1px dashed #ddd;
            border-radius: 5px;
            cursor: pointer;
            display: inline-block;
            width: 100%;
            padding: 95px 0 0 100%;
            background-color: #f8f8f9;
        }

        #file::before {
            content: "\f382";
            font-family: "Font Awesome 5 Free";
            position: absolute;
            margin-left: auto;
            margin-right: auto;
            top: 0;
            left: 0;
            right: 0;
            text-align: center;
            font-size: 2em;
            color: #ccc;
        }

        .files:before {
            position: absolute;
            bottom: 35px;
            left: 0;
            width: 100%;
            content: attr(data-before);
            color: #666;
            font-size: 1rem;
            padding: 15px 35px;
            font-weight: 600;
            text-align: center;
        }

        /* Botó submit */
        input[type=submit] {
            width: 260px;
        }

        /* Icones validació formulari */
        .icon {
            position: absolute;
            padding: 10px;
            min-width: 40px;
            left: 74%;
            color: red;
        }

        .correcte {
            color: green;
        }

        .incorrecte {
            color: red;
        }
    </style>
</head>

<body>
    <div class="row h-100 align-items-center form-container">
        <div class="container">
            <form method="POST" action="exercici_mig_php_2.php" id="form" enctype="multipart/form-data">
                <div class="title">
                    <h2>Registra't</h2>
                </div>
                <!-- Nom -->
                <div class="input-group input-group-lg mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <label for="nom"><i class="fas fa-user"></i></label>
                        </span>
                    </div>
                    <i class="fas fa-times icon d-none" id="iconNom"></i>
                    <input type="text" name="nom" placeholder="Nom" id="nom">
                </div>
                <!-- Cognom -->
                <div class="input-group input-group-lg mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <label for="cognom"><i class="fas fa-user-friends"></i></label>
                        </span>
                    </div>
                    <i class="fas fa-times icon d-none" id="iconCognom"></i>
                    <input type="text" name="cognom" placeholder="Cognom" id="cognom">
                </div>
                <!-- Adreça -->
                <div class="input-group input-group-lg mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <label for="address"><i class="fas fa-map-marker-alt"></i></label>
                        </span>
                    </div>
                    <i class="fas fa-times icon d-none" id="iconAddress"></i>
                    <input type="text" name="address" placeholder="Adreça" id="address">
                </div>
                <!-- Telèfon -->
                <div class="input-group input-group-lg mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <label for="telf"><i class="fas fa-phone-alt"></i></label>
                        </span>
                    </div>
                    <i class="fas fa-times icon d-none" id="iconTelf"></i>
                    <input type="text" name="telf" placeholder="Telèfon" id="telf">
                </div>
                <!-- Email -->
                <div class="input-group input-group-lg mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <label for="email"><i class="fas fa-envelope"></i></label>
                        </span>
                    </div>
                    <i class="fas fa-times icon d-none" id="iconEmail"></i>
                    <input type="text" name="email" placeholder="Correu electrònic" id="email">
                </div>
                <!-- Edat -->
                <div class="input-group input-group-lg mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <label for="edat"><i class="far fa-calendar-alt"></i></label>
                        </span>
                    </div>
                    <i class="fas fa-times icon d-none" id="iconEdat"></i>
                    <input type="text" name="edat" placeholder="Edat" id="edat" maxlength="3">
                </div>
                <!-- Disciplina -->
                <div class="input-group input-group-lg mb-3">
                    <select class="browser-default custom-select" name="esport" id="esport">
                        <option value="0" selected>Disciplina esportiva</option>
                        <option value="1">Atletisme</option>
                        <option value="2">Bàsquet</option>
                        <option value="3">Ciclisme</option>
                        <option value="4">Futbol</option>
                        <option value="5">Handbol</option>
                        <option value="6">Natació</option>
                        <option value="7">Piragüisme</option>
                        <option value="8">Rem</option>
                        <option value="9">Rugby</option>
                        <option value="10">Tenis</option>
                    </select>
                </div>
                <!-- Foto -->
                <div class="input-group input-group-lg mb-3 image-upload-container">
                    <div class="row justify-content-center">
                        <div class="col-md-12 col-lg-10 col-12 image-upload">
                            <div class="form-group files"><input id="file" type="file" class="form-control" name="foto" id="foto" /></div>
                        </div>
                    </div>
                </div>
                <!-- Botó sumbit -->
                <div class="input-group input-group-lg mb-3">
                    <input class="btn btn-primary" type="submit" value="Enviar" name="submit" id="submit">
                </div>
            </form>
        </div>
    </div>
    <script language="javascript">
        $(document).ready(function() {
            // Amagar el botó de l'input file però mostrar el text
            $(".files").attr('data-before', "Seleccioneu o arrossegueu el fitxer aquí");
            $('input[type="file"]').change(function(e) {
                var fileName = e.target.files[0].name;
                $(".files").attr('data-before', fileName);
            });

            // Solament poder introduir/escriure números als inputs
            jQuery.fn.ForceNumericOnly = function() {
                return this.each(function() {
                    $(this).keydown(function(e) {
                        var key = e.charCode || e.keyCode || 0;
                        // allow backspace, tab, delete, enter, arrows, numbers and keypad numbers ONLY
                        // home, end, period, and numpad decimal
                        return (
                            key == 8 ||
                            key == 9 ||
                            key == 13 ||
                            key == 46 ||
                            key == 110 ||
                            key == 190 ||
                            (key >= 35 && key <= 40) ||
                            (key >= 48 && key <= 57) ||
                            (key >= 96 && key <= 105)
                        );
                    });
                });
            };
            $("#edat, #telf").ForceNumericOnly();

            // Evitar enviar el formulari si hi han camps buits (tots els camps són obligatoris)
            var nom = $("#nom");
            var cognom = $("#cognom");
            var address = $("#address");
            var telf = $("#telf");
            var email = $("#email");
            var edat = $("#edat");
            var esport = $("#esport");
            var foto = $("#foto");
            //Boolean amb l'atribut false per enviar el formulari

            $("#submit").click(function() {
                var has_errors = false;

                //Comprovació nom
                if (nom.val() == "") {
                    nom.css("border", "1px solid red");
                    $("#iconNom").removeClass("d-none");
                    has_errors = true;
                } else {
                    nom.css("border", "1px solid green");
                    $("#iconNom").removeClass(["d-none", "fa-times", "incorrecte"]);
                    $("#iconNom").addClass(["fa-check", "correcte"]);
                }

                //Comprovació cognom
                if (cognom.val() == "") {
                    cognom.css("border", "1px solid red");
                    $("#iconCognom").removeClass("d-none");
                    has_errors = true;
                } else {
                    cognom.css("border", "1px solid green");
                    $("#iconCognom").removeClass(["d-none", "fa-times", "incorrecte"]);
                    $("#iconCognom").addClass(["fa-check", "correcte"]);
                }

                //Comprovació adreça
                if (address.val() == "") {
                    address.css("border", "1px solid red");
                    $("#iconAddress").removeClass("d-none");
                    has_errors = true;
                } else {
                    address.css("border", "1px solid green");
                    $("#iconAddress").removeClass(["d-none", "fa-times", "incorrecte"]);
                    $("#iconAddress").addClass(["fa-check", "correcte"]);
                }

                //Comprovació telèfon
                if (telf.val() == "") {
                    telf.css("border", "1px solid red");
                    $("#iconTelf").removeClass("d-none");
                    has_errors = true;
                } else {
                    telf.css("border", "1px solid green");
                    $("#iconTelf").removeClass(["d-none", "fa-times", "incorrecte"]);
                    $("#iconTelf").addClass(["fa-check", "correcte"]);
                }

                //Comprovació correu
                if (email.val() == "" || email.val().indexOf("@") == -1) {
                    email.css("border", "1px solid red");
                    $("#iconEmail").removeClass("d-none");
                    has_errors = true;
                } else {
                    email.css("border", "1px solid green");
                    $("#iconEmail").removeClass(["d-none", "fa-times", "incorrecte"]);
                    $("#iconEmail").addClass(["fa-check", "correcte"]);
                }

                //Comprovació edat
                if (edat.val() == "") {
                    edat.css("border", "1px solid red");
                    $("#iconEdat").removeClass("d-none");
                    has_errors = true;
                } else {
                    edat.css("border", "1px solid green");
                    $("#iconEdat").removeClass(["d-none", "fa-times", "incorrecte"]);
                    $("#iconEdat").addClass(["fa-check", "correcte"]);
                }

                //Comprovació disciplina
                if (esport.val() == "0") {
                    esport.css("border", "1px solid red");
                    has_errors = true;
                } else {
                    esport.css("border", "1px solid green");
                }

                //Comprovació foto
                if ($(".files").attr('data-before') == "Seleccioneu o arrossegueu el fitxer aquí") {
                    $("#file").css("border", "1px dashed red");
                } else {
                    $("#file").css("border", "1px dashed green");
                }

                //Comprovació globals per enviar el formulari
                if (has_errors == true) {
                    return false;
                }
            });
        });
    </script>
</body>

</html>