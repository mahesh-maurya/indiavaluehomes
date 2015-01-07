var phonecatControllers = angular.module('phonecatControllers', ['templateservicemod', 'Service', 'ngRoute', 'ngSanitize']);

phonecatControllers.controller('home', ['$scope', 'TemplateService', 'MainJson','$location',
 function ($scope, TemplateService, MainJson,$location) {
        TemplateService.changetitle("Home");
        $scope.blackout = TemplateService.blackout;
        TemplateService.blackout=1;
        $scope.showoffer = "newshow";
        $scope.showregister = "show";
        $scope.template = TemplateService;
        TemplateService.slider = "views/slider.html";
        TemplateService.sliderfooter = "views/sliderfooter.html";
        TemplateService.content = "views/content.html";
        $scope.homeactive = "active";
      allcities=[];
      allvideos=[];
      allcontentlinks=[];
      allcontentlinks1=[];
      allcontentlinks2=[];
      allcontentlinks3=[];
      allcontentlinks4=[];
      allcity=[];
      allpages=[];
        var oncitysuccess = function (data, status) {
            $scope.cities = data;
            allcities=data;
            console.log($scope.cities);
        };
        MainJson.allcities().success(oncitysuccess);
     
        var onvideosuccess = function (data, status) {
            $scope.videos = data;
            allvideos=data;
            console.log($scope.videos);
        };
        MainJson.allvideos().success(onvideosuccess);
     
        var oncitysuccess = function (data, status) {
            $scope.city = data;
            allcity=data;
            console.log($scope.city);
        };
        MainJson.allcity().success(oncitysuccess);
     
     
       

     
        var onpropertytypesuccess = function (data, status) {
            $scope.propertytypes = data;
            //console.log($scope.propertytypes);
        };
        MainJson.allpropertytypes().success(onpropertytypesuccess);
        var searchpropertiessuccess = function (data, status) {
            $scope.properties = data;
            console.log(data);
        };
        MainJson.searchproperties().success(searchpropertiessuccess);

        $scope.closeoffer = function () {
            $scope.blackout = 0;
            $scope.showoffer = 0;
        };
        $scope.searchpress = function (locality, porpertytype, city) {
            $scope.citysel = city;
            for(var i=0;i<allcities.length;i++)
            {
                if(allcities[i].id==city)
                {
                    //$location.hash(allcities[i].name);
                }
            }
            TemplateService.content = "views/searchpage.html";
            MainJson.searchproperties(locality, city, porpertytype).success(searchpropertiessuccess);
        };
 }]);


phonecatControllers.controller('footerCtrl', function($scope,TemplateService,MainJson) {
     var oncontentlinkssuccess = function (data, status) {
            $scope.contentlinks = data;
            allcontentlinks=data;
            console.log($scope.contentlinks);
        };
        MainJson.allcontentlinks().success(oncontentlinkssuccess);

        var oncontentlinks1success = function (data, status) {
            $scope.contentlinks1 = data;
            allcontentlinks1=data;
            console.log($scope.contentlinks1);
        };
        MainJson.allcontentlinks1().success(oncontentlinks1success);

        var oncontentlinks2success = function (data, status) {
            $scope.contentlinks2 = data;
            allcontentlinks2=data;
            console.log($scope.contentlinks2);
        };
        MainJson.allcontentlinks2().success(oncontentlinks2success);

        var oncontentlinks3success = function (data, status) {
            $scope.contentlinks3 = data;
            allcontentlinks3=data;
            console.log($scope.contentlinks3);
        };
        MainJson.allcontentlinks3().success(oncontentlinks3success);

        var oncontentlinks4success = function (data, status) {
            $scope.contentlinks4 = data;
            allcontentlinks4=data;
            console.log($scope.contentlinks4);
        };
        MainJson.allcontentlinks4().success(oncontentlinks4success);

     
     
        var pagessuccess = function (data, status) {
            $scope.pages = data;
            allpages=data;
            console.log($scope.pages);
        };
        MainJson.allpages().success(pagessuccess);
});


//phonecatControllers.controller('pageCtrl', function($scope,TemplateService,MainJson) {
//     
//        var pagessuccess = function (data, status) {
//            $scope.pages = data;
//            allpages=data;
//            console.log($scope.pages);
//        };
//        MainJson.allpages().success(pagessuccess);
//});

phonecatControllers.controller('nri', ['$scope', 'TemplateService', 'MainJson',
                                        function ($scope, TemplateService, MainJson) {
        TemplateService.changetitle("NRI Corner");
        $scope.template = TemplateService;
        TemplateService.slider = "";
        TemplateService.sliderfooter = "";
        TemplateService.content = "views/nri.html";
        $scope.homeactive = "active";


}]);
phonecatControllers.controller('contact', ['$scope', 'TemplateService', 'MainJson',
                                        function ($scope, TemplateService, MainJson) {
        TemplateService.changetitle("Contact");
        $scope.template = TemplateService;
        TemplateService.slider = "";
        TemplateService.sliderfooter = "";
        TemplateService.content = "views/contact.html";
        $scope.homeactive = "active";

        $scope.submitcontact = function (name, email, comment, contact) {
            MainJson.submitcontact(name, email, comment, contact).success(console.log("Value Submited"));
        };


}]);
phonecatControllers.controller('twentyfive', ['$scope', 'TemplateService', 'MainJson',
                                        function ($scope, TemplateService, MainJson) {
        TemplateService.changetitle("Congratulations");
        $scope.template = TemplateService;
        TemplateService.slider = "";
        TemplateService.sliderfooter = "";
        TemplateService.content = "views/twentyfive.html";
        $scope.homeactive = "active";

}]);
phonecatControllers.controller('homeloan', ['$scope', 'TemplateService', 'MainJson',
                                        function ($scope, TemplateService, MainJson) {
        TemplateService.changetitle("Homeloan");
        $scope.template = TemplateService;
        TemplateService.slider = "";
        TemplateService.sliderfooter = "";
        TemplateService.content = "views/homeloan.html";
        $scope.homeactive = "active";

}]);

phonecatControllers.controller('about', ['$scope', 'TemplateService', 'MainJson',
                                        function ($scope, TemplateService, MainJson) {
        TemplateService.changetitle("About");
        $scope.template = TemplateService;
        TemplateService.slider = "";
        TemplateService.sliderfooter = "";
        TemplateService.content = "views/about.html";
        $scope.homeactive = "active";




}]);
phonecatControllers.controller('howitworks', ['$scope', 'TemplateService', 'MainJson',
                                        function ($scope, TemplateService, MainJson) {
        TemplateService.changetitle("Howitworks");
        $scope.template = TemplateService;
        TemplateService.slider = "";
        TemplateService.sliderfooter = "";
        TemplateService.content = "views/howitworks.html";
        $scope.homeactive = "active";




}]);
phonecatControllers.controller('sitemap', ['$scope', 'TemplateService', 'MainJson',
                                        function ($scope, TemplateService, MainJson) {
        TemplateService.changetitle("sitemap");
        $scope.template = TemplateService;
        TemplateService.slider = "";
        TemplateService.sliderfooter = "";
        TemplateService.content = "views/sitemap.html";
        $scope.homeactive = "active";




}]);

phonecatControllers.controller('housingindex', ['$scope', 'TemplateService', 'MainJson',
                                        function ($scope, TemplateService, MainJson) {
        TemplateService.changetitle("Housing Index");
        $scope.template = TemplateService;
        TemplateService.slider = "";
        TemplateService.sliderfooter = "";
        TemplateService.content = "views/housingindex.html";
        $scope.homeactive = "active";




}]);

phonecatControllers.controller('capitalgain', ['$scope', 'TemplateService', 'MainJson',
                                        function ($scope, TemplateService, MainJson) {
        TemplateService.changetitle("Capital Gains Index");
        $scope.template = TemplateService;
        TemplateService.slider = "";
        TemplateService.sliderfooter = "";
        TemplateService.content = "views/capitalgain.html";
        $scope.homeactive = "active";



}]);


phonecatControllers.controller('terms', ['$scope', 'TemplateService', 'MainJson',
                                               function ($scope, TemplateService, MainJson) {
        TemplateService.changetitle("Capital Gains Index");
        $scope.template = TemplateService;
        TemplateService.slider = "";
        TemplateService.sliderfooter = "";
        TemplateService.content = "views/terms.html";
        $scope.homeactive = "active";



                                               }]);




phonecatControllers.controller('calculators', ['$scope', 'TemplateService', 'MainJson',
                                        function ($scope, TemplateService, MainJson) {
        TemplateService.changetitle("Calculators");

        $scope.template = TemplateService;
        TemplateService.slider = "";
        TemplateService.sliderfooter = "";
        TemplateService.content = "views/calculators.html";
        $scope.homeactive = "active";
        $scope.calculatorscreen = "views/calculator.html";
        $scope.changecalculator=function(calculator) {
            $scope.calculatorscreen="views/"+calculator+".html";   
        };                                  
                                            function roundtill2(num)
                                            {
                                                return Math.round(num * 100) / 100;
                                            };
                                            function changeallperfeet(value,whichone)
                                            {
                                                if(whichone!=1)
                                                $scope.converter.meter=roundtill2(parseFloat(value)/10.76391);
                                                if(whichone!=2)
                                                $scope.converter.feet=roundtill2(value);
                                                if(whichone!=3)
                                                $scope.converter.cent=roundtill2(parseFloat(value)/435.6);
                                                if(whichone!=4)
                                                $scope.converter.acre=roundtill2(parseFloat(value)/43560);
                                            };
                                            
                                            
                                            $scope.converter={};
                                            changeallperfeet(1,0);
                                           
                                            
                                            $scope.feetchange=function(value) {
                                                console.log("feet change");
                                                changeallperfeet(value,2);
                                            };
                                            $scope.acrechange=function(value) {
                                                console.log("acre change");
                                                var feets=value*43560;
                                                changeallperfeet(feets,4);
                                            };
                                            $scope.meterchange=function(value) {
                                                console.log("meter change");
                                                var feets=value*10.76391;
                                                changeallperfeet(feets,1);
                                            };
                                            $scope.centchange=function(value) {
                                                console.log("cent change");
                                                var feets=value*435.6;
                                                changeallperfeet(feets,3);
                                            };
                                            
                                            
                                            
        $scope.amount = 1;
        $scope.ri = 1;
        $scope.months = 1;
        $scope.emi = 1;
        $scope.calculateemi = function loan(amount, rate, months) {
            var a = amount;
            var b = rate;
            var c = months;
            var n = c;
            var r = b / (12 * 100);
            var p = (a * r * Math.pow((1 + r), n)) / (Math.pow((1 + r), n) - 1);
            var prin = Math.round(p * 100) / 100;
            $scope.emi = Math.round(prin);
        };


}]);
phonecatControllers.controller('disclaimer', ['$scope', 'TemplateService', 'MainJson',
                                        function ($scope, TemplateService, MainJson) {
        TemplateService.changetitle("Disclaimer");
        $scope.template = TemplateService;
        TemplateService.slider = "";
        TemplateService.sliderfooter = "";
        TemplateService.content = "views/disclaimer.html";
        $scope.homeactive = "active";




}]);

phonecatControllers.controller('videos', ['$scope', 'TemplateService', 'MainJson',
                                        function ($scope, TemplateService, MainJson) {
        TemplateService.changetitle("Videos");
        $scope.template = TemplateService;
        TemplateService.slider = "";
        TemplateService.sliderfooter = "";
        TemplateService.content = "views/videos.html";
        $scope.homeactive = "active";
        allvideos=[];
        var onshowallvideosuccess = function (data, status) {
            $scope.videos = partitionarray(data,2);
        
            allvideos=data;
            
            console.log($scope.videos);
        };
        MainJson.showallvideos().success(onshowallvideosuccess);


}]);
phonecatControllers.controller('page',
                                        function ($scope, TemplateService, MainJson,$sce, $routeParams) {
                                            
        TemplateService.changetitle("Page");
        $scope.template = TemplateService;
        TemplateService.slider = "";
        TemplateService.sliderfooter = "";
        TemplateService.content = "views/page.html";
        $scope.homeactive = "active";
        allpages=[];
        $scope.getid=$routeParams.id;
                                            console.log($scope.getid);
        var pagessuccess = function (data, status) {
			$scope.pages=data;
			
            allpages=data;
			
            console.log($scope.pages);
        };
        MainJson.allpages($scope.getid).success(pagessuccess);
});

phonecatControllers.controller('headerctrl',
    function ($scope, TemplateService) {
        $scope.template = TemplateService;

    });

phonecatControllers.controller('innerpropertyctrl',
    function ($scope, $routeParams, TemplateService, MainJson,$location) {

        console.log($routeParams.PropertyId);
        $scope.template = TemplateService;

        $scope.blackoutimage = "";
        $scope.addblackout = function (img) {
            console.log("blackout should appear");
            console.log(img);
            $scope.blackoutimage = img;
        }
        $scope.removeblackout = function () {
            console.log("blackout should go away");
            $scope.blackoutimage = "";
        }

        TemplateService.slider = "views/propertyslider.html";
        TemplateService.sliderfooter = "views/propertytabs.html";
		TemplateService.content = "views/innerproperty.html";
		var abci=0;
        var innerproperty = function (data, status) {
            // $scope.title=data.title;
            $scope.property = data.property;
            $scope.apartment = data.apartment;
            lat = data.property.lat;
            long = data.property.long;
            $scope.amenities = data.propertyamenity;
            $scope.propertyimage = data.propertyimage;
            $scope.propertyconstructionupdate = data.propertyconstructionupdate;
            $scope.bannerimage = data.bannerimage;
            console.log(data);
            
            if(abci==0)
			{
			abci++;
            //$location.hash($scope.property.city.replace(/ /g,"_")+"_"+$scope.property.buildername.replace(/ /g,"_")+"_"+$scope.property.property.replace(/ /g,"_")+"_"+$scope.property.area.replace(/ /g,"_"));
            //$location.replace();
			}
        };
        MainJson.innerproperty($routeParams.PropertyId).success(innerproperty);

        $scope.formname = "";
        $scope.formemail = "";
        $scope.formphone = "";

        $scope.showbuilderdetail = 0;
        
        var submitvalues=function(data) {
        	console.log("Value Submited");
        	window.location.href="http://www.indiavaluehomes.com/thankyou.html";
        };

        $scope.validateform = function (property, name, email, phone) {
            if (name == "" || email == "" || phone == "") {
                $scope.showbuilderdetail = 0;
            } else {
                $scope.showbuilderdetail = 1;
            }
            MainJson.submitwishlist(property, name, email, phone).success(submitvalues);
        }



    });

phonecatControllers.controller('offerctrl',
    function ($scope, TemplateService, MainJson) {
        $scope.showregister = "hidden";
        $scope.registerclick = function (data, status) {

            if ($scope.showregister == "hidden")
                $scope.showregister = "show";
            else {
                $scope.showregister = "hidden";
            }
        };
        var clearform = function () {
            $scope.showregister = "hidden";
        };
        $scope.contactsubmit=false;
        $scope.submitoffers = function (name, email, city, contact) {
        $scope.contactsubmit=true;
        TemplateService.blackout = 0;
        $scope.showoffer = 0;
            MainJson.submitoffers(name, email, city, contact).success(clearform);
        };
    });