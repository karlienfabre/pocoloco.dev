/* Development Build - Sun Jan 04 2015 12:18:30 */$.fn.animateRotate=function(angle,duration,easing,complete){var args=$.speed(duration,easing,complete),step=args.step;return this.each(function(i,e){args.step=function(now){return $.style(e,"transform","rotate("+now+"deg)"),step?step.apply(this,arguments):void 0},$({deg:0}).animate({deg:angle},args)})},/*
 * jQuery Easing v1.3 - http://gsgd.co.uk/sandbox/jquery/easing/
 *
 * Uses the built in easing capabilities added In jQuery 1.1
 * to offer multiple easing options
 *
 * TERMS OF USE - jQuery Easing
 * 
 * Open source under the BSD License. 
 * 
 * Copyright © 2008 George McGinley Smith
 * All rights reserved.
 * 
 * Redistribution and use in source and binary forms, with or without modification, 
 * are permitted provided that the following conditions are met:
 * 
 * Redistributions of source code must retain the above copyright notice, this list of 
 * conditions and the following disclaimer.
 * Redistributions in binary form must reproduce the above copyright notice, this list 
 * of conditions and the following disclaimer in the documentation and/or other materials 
 * provided with the distribution.
 * 
 * Neither the name of the author nor the names of contributors may be used to endorse 
 * or promote products derived from this software without specific prior written permission.
 * 
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY 
 * EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF
 * MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 *  COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL,
 *  EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE
 *  GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED 
 * AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING
 *  NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED 
 * OF THE POSSIBILITY OF SUCH DAMAGE. 
 *
*/
// t: current time, b: begInnIng value, c: change In value, d: duration
jQuery.easing.jswing=jQuery.easing.swing,jQuery.extend(jQuery.easing,{def:"easeOutQuad",swing:function(x,t,b,c,d){//alert(jQuery.easing.default);
return jQuery.easing[jQuery.easing.def](x,t,b,c,d)},easeInQuad:function(x,t,b,c,d){return c*(t/=d)*t+b},easeOutQuad:function(x,t,b,c,d){return-c*(t/=d)*(t-2)+b},easeInOutQuad:function(x,t,b,c,d){return(t/=d/2)<1?c/2*t*t+b:-c/2*(--t*(t-2)-1)+b},easeInCubic:function(x,t,b,c,d){return c*(t/=d)*t*t+b},easeOutCubic:function(x,t,b,c,d){return c*((t=t/d-1)*t*t+1)+b},easeInOutCubic:function(x,t,b,c,d){return(t/=d/2)<1?c/2*t*t*t+b:c/2*((t-=2)*t*t+2)+b},easeInQuart:function(x,t,b,c,d){return c*(t/=d)*t*t*t+b},easeOutQuart:function(x,t,b,c,d){return-c*((t=t/d-1)*t*t*t-1)+b},easeInOutQuart:function(x,t,b,c,d){return(t/=d/2)<1?c/2*t*t*t*t+b:-c/2*((t-=2)*t*t*t-2)+b},easeInQuint:function(x,t,b,c,d){return c*(t/=d)*t*t*t*t+b},easeOutQuint:function(x,t,b,c,d){return c*((t=t/d-1)*t*t*t*t+1)+b},easeInOutQuint:function(x,t,b,c,d){return(t/=d/2)<1?c/2*t*t*t*t*t+b:c/2*((t-=2)*t*t*t*t+2)+b},easeInSine:function(x,t,b,c,d){return-c*Math.cos(t/d*(Math.PI/2))+c+b},easeOutSine:function(x,t,b,c,d){return c*Math.sin(t/d*(Math.PI/2))+b},easeInOutSine:function(x,t,b,c,d){return-c/2*(Math.cos(Math.PI*t/d)-1)+b},easeInExpo:function(x,t,b,c,d){return 0==t?b:c*Math.pow(2,10*(t/d-1))+b},easeOutExpo:function(x,t,b,c,d){return t==d?b+c:c*(-Math.pow(2,-10*t/d)+1)+b},easeInOutExpo:function(x,t,b,c,d){return 0==t?b:t==d?b+c:(t/=d/2)<1?c/2*Math.pow(2,10*(t-1))+b:c/2*(-Math.pow(2,-10*--t)+2)+b},easeInCirc:function(x,t,b,c,d){return-c*(Math.sqrt(1-(t/=d)*t)-1)+b},easeOutCirc:function(x,t,b,c,d){return c*Math.sqrt(1-(t=t/d-1)*t)+b},easeInOutCirc:function(x,t,b,c,d){return(t/=d/2)<1?-c/2*(Math.sqrt(1-t*t)-1)+b:c/2*(Math.sqrt(1-(t-=2)*t)+1)+b},easeInElastic:function(x,t,b,c,d){var s=1.70158,p=0,a=c;if(0==t)return b;if(1==(t/=d))return b+c;if(p||(p=.3*d),a<Math.abs(c)){a=c;var s=p/4}else var s=p/(2*Math.PI)*Math.asin(c/a);return-(a*Math.pow(2,10*(t-=1))*Math.sin(2*(t*d-s)*Math.PI/p))+b},easeOutElastic:function(x,t,b,c,d){var s=1.70158,p=0,a=c;if(0==t)return b;if(1==(t/=d))return b+c;if(p||(p=.3*d),a<Math.abs(c)){a=c;var s=p/4}else var s=p/(2*Math.PI)*Math.asin(c/a);return a*Math.pow(2,-10*t)*Math.sin(2*(t*d-s)*Math.PI/p)+c+b},easeInOutElastic:function(x,t,b,c,d){var s=1.70158,p=0,a=c;if(0==t)return b;if(2==(t/=d/2))return b+c;if(p||(p=.3*d*1.5),a<Math.abs(c)){a=c;var s=p/4}else var s=p/(2*Math.PI)*Math.asin(c/a);return 1>t?-.5*a*Math.pow(2,10*(t-=1))*Math.sin(2*(t*d-s)*Math.PI/p)+b:a*Math.pow(2,-10*(t-=1))*Math.sin(2*(t*d-s)*Math.PI/p)*.5+c+b},easeInBack:function(x,t,b,c,d,s){return void 0==s&&(s=1.70158),c*(t/=d)*t*((s+1)*t-s)+b},easeOutBack:function(x,t,b,c,d,s){return void 0==s&&(s=1.70158),c*((t=t/d-1)*t*((s+1)*t+s)+1)+b},easeInOutBack:function(x,t,b,c,d,s){return void 0==s&&(s=1.70158),(t/=d/2)<1?c/2*t*t*(((s*=1.525)+1)*t-s)+b:c/2*((t-=2)*t*(((s*=1.525)+1)*t+s)+2)+b},easeInBounce:function(x,t,b,c,d){return c-jQuery.easing.easeOutBounce(x,d-t,0,c,d)+b},easeOutBounce:function(x,t,b,c,d){return(t/=d)<1/2.75?7.5625*c*t*t+b:2/2.75>t?c*(7.5625*(t-=1.5/2.75)*t+.75)+b:2.5/2.75>t?c*(7.5625*(t-=2.25/2.75)*t+.9375)+b:c*(7.5625*(t-=2.625/2.75)*t+.984375)+b},easeInOutBounce:function(x,t,b,c,d){return d/2>t?.5*jQuery.easing.easeInBounce(x,2*t,0,c,d)+b:.5*jQuery.easing.easeOutBounce(x,2*t-d,0,c,d)+.5*c+b}});