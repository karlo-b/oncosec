!function(a){"use strict";window.jqueryCss3AnimationQueue||(window.jqueryCss3AnimationQueue={}),window.jqueryCss3AnimationQueue.settings||(window.jqueryCss3AnimationQueue.settings={}),window.jqueryCss3AnimationQueue.settings.delay||(window.jqueryCss3AnimationQueue.settings.delay=300),window.jqueryCss3AnimationQueue.settings.offset||(window.jqueryCss3AnimationQueue.settings.offset=150),void 0===window.jqueryCss3AnimationQueue.settings.applySort&&(window.jqueryCss3AnimationQueue.settings.applySort=!0),void 0===window.jqueryCss3AnimationQueue.settings.triggerViewport&&(window.jqueryCss3AnimationQueue.settings.triggerViewport=!0);var n=a(window),r=[],d=a(".animated.standby"),s=!1,f={sortByOffsetTop:function(e,t){var s=window.jqueryCss3AnimationQueue.settings.offset,n=window.jqueryCss3AnimationQueue.settings.offset,i=e.offset().top,o=e.offset().left,u=t.offset().top,a=t.offset().left;return e.data("offset")&&(s=parseInt(e.data("offset"))),t.data("offset")&&(n=parseInt(t.data("offset"))),o<a?n-=5:a<o&&(s-=5),i-s-(u-n)},processQueue:function(){if(!s&&r.length){s=!0;var e=window.jqueryCss3AnimationQueue.settings.delay,t=r.shift();t.removeClass("standby").trigger("animationQueue"),t.data("delay")&&(e=parseInt(t.data("delay"))),setTimeout(function(){s=!1,f.processQueue()},e)}},addToQueue:function(){var i=n.scrollTop(),o=n.height(),u=!1;d.each(function(){var e=a(this),t=e.offset().top,s=window.jqueryCss3AnimationQueue.settings.offset,n=i+o;e.data("offset")&&(s=parseInt(e.data("offset"))),t+s<n&&(r.push(e),d=d.not(this),u=!0)}),u&&window.jqueryCss3AnimationQueue.settings.applySort&&r.sort(f.sortByOffsetTop)},immediateAnimation:function(e){e=e||n.scrollTop();for(var t=0;t<r.length;t++){var s=r[t];s.offset().top<e&&(s.removeClass("standby"),r.splice(t,1))}},update:function(){d=a(".animated.standby"),r=[],f.addToQueue(),f.processQueue()}};a.fn.jqueryCss3AnimationQueue=function(e){return f[e]?f[e].apply(this,Array.prototype.slice.call(arguments,1)):"object"!=typeof e&&e?void a.error("Method "+e+" does not exist on jQuery.jqueryCss3AnimationQueue"):f.init.apply(this,arguments)},n.scroll(function(){f.addToQueue(),f.processQueue(),window.jqueryCss3AnimationQueue.settings.triggerViewport&&f.immediateAnimation()}),a(document).ready(function(){window.jqueryCss3AnimationQueue.settings.applySort=!1,d=a(".animated.standby"),n.scroll()})}(jQuery);