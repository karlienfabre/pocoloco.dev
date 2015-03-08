/**
 * jquery.hoverdir.js v1.1.0
 * http://www.codrops.com
 *
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 * 
 * Copyright 2012, Codrops
 * http://www.codrops.com
 */
(function(b,f,m){b.HoverDir=function(a,c){this.$el=b(c);this._init(a)};b.HoverDir.defaults={speed:300,easing:"ease",hoverDelay:0,inverse:!1};b.HoverDir.prototype={_init:function(a){this.options=b.extend(!0,{},b.HoverDir.defaults,a);this.transitionProp="all "+this.options.speed+"ms "+this.options.easing;this.support=Modernizr.csstransitions;this._loadEvents()},_loadEvents:function(){var a=this;this.$el.on("mouseenter.hoverdir, mouseleave.hoverdir",function(c){var d=b(this),g=d.find("div"),d=a._getDir(d,
{x:c.pageX,y:c.pageY}),e=a._getStyle(d);"mouseenter"===c.type?(g.hide().css(e.from),clearTimeout(a.tmhover),a.tmhover=setTimeout(function(){g.show(0,function(){var c=b(this);a.support&&c.css("transition",a.transitionProp);a._applyAnimation(c,e.to,a.options.speed)})},a.options.hoverDelay)):(a.support&&g.css("transition",a.transitionProp),clearTimeout(a.tmhover),a._applyAnimation(g,e.from,a.options.speed))})},_getDir:function(a,c){var d=a.width(),b=a.height(),e=(c.x-a.offset().left-d/2)*(d>b?b/d:1),
d=(c.y-a.offset().top-b/2)*(b>d?d/b:1);return Math.round((Math.atan2(d,e)*(180/Math.PI)+180)/90+3)%4},_getStyle:function(a){var c,b,g={left:"0px",top:"-100%"},e={left:"0px",top:"100%"},f={left:"-100%",top:"0px"},h={left:"100%",top:"0px"},k={top:"0px"},l={left:"0px"};switch(a){case 0:c=this.options.inverse?e:g;b=k;break;case 1:c=this.options.inverse?f:h;b=l;break;case 2:c=this.options.inverse?g:e;b=k;break;case 3:c=this.options.inverse?h:f,b=l}return{from:c,to:b}},_applyAnimation:function(a,c,d){b.fn.applyStyle=
this.support?b.fn.css:b.fn.animate;a.stop().applyStyle(c,b.extend(!0,[],{duration:d+"ms"}))}};b.fn.hoverdir=function(a){var c=b.data(this,"hoverdir");if("string"===typeof a){var d=Array.prototype.slice.call(arguments,1);this.each(function(){c?b.isFunction(c[a])&&"_"!==a.charAt(0)?c[a].apply(c,d):f.console&&f.console.error("no such method '"+a+"' for hoverdir instance"):f.console&&f.console.error("cannot call methods on hoverdir prior to initialization; attempted to call method '"+a+"'")})}else this.each(function(){c?
c._init():c=b.data(this,"hoverdir",new b.HoverDir(a,this))});return c}})(jQuery,window);