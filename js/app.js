// JavaScript Document
var firstapp = angular.module('firstapp', [
  'ngRoute',
  'phonecatControllers',
  'templateservicemod',
  'ngAnimate',
  'Service',
  'ui.bootstrap'
]);

firstapp.config(['$routeProvider',
  function ($routeProvider) {
        $routeProvider.
        when('/home', {
            templateUrl: 'views/template.html',
            controller: 'home'
        }).
        when('/about', {
            templateUrl: 'views/template.html',
            controller: 'about'
        }).
        when('/message', {
            templateUrl: 'views/template.html',
            controller: 'message'
        }).
        when('/contact', {
            templateUrl: 'views/template.html',
            controller: 'contact'
        }).
        when('/homeload', {
            templateUrl: 'views/template.html',
            controller: 'homeload'
        }).
        when('/nri', {
            templateUrl: 'views/template.html',
            controller: 'nri'
        }).
        when('/homeloan', {
            templateUrl: 'views/template.html',
            controller: 'homeloan'
        }).
        when('/capitalgain', {
            templateUrl: 'views/template.html',
            controller: 'capitalgain'
        }).
        when('/terms', {
            templateUrl: 'views/template.html',
            controller: 'terms'
        }).
        when('/disclaimer', {
            templateUrl: 'views/template.html',
            controller: 'disclaimer'
        }).
        when('/twentyfive', {
            templateUrl: 'views/template.html',
            controller: 'twentyfive'
        }).

        when('/housingindex', {
            templateUrl: 'views/template.html',
            controller: 'housingindex'
        }).
        when('/property/:PropertyId', {
            templateUrl: 'views/template.html',
            controller: 'innerpropertyctrl'
        }).
        when('/calculator', {
            templateUrl: 'views/template.html',
            controller: 'calculators'
        }).
        when('/videos', {
            templateUrl: 'views/template.html',
            controller: 'videos'
        }).
        when('/page/:id', {
            templateUrl: 'views/template.html',
            controller: 'page'
        }).
        when('/howitworks', {
            templateUrl: 'views/template.html',
            controller: 'howitworks'
        }).
          when('/sitemap', {
            templateUrl: 'views/template.html',
            controller: 'sitemap'
        }).
        otherwise({
            redirectTo: '/home'
        });
  }]);

firstapp.filter('imagepath', function () {
    return function (input) {
        if (input == null) {
            return base_url+"/uploads/2239a46835dc42bc7a6acade8f8517e9.jpg";
        } else {
            return base_url+"/uploads/" + input;
        }
    };
});

firstapp.filter('trusted', ['$sce', function ($sce) {
    return function(url) {
        return $sce.trustAsResourceUrl(url);
    };
}]);

function AccordionDemoCtrl($scope) {
    $scope.oneAtATime = true;
    /*
  $scope.groups = [
    {
      title: 'Dynamic Group Header - 1',
      content: 'Dynamic Group Body - 1'
    },
    {
      title: 'Dynamic Group Header - 2',
      content: 'Dynamic Group Body - 2'
    }
  ];

  $scope.items = ['Item 1', 'Item 2', 'Item 3'];

  $scope.addItem = function() {
    var newItemNo = $scope.items.length + 1;
    $scope.items.push('Item ' + newItemNo);
  };
*/
    $scope.status = {
        isFirstOpen: true,
        isFirstDisabled: false
    };
}

function CarouselDemoCtrl($scope) {
    $scope.myInterval = 5000;
    //var slides = $scope.slides = [];
    /*
  $scope.addSlide = function() {
    var newWidth = 600 + slides.length;
    /*
	slides.push({
      image: 'http://placekitten.com/' + newWidth + '/300',
      text: ['More','Extra','Lots of','Surplus'][slides.length % 4] + ' ' +
        ['Cats', 'Kittys', 'Felines', 'Cutes'][slides.length % 4]
    });
  };*/
    /*
  for (var i=0; i<4; i++) {
    $scope.addSlide();
  }*/
}

function ScrollCtrl($scope, $location, $anchorScroll) {
    $scope.gotopropertydetails = function () {
        // set the location.hash to the id of
        // the element you wish to scroll to.
        $location.hash('property-details');

        // call $anchorScroll()
        $anchorScroll();
    };
    $scope.gotoflats = function () {
        // set the location.hash to the id of
        // the element you wish to scroll to.
        $location.hash('flat-details');

        // call $anchorScroll()
        $anchorScroll();
    };
    $scope.gotoflats = function () {
        // set the location.hash to the id of
        // the element you wish to scroll to.
        $location.hash('flat-details');

        // call $anchorScroll()
        $anchorScroll();
    };
    $scope.gotolocation = function () {
        // set the location.hash to the id of
        // the element you wish to scroll to.
        $location.hash('location-details');

        // call $anchorScroll()
        $anchorScroll();
    };
    $scope.gotoamenities = function () {
        // set the location.hash to the id of
        // the element you wish to scroll to.
        $location.hash('amenity-details');

        // call $anchorScroll()
        $anchorScroll();
    };
    $scope.gotogallery = function () {
        // set the location.hash to the id of
        // the element you wish to scroll to.
        $location.hash('gallery-details');

        // call $anchorScroll()
        $anchorScroll();
    };
$scope.gotowalkthrough = function () {
        // set the location.hash to the id of
        // the element you wish to scroll to.
        $location.hash('walkthrough');

        // call $anchorScroll("walkthrough")
        $anchorScroll();
    };
$scope.specialoffers= function () {
        // set the location.hash to the id of
        // the element you wish to scroll to.
        $location.hash('specialoffers');

        // call $anchorScroll()
        $anchorScroll();
    };
}



function partitionarray(myarray,number) {
    var arrlength=myarray.length;
    var newarray=[];
    var j=-1;
    for(var i=0;i<arrlength;i++)
    {
        if(i%number==0)
        {
            j++;
            newarray[j]=[];
        }
        newarray[j].push(myarray[i]);
    }
    return newarray;
};