/*
*  jquery-maskmoney - v3.1.1
*  jQuery plugin to mask data entry in the input text in the form of money (currency)
*  https://github.com/plentz/jquery-maskmoney
*
*  Made by Diego Plentz
*  Under MIT License
*/
!function($){"use strict";function a(a,b){var c="";return a.indexOf("-")>-1&&(a=a.replace("-",""),c="-"),a.indexOf(b.prefix)>-1&&(a=a.replace(b.prefix,"")),a.indexOf(b.suffix)>-1&&(a=a.replace(b.suffix,"")),c+b.prefix+a+b.suffix}function b(a,b){return b.allowEmpty&&""===a?"":b.reverse?d(a,b):c(a,b)}function c(b,c){var d,f,g,h=b.indexOf("-")>-1&&c.allowNegative?"-":"",i=b.replace(/[^0-9]/g,""),j=i.slice(0,i.length-c.precision);return d=e(j,h,c),c.precision>0&&(f=i.slice(i.length-c.precision),g=new Array(c.precision+1-f.length).join(0),d+=c.decimal+g+f),a(d,c)}function d(b,c){var d,f=b.indexOf("-")>-1&&c.allowNegative?"-":"",g=b.replace(c.prefix,"").replace(c.suffix,""),h=g.split(c.decimal)[0],i="";if(""===h&&(h="0"),d=e(h,f,c),c.precision>0){var j=g.split(c.decimal);j.length>1&&(i=j[1]),d+=c.decimal+i;var k=Number.parseFloat(h+"."+i).toFixed(c.precision),l=k.toString().split(c.decimal)[1];d=d.split(c.decimal)[0]+"."+l}return a(d,c)}function e(a,b,c){return a=a.replace(/^0*/g,""),a=a.replace(/\B(?=(\d{3})+(?!\d))/g,c.thousands),""===a&&(a="0"),b+a}$.browser||($.browser={},$.browser.mozilla=/mozilla/.test(navigator.userAgent.toLowerCase())&&!/webkit/.test(navigator.userAgent.toLowerCase()),$.browser.webkit=/webkit/.test(navigator.userAgent.toLowerCase()),$.browser.opera=/opera/.test(navigator.userAgent.toLowerCase()),$.browser.msie=/msie/.test(navigator.userAgent.toLowerCase()));var f={destroy:function(){return $(this).unbind(".maskMoney"),$.browser.msie&&(this.onpaste=null),this},applyMask:function(a){return b(a,$(this).data("settings"))},mask:function(a){return this.each(function(){var b=$(this);return"number"==typeof a&&b.val(a),b.trigger("mask")})},unmasked:function(){return this.map(function(){var a,b=$(this).val()||"0",c=b.indexOf("-")!==-1;return $(b.split(/\D/).reverse()).each(function(b,c){if(c)return a=c,!1}),b=b.replace(/\D/g,""),b=b.replace(new RegExp(a+"$"),"."+a),c&&(b="-"+b),parseFloat(b)})},init:function(c){return c=$.extend({prefix:"",suffix:"",affixesStay:!0,thousands:",",decimal:".",precision:2,allowZero:!1,allowNegative:!1,doubleClickSelection:!0,allowEmpty:!1},c),this.each(function(){function d(){var a,b,c,d,e,f=z.get(0),g=0,h=0;return"number"==typeof f.selectionStart&&"number"==typeof f.selectionEnd?(g=f.selectionStart,h=f.selectionEnd):(b=document.selection.createRange())&&b.parentElement()===f&&(d=f.value.length,a=f.value.replace(/\r\n/g,"\n"),c=f.createTextRange(),c.moveToBookmark(b.getBookmark()),e=f.createTextRange(),e.collapse(!1),c.compareEndPoints("StartToEnd",e)>-1?g=h=d:(g=-c.moveStart("character",-d),g+=a.slice(0,g).split("\n").length-1,c.compareEndPoints("EndToEnd",e)>-1?h=d:(h=-c.moveEnd("character",-d),h+=a.slice(0,h).split("\n").length-1))),{start:g,end:h}}function e(){var a=!(z.val().length>=z.attr("maxlength")&&z.attr("maxlength")>=0),b=d(),c=b.start,e=b.end,f=!(b.start===b.end||!z.val().substring(c,e).match(/\d/)),g="0"===z.val().substring(0,1);return a||f||g}function f(a){x.formatOnBlur||z.each(function(b,c){if(c.setSelectionRange)c.focus(),c.setSelectionRange(a,a);else if(c.createTextRange){var d=c.createTextRange();d.collapse(!0),d.moveEnd("character",a),d.moveStart("character",a),d.select()}})}function g(a){var c,d=z.val().length;z.val(b(z.val(),x)),c=z.val().length,x.reverse||(a-=d-c),f(a)}function h(){var a=z.val();x.allowEmpty&&""===a||(x.precision>0&&a.indexOf(x.decimal)<0&&(a+=x.decimal+new Array(x.precision+1).join(0)),z.val(b(a,x)))}function i(){var a=z.val();return x.allowNegative?""!==a&&"-"===a.charAt(0)?a.replace("-",""):"-"+a:a}function j(a){a.preventDefault?a.preventDefault():a.returnValue=!1}function k(a){a=a||window.event;var b=a.which||a.charCode||a.keyCode,c=x.decimal.charCodeAt(0);return void 0!==b&&(!(b<48||b>57)||b===c&&x.reverse?!!e()&&((b!==c||!l())&&(!!x.formatOnBlur||(j(a),o(a),!1))):p(b,a))}function l(){return!m()&&n()}function m(){var a=z.val().length,b=d();return 0===b.start&&b.end===a}function n(){return z.val().indexOf(x.decimal)>-1}function o(a){a=a||window.event;var b,c,e,f,h=a.which||a.charCode||a.keyCode,i="";h>=48&&h<=57&&(i=String.fromCharCode(h)),b=d(),c=b.start,e=b.end,f=z.val(),z.val(f.substring(0,c)+i+f.substring(e,f.length)),g(c+1)}function p(a,b){return 45===a?(z.val(i()),!1):43===a?(z.val(z.val().replace("-","")),!1):13===a||9===a||(!(!$.browser.mozilla||37!==a&&39!==a||0!==b.charCode)||(j(b),!0))}function q(a){a=a||window.event;var b,c,e,f,h,i=a.which||a.charCode||a.keyCode;return void 0!==i&&(b=d(),c=b.start,e=b.end,8!==i&&46!==i&&63272!==i||(j(a),f=z.val(),c===e&&(8===i?""===x.suffix?c-=1:(h=f.split("").reverse().join("").search(/\d/),c=f.length-h-1,e=c+1):e+=1),z.val(f.substring(0,c)+f.substring(e,f.length)),g(c),!1))}function r(){y=z.val(),h();var a,b=z.get(0);x.selectAllOnFocus?b.select():b.createTextRange&&(a=b.createTextRange(),a.collapse(!1),a.select())}function s(){setTimeout(function(){h()},0)}function t(){return(parseFloat("0")/Math.pow(10,x.precision)).toFixed(x.precision).replace(new RegExp("\\.","g"),x.decimal)}function u(b){if($.browser.msie&&k(b),x.formatOnBlur&&z.val()!==y&&o(b),""===z.val()&&x.allowEmpty)z.val("");else if(""===z.val()||z.val()===a(t(),x))x.allowZero?x.affixesStay?z.val(a(t(),x)):z.val(t()):z.val("");else if(!x.affixesStay){var c=z.val().replace(x.prefix,"").replace(x.suffix,"");z.val(c)}z.val()!==y&&z.change()}function v(){var a,b=z.get(0);x.selectAllOnFocus||(b.setSelectionRange?(a=z.val().length,b.setSelectionRange(a,a)):z.val(z.val()))}function w(){var a,b,c=z.get(0);c.setSelectionRange?(b=z.val().length,a=x.doubleClickSelection?0:b,c.setSelectionRange(a,b)):z.val(z.val())}var x,y,z=$(this);x=$.extend({},c),x=$.extend(x,z.data()),z.data("settings",x),z.unbind(".maskMoney"),z.bind("keypress.maskMoney",k),z.bind("keydown.maskMoney",q),z.bind("blur.maskMoney",u),z.bind("focus.maskMoney",r),z.bind("click.maskMoney",v),z.bind("dblclick.maskMoney",w),z.bind("cut.maskMoney",s),z.bind("paste.maskMoney",s),z.bind("mask.maskMoney",h)})}};$.fn.maskMoney=function(a){return f[a]?f[a].apply(this,Array.prototype.slice.call(arguments,1)):"object"!=typeof a&&a?void $.error("Method "+a+" does not exist on jQuery.maskMoney"):f.init.apply(this,arguments)}}(window.jQuery||window.Zepto);
