/**
 * Created by Verem on 07/12/15.
 */
$(document).ready(function(){
    initFacebook();
    $('#share-button').on('click', function(){
        console.log('button clicked');
        var message = $('#message-filed').val();
        var image = $('#image-field').val();
        var username = $('#name').val();

        facebookLogin(image, message);
    });
})(JQuery);

function facebookLogin(image, message)
{
    var wallPost = {
        message: message,
        picture: image
    };

    FB.login(
        function(){
            FB.api('/me/feed', 'post', wallPost, function(response){
                if (response && !response.error) {
                    //send details to back end
                }
            });
        },
        {
            scope: 'publish_actions'
        }
    );

}


function initFacebook()
{
    window.fbAsyncInit = function() {
        FB.init({
            appId      : '899894580046709',
            xfbml      : true,
            version    : 'v2.5'
        });
    };

    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
}