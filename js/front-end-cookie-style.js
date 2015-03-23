/**
 * Created by admin on 19/02/15.
 */


jQuery(function($){
    var bcnBgColor = cookieCustomStyle.bcn_background_color;
    var bcnTextColor = cookieCustomStyle.bcn_text_color ;
    var bcnTextFontsize = cookieCustomStyle.bcn_text_fontsize ;
    var bcnAcceptTextbgColor = cookieCustomStyle.bcn_acceptText_bg_color ;
    var bcnAcceptTextColor = cookieCustomStyle.bcn_acceptText_color ;
    var bcnAcceptTextHoverBgColor = cookieCustomStyle.bcn_acceptText_hover_bg_color ;
    var bcnAcceptTextHoverColor = cookieCustomStyle.bcn_acceptText_hover_color ;
    var bcnDeclineTextbgColor = cookieCustomStyle.bcn_declineText_bg_color ;
    var bcnDeclineTextColor = cookieCustomStyle.bcn_declineText_color ;
    var bcnDeclineTextHoverBgColor = cookieCustomStyle.bcn_declineText_hover_bg_color ;
    var bcnDeclineTextHoverColor = cookieCustomStyle.bcn_declineText_hover_color ;
    var bcnpolicyButtonBgColor = cookieCustomStyle.bcn_policyButton_bg_color ;
    var bcnpolicyButtonColor = cookieCustomStyle.bcn_policyButton_color ;
    var bcnpolicyButtonHoverBgColor = cookieCustomStyle.bcn_policyButton_hover_bg_color ;
    var bcnpolicyButtonHoverColor = cookieCustomStyle.bcn_policyButton_hover_color ;

        if(cookieCustomStyle.bcn_border_radius == 'false'){
            var bcnBorderRadius = '#cookie-bar a {border-radius:0px;}';
        }
        else{
            var bcnBorderRadius = '';
        }

    $('head').append("<style>#cookie-bar { background-color:" + bcnBgColor + "; color:" + bcnTextColor + ";font-size:"+ bcnTextFontsize +"} #cookie-bar .cb-enable{color:" + bcnAcceptTextColor + ";background-color:"+ bcnAcceptTextbgColor +"}#cookie-bar .cb-enable:hover{color:" + bcnAcceptTextHoverColor + ";background-color:"+ bcnAcceptTextHoverBgColor +"} #cookie-bar .cb-disable{color:" + bcnDeclineTextColor + ";background-color:"+ bcnDeclineTextbgColor +"} #cookie-bar .cb-disable:hover{color:" + bcnDeclineTextHoverColor + ";background-color:"+ bcnDeclineTextHoverBgColor +"} #cookie-bar .cb-policy{color:"+ bcnpolicyButtonColor +";background:"+ bcnpolicyButtonBgColor +"}#cookie-bar .cb-policy:hover{color:"+ bcnpolicyButtonHoverColor +";background:"+ bcnpolicyButtonHoverBgColor+"}"+ bcnBorderRadius +"</style>");


});

