/**
 * Created by Verem on 07/12/15.
 */
$(document).ready(function(){
    initFacebook();
    $('#share-button').on('click', function(){
        console.log('button clicked');
        facebookLogin();
    });
})(JQuery);

function facebookLogin()
{
    FB.login(
        function(){
            FB.api('/me/feed', 'post', {message: 'Hello, World!'});
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