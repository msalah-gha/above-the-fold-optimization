!function(e){"use strict";var n=function(n,t,o){function i(e){if(f.body)return e();setTimeout(function(){i(e)})}function d(){a.addEventListener&&a.removeEventListener("load",d),a.media=o||"all"}var r,f=e.document,a=f.createElement("link");if(t)r=t;else{var l=(f.body||f.getElementsByTagName("head")[0]).childNodes;r=l[l.length-1]}var u=f.styleSheets;a.rel="stylesheet",a.href=n,a.media="only x",i(function(){r.parentNode.insertBefore(a,t?r:r.nextSibling)});var s=function(e){for(var n=a.href,t=u.length;t--;)if(u[t].href===n)return e();setTimeout(function(){s(e)})};return a.addEventListener&&a.addEventListener("load",d),a.onloadcssdefined=s,s(d),a};"undefined"!=typeof exports?exports.loadCSS=n:e.loadCSS=n}("undefined"!=typeof global?global:this),function(e){e.lc="undefined"!=typeof loadCSS?function(e,n,t,o){loadCSS(e,n,t,function(){o&&o()})}:function(){}}(window.Abtf);