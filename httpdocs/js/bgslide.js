//
//  BgSlide JS v1.5.1
//  17/10/2009
//
//  Copyright (c) 2009 Alan Peng 
//  http://bitdojo.net
//

var BgSlideConfig = {
	
	//// CONFIGURATION ////
	
	loadingIndicator: "loading-indicator",   // id of the loading indicator
	bgLayer1: "bg-layer1",                   // id of the two <img> layers
	bgLayer2: "bg-layer2",                   // this layer should be on top (higher z-index)
	updateInterval: 10,                      // in seconds
	imgDir: "http://chaos.bitdojo.net/dojo-scripts/bg-img/", // directory where the images are stored
	imgArr: ["AquaDreams_1.jpg", "AquaDreams_2.jpg", "AquaDreams_3.jpg", "AquaDreams_4.jpg", "AquaDreams_5.jpg"] // filenames of the images to use
	
	//// END CONFIGURATION ////
};

var BgSlide = Class.create({
	initialize: function(config){
		Object.extend(this, config);
		this.bgSlideSupported = true;
		this.executer = null;
		this.slideImg = null;
		this.lastImg = null;
		if (this.bgSlideSupported) {
			this.slideStart();
		} else {
			this.hideIndicator();
		}
	},
	showIndicator: function(){
		$(this.loadingIndicator).show();
	},
	hideIndicator: function(){
		Effect.Fade(this.loadingIndicator,{duration:0.5, delay:0.5}); 
	},
	slideUpdate: function(caller){
		this.showIndicator();
		var imgSrc = this.imgDir + this.getRandomImg();
		this.preload(imgSrc);
	},
	getRandomImg: function(){
		var newImgs = this.imgArr.without(this.lastImg);
		var len = newImgs.length;
		var idx = Math.floor(Math.random()*len);
		var imgSrc = newImgs[idx];
		this.lastImg = imgSrc;
		return imgSrc;		
	},
	preload: function(imgSrc){
		// check which layer to load the new image
		if( $(this.bgLayer2).visible() ){
			this.slideImg = $(this.bgLayer1);	
		} else {
			this.slideImg = $(this.bgLayer2);
		}
		this.slideImg.src = imgSrc;
		var me = this;
		Event.observe(me.slideImg, 'load', function(){
			me.preloadCallback();
		});
	},
	preloadCallback: function(){
		// check which layer to display
		if( $(this.bgLayer2).visible() ){
			if( !($(this.bgLayer1).visible()) ){
				$(this.bgLayer1).show();
			}
			Effect.Fade(this.bgLayer2);
		} else {
			Effect.Appear(this.bgLayer2);
		}
		this.hideIndicator();
	},
	slideStart: function(){
		this.slideUpdate();
		this.executer = new PeriodicalExecuter(this.slideUpdate.bind(this), this.updateInterval);
	}
});

Event.observe(window, 'load', function(){
	var myBgSlide = new BgSlide(BgSlideConfig);
});
