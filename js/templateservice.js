var templateservicemod = angular.module('templateservicemod', []);
templateservicemod.service('TemplateService',function()
{
	this.title="Home";
	this.meta="Google";
	this.header="views/header.html";
	this.blackout=0;
	this.navigation="views/navigation.html";
	this.slider="views/slider.html";
	this.sliderfooter="views/sliderfooter.html";
	this.content="views/content.html";
	this.footer="views/footer.html";
    this.adminimage="http://www.indiavaluehomes.com/admin/uploads/";
	
	this.changetitle=function(newtitle) {
		this.title=newtitle;
	};
});