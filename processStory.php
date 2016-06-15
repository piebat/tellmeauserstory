<?php

if (isset($_POST['who'])) {
    $who = strip_tags($_POST['who']);
    $what = strip_tags($_POST['what']);
    $why = strip_tags($_POST['why']);
    $story = strip_tags($_POST['type']);

    $myVars = 'Who: ' . $who . ' What ' . $what . ' Why: ' . $why . ' Story: ' . $story;


    $html = "";

   
        echo "<h2>User Story, basilare</h2>";
        $html .= "Come " . $who . ", voglio " . $what . " così " . $why . ".";
    echo '<h3><span class="label label-success">'.$html.'</span></h3>';

    echo '  <div class="well">
            <form class="form-horizontal" id="storyStore" method="post" action="storeStory.php">
                <fieldset>
            <div class="control-group">
            <div class="controls">
                <button id="save" name="button" class="btn btn-large btn-primary offset2 col-lg-offset-2 col-lg-4">Salva Story</button>
                </div>
                    </div>
                </fieldset>
                </form>
';

}
echo '
<script type="text/javascript">
       
        $("button#save").click(function(){
        console.log("Saving story.");
        $.ajax({
            type: "POST",
            url: "storeStory.php", //generates story
            data: $("form#storyGen").serialize(),
            success: function(msg){
                $("#storyArticle").html(msg);
                $( "#storyArticle").fadeIn( "slow" );
                console.log("This was returned: " + msg);
            },
            error: function(obj, status){
                $("#storyArticle").html("<p>Sorry, something went wrong. We\'ll look into this right away!</p>");
                console.log("Something went wrong. " + status );
            }
        });
        return false;
    });

</script>
    ';
?>