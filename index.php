<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Agile User Story Generator">
    <link rel="shortcut icon" href="/media/book_open.ico">

    <title>Agile User Story Generator - Tell Me a User Story</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/superhero-bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/main.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<head>    
<script>
function showHint(str) {
    document.getElementById("demo").innerHTML = str;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("demo").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("PUT", "getStories.php?q=" + str, true);
        xmlhttp.send();
    }
</script>
</head>

    <body>

<div class="jumbotron">
    <div class="container">
        <h1>Tell Me a User Story</h1>
        <p>Genera una User Story</p>
    </div>
</div>

<div class="container">
    <!-- Example row of columns -->
    <div class="row">
        <div class="col-md-6">
            <div class="well">
            <form class="form-horizontal" id="storyGen" method="post" action="processStory.php">
                <fieldset>

                    <!-- Form Name -->
                    <legend>Agile User Story Generator</legend>
                    
                    <!-- Text input-->
                    <div class="control-group">
                        <div class="controls">
                        <label class="control-label col-lg-2" for="who">Chi</label>
                          <select name="who" id="who" placeholder="End User" class="input-xlarge col-lg-10" required="required" onchange="showHint(this.value)">
                            <option value="Amministratore">Amministratore</option>
                            <option value="Dirigente">Dirigente</option>
                            <option value="Operatore">Operatore</option>
                          </select>                      
                            <p class="help-block col-lg-offset-2">Inserire l'attore <br />Esempio: Amministratore </p>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="control-group">
                        <label class="control-label col-lg-2" for="what">Cosa vuole</label>
                        <div class="controls">
                            <input id="what" name="what" type="text" placeholder="New widget/function" class="input-xlarge col-lg-10" required="required">
                            <p class="help-block col-lg-offset-2">L'azione che desidera fare<br />Example: registrare un utente</p>
                        </div>
                    </div>
                    
                
                    <!-- Text input-->
                    <div class="control-group">
                        <label class="control-label col-lg-2" for="why">Perchè</label>
                        <div class="controls">
                            <input id="why" name="why" type="text" placeholder="Added value" class="input-xlarge col-lg-10" required="required">
                            <p class="help-block col-lg-offset-2">Lo scopo che vuole ottnere <br />Example: Per creare i badge</p>
                            <button id="submit" name="button" class="btn btn-large btn-primary offset2 col-lg-offset-2 col-lg-4">Generate Story</button>
                        </div>
                    </div>



                </fieldset>
            </form>
            </div>
        </div> <!-- end span6 -->

        <div class="col-md-6">
           <!-- Generated story appears here -->
            <div id="storyArticle" style="display: none">
                <p>This was hidden.</p>
            </div>
        </div>
        
        <div class="col-md-6">
           <!-- Generated story appears here -->
            <div id="demo" >
                <p>This was hidden.</p>
            </div>
        </div>
    </div> <!-- end .row -->


    <footer>
        

        
    </footer>
</div> <!-- /container -->




<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script> -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
       var e = document.getElementById("who");
       var strUser = e.options[e.selectedIndex].value;
       showHint(strUser) 
        return false;
    });

    $("button#submit").click(function(){
        console.log('Submitting story.');
        $.ajax({
            type: "POST",
            url: "processStory.php", //generates story
            data: $('form#storyGen').serialize(),
            success: function(msg){

                $('#storyArticle').html(msg);
                $( "#storyArticle").fadeIn( "slow" );
                console.log('This was returned: ' + msg);


            },
            error: function(obj, status){
                $('#storyArticle').html("<p>Sorry, something went wrong. We'll look into this right away!</p>");
                console.log('Something went wrong. ' + status );
            }
        });
        
        return false;
    });
</script>

</body>
</html>