/**
 * Created by Nabeel on 2016-02-02.
 */
!function(a,b,c){"use strict";b(function(){
// vars
var a,c,d=function(b){return function(){
// fetch selected file
c=a.state().get("selection").first().toJSON().url,
// set linked field input new value
b.closest(".acf-input").find(".acf-url input[type=url]").val(c).trigger("change")}};
// media library button clicked
b(".acf-postbox").on("click",".acf-media-library-button",function(c){
// prevent default behavior
c.preventDefault(),
// close frame if open
"undefined"!=typeof a&&a.close(),
// create and open new file frame
a=wp.media({
//Title of media manager frame
title:acf_pro_media_button.i18n.frame_title,button:{
//Button text
text:acf_pro_media_button.i18n.select_button},
// single file selection
multiple:!1}),
// callback for selected file
a.on("select",d(b(this))),
// open file frame
a.open()})})}(window,jQuery);