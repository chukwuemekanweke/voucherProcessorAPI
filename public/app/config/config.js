var app = angular.module('tenece', ['ui.router', 'ngCookies']);

app.config(['$httpProvider', '$interpolateProvider', '$locationProvider', '$stateProvider', '$urlRouterProvider',
    function ($httpProvider, $interpolateProvider, $locationProvider, $stateProvider, $urlRouterProvider) {

        $interpolateProvider.startSymbol('<%').endSymbol('%>');

        $httpProvider.defaults.headers.common['Accept'] = "application/json";
        $httpProvider.defaults.headers.common['Content-Type'] = "application/json";
        $httpProvider.defaults.useXDomain = true;

        $locationProvider.html5Mode(true);

        $urlRouterProvider.otherwise('/');

        $stateProvider
            .state('dashboard', {
                url: '/',
                templateUrl: '/app/dashboard.html',
                controller: 'MainController'
            })
            .state('new-voucher', {
                url: '/new-voucher',
                templateUrl: '/app/modules/voucher/new-voucher.html',
                controller: 'VoucherController'
            })
            .state('view-vouchers', {
                url: '/view-vouchers',
                templateUrl: '/app/modules/voucher/view-vouchers.html',
                controller: 'VoucherController'
            })
            .state('my-vouchers', {
                url: '/my-vouchers',
                templateUrl: '/app/modules/voucher/view-user-vouchers.html',
                controller: 'VoucherController'
            })
            .state('payable-vouchers', {
                url: '/payable-vouchers',
                templateUrl: '/app/modules/voucher/payable-vouchers.html',
                controller: 'VoucherController'
            })
            .state('new-item', {
                url: '/new-item',
                templateUrl: '/app/modules/item/new-item.html',
                controller: 'ItemController'
            })
            .state('view-items', {
                url: '/view-items',
                templateUrl: '/app/modules/item/view-items.html',
                controller: 'ItemController'
            })
            .state('new-branch', {
                url: '/new-branch',
                templateUrl: '/app/modules/branch/new-branch.html',
                controller: 'BranchController'
            })
            .state('view-branches', {
                url: '/view-branches',
                templateUrl: '/app/modules/branch/view-branches.html',
                controller: 'BranchController'
            })
            .state('new-office-entity', {
                url: '/new-office-entity',
                templateUrl: '/app/modules/office-entity/new-office-entity.html',
                controller: 'OfficeEntityController'
            })
            .state('view-office-entities', {
                url: '/view-office-entities',
                templateUrl: '/app/modules/office-entity/view-office-entities.html',
                controller: 'OfficeEntityController'
            })
            .state('new-office-entity-type', {
                url: '/new-office-entity-type',
                templateUrl: '/app/modules/office-entity-type/new-office-entity-type.html',
                controller: 'OfficeEntityTypeController'
            })
            .state('view-office-entity-types', {
                url: '/view-office-entity-types',
                templateUrl: '/app/modules/office-entity-type/view-office-entity-types.html',
                controller: 'OfficeEntityTypeController'
            })
            .state('view-users', {
                url: '/view-users',
                templateUrl: '/app/modules/user/view-users.html',
                controller: 'UserController'
            })
            .state('new-role', {
                url: '/new-role',
                templateUrl: '/app/modules/roles-and-claims/new-role-with-claim.html',
                controller: 'RolesAndClaimsController'
            })
            .state('view-roles', {
                url: '/view-roles',
                templateUrl: '/app/modules/roles-and-claims/view-roles-with-claims.html',
                controller: 'RolesAndClaimsController'
            })
            .state('new-claim', {
                url: '/create-claim',
                templateUrl: '/app/modules/roles-and-claims/new-role-with-claim.html',
                controller: 'RolesAndClaimsController'
            })
            .state('view-claims', {
                url: '/view-claims',
                templateUrl: '/app/modules/roles-and-claims/view-roles-with-claims.html',
                controller: 'RolesAndClaimsController'
            })
            .state('vouchers-trail', {
                url: '/vouchers-trail',
                templateUrl: '/app/modules/voucher-trail/voucher-trail.html',
                controller: 'VoucherTrailController'
            })
            .state('user-vouchers-trail', {
                url: '/user-vouchers-trail',
                templateUrl: '/app/modules/voucher-trail/user-vouchers-trail.html',
                controller: 'VoucherTrailController'
            });

    }]);

    app.run(function($http, $rootScope, $cookies) {
        $rootScope.role = atob($cookies.get('r'));

        // $rootScope.alert = function (message) {
        //     var alert_content = [{
        //         type: message
        //     }],
        //     select_style = $("#demo-alert-style");
            
        //     $.niftyNoty({
        //         type: alert_style,
        //         container: alert_type,
        //         html: alert_content[alert_layout].type,
        //         closeBtn: closebtn_alert,
        //         floating: {
        //             position: "top-right",
        //             animationIn: select_animin.val(),
        //             animationOut: select_animout.val()
        //         },
        //         focus: true,
        //         timer: input_sticky.prop("checked") ? 2500 : 0
        //     });

        // };
    });