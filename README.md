# dashboard-apel

[![Join the chat at https://gitter.im/dashboard-apel/Lobby](https://badges.gitter.im/dashboard-apel/Lobby.svg)](https://gitter.im/dashboard-apel/Lobby?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/bantenprov/dashboard-apel/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/bantenprov/dashboard-apel/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/bantenprov/dashboard-apel/badges/build.png?b=master)](https://scrutinizer-ci.com/g/bantenprov/dashboard-apel/build-status/master)

Dashboard Apel Pagi

### install via composer

- Development snapshot
```bash
$ composer require bantenprov/dashboard-apel:dev-master
```
- Latest release:


### download via github

~~~bash
$ git clone https://github.com/bantenprov/dashboard-apel.git
~~~


#### Edit `config/app.php` :
```php

'providers' => [

    /*
    * Laravel Framework Service Providers...
    */
    Illuminate\Auth\AuthServiceProvider::class,
    Illuminate\Broadcasting\BroadcastServiceProvider::class,
    Illuminate\Bus\BusServiceProvider::class,
    Illuminate\Cache\CacheServiceProvider::class,
    Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
    Illuminate\Cookie\CookieServiceProvider::class,
    //....
    Bantenprov\DashboardApel\DashboardApelServiceProvider::class,

```

#### Untuk publish component vue :

```bash
$ php artisan vendor:publish --tag=dashboard-apel-assets
$ php artisan vendor:publish --tag=dashboard-apel-public
```

#### Tambahkan route di dalam route : `resources/assets/js/routes.js` :

```javascript
path: '/dashboard',
component: layout('Default'),
children: [
  {
    path: '/dashboard',
    components: {
      main: resolve => require(['./components/views/DashboardHome.vue'], resolve),
      navbar: resolve => require(['./components/Navbar.vue'], resolve),
      sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
    },
    meta: {
      title: "Dashboard"
    }
  },
  //== ...
  {
    path: '/dashboard/dashboard-apel',
    components: {
      main: resolve => require(['./components/views/bantenprov/dashboard-apel/DashboardApel.vue'], resolve),
      navbar: resolve => require(['./components/Navbar.vue'], resolve),
      sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
    },
    meta: {
      title: "Dashboard Apel"
    }
  }
```

```javascript
{
path: '/admin',
redirect: '/admin/dashboard',
component: resolve => require(['./AdminLayout.vue'], resolve),
children: [
//== ...
    {
      path: '/admin/dashboard/dashboard-apel',
      components: {
        main: resolve => require(['./components/bantenprov/dashboard-apel/DashboardApelAdmin.show.vue'], resolve),
        navbar: resolve => require(['./components/Navbar.vue'], resolve),
        sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
      },
      meta: {
        title: "Dashboard Apel"
      }
    }
 //== ...   
  ]
},

```

#### Edit menu `resources/assets/js/menu.js`

```javascript
{
  name: 'Dashboard',
  icon: 'fa fa-dashboard',
  childType: 'collapse',
  childItem: [
        {
          name: 'Dashboard',
          link: '/dashboard',
          icon: 'fa fa-angle-double-right'
        },
        {
          name: 'Entity',
          link: '/dashboard/entity',
          icon: 'fa fa-angle-double-right'
        },
        //== ...
        {
          name: 'Dashboard Apel',
          link: '/dashboard/dashboard-apel',
          icon: 'fa fa-angle-double-right'
        }
  ]
},
```


#### Tambahkan components `resources/assets/js/components.js` :

```javascript

import DashboardApel from './components/bantenprov/dashboard-apel/DashboardApel.chart.vue';
Vue.component('echarts-dashboard-apel', DashboardApel);

import DashboardApelKota from './components/bantenprov/dashboard-apel/DashboardApelKota.chart.vue';
Vue.component('echarts-dashboard-apel-kota', DashboardApelKota);

import DashboardApelTahun from './components/bantenprov/dashboard-apel/DashboardApelTahun.chart.vue';
Vue.component('echarts-dashboard-apel-tahun', DashboardApelTahun);

import DashboardApelAdminShow from './components/bantenprov/dashboard-apel/DashboardApelAdmin.show.vue';
Vue.component('admin-view-dashboard-apel-tahun', DashboardApelAdminShow);

//== Echarts pdrb

import DashboardApelBar01 from './components/views/bantenprov/dashboard-apel/DashboardApelBar01.vue';
Vue.component('dashboard-apel-bar-01', DashboardApelBar01);

import DashboardApelBar02 from './components/views/bantenprov/dashboard-apel/DashboardApelBar02.vue';
Vue.component('dashboard-apel-bar-02', DashboardApelBar02);

//== mini bar charts
import DashboardApelBar03 from './components/views/bantenprov/dashboard-apel/DashboardApelBar03.vue';
Vue.component('dashboard-apel-bar-03', DashboardApelBar03);

import DashboardApelPie01 from './components/views/bantenprov/dashboard-apel/DashboardApelPie01.vue';
Vue.component('dashboard-apel-pie-01', DashboardApelPie01);

import DashboardApelPie02 from './components/views/bantenprov/dashboard-apel/DashboardApelPie02.vue';
Vue.component('dashboard-apel-pie-02', DashboardApelPie02);

//== mini pie charts
import DashboardApelPie03 from './components/views/bantenprov/dashboard-apel/DashboardApelPie03.vue';
Vue.component('dashboard-apel-pie-03', DashboardApelPie03);
```
