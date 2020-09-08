(function($){var settings={carousels:{speed:4,fadeIn:true,fadeDelay:250},};skel.breakpoints({wide:'(max-width: 1680px)',normal:'(max-width: 1280px)',narrow:'(max-width: 960px)',narrower:'(max-width: 840px)',mobile:'(max-width: 736px)'});$(function(){if($('[name="gw_quantity"]')){$('[name="gw_quantity"]').keyup(function(){if($('[name="gw_quantity"]').val()!=''&&$('[name="gw_quantity"]').val()>0)
LoadEncryptedString();});}
var loadingDiv='<div id="loadingDiv">'+
'<img src="/styles/default/loading_GD3.gif" /><br>'+
'<o5>Slow connection? <a href="">Click here to reload</a></o5>'+
'</div></span>';var $loading=$('#loadingDiv').hide();$(document).ajaxStart(function(){$('#loadingDiv').html(loadingDiv);$loading.show();}).ajaxStop(function(){$loading.hide();});var $window=$(window),$body=$('body');$body.addClass('is-loading');$window.on('load',function(){$body.removeClass('is-loading');});if(skel.vars.IEVersion<9)
$(':last-child').addClass('last-child');$('form').placeholder();skel.on('+mobile -mobile',function(){$.prioritize('.important\\28 mobile\\29',skel.breakpoint('mobile').active);});$('#nav > ul').dropotron({mode:'fade',speed:350,noOpenerFade:true,alignment:'center'});$('.scrolly').scrolly();$('<div id="navButton">'+
'<a href="#navPanel" class="toggle"></a>'+
'</div>').appendTo($body);$('<div id="navPanel">'+
'<nav>'+
$('#nav').navList()+
'</nav>'+
'</div>').appendTo($body).panel({delay:500,hideOnClick:true,hideOnSwipe:true,resetScroll:true,resetForms:true,target:$body,visibleClass:'navPanel-visible'});if(skel.vars.os=='wp'&&skel.vars.osVersion<10)
$('#navButton, #navPanel, #page-wrapper').css('transition','none');$('.carousel').each(function(){var $t=$(this),$forward=$('<span class="forward"></span>'),$backward=$('<span class="backward"></span>'),$reel=$t.children('.reel'),$items=$reel.children('article');var pos=0,leftLimit,rightLimit,itemWidth,reelWidth,timerId;if(settings.carousels.fadeIn){$items.addClass('loading');$t.onVisible(function(){var timerId,limit=$items.length-Math.ceil($window.width()/itemWidth);timerId=window.setInterval(function(){var x=$items.filter('.loading'),xf=x.first();if(x.length<=limit){window.clearInterval(timerId);$items.removeClass('loading');return;}
if(skel.vars.IEVersion<10){xf.fadeTo(750,1.0);window.setTimeout(function(){xf.removeClass('loading');},50);}
else
xf.removeClass('loading');},settings.carousels.fadeDelay);},50);}
$t._update=function(){pos=0;rightLimit=(-1*reelWidth)+$window.width();leftLimit=0;$t._updatePos();};if(skel.vars.IEVersion<9)
$t._updatePos=function(){$reel.css('left',pos);};else
$t._updatePos=function(){$reel.css('transform','translate('+pos+'px, 0)');};$forward.appendTo($t).hide().mouseenter(function(e){timerId=window.setInterval(function(){pos-=settings.carousels.speed;if(pos<=rightLimit)
{window.clearInterval(timerId);pos=rightLimit;}
$t._updatePos();},10);}).mouseleave(function(e){window.clearInterval(timerId);});$backward.appendTo($t).hide().mouseenter(function(e){timerId=window.setInterval(function(){pos+=settings.carousels.speed;if(pos>=leftLimit){window.clearInterval(timerId);pos=leftLimit;}
$t._updatePos();},10);}).mouseleave(function(e){window.clearInterval(timerId);});$window.load(function(){reelWidth=$reel[0].scrollWidth;skel.on('change',function(){if(skel.vars.mobile){$reel.css('overflow-y','hidden').css('overflow-x','scroll').scrollLeft(0);$forward.hide();$backward.hide();}
else{$reel.css('overflow','visible').scrollLeft(0);$forward.show();$backward.show();}
$t._update();});$window.resize(function(){reelWidth=$reel[0].scrollWidth;$t._update();}).trigger('resize');});});});})(jQuery);function notificate(text,color){$('#notification_box').css('border-color',color);$('#notification_box').css('z-index',999999);$('#notification_box').html('<span style="color: '+color+'">'+text+'</span>');$('#notification_box').fadeIn().delay(5000).fadeOut();$('#ajax_notification').html(text);$('#ajax_notification').css('z-index',999999);$('#ajax_notification').removeClass('notification_green notification_red');$('#ajax_notification').addClass('notification_'+color);$('#ajax_notification').fadeIn().delay(5000).fadeOut();}
function switchTransmog(bool){if(bool=='off')
if(!confirm('Warning!'+"\n"+'Disabling Transmogrification will delete all your current progress'+"\n"+'and modifications of it on your characters belonging to this account'))
return false;$.get(''+bool,function(data){if(data=='ok'){string='You ';if(bool=='off')
string=string+'de';string=string+'activated transmogrification succesfully';notificate(string,'green');setTimeout(function(){window.location.reload();},1000);}else{notificate(data,'red');}});return false}
function LoadEncryptedString(){$.ajax('',{type:"POST",data:$('#gwform').serialize(),beforeSend:function(){$('#GWButton').prop('disabled',true);$('#GWButton').attr('onClick','return false;');$('#GWButton').css('cursor','default');},success:function(e){if(e.charAt(0)=='X'){$('[name="gw_quantity"]').val('');$('[name="b"]').val('0');$('#dp_amount').html('0');notificate('There was an issue with your request, make sure you filled all the fields and you are NOT using special characters','red');}else{$('#GWButton').prop('disabled',false);$('[name="b"]').val(e);$('#GWButton').attr('onClick','return true;');$('#GWButton').css('cursor','pointer');$('#dp_amount').html($('[name="gw_quantity"]').val());}}});return false;}
function updateRef(){var ref=$('#referred').val();if(ref!='')
{$.post('',{raf:'',friend:ref},function(e){if(e=='ok'){notificate('You successfully linked your friend\'s account!','green');setTimeout(function(){window.location.reload();},5000);}else
notificate(e,'red');});}else{if(confirm('You are gonna unlink your account')){$.post('',{unlink:''},function(e){if(e=='ok'){notificate('You successfully unlinked your account!','green');setTimeout(function(){window.location.reload();},5000);}else
notificate(e,'red');});}}
return false;}
function SwapCharacters(active){if(active){$('#deletedChars').hide();$('#activeChars').show();}else{$('#activeChars').hide();$('#deletedChars').show();}
return false;}
function unstuck(name){$.post('',{unstuck:name,realmid:iRealmid,},function(data){if(data=='ok')
notificate('You have successfully unstuck your character','green');else
notificate(data,'red');});return false;}
function registeraccount(){$('#submitRegistration').hide();var registrationData=$('form').serialize();$('#passwd_register').val('');$.post('',registrationData,function(data){if(data=='ok'){$('#registration_form *').filter(':input').each(function(){$(this).val('');});notificate('You have successfully registered, please follow the email instructions','green');}else{notificate(data,'red');grecaptcha.reset();$('#submitRegistration').show();}});return false;}
function openotp(){$('#ModalContent').html('');$('#ModalContent').load('');return true;}
function openrdf(){$('#ModalContent').html('');$('#ModalContent').load('');return true;}
function opendel(){$('#ModalContent').html('');$('#ModalContent').load('');return true;}
function RestoreChar(name){$.get('',{restore:name,realmid:iRealmid,},function(data){if(data=='ok'){notificate('You have successfully restored your character named '+name,'green');window.location.href='#close';setTimeout(function(){location.reload();},5000);}
else
notificate(data,'red');});return false;}
function VerifyAndEnable(){var otpdata=$('#enable2fa').serialize();$.post('',otpdata,function(data){if(data=='V'){notificate('2FA has been successfully <b>enabled</b>, your account now has enhanced security','green');window.location.href='#close'}else{if(data=='X'){notificate('Invalid token','red');$('[name="onecode"]').val('');}else{notificate(data,'red');}}});return false;}
function VerifyAndDisable(){var otpdata=$('#disable2fa').serialize();$.post('',otpdata,function(data){if(data=='V'){notificate('2FA has been successfully <b>disabled</b>, your account does <b>not</b> have enhanced security anymore','green');window.location.href='#close'}else{if(data=='X'){notificate('Invalid token','red');$('[name="onecode"]').val('');}else{notificate(data,'red');}}});return false;}