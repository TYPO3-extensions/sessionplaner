/*! qTip2 v2.0.0 | http://craigsworks.com/projects/qtip2/ | Licensed MIT, GPL */
(function(e,t,n){(function(e){"use strict";typeof define=="function"&&define.amd?define(["jquery"],e):jQuery&&!jQuery.fn.qtip&&e(jQuery)})(function(r){function P(e){var t=function(e){return e===o||"object"!=typeof e},n=function(e){return!r.isFunction(e)&&(!e&&!e.attr||e.length<1||"object"==typeof e&&!e.jquery)};if(!e||"object"!=typeof e)return s;t(e.metadata)&&(e.metadata={type:e.metadata});if("content"in e){if(t(e.content)||e.content.jquery)e.content={text:e.content};n(e.content.text||s)&&(e.content.text=s),"title"in e.content&&(t(e.content.title)&&(e.content.title={text:e.content.title}),n(e.content.title.text||s)&&(e.content.title.text=s))}return"position"in e&&t(e.position)&&(e.position={my:e.position,at:e.position}),"show"in e&&t(e.show)&&(e.show=e.show.jquery?{target:e.show}:{event:e.show}),"hide"in e&&t(e.hide)&&(e.hide=e.hide.jquery?{target:e.hide}:{event:e.hide}),"style"in e&&t(e.style)&&(e.style={classes:e.style}),r.each(w,function(){this.sanitize&&this.sanitize(e)}),e}function H(u,a,m,g){function U(e){var t=0,n,r=a,i=e.split(".");while(r=r[i[t++]])t<i.length&&(n=r);return[n||a,i.pop()]}function z(e,t,n){var i=r.Event("tooltip"+e);return i.originalEvent=(n?r.extend({},n):o)||R.event||o,F.trigger(i,[y].concat(t||[])),!i.isDefaultPrevented()}function W(){var e=a.style.widget;F.toggleClass("ui-helper-reset "+T,e).toggleClass(k,a.style.def&&!e),q.content&&q.content.toggleClass(T+"-content",e),q.titlebar&&q.titlebar.toggleClass(T+"-header",e),q.button&&q.button.toggleClass(x+"-icon",!e)}function X(e){q.title&&(q.titlebar.remove(),q.titlebar=q.title=q.button=o,e!==s&&y.reposition())}function V(){var e=a.content.title.button,t=typeof e=="string",n=t?e:"Close tooltip";q.button&&q.button.remove(),e.jquery?q.button=e:q.button=r("<a />",{"class":"ui-state-default ui-tooltip-close "+(a.style.widget?"":x+"-icon"),title:n,"aria-label":n}).prepend(r("<span />",{"class":"ui-icon ui-icon-close",html:"&times;"})),q.button.appendTo(q.titlebar).attr("role","button").click(function(e){return F.hasClass(N)||y.hide(e),s}),y.redraw()}function J(){var e=H+"-title";q.titlebar&&X(),q.titlebar=r("<div />",{"class":x+"-titlebar "+(a.style.widget?"ui-widget-header":"")}).append(q.title=r("<div />",{id:e,"class":x+"-title","aria-atomic":i})).insertBefore(q.content).delegate(".ui-tooltip-close","mousedown keydown mouseup keyup mouseout",function(e){r(this).toggleClass("ui-state-active ui-state-focus",e.type.substr(-4)==="down")}).delegate(".ui-tooltip-close","mouseover mouseout",function(e){r(this).toggleClass("ui-state-hover",e.type==="mouseover")}),a.content.title.button?V():y.rendered&&y.redraw()}function K(e){var t=q.button,n=q.title;if(!y.rendered)return s;e?(n||J(),V()):t.remove()}function Q(e,t){var n=q.title;if(!y.rendered||!e)return s;r.isFunction(e)&&(e=e.call(u,R.event,y));if(e===s||!e&&e!=="")return X(s);e.jquery&&e.length>0?n.empty().append(e.css({display:"block"})):n.html(e),y.redraw(),t!==s&&y.rendered&&F[0].offsetWidth>0&&y.reposition(R.event)}function G(e,t){function o(e){function a(n){n&&(delete u[n.src],clearTimeout(y.timers.img[n.src]),r(n).unbind(I)),r.isEmptyObject(u)&&(y.redraw(),t!==s&&y.reposition(R.event),e())}var o,u={};if((o=i.find("img[src]:not([height]):not([width])")).length===0)return a();o.each(function(e,t){if(u[t.src]!==n)return;var i=0,s=3;(function o(){if(t.height||t.width||i>s)return a(t);i+=1,y.timers.img[t.src]=setTimeout(o,700)})(),r(t).bind("error"+I+" load"+I,function(){a(this)}),u[t.src]=t})}var i=q.content;return!y.rendered||!e?s:(r.isFunction(e)&&(e=e.call(u,R.event,y)||""),e.jquery&&e.length>0?i.empty().append(e.css({display:"block"})):i.html(e),y.rendered<0?F.queue("fx",o):(j=0,o(r.noop)),y)}function Y(){function c(e){if(F.hasClass(N))return s;clearTimeout(y.timers.show),clearTimeout(y.timers.hide);var t=function(){y.toggle(i,e)};a.show.delay>0?y.timers.show=setTimeout(t,a.show.delay):t()}function h(e){if(F.hasClass(N)||B||j)return s;var t=r(e.relatedTarget||e.target),i=t.closest(C)[0]===F[0],u=t[0]===o.show[0];clearTimeout(y.timers.show),clearTimeout(y.timers.hide);if(n.target==="mouse"&&i||a.hide.fixed&&/mouse(out|leave|move)/.test(e.type)&&(i||u)){try{e.preventDefault(),e.stopImmediatePropagation()}catch(f){}return}a.hide.delay>0?y.timers.hide=setTimeout(function(){y.hide(e)},a.hide.delay):y.hide(e)}function p(e){if(F.hasClass(N))return s;clearTimeout(y.timers.inactive),y.timers.inactive=setTimeout(function(){y.hide(e)},a.hide.inactive)}function d(e){y.rendered&&F[0].offsetWidth>0&&y.reposition(e)}var n=a.position,o={show:a.show.target,hide:a.hide.target,viewport:r(n.viewport),document:r(t),body:r(t.body),window:r(e)},f={show:r.trim(""+a.show.event).split(" "),hide:r.trim(""+a.hide.event).split(" ")},l=r.browser.msie&&parseInt(r.browser.version,10)===6;F.bind("mouseenter"+I+" mouseleave"+I,function(e){var t=e.type==="mouseenter";t&&y.focus(e),F.toggleClass(A,t)}),/mouse(out|leave)/i.test(a.hide.event)&&a.hide.leave==="window"&&o.window.bind("mouseout"+I+" blur"+I,function(e){!/select|option/.test(e.target.nodeName)&&!e.relatedTarget&&y.hide(e)}),a.hide.fixed?(o.hide=o.hide.add(F),F.bind("mouseover"+I,function(){F.hasClass(N)||clearTimeout(y.timers.hide)})):/mouse(over|enter)/i.test(a.show.event)&&o.hide.bind("mouseleave"+I,function(e){clearTimeout(y.timers.show)}),(""+a.hide.event).indexOf("unfocus")>-1&&n.container.closest("html").bind("mousedown"+I+" touchstart"+I,function(e){var t=r(e.target),n=y.rendered&&!F.hasClass(N)&&F[0].offsetWidth>0,i=t.parents(C).filter(F[0]).length>0;t[0]!==u[0]&&t[0]!==F[0]&&!i&&!u.has(t[0]).length&&!t.attr("disabled")&&y.hide(e)}),"number"==typeof a.hide.inactive&&(o.show.bind("qtip-"+m+"-inactive",p),r.each(b.inactiveEvents,function(e,t){o.hide.add(q.tooltip).bind(t+I+"-inactive",p)})),r.each(f.hide,function(e,t){var n=r.inArray(t,f.show),i=r(o.hide);n>-1&&i.add(o.show).length===i.length||t==="unfocus"?(o.show.bind(t+I,function(e){F[0].offsetWidth>0?h(e):c(e)}),delete f.show[n]):o.hide.bind(t+I,h)}),r.each(f.show,function(e,t){o.show.bind(t+I,c)}),"number"==typeof a.hide.distance&&o.show.add(F).bind("mousemove"+I,function(e){var t=R.origin||{},n=a.hide.distance,r=Math.abs;(r(e.pageX-t.pageX)>=n||r(e.pageY-t.pageY)>=n)&&y.hide(e)}),n.target==="mouse"&&(o.show.bind("mousemove"+I,function(e){E={pageX:e.pageX,pageY:e.pageY,type:"mousemove"}}),n.adjust.mouse&&(a.hide.event&&(F.bind("mouseleave"+I,function(e){(e.relatedTarget||e.target)!==o.show[0]&&y.hide(e)}),q.target.bind("mouseenter"+I+" mouseleave"+I,function(e){R.onTarget=e.type==="mouseenter"})),o.document.bind("mousemove"+I,function(e){y.rendered&&R.onTarget&&!F.hasClass(N)&&F[0].offsetWidth>0&&y.reposition(e||E)}))),(n.adjust.resize||o.viewport.length)&&(r.event.special.resize?o.viewport:o.window).bind("resize"+I,d),(o.viewport.length||l&&F.css("position")==="fixed")&&o.viewport.bind("scroll"+I,d)}function Z(){var n=[a.show.target[0],a.hide.target[0],y.rendered&&q.tooltip[0],a.position.container[0],a.position.viewport[0],a.position.container.closest("html")[0],e,t];y.rendered?r([]).pushStack(r.grep(n,function(e){return typeof e=="object"})).unbind(I):a.show.target.unbind(I+"-create")}var y=this,O=t.body,H=x+"-"+m,B=0,j=0,F=r(),I=".qtip-"+m,q,R;y.id=m,y.rendered=s,y.destroyed=s,y.elements=q={target:u},y.timers={img:{}},y.options=a,y.checks={},y.plugins={},y.cache=R={event:{},target:r(),disabled:s,attr:g,onTarget:s,lastClass:""},y.checks.builtin={"^id$":function(e,t,n){var o=n===i?b.nextid:n,u=x+"-"+o;o!==s&&o.length>0&&!r("#"+u).length&&(F[0].id=u,q.content[0].id=u+"-content",q.title[0].id=u+"-title")},"^content.text$":function(e,t,n){G(n)},"^content.title.text$":function(e,t,n){if(!n)return X();!q.title&&n&&J(),Q(n)},"^content.title.button$":function(e,t,n){K(n)},"^position.(my|at)$":function(e,t,n){"string"==typeof n&&(e[t]=new w.Corner(n))},"^position.container$":function(e,t,n){y.rendered&&F.appendTo(n)},"^show.ready$":function(){y.rendered?y.toggle(i):y.render(1)},"^style.classes$":function(e,t,n){F.attr("class",x+" qtip "+n)},"^style.widget|content.title":W,"^events.(render|show|move|hide|focus|blur)$":function(e,t,n){F[(r.isFunction(n)?"":"un")+"bind"]("tooltip"+t,n)},"^(show|hide|position).(event|target|fixed|inactive|leave|distance|viewport|adjust)":function(){var e=a.position;F.attr("tracking",e.target==="mouse"&&e.adjust.mouse),Z(),Y()}},r.extend(y,{render:function(e){if(y.rendered)return y;var t=a.content.text,n=a.content.title.text,o=a.position;return r.attr(u[0],"aria-describedby",H),F=q.tooltip=r("<div/>",{id:H,"class":x+" qtip "+k+" "+a.style.classes+" "+x+"-pos-"+a.position.my.abbrev(),width:a.style.width||"",height:a.style.height||"",tracking:o.target==="mouse"&&o.adjust.mouse,role:"alert","aria-live":"polite","aria-atomic":s,"aria-describedby":H+"-content","aria-hidden":i}).toggleClass(N,R.disabled).data("qtip",y).appendTo(a.position.container).append(q.content=r("<div />",{"class":x+"-content",id:H+"-content","aria-atomic":i})),y.rendered=-1,j=1,B=1,n&&(J(),r.isFunction(n)||Q(n,s)),r.isFunction(t)||G(t,s),y.rendered=i,W(),r.each(a.events,function(e,t){r.isFunction(t)&&F.bind(e==="toggle"?"tooltipshow tooltiphide":"tooltip"+e,t)}),r.each(w,function(){this.initialize==="render"&&this(y)}),Y(),F.queue("fx",function(t){z("render"),j=0,B=0,y.redraw(),(a.show.ready||e)&&y.toggle(i,R.event,s),t()}),y},get:function(e){var t,n;switch(e.toLowerCase()){case"dimensions":t={height:F.outerHeight(s),width:F.outerWidth(s)};break;case"offset":t=w.offset(F,a.position.container);break;default:n=U(e.toLowerCase()),t=n[0][n[1]],t=t.precedance?t.string():t}return t},set:function(e,t){function p(e,t){var n,r,i;for(n in c)for(r in c[n])if(i=(new RegExp(r,"i")).exec(e))t.push(i),c[n][r].apply(y,t)}var n=/^position\.(my|at|adjust|target|container)|style|content|show\.ready/i,u=/^content\.(title|attr)|style/i,f=s,l=s,c=y.checks,h;return"string"==typeof e?(h=e,e={},e[h]=t):e=r.extend(i,{},e),r.each(e,function(t,i){var s=U(t.toLowerCase()),o;o=s[0][s[1]],s[0][s[1]]="object"==typeof i&&i.nodeType?r(i):i,e[t]=[s[0],s[1],i,o],f=n.test(t)||f,l=u.test(t)||l}),P(a),B=j=1,r.each(e,p),B=j=0,y.rendered&&F[0].offsetWidth>0&&(f&&y.reposition(a.position.target==="mouse"?o:R.event),l&&y.redraw()),y},toggle:function(e,n){function b(){e?(r.browser.msie&&F[0].style.removeAttribute("filter"),F.css("overflow",""),"string"==typeof u.autofocus&&r(u.autofocus,F).focus(),u.target.trigger("qtip-"+m+"-inactive")):F.css({display:"",visibility:"",opacity:"",left:"",top:""}),z(e?"visible":"hidden")}if(n){if(/over|enter/.test(n.type)&&/out|leave/.test(R.event.type)&&a.show.target.add(n.target).length===a.show.target.length&&F.has(n.relatedTarget).length)return y;R.event=r.extend({},n)}if(!y.rendered)return e?y.render(1):y;var o=e?"show":"hide",u=a[o],f=a[e?"hide":"show"],l=a.position,c=a.content,h=F[0].offsetWidth>0,p=e||u.target.length===1,d=!n||u.target.length<2||R.target[0]===n.target,v,g;return(typeof e).search("boolean|number")&&(e=!h),!F.is(":animated")&&h===e&&d?y:z(o,[90])?(r.attr(F[0],"aria-hidden",!e),e?(R.origin=r.extend({},E),y.focus(n),r.isFunction(c.text)&&G(c.text,s),r.isFunction(c.title.text)&&Q(c.title.text,s),!_&&l.target==="mouse"&&l.adjust.mouse&&(r(t).bind("mousemove.qtip",function(e){E={pageX:e.pageX,pageY:e.pageY,type:"mousemove"}}),_=i),y.reposition(n,arguments[2]),!u.solo||r(C,u.solo).not(F).qtip("hide",r.Event("tooltipsolo"))):(clearTimeout(y.timers.show),delete R.origin,_&&!r(C+'[tracking="true"]:visible',u.solo).not(F).length&&(r(t).unbind("mousemove.qtip"),_=s),y.blur(n)),u.effect===s||p===s?(F[o](),b.call(F)):r.isFunction(u.effect)?(F.stop(1,1),u.effect.call(F,y),F.queue("fx",function(e){b(),e()})):F.fadeTo(90,e?1:0,b),e&&u.target.trigger("qtip-"+m+"-inactive"),y):y},show:function(e){return y.toggle(i,e)},hide:function(e){return y.toggle(s,e)},focus:function(e){if(!y.rendered)return y;var t=r(C),n=parseInt(F[0].style.zIndex,10),i=b.zindex+t.length,s=r.extend({},e),o;return F.hasClass(L)||z("focus",[i],s)&&(n!==i&&(t.each(function(){this.style.zIndex>n&&(this.style.zIndex=this.style.zIndex-1)}),t.filter("."+L).qtip("blur",s)),F.addClass(L)[0].style.zIndex=i),y},blur:function(e){return F.removeClass(L),z("blur",[F.css("zIndex")],e),y},reposition:function(n,i){if(!y.rendered||B)return y;B=1;var o=a.position.target,u=a.position,f=u.my,l=u.at,m=u.adjust,g=m.method.split(" "),b=F.outerWidth(s),S=F.outerHeight(s),x=0,T=0,N=F.css("position")==="fixed",C=u.viewport,k={left:0,top:0},L=u.container,A=F[0].offsetWidth>0,O,M,_;if(r.isArray(o)&&o.length===2)l={x:h,y:c},k={left:o[0],top:o[1]};else if(o==="mouse"&&(n&&n.pageX||R.event.pageX))l={x:h,y:c},n=(!n||n.type!=="resize"&&n.type!=="scroll"?n&&n.pageX&&n.type==="mousemove"?n:E&&E.pageX&&(m.mouse||!n||!n.pageX)?{pageX:E.pageX,pageY:E.pageY}:!m.mouse&&R.origin&&R.origin.pageX&&a.show.distance?R.origin:n:R.event)||n||R.event||E||{},k={top:n.pageY,left:n.pageX};else{o==="event"&&n&&n.target&&n.type!=="scroll"&&n.type!=="resize"?R.target=r(n.target):o!=="event"&&(R.target=r(o.jquery?o:q.target)),o=R.target,o=r(o).eq(0);if(o.length===0)return y;o[0]===t||o[0]===e?(x=w.iOS?e.innerWidth:o.width(),T=w.iOS?e.innerHeight:o.height(),o[0]===e&&(k={top:(C||o).scrollTop(),left:(C||o).scrollLeft()})):w.imagemap&&o.is("area")?O=w.imagemap(y,o,l,w.viewport?g:s):w.svg&&typeof o[0].xmlbase=="string"?O=w.svg(y,o,l,w.viewport?g:s):(x=o.outerWidth(s),T=o.outerHeight(s),k=w.offset(o,L)),O&&(x=O.width,T=O.height,M=O.offset,k=O.position);if(w.iOS>3.1&&w.iOS<4.1||w.iOS>=4.3&&w.iOS<4.33||!w.iOS&&N)_=r(e),k.left-=_.scrollLeft(),k.top-=_.scrollTop();k.left+=l.x===d?x:l.x===v?x/2:0,k.top+=l.y===p?T:l.y===v?T/2:0}return k.left+=m.x+(f.x===d?-b:f.x===v?-b/2:0),k.top+=m.y+(f.y===p?-S:f.y===v?-S/2:0),w.viewport?(k.adjusted=w.viewport(y,k,u,x,T,b,S),M&&k.adjusted.left&&(k.left+=M.left),M&&k.adjusted.top&&(k.top+=M.top)):k.adjusted={left:0,top:0},z("move",[k,C.elem||C],n)?(delete k.adjusted,i===s||!A||isNaN(k.left)||isNaN(k.top)||o==="mouse"||!r.isFunction(u.effect)?F.css(k):r.isFunction(u.effect)&&(u.effect.call(F,y,r.extend({},k)),F.queue(function(e){r(this).css({opacity:"",height:""}),r.browser.msie&&this.style.removeAttribute("filter"),e()})),B=0,y):y},redraw:function(){if(y.rendered<1||j)return y;var e=a.style,t=a.position.container,n,r,i,s;return j=1,z("redraw"),e.height&&F.css(l,e.height),e.width?F.css(f,e.width):(F.css(f,"").appendTo(D),r=F.width(),r%2<1&&(r+=1),i=F.css("max-width")||"",s=F.css("min-width")||"",n=(i+s).indexOf("%")>-1?t.width()/100:0,i=(i.indexOf("%")>-1?n:1)*parseInt(i,10)||r,s=(s.indexOf("%")>-1?n:1)*parseInt(s,10)||0,r=i+s?Math.min(Math.max(r,s),i):r,F.css(f,Math.round(r)).appendTo(t)),z("redrawn"),j=0,y},disable:function(e){return"boolean"!=typeof e&&(e=!F.hasClass(N)&&!R.disabled),y.rendered?(F.toggleClass(N,e),r.attr(F[0],"aria-disabled",e)):R.disabled=!!e,y},enable:function(){return y.disable(s)},destroy:function(){var e=u[0],t=r.attr(e,M),n=u.data("qtip");y.destroyed=i,y.rendered&&(F.stop(1,0).remove(),r.each(y.plugins,function(){this.destroy&&this.destroy()})),clearTimeout(y.timers.show),clearTimeout(y.timers.hide),Z();if(!n||y===n)r.removeData(e,"qtip"),a.suppress&&t&&(r.attr(e,"title",t),u.removeAttr(M)),u.removeAttr("aria-describedby");return u.unbind(".qtip-"+m),delete S[y.id],u}})}function B(e,n){var u,a,f,l,c,h=r(this),p=r(t.body),d=this===t?p:h,v=h.metadata?h.metadata(n.metadata):o,m=n.metadata.type==="html5"&&v?v[n.metadata.name]:o,g=h.data(n.metadata.name||"qtipopts");try{g=typeof g=="string"?r.parseJSON(g):g}catch(y){}l=r.extend(i,{},b.defaults,n,typeof g=="object"?P(g):o,P(m||v)),a=l.position,l.id=e;if("boolean"==typeof l.content.text){f=h.attr(l.content.attr);if(l.content.attr===s||!f)return s;l.content.text=f}a.container.length||(a.container=p),a.target===s&&(a.target=d),l.show.target===s&&(l.show.target=d),l.show.solo===i&&(l.show.solo=a.container.closest("body")),l.hide.target===s&&(l.hide.target=d),l.position.viewport===i&&(l.position.viewport=a.container),a.container=a.container.eq(0),a.at=new w.Corner(a.at),a.my=new w.Corner(a.my);if(r.data(this,"qtip"))if(l.overwrite)h.qtip("destroy");else if(l.overwrite===s)return s;return l.suppress&&(c=r.attr(this,"title"))&&r(this).removeAttr("title").attr(M,c).attr("title",""),u=new H(h,l,e,!!f),r.data(this,"qtip",u),h.bind("remove.qtip-"+e+" removeqtip.qtip-"+e,function(){u.destroy()}),u}function j(e){var t=this,n=e.elements.tooltip,o=e.options.content.ajax,u=b.defaults.content.ajax,a=".qtip-ajax",f=/<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/gi,l=i,c=s,h;e.checks.ajax={"^content.ajax":function(e,r,i){r==="ajax"&&(o=i),r==="once"?t.init():o&&o.url?t.load():n.unbind(a)}},r.extend(t,{init:function(){return o&&o.url&&n.unbind(a)[o.once?"one":"bind"]("tooltipshow"+a,t.load),t},load:function(n){function g(){var t;if(e.destroyed)return;l=s,v&&(c=i,e.show(n.originalEvent)),(t=u.complete||o.complete)&&r.isFunction(t)&&t.apply(o.context||e,arguments)}function y(t,n,i){var s;if(e.destroyed)return;d&&"string"==typeof t&&(t=r("<div/>").append(t.replace(f,"")).find(d)),(s=u.success||o.success)&&r.isFunction(s)?s.call(o.context||e,t,n,i):e.set("content.text",t)}function b(t,n,r){if(e.destroyed||t.status===0)return;e.set("content.text",n+": "+r)}if(c){c=s;return}var a=o.url.lastIndexOf(" "),p=o.url,d,v=!o.loading&&l;if(v)try{n.preventDefault()}catch(m){}else if(n&&n.isDefaultPrevented())return t;h&&h.abort&&h.abort(),a>-1&&(d=p.substr(a),p=p.substr(0,a)),h=r.ajax(r.extend({error:u.error||b,context:e},o,{url:p,success:y,complete:g}))},destroy:function(){h&&h.abort&&h.abort(),e.destroyed=i}}),t.init()}function F(e,t,n){var r=Math.ceil(t/2),i=Math.ceil(n/2),s={bottomright:[[0,0],[t,n],[t,0]],bottomleft:[[0,0],[t,0],[0,n]],topright:[[0,n],[t,0],[t,n]],topleft:[[0,0],[0,n],[t,n]],topcenter:[[0,n],[r,0],[t,n]],bottomcenter:[[0,0],[t,0],[r,n]],rightcenter:[[0,0],[t,i],[0,n]],leftcenter:[[t,0],[t,n],[0,i]]};return s.lefttop=s.bottomright,s.righttop=s.bottomleft,s.leftbottom=s.topright,s.rightbottom=s.topleft,s[e.string()]}function I(e,t){function A(e){var t=E.is(":visible");E.show(),e(),E.toggle(t)}function O(){x.width=g.height,x.height=g.width}function M(){x.width=g.width,x.height=g.height}function _(t,r,o,f){if(!b.tip)return;var l=m.corner.clone(),w=o.adjusted,E=e.options.position.adjust.method.split(" "),x=E[0],T=E[1]||E[0],N={left:s,top:s,x:0,y:0},C,k={},L;m.corner.fixed!==i&&(x===y&&l.precedance===u&&w.left&&l.y!==v?l.precedance=l.precedance===u?a:u:x!==y&&w.left&&(l.x=l.x===v?w.left>0?h:d:l.x===h?d:h),T===y&&l.precedance===a&&w.top&&l.x!==v?l.precedance=l.precedance===a?u:a:T!==y&&w.top&&(l.y=l.y===v?w.top>0?c:p:l.y===c?p:c),l.string()!==S.corner.string()&&(S.top!==w.top||S.left!==w.left)&&m.update(l,s)),C=m.position(l,w),C[l.x]+=P(l,l.x),C[l.y]+=P(l,l.y),C.right!==n&&(C.left=-C.right),C.bottom!==n&&(C.top=-C.bottom),C.user=Math.max(0,g.offset);if(N.left=x===y&&!!w.left)l.x===v?k["margin-left"]=N.x=C["margin-left"]-w.left:(L=C.right!==n?[w.left,-C.left]:[-w.left,C.left],(N.x=Math.max(L[0],L[1]))>L[0]&&(o.left-=w.left,N.left=s),k[C.right!==n?d:h]=N.x);if(N.top=T===y&&!!w.top)l.y===v?k["margin-top"]=N.y=C["margin-top"]-w.top:(L=C.bottom!==n?[w.top,-C.top]:[-w.top,C.top],(N.y=Math.max(L[0],L[1]))>L[0]&&(o.top-=w.top,N.top=s),k[C.bottom!==n?p:c]=N.y);b.tip.css(k).toggle(!(N.x&&N.y||l.x===v&&N.y||l.y===v&&N.x)),o.left-=C.left.charAt?C.user:x!==y||N.top||!N.left&&!N.top?C.left:0,o.top-=C.top.charAt?C.user:T!==y||N.left||!N.left&&!N.top?C.top:0,S.left=w.left,S.top=w.top,S.corner=l.clone()}function D(){var t=g.corner,n=e.options.position,r=n.at,o=n.my.string?n.my.string():n.my;return t===s||o===s&&r===s?s:(t===i?m.corner=new w.Corner(o):t.string||(m.corner=new w.Corner(t),m.corner.fixed=i),S.corner=new w.Corner(m.corner.string()),m.corner.string()!=="centercenter")}function P(e,t,n){t=t?t:e[e.precedance];var r=b.titlebar&&e.y===c,i=r?b.titlebar:E,s="border-"+t+"-width",o=function(e){return parseInt(e.css(s),10)},u;return A(function(){u=(n?o(n):o(b.content)||o(i)||o(E))||0}),u}function H(e){var t=b.titlebar&&e.y===c,n=t?b.titlebar:b.content,i=r.browser.mozilla,s=i?"-moz-":r.browser.webkit?"-webkit-":"",o="border-radius-"+e.y+e.x,u="border-"+e.y+"-"+e.x+"-radius",a=function(e){return parseInt(n.css(e),10)||parseInt(E.css(e),10)},f;return A(function(){f=a(u)||a(s+u)||a(s+o)||a(o)||0}),f}function B(e){function N(e,t,n){var r=e.css(t)||p;return n&&r===e.css(n)?s:f.test(r)?s:r}var t,n,o,u=b.tip.css("cssText",""),a=e||m.corner,f=/rgba?\(0, 0, 0(, 0)?\)|transparent|#123456/i,l="border-"+a[a.precedance]+"-color",h="background-color",p="transparent",d=" !important",y=b.titlebar,w=y&&(a.y===c||a.y===v&&u.position().top+x.height/2+g.offset<y.outerHeight(i)),S=w?y:b.content;A(function(){T.fill=N(u,h)||N(S,h)||N(b.content,h)||N(E,h)||u.css(h),T.border=N(u,l,"color")||N(S,l,"color")||N(b.content,l,"color")||N(E,l,"color")||E.css(l),r("*",u).add(u).css("cssText",h+":"+p+d+";border:0"+d+";")})}function j(e){var t=e.precedance===a,n=x[t?f:l],r=x[t?l:f],i=e.string().indexOf(v)>-1,s=n*(i?.5:1),o=Math.pow,u=Math.round,c,h,p,d=Math.sqrt(o(s,2)+o(r,2)),m=[N/s*d,N/r*d];return m[2]=Math.sqrt(o(m[0],2)-o(N,2)),m[3]=Math.sqrt(o(m[1],2)-o(N,2)),c=d+m[2]+m[3]+(i?0:m[0]),h=c/d,p=[u(h*r),u(h*n)],{height:p[t?0:1],width:p[t?1:0]}}function I(e,t,n){return"<qvml:"+e+' xmlns="urn:schemas-microsoft.com:vml" class="qtip-vml" '+(t||"")+' style="behavior: url(#default#VML); '+(n||"")+'" />'}var m=this,g=e.options.style.tip,b=e.elements,E=b.tooltip,S={top:0,left:0},x={width:g.width,height:g.height},T={},N=g.border||0,C=".qtip-tip",k=!!(r("<canvas />")[0]||{}).getContext,L;m.corner=o,m.mimic=o,m.border=N,m.offset=g.offset,m.size=x,e.checks.tip={"^position.my|style.tip.(corner|mimic|border)$":function(){m.init()||m.destroy(),e.reposition()},"^style.tip.(height|width)$":function(){x={width:g.width,height:g.height},m.create(),m.update(),e.reposition()},"^content.title.text|style.(classes|widget)$":function(){b.tip&&b.tip.length&&m.update()}},r.extend(m,{init:function(){var e=D()&&(k||r.browser.msie);return e&&(m.create(),m.update(),E.unbind(C).bind("tooltipmove"+C,_),k||E.bind("tooltipredraw tooltipredrawn",function(e){e.type==="tooltipredraw"?(L=b.tip.html(),b.tip.html("")):b.tip.html(L)})),e},create:function(){var e=x.width,t=x.height,n;b.tip&&b.tip.remove(),b.tip=r("<div />",{"class":"ui-tooltip-tip"}).css({width:e,height:t}).prependTo(E),k?r("<canvas />").appendTo(b.tip)[0].getContext("2d").save():(n=I("shape",'coordorigin="0,0"',"position:absolute;"),b.tip.html(n+n),r("*",b.tip).bind("click mousedown",function(e){e.stopPropagation()}))},update:function(e,t){var n=b.tip,f=n.children(),l=x.width,y=x.height,C=g.mimic,L=Math.round,A,_,D,H,q;e||(e=S.corner||m.corner),C===s?C=e:(C=new w.Corner(C),C.precedance=e.precedance,C.x==="inherit"?C.x=e.x:C.y==="inherit"?C.y=e.y:C.x===C.y&&(C[e.precedance]=e[e.precedance])),A=C.precedance,e.precedance===u?O():M(),b.tip.css({width:l=x.width,height:y=x.height}),B(e),T.border!=="transparent"?(N=P(e,o),g.border===0&&N>0&&(T.fill=T.border),m.border=N=g.border!==i?g.border:N):m.border=N=0,D=F(C,l,y),m.size=q=j(e),n.css(q),e.precedance===a?H=[L(C.x===h?N:C.x===d?q.width-l-N:(q.width-l)/2),L(C.y===c?q.height-y:0)]:H=[L(C.x===h?q.width-l:0),L(C.y===c?N:C.y===p?q.height-y-N:(q.height-y)/2)],k?(f.attr(q),_=f[0].getContext("2d"),_.restore(),_.save(),_.clearRect(0,0,3e3,3e3),_.fillStyle=T.fill,_.strokeStyle=T.border,_.lineWidth=N*2,_.lineJoin="miter",_.miterLimit=100,_.translate(H[0],H[1]),_.beginPath(),_.moveTo(D[0][0],D[0][1]),_.lineTo(D[1][0],D[1][1]),_.lineTo(D[2][0],D[2][1]),_.closePath(),N&&(E.css("background-clip")==="border-box"&&(_.strokeStyle=T.fill,_.stroke()),_.strokeStyle=T.border,_.stroke()),_.fill()):(D="m"+D[0][0]+","+D[0][1]+" l"+D[1][0]+","+D[1][1]+" "+D[2][0]+","+D[2][1]+" xe",H[2]=N&&/^(r|b)/i.test(e.string())?parseFloat(r.browser.version,10)===8?2:1:0,f.css({coordsize:l+N+" "+(y+N),antialias:""+(C.string().indexOf(v)>-1),left:H[0],top:H[1],width:l+N,height:y+N}).each(function(e){var t=r(this);t[t.prop?"prop":"attr"]({coordsize:l+N+" "+(y+N),path:D,fillcolor:T.fill,filled:!!e,stroked:!e}).toggle(!!N||!!e),!e&&t.html()===""&&t.html(I("stroke",'weight="'+N*2+'px" color="'+T.border+'" miterlimit="1000" joinstyle="miter"'))})),t!==s&&m.position(e)},position:function(e){var t=b.tip,n={},i=Math.max(0,g.offset),o,p,d;return g.corner===s||!t?s:(e=e||m.corner,o=e.precedance,p=j(e),d=[e.x,e.y],o===u&&d.reverse(),r.each(d,function(t,r){var s,u,d;r===v?(s=o===a?h:c,n[s]="50%",n["margin-"+s]=-Math.round(p[o===a?f:l]/2)+i):(s=P(e,r),u=P(e,r,b.content),d=H(e),n[r]=t?u:i+(d>s?d:-s))}),n[e[o]]-=p[o===u?f:l],t.css({top:"",bottom:"",left:"",right:"",margin:""}).css(n),n)},destroy:function(){b.tip&&b.tip.remove(),b.tip=!1,E.unbind(C)}}),m.init()}function q(n){function y(){m=r(v,f).not("[disabled]").map(function(){return typeof this.focus=="function"?this:null})}function b(e){m.length<1&&e.length?e.not("body").blur():m.first().focus()}function E(e){var t=r(e.target),n=t.closest(".qtip"),i;i=n.length<1?s:parseInt(n[0].style.zIndex,10)>parseInt(f[0].style.zIndex,10),!i&&r(e.target).closest(C)[0]!==f[0]&&b(t)}var o=this,u=n.options.show.modal,a=n.elements,f=a.tooltip,l="#qtip-overlay",c=".qtipmodal",h=c+n.id,p="is-modal-qtip",d=r(t.body),v=w.modal.focusable.join(","),m={},g;n.checks.modal={"^show.modal.(on|blur)$":function(){o.init(),a.overlay.toggle(f.is(":visible"))},"^content.text$":function(){y()}},r.extend(o,{init:function(){return u.on?(g=o.create(),f.attr(p,i).css("z-index",w.modal.zindex+r(C+"["+p+"]").length).unbind(c).unbind(h).bind("tooltipshow"+c+" tooltiphide"+c,function(e,t,n){var i=e.originalEvent;if(e.target===f[0])if(i&&e.type==="tooltiphide"&&/mouse(leave|enter)/.test(i.type)&&r(i.relatedTarget).closest(g[0]).length)try{e.preventDefault()}catch(s){}else(!i||i&&!i.solo)&&o[e.type.replace("tooltip","")](e,n)}).bind("tooltipfocus"+c,function(e){if(e.isDefaultPrevented()||e.target!==f[0])return;var t=r(C).filter("["+p+"]"),n=w.modal.zindex+t.length,i=parseInt(f[0].style.zIndex,10);g[0].style.zIndex=n-2,t.each(function(){this.style.zIndex>i&&(this.style.zIndex-=1)}),t.end().filter("."+L).qtip("blur",e.originalEvent),f.addClass(L)[0].style.zIndex=n;try{e.preventDefault()}catch(s){}}).bind("tooltiphide"+c,function(e){e.target===f[0]&&r("["+p+"]").filter(":visible").not(f).last().qtip("focus",e)}),u.escape&&r(t).unbind(h).bind("keydown"+h,function(e){e.keyCode===27&&f.hasClass(L)&&n.hide(e)}),u.blur&&a.overlay.unbind(h).bind("click"+h,function(e){f.hasClass(L)&&n.hide(e)}),y(),o):o},create:function(){function n(){g.css({height:r(e).height(),width:r(e).width()})}var t=r(l);return t.length?a.overlay=t.insertAfter(r(C).last()):(g=a.overlay=r("<div />",{id:l.substr(1),html:"<div></div>",mousedown:function(){return s}}).hide().insertAfter(r(C).last()),r(e).unbind(c).bind("resize"+c,n),n(),g)},toggle:function(e,t,n){if(e&&e.isDefaultPrevented())return o;var a=u.effect,l=t?"show":"hide",c=g.is(":visible"),v=r("["+p+"]").filter(":visible").not(f),m;return g||(g=o.create()),g.is(":animated")&&c===t||!t&&v.length?o:(t?(g.css({left:0,top:0}),g.toggleClass("blurs",u.blur),u.stealfocus!==s&&(d.bind("focusin"+h,E),b(r("body :focus")))):d.unbind("focusin"+h),g.stop(i,s),r.isFunction(a)?a.call(g,t):a===s?g[l]():g.fadeTo(parseInt(n,10)||90,t?1:0,function(){t||r(this).hide()}),t||g.queue(function(e){g.css({left:"",top:""}),e()}),o)},show:function(e,t){return o.toggle(e,i,t)},hide:function(e,t){return o.toggle(e,s,t)},destroy:function(){var e=g;return e&&(e=r("["+p+"]").not(f).length<1,e?(a.overlay.remove(),r(t).unbind(c)):a.overlay.unbind(c+n.id),d.undelegate("*","focusin"+h)),f.removeAttr(p).unbind(c)}}),o.init()}function R(e){var t=this,n=e.elements,i=n.tooltip,s=".bgiframe-"+e.id;r.extend(t,{init:function(){n.bgiframe=r('<iframe class="ui-tooltip-bgiframe" frameborder="0" tabindex="-1" src="javascript:\'\';"  style="display:block; position:absolute; z-index:-1; filter:alpha(opacity=0); -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";"></iframe>'),n.bgiframe.appendTo(i),i.bind("tooltipmove"+s,t.adjust)},adjust:function(){var t=e.get("dimensions"),r=e.plugins.tip,s=n.tip,o,u;u=parseInt(i.css("border-left-width"),10)||0,u={left:-u,top:-u},r&&s&&(o=r.corner.precedance==="x"?["width","left"]:["height","top"],u[o[1]]-=s[o[0]]()),n.bgiframe.css(u).css(t)},destroy:function(){n.bgiframe.remove(),i.unbind(s)}}),t.init()}var i=!0,s=!1,o=null,u="x",a="y",f="width",l="height",c="top",h="left",p="bottom",d="right",v="center",m="flip",g="flipinvert",y="shift",b,w,E,S={},x="ui-tooltip",T="ui-widget",N="ui-state-disabled",C="div.qtip."+x,k=x+"-default",L=x+"-focus",A=x+"-hover",O="_replacedByqTip",M="oldtitle",_,D;D=r("<div/>",{id:"qtip-rcontainer"}),r(function(){D.appendTo(t.body)}),b=r.fn.qtip=function(e,t,u){var a=(""+e).toLowerCase(),f=o,l=r.makeArray(arguments).slice(1),c=l[l.length-1],h=this[0]?r.data(this[0],"qtip"):o;if(!arguments.length&&h||a==="api")return h;if("string"==typeof e)return this.each(function(){var e=r.data(this,"qtip");if(!e)return i;c&&c.timeStamp&&(e.cache.event=c);if(a!=="option"&&a!=="options"||!t)e[a]&&e[a].apply(e[a],l);else{if(!r.isPlainObject(t)&&u===n)return f=e.get(t),s;e.set(t,u)}}),f!==o?f:this;if("object"==typeof e||!arguments.length)return h=P(r.extend(i,{},e)),b.bind.call(this,h,c)},b.bind=function(e,t){return this.each(function(o){function p(e){function t(){c.render(typeof e=="object"||u.show.ready),a.show.add(a.hide).unbind(l)}if(c.cache.disabled)return s;c.cache.event=r.extend({},e),c.cache.target=e?r(e.target):[n],u.show.delay>0?(clearTimeout(c.timers.show),c.timers.show=setTimeout(t,u.show.delay),f.show!==f.hide&&a.hide.bind(f.hide,function(){clearTimeout(c.timers.show)})):t()}var u,a,f,l,c,h;h=r.isArray(e.id)?e.id[o]:e.id,h=!h||h===s||h.length<1||S[h]?b.nextid++:S[h]=h,l=".qtip-"+h+"-create",c=B.call(this,h,e);if(c===s)return i;u=c.options,r.each(w,function(){this.initialize==="initialize"&&this(c)}),a={show:u.show.target,hide:u.hide.target},f={show:r.trim(""+u.show.event).replace(/ /g,l+" ")+l,hide:r.trim(""+u.hide.event).replace(/ /g,l+" ")+l},/mouse(over|enter)/i.test(f.show)&&!/mouse(out|leave)/i.test(f.hide)&&(f.hide+=" mouseleave"+l),a.show.bind("mousemove"+l,function(e){E={pageX:e.pageX,pageY:e.pageY,type:"mousemove"},c.cache.onTarget=i}),a.show.bind(f.show,p),(u.show.ready||u.prerender)&&p(t)})},w=b.plugins={Corner:function(e){e=(""+e).replace(/([A-Z])/," $1").replace(/middle/gi,v).toLowerCase(),this.x=(e.match(/left|right/i)||e.match(/center/)||["inherit"])[0].toLowerCase(),this.y=(e.match(/top|bottom|center/i)||["inherit"])[0].toLowerCase();var t=e.charAt(0);this.precedance=t==="t"||t==="b"?a:u,this.string=function(){return this.precedance===a?this.y+this.x:this.x+this.y},this.abbrev=function(){var e=this.x.substr(0,1),t=this.y.substr(0,1);return e===t?e:this.precedance===a?t+e:e+t},this.invertx=function(e){this.x=this.x===h?d:this.x===d?h:e||this.x},this.inverty=function(e){this.y=this.y===c?p:this.y===p?c:e||this.y},this.clone=function(){return{x:this.x,y:this.y,precedance:this.precedance,string:this.string,abbrev:this.abbrev,clone:this.clone,invertx:this.invertx,inverty:this.inverty}}},offset:function(e,t){function f(e,t){n.left+=t*e.scrollLeft(),n.top+=t*e.scrollTop()}var n=e.offset(),i=e.closest("body")[0],s=t,o,u,a;if(s){do s.css("position")!=="static"&&(u=s.position(),n.left-=u.left+(parseInt(s.css("borderLeftWidth"),10)||0)+(parseInt(s.css("marginLeft"),10)||0),n.top-=u.top+(parseInt(s.css("borderTopWidth"),10)||0)+(parseInt(s.css("marginTop"),10)||0),!o&&(a=s.css("overflow"))!=="hidden"&&a!=="visible"&&(o=s));while((s=r(s[0].offsetParent)).length);o&&o[0]!==i&&f(o,1)}return n},iOS:parseFloat((""+(/CPU.*OS ([0-9_]{1,5})|(CPU like).*AppleWebKit.*Mobile/i.exec(navigator.userAgent)||[0,""])[1]).replace("undefined","3_2").replace("_",".").replace("_",""))||s,fn:{attr:function(e,t){if(this.length){var n=this[0],i="title",s=r.data(n,"qtip");if(e===i&&s&&"object"==typeof s&&s.options.suppress)return arguments.length<2?r.attr(n,M):(s&&s.options.content.attr===i&&s.cache.attr&&s.set("content.text",t),this.attr(M,t))}return r.fn["attr"+O].apply(this,arguments)},clone:function(e){var t=r([]),n="title",i=r.fn["clone"+O].apply(this,arguments);return e||i.filter("["+M+"]").attr("title",function(){return r.attr(this,M)}).removeAttr(M),i}}},r.each(w.fn,function(e,t){if(!t||r.fn[e+O])return i;var n=r.fn[e+O]=r.fn[e];r.fn[e]=function(){return t.apply(this,arguments)||n.apply(this,arguments)}}),r.ui||(r["cleanData"+O]=r.cleanData,r.cleanData=function(e){for(var t=0,i;(i=e[t])!==n;t++)try{r(i).triggerHandler("removeqtip")}catch(s){}r["cleanData"+O](e)}),b.version="@VERSION",b.nextid=0,b.inactiveEvents="click dblclick mousedown mouseup mousemove mouseleave mouseenter".split(" "),b.zindex=15e3,b.defaults={prerender:s,id:s,overwrite:i,suppress:i,content:{text:i,attr:"title",title:{text:s,button:s}},position:{my:"top left",at:"bottom right",target:s,container:s,viewport:s,adjust:{x:0,y:0,mouse:i,resize:i,method:"flip flip"},effect:function(e,t,n){r(this).animate(t,{duration:200,queue:s})}},show:{target:s,event:"mouseenter",effect:i,delay:90,solo:s,ready:s,autofocus:s},hide:{target:s,event:"mouseleave",effect:i,delay:0,fixed:s,inactive:s,leave:"window",distance:s},style:{classes:"",widget:s,width:s,height:s,def:i},events:{render:o,move:o,show:o,hide:o,toggle:o,visible:o,hidden:o,focus:o,blur:o}},w.svg=function(e,n,i,s){var o=r(t),u=n[0],a={width:0,height:0,position:{top:1e10,left:1e10}},f,l,c,h,p;while(!u.getBBox)u=u.parentNode;if(u.getBBox&&u.parentNode){f=u.getBBox(),l=u.getScreenCTM(),c=u.farthestViewportElement||u;if(!c.createSVGPoint)return a;h=c.createSVGPoint(),h.x=f.x,h.y=f.y,p=h.matrixTransform(l),a.position.left=p.x,a.position.top=p.y,h.x+=f.width,h.y+=f.height,p=h.matrixTransform(l),a.width=p.x-a.position.left,a.height=p.y-a.position.top,a.position.left+=o.scrollLeft(),a.position.top+=o.scrollTop()}return a},w.ajax=function(e){var t=e.plugins.ajax;return"object"==typeof t?t:e.plugins.ajax=new j(e)},w.ajax.initialize="render",w.ajax.sanitize=function(e){var t=e.content,n;t&&"ajax"in t&&(n=t.ajax,typeof n!="object"&&(n=e.content.ajax={url:n}),"boolean"!=typeof n.once&&n.once&&(n.once=!!n.once))},r.extend(i,b.defaults,{content:{ajax:{loading:i,once:i}}}),w.tip=function(e){var t=e.plugins.tip;return"object"==typeof t?t:e.plugins.tip=new I(e)},w.tip.initialize="render",w.tip.sanitize=function(e){var t=e.style,n;t&&"tip"in t&&(n=e.style.tip,typeof n!="object"&&(e.style.tip={corner:n}),/string|boolean/i.test(typeof n.corner)||(n.corner=i),typeof n.width!="number"&&delete n.width,typeof n.height!="number"&&delete n.height,typeof n.border!="number"&&n.border!==i&&delete n.border,typeof n.offset!="number"&&delete n.offset)},r.extend(i,b.defaults,{style:{tip:{corner:i,mimic:s,width:6,height:6,border:i,offset:0}}}),w.modal=function(e){var t=e.plugins.modal;return"object"==typeof t?t:e.plugins.modal=new q(e)},w.modal.initialize="render",w.modal.sanitize=function(e){e.show&&(typeof e.show.modal!="object"?e.show.modal={on:!!e.show.modal}:typeof e.show.modal.on=="undefined"&&(e.show.modal.on=i))},w.modal.zindex=b.zindex-200,w.modal.focusable=["a[href]","area[href]","input","select","textarea","button","iframe","object","embed","[tabindex]","[contenteditable]"],r.extend(i,b.defaults,{show:{modal:{on:s,effect:i,blur:i,stealfocus:i,escape:i}}}),w.viewport=function(n,r,i,s,o,m,b){function j(e,t,n,i,s,o,u,a,f){var l=r[s],c=S[e],h=T[e],p=n===y,d=-O.offset[s]+A.offset[s]+A["scroll"+s],m=c===s?f:c===o?-f:-f/2,b=h===s?a:h===o?-a:-a/2,w=_&&_.size?_.size[u]||0:0,E=_&&_.corner&&_.corner.precedance===e&&!p?w:0,x=d-l+E,N=l+f-A[u]-d+E,C=m-(S.precedance===e||c===S[t]?b:0)-(h===v?a/2:0);return p?(E=_&&_.corner&&_.corner.precedance===t?w:0,C=(c===s?1:-1)*m-E,r[s]+=x>0?x:N>0?-N:0,r[s]=Math.max(-O.offset[s]+A.offset[s]+(E&&_.corner[e]===v?_.offset:0),l-C,Math.min(Math.max(-O.offset[s]+A.offset[s]+A[u],l+C),r[s]))):(i*=n===g?2:0,x>0&&(c!==s||N>0)?(r[s]-=C+i,H["invert"+e](s)):N>0&&(c!==o||x>0)&&(r[s]-=(c===v?-C:C)+i,H["invert"+e](o)),r[s]<d&&-r[s]>N&&(r[s]=l,H=S.clone())),r[s]-l}var w=i.target,E=n.elements.tooltip,S=i.my,T=i.at,N=i.adjust,C=N.method.split(" "),k=C[0],L=C[1]||C[0],A=i.viewport,O=i.container,M=n.cache,_=n.plugins.tip,D={left:0,top:0},P,H,B;if(!A.jquery||w[0]===e||w[0]===t.body||N.method==="none")return D;P=E.css("position")==="fixed",A={elem:A,height:A[(A[0]===e?"h":"outerH")+"eight"](),width:A[(A[0]===e?"w":"outerW")+"idth"](),scrollleft:P?0:A.scrollLeft(),scrolltop:P?0:A.scrollTop(),offset:A.offset()||{left:0,top:0}},O={elem:O,scrollLeft:O.scrollLeft(),scrollTop:O.scrollTop(),offset:O.offset()||{left:0,top:0}};if(k!=="shift"||L!=="shift")H=S.clone();return D={left:k!=="none"?j(u,a,k,N.x,h,d,f,s,m):0,top:L!=="none"?j(a,u,L,N.y,c,p,l,o,b):0},H&&M.lastClass!==(B=x+"-pos-"+H.abbrev())&&E.removeClass(n.cache.lastClass).addClass(n.cache.lastClass=B),D},w.imagemap=function(e,t,n,i){function E(e,t,n){var r=0,i=1,s=1,o=0,u=0,a=e.width,f=e.height;while(a>0&&f>0&&i>0&&s>0){a=Math.floor(a/2),f=Math.floor(f/2),n.x===h?i=a:n.x===d?i=e.width-a:i+=Math.floor(a/2),n.y===c?s=f:n.y===p?s=e.height-f:s+=Math.floor(f/2),r=t.length;while(r--){if(t.length<2)break;o=t[r][0]-e.position.left,u=t[r][1]-e.position.top,(n.x===h&&o>=i||n.x===d&&o<=i||n.x===v&&(o<i||o>e.width-i)||n.y===c&&u>=s||n.y===p&&u<=s||n.y===v&&(u<s||u>e.height-s))&&t.splice(r,1)}}return{left:t[0][0],top:t[0][1]}}t.jquery||(t=r(t));var s=e.cache.areas={},o=(t[0].shape||t.attr("shape")).toLowerCase(),u=t[0].coords||t.attr("coords"),a=u.split(","),f=[],l=r('img[usemap="#'+t.parent("map").attr("name")+'"]'),m=l.offset(),g={width:0,height:0,position:{top:1e10,right:0,bottom:0,left:1e10}},y=0,b=0,w;m.left+=Math.ceil((l.outerWidth()-l.width())/2),m.top+=Math.ceil((l.outerHeight()-l.height())/2);if(o==="poly"){y=a.length;while(y--)b=[parseInt(a[--y],10),parseInt(a[y+1],10)],b[0]>g.position.right&&(g.position.right=b[0]),b[0]<g.position.left&&(g.position.left=b[0]),b[1]>g.position.bottom&&(g.position.bottom=b[1]),b[1]<g.position.top&&(g.position.top=b[1]),f.push(b)}else{y=-1;while(y++<a.length)f.push(parseInt(a[y],10))}switch(o){case"rect":g={width:Math.abs(f[2]-f[0]),height:Math.abs(f[3]-f[1]),position:{left:Math.min(f[0],f[2]),top:Math.min(f[1],f[3])}};break;case"circle":g={width:f[2]+2,height:f[2]+2,position:{left:f[0],top:f[1]}};break;case"poly":g.width=Math.abs(g.position.right-g.position.left),g.height=Math.abs(g.position.bottom-g.position.top),n.abbrev()==="c"?g.position={left:g.position.left+g.width/2,top:g.position.top+g.height/2}:(s[n+u]||(g.position=E(g,f.slice(),n),i&&(i[0]==="flip"||i[1]==="flip")&&(g.offset=E(g,f.slice(),{x:n.x===h?d:n.x===d?h:v,y:n.y===c?p:n.y===p?c:v}),g.offset.left-=g.position.left,g.offset.top-=g.position.top),s[n+u]=g),g=s[n+u]),g.width=g.height=0}return g.position.left+=m.left,g.position.top+=m.top,g},w.bgiframe=function(e){var t=r.browser,n=e.plugins.bgiframe;return r("select, object").length<1||!t.msie||(""+t.version).charAt(0)!=="6"?s:"object"==typeof n?n:e.plugins.bgiframe=new R(e)},w.bgiframe.initialize="render"})})(window,document);