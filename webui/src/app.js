(function (angular, moment, _) {
    'use strict';

    angular
        .module('app', ['ngResource', 'ngToast', 'ngAnimate', 'angular-loading-bar', 'ui.router'])
        .constant('_', _)
        .constant('config', {
            'apiEndpoint': 'http://localhost:8000'
        })
        .config(httpProviderConfig)
        .config(httpLoaderConfig)
        .config(ngToastConfig)
        .run(run);

    function httpProviderConfig($httpProvider) {
        $httpProvider.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
        $httpProvider.defaults.headers.common['Content-Type'] = 'application/json';

        // Fix IE Caching Issue
        // http://stackoverflow.com/a/19771501
        if (!$httpProvider.defaults.headers.get) {
            $httpProvider.defaults.headers.get = {};
        }

        $httpProvider.defaults.headers.get['If-Modified-Since'] = 'Mon, 26 Jul 1997 05:00:00 GMT';
        $httpProvider.defaults.headers.get['Cache-Control'] = 'no-cache';
        $httpProvider.defaults.headers.get['Pragma'] = 'no-cache';
    }

    function httpLoaderConfig(cfpLoadingBarProvider) {
        cfpLoadingBarProvider.includeSpinner = false;
    }

    function ngToastConfig(ngToastProvider) {
        ngToastProvider.configure({
            dismissButton: true
        });
    }

    function run($rootScope, $log) {
        $rootScope.$on('$stateChangeSuccess', (event, toState) => {
            $rootScope.stateName = toState.name.replace(/root\./g, '');
            $rootScope.hasSidebar = toState.sidebar === undefined ? true : toState.sidebar;
        });

        $rootScope.$on('$stateChangeError', (event, toState, toParams, fromState, fromParams, error) => {
            $log.error(error);
        });
    }
})(window.angular, window._);