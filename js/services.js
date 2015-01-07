var service = angular.module('Service', []);
service.factory('MainJson', function ($http) {
//    var resturl = "http://www.indiavaluehomes.com/admin/index.php/";
    var resturl = base_url+"/index.php/";
//    var resturl = "http://localhost/indiavaluehomesall/admin/index.php/";
    return {
        allcities: function () {
            return $http.post(resturl + 'json/getallcity');
        },
        allvideos: function () {
            return $http.post(resturl + 'json/getallvideos');
        },
        showallvideos: function () {
            return $http.post(resturl + 'json/getshowallvideos');
        },
        allcity: function () {
            return $http.post(resturl + 'json/getallcity');
        },
        allcontentlinks: function () {
            return $http.post(resturl + 'json/getallcontentlinks');
        },
        allcontentlinks1: function () {
            return $http.post(resturl + 'json/getallcontentlinks1');
        },
        allcontentlinks2: function () {
            return $http.post(resturl + 'json/getallcontentlinks2');
        },
        allcontentlinks3: function () {
            return $http.post(resturl + 'json/getallcontentlinks3');
        },
        allcontentlinks4: function () {
            return $http.post(resturl + 'json/getallcontentlinks4');
        },
//        allpages: function (id) {
//            return $http.post(resturl + 'json/getallpages',{
//                param:
//                {
//                    id:id
//                }
//            });
//            );
//        },
        allpropertytypes: function () {
            return $http.post(resturl + 'json/getallpropertytype');
        },
        allpages: function (id) {
            return $http.get(resturl + 'json/getonepage', {
                params: {
                    id: id
                }
            });
        },
        searchproperties: function (locality, city, propertytype) {
            return $http.get(resturl + 'json/searchproperty', {
                params: {
                    locality: locality,
                    city: city,
                    propertytype: propertytype
                }
            });
        },
        innerproperty: function (property) {
            return $http.get(resturl + 'json/innerproperty', {
                params: {
                    property: property
                }
            });
        },
        submitwishlist: function (property, name, email, phone) {
            return $http.get(resturl + 'json/addtopropertywishlist', {
                params: {
                    property: property,
                    name: name,
                    phone: phone,
                    email: email
                }
            });
        },
        submitcontact: function (name, email, comment, contact) {
            return $http.get(resturl + 'json/submitcontact', {
                params: {
                    name: name,
                    email: email,
                    contact: contact,
                    comment:comment
                }
            });
        },
        submitoffers: function (name, email, city, contact) {
            return $http.get(resturl + 'json/submitoffers', {
                params: {
                    name: name,
                    email: email,
                    contact: contact,
                    city:city
                }
            });
        }

    }
});