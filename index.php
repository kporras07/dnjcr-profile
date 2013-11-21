<?php
require_once 'facebook.php';
$app_id = "175561122634295";
$app_secret = "cfd48ddfd2ce7875e4d0a2c4a87da026";
$facebook = new Facebook(array(
'appId' => $app_id,
'secret' => $app_secret,
'cookie' => true
));
$signed_request = $facebook->getSignedRequest();
$page_id = $signed_request["page"]["id"];
$page_admin = $signed_request["page"]["admin"];
$like_status = $signed_request["page"]["liked"];
$country = $signed_request["user"]["country"];
$locale = $signed_request["user"]["locale"];


//$response = $facebook->api('/me?fields=name');
//$name = $response['name'];
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Inicio</title>
        <link href="css/estilos.css" rel="stylesheet" type="text/css">

    </head>

    <body>

        <script src="js/facebook.js" type="text/javascript"></script>
        <div id="fb-root"></div>


        <!--
        Below we include the Login Button social plugin. This button uses the JavaScript SDK to
        present a graphical Login button that triggers the FB.login() function when clicked.

        Learn more about options for the login button plugin:
        /docs/reference/plugins/login/ -->

        <!--fb:login-button show-faces="true" width="200" max-rows="1"></fb:login-button-->
        <div id="wrapper">
            <div id="header">
                <div id="main-header"></div>
            </div>
            <div id="content">
                <div id="main-content">
                    <div class="form">
                        <div>

                            <div id="nombre-persona">
                                <form id="main-form" action='image.php' method='GET'>
                                    <label for="nombre-input">Nombre:</label>
                                    <input type="text" id="nombre" name="nombre" value="<?php echo $nombre; ?>"/>
                                    <input type="submit" value="Generar Imagen"/>
                                </form>
                            </div>

                        </div>
                        <div id="fb-social">
                            <div id="friends-like">
                                <div class="fb-facepile" data-app-id="Display people who logged into a site using this app" data-href="https://www.facebook.com/DiaNacionalDeLaJuventud" data-action="A comma separated list of actions to show a Facepile for" data-width="The pixel width of the plugin" data-height="The pixel height of the plugin" data-max-rows="1" data-colorscheme="light" data-size="medium" data-show-count="true"></div>
                            </div>
                        </div>
                    </div>

                <div id="footer">
                    <p class="information">Todos los derechos reservados. Puntarenas 2013</p>
                </div>
            </div>
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
            <script src="http://malsup.github.com/jquery.form.js"></script>
            <script type="text/javascript" src="js/jquery.Jcrop.min.js"></script>
            <script type="text/javascript">



                function showCoords(c)
{
    $('#crop').append("<input type='hidden' id='x' name='x' value='"+c.x+"'/>");
    $('#crop').append("<input type='hidden' id='y' name='y' value='"+c.y+"'/>");
    $('#crop').append("<input type='hidden' id='w' name='w' value='"+c.w+"'/>");
    $('#crop').append("<input type='hidden' id='h' name='h' value='"+c.h+"'/>");
    // variables can be accessed here as
    // c.x, c.y, c.x2, c.y2, c.w, c.h
};

$(document).ready(function () 
        {

        var options = {
beforeSend: function()
{
$("#thumb").html("");
},
uploadProgress: function(event, position, total, percentComplete)
{

},
success: function()
{

},
complete: function(response)
{
    console.log(response);
    $("#form").hide();
    $("#thumbs").html("");
    $("#thumbs").html("<img src="+response.responseText+"/>");
    $("#main-form").append("<input type='hidden' id='original' name='original' value='"+response.responseText+"'/><input type='submit' value='Cortar'/>");
    $('#thumbs > img').Jcrop({
onSelect:    showCoords,
bgColor:     'black',
bgOpacity:   .4,
setSelect:   [ 100, 100, 50, 50 ],
aspectRatio: 16 / 9
});
var optionsCrop = {
beforeSend: function()
            {
            },
uploadProgress: function(event, position, total, percentComplete)
                {
                },
success: function()
         {
         },
complete: function(response)
          {
              alert(response.responseText);
              if (response.responseText == 'Correctamente ejecutado') {
                  window.location = 'index.php';
              }

          },
error: function()
       {
       }

};
$("#main-form").ajaxForm(optionsCrop);
},
error: function()
{
    $("#thumb").html("<font color='red'> ERROR: unable to upload files</font>");

}

};



$("#form").ajaxForm(options);


});
</script>
</body>


</html>
