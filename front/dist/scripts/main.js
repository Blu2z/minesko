"use strict";"function"!=typeof Object.create&&(Object.create=function(t){function e(){}return e.prototype=t,new e}),function(t,e,i,s){var n={init:function(e,i){var s=this;if(s.maxScrollPosition=0,s.elem=i,s.options=t.extend({},t.fn.sliderShop.options,e),this.wrapper=t(this.elem).find(".slider__wrapper"),this.swither=this.wrapper.children().addClass("swither__item"),this.cnt=this.wrapper.find(".swither__item").length,this.countBoxs=t(this.elem).find("."+this.options.countBox),this.originSize=parseFloat(t(s.elem).css("max-width")),this.deltaHeight=t(i).outerHeight(!0)-this.wrapper.height(),this.originHeight=t(i).outerHeight(!0),s.calcConst(),this.swither.first().addClass("swither__item--edge"),t(this.elem).find(".nav").on("click",function(e){e.preventDefault();var n=t(i).find(".swither__item--edge");(!t(this).hasClass("nav--prev")||n.prev().length)&&(t(this).hasClass("nav--prev")?s.toGalleryItem(n.prev()):s.toGalleryItem(n.next()))}),this.options.animBox&&this.prepareTooltip(),this.options.response&&(this.response(),t("body").trigger("resize")),this.options.touch&&this.initTouch(),this.options.countSelect&&this.countBoxs.on("click",function(){var e=t(this).prevAll().length,n=t(i).find(".swither__item").removeClass("swither__item--edge"),o=t(n[e]).addClass("swither__item--edge");s.toGalleryItem(o)}),this.options.timer){var n;t(this.elem).on({mouseenter:function(){clearInterval(n)},mouseleave:function(){n=setInterval(function(){var e=t(i).find(".swither__item--edge");s.toGalleryItem(e.next())},s.options.timer)}}),t(this.elem).trigger("mouseleave")}},calcConst:function(){var e=this,i=0,s=(t(this.elem).outerWidth()-40,this.wrapper.parent().width()-this.swither.outerWidth(!0)*this.options.caseLimit),n="auto"===this.options.spaceSection?s/(2*this.options.caseLimit):this.options.spaceSection;n=0>s?0:n,this.swither.css({"margin-left":n,"margin-right":n}).each(function(){i+=t(this).outerWidth(!0)}),1==this.options.count&&t(this.elem).find(".slider__input").text("1 / "+this.swither.length),e.maxScrollPosition=i-this.swither.outerWidth(!0)*this.options.caseLimit,this.wrapper.width(i+20)},response:function(){var i=this;t(e).on("resize",function(){var s=t(i.elem).outerWidth(!0),n=parseFloat(t(i.elem).css("max-width")),o=t(e).width()>1400?1400:t(e).width(),h=t(e).height()-70<400?400:t(e).height();h=h>700?700:h,"height"==i.options.response?n>o&&(t(i.elem).height(h+i.deltaHeight),i.swither.find(".slider__img").height(h),i.swither.width(o),i.swither.find(".slider__img").css({"margin-left":(o-1.75*h)/2,"margin-right":(o-1.75*h)/2})):(i.swither.width(s>n?n/i.options.caseLimit:s/i.options.caseLimit),t(e).load(function(){t(i.elem).height(i.swither.height()+i.deltaHeight)}),t(i.elem).height(i.swither.height()+i.deltaHeight)),i.calcConst();var r=t(i.elem).find(".swither__item--edge").position().left;i.wrapper.css("left",-r)})},initTouch:function(){var e=this;this.touch={start:{x:0,y:0},end:{x:0,y:0},onTouchStart:function(t){e.touch.start.x=t.originalEvent.changedTouches[0].pageX},onTouchMove:function(t){var i=t.originalEvent,s=Math.abs(i.changedTouches[0].pageX-e.touch.start.x),n=Math.abs(i.changedTouches[0].pageY-e.touch.start.y);3*s>n&&t.preventDefault()},onTouchEnd:function(i){if(e.touch.end.x=i.originalEvent.changedTouches[0].pageX,e.distance=e.touch.end.x-e.touch.start.x,Math.abs(e.distance)>50){var s=t(e.elem).find(".swither__item--edge");e.distance>0?e.toGalleryItem(s.prev()):e.toGalleryItem(s.next())}}},t(this.elem).on("touchstart",e.touch.onTouchStart).on("touchmove",e.touch.onTouchMove).on("touchend",this.touch.onTouchEnd)},prepareTooltip:function(){var e=t(this.elem).find("."+this.options.animBox);e.each(function(e,i){this.x=t(this).data("x"),this.y=t(this).data("y"),this.time=t(this).data("time");var s=this;setTimeout(function(){t(s).fadeIn(500)},this.time)})},animBox:function(e){if(this.options.animBox){var i=t(e).find("."+this.options.animBox).hide();i.each(function(e,i){this.x=t(this).data("x"),this.y=t(this).data("y"),this.time=t(this).data("time"),t(this).css({left:this.x+"%",top:this.y+"%"});var s=this;setTimeout(function(){t(s).fadeIn(700)},this.time)})}},toGalleryItem:function(e,i){var s=this;if(i||(i=function(){}),!s.wrapper.find(".swither__item--edge"))return void console.log("error!");if(e.length){var n=e.position().left;if(n<=s.maxScrollPosition+20)switch(e.addClass("swither__item--edge"),e.siblings().removeClass("swither__item--edge"),this.options.countBox&&(this.countBoxs.removeClass("active"),t(this.countBoxs[e.prevAll().length]).addClass("active")),1==this.options.count&&t(this.elem).find(".slider__input").text(e.prevAll().length+this.options.caseLimit+" / "+this.swither.length),this.options.animation){case"slide":this.wrapper.animate({left:-n},300,function(){i()}),s.animBox(e);break;case"hide-show":this.wrapper.fadeTo(300,0,function(){t(this).css("left",-n),t(this).animate({opacity:1},300),s.animBox(e)})}else if(this.options.repeat){if(!this.swither)return;var o=t(this.elem).find(".swither__item--edge");s.wrapper.children().removeClass("swither__item--edge").first().addClass("swither__item--edge"),s.toGalleryItem(o.next())}}else if(this.options.repeat){if(!this.swither)return;this.swither.clone().appendTo(this.wrapper).addClass("cloned").removeClass("swither__item--edge");this.cnt=this.wrapper.find(".swither__item").length,this.swither=this.wrapper.children(),s.calcConst();var o=t(this.elem).find(".swither__item--edge");s.toGalleryItem(o.next(),function(){s.wrapper.css("transition");s.wrapper.find(".swither__item:not(.cloned)").remove(),s.wrapper.find(".cloned").removeClass("cloned"),s.wrapper.css("left",0).children().first().addClass("swither__item--edge"),s.swither=s.wrapper.children()})}}};t.fn.sliderShop=function(t){return this.each(function(){var e=Object.create(n);e.init(t,this)})},t.fn.sliderShop.options={caseLimit:4,spaceSection:"auto",animation:"slide",count:!1,countBox:!1,countSelect:!1,timer:!1,repeat:!1,animBox:null,response:!1,touch:!0}}(jQuery,window,document);