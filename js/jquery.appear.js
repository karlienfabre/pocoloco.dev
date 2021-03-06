/*
 * jQuery.appear
 * https://github.com/bas2k/jquery.appear/
 * http://code.google.com/p/jquery-appear/
 *
 * Copyright (c) 2009 Michael Hixson
 * Copyright (c) 2012 Alexander Brovikov
 * Licensed under the MIT license (http://www.opensource.org/licenses/mit-license.php)
 */
(function(a){a.fn.appear=function(e,b){var d=a.extend({data:void 0,one:!0,accX:0,accY:0},b);return this.each(function(){var c=a(this);c.appeared=!1;if(e){var g=a(window),f=function(){if(c.is(":visible")){var a=g.scrollLeft(),e=g.scrollTop(),b=c.offset(),f=b.left,b=b.top,h=d.accX,k=d.accY,l=c.height(),m=g.height(),n=c.width(),p=g.width();b+l+k>=e&&b<=e+m+k&&f+n+h>=a&&f<=a+p+h?c.appeared||c.trigger("appear",d.data):c.appeared=!1}else c.appeared=!1},b=function(){c.appeared=!0;if(d.one){g.unbind("scroll",
f);var b=a.inArray(f,a.fn.appear.checks);0<=b&&a.fn.appear.checks.splice(b,1)}e.apply(this,arguments)};if(d.one)c.one("appear",d.data,b);else c.bind("appear",d.data,b);g.scroll(f);a.fn.appear.checks.push(f);f()}else c.trigger("appear",d.data)})};a.extend(a.fn.appear,{checks:[],timeout:null,checkAll:function(){var e=a.fn.appear.checks.length;if(0<e)for(;e--;)a.fn.appear.checks[e]()},run:function(){a.fn.appear.timeout&&clearTimeout(a.fn.appear.timeout);a.fn.appear.timeout=setTimeout(a.fn.appear.checkAll,
20)}});a.each("append prepend after before attr removeAttr addClass removeClass toggleClass remove css show hide".split(" "),function(e,b){var d=a.fn[b];d&&(a.fn[b]=function(){var b=d.apply(this,arguments);a.fn.appear.run();return b})})})(jQuery);