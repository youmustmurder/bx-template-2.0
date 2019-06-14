'use strict';

window.addEventListener('load', function () {
  var mapNode = document.querySelector('#filials-page__map');

  if (mapNode != null) {
    ymaps.ready(function () {
      var branchesNode = document.querySelectorAll('.branches__item'),
          branches = [],
          midX = 0,
          midY = 0,
          center = 0;
      Array.prototype.forEach.call(branchesNode, function (branch) {
        var x = Number(branch.getAttribute('data-yandex-x')),
            y = Number(branch.getAttribute('data-yandex-y'));
        branches.push({
          x: x,
          y: y,
          name: branch.getAttribute('data-name'),
          address: branch.getAttribute('data-address'),
          email: branch.getAttribute('data-email'),
          phone: branch.getAttribute('data-phone')
        });
        midX += x;
        midY += y;
      });
      center = {
        x: midX / branches.length,
        y: midY / branches.length
      };
      var map = new ymaps.Map('filials-page__map', {
        center: [center.x, center.y],
        zoom: 11
      }),
          ClusterContent = ymaps.templateLayoutFactory.createClass('<div class="claster">$[properties.geoObjects.length]</div>'),
          clusterIcons = [{
        href: '/local/templates/individual/public/images/icon-geo.png',
        size: [60, 60],
        offset: [-30, -30]
      }],
          myClusterer = new ymaps.Clusterer({
        clusterIcons: clusterIcons,
        clusterNumbers: [1],
        zoomMargin: [30],
        clusterIconContentLayout: ClusterContent
      }),
          myBalloonLayout = ymaps.templateLayoutFactory.createClass('<address class="address-map">' + '<p><strong>$[properties.name]</strong>' + '<br />' + '</p>' + '<ul class="balloon-info">' + '<li><strong>Адрес:&nbsp;</strong>$[properties.address]</li>' + '<li><strong>Email:&nbsp;</strong>$[properties.email]</li>' + '<li><strong>Телефон:&nbsp;</strong>$[properties.phone]</li>' + '</ul>' + '</address>'),
          Placemark = {};
      branches.forEach(function (branch, index) {
        var x = branch.x,
            y = branch.y,
            name = branch.name,
            address = branch.address,
            email = branch.email,
            phone = branch.phone;
        Placemark[index] = new ymaps.Placemark([x, y], {
          name: name,
          address: address,
          email: email,
          phone: phone,
          iconContent: '<div class="marker-circ"></div>'
        }, {
          balloonContentLayout: myBalloonLayout,
          balloonOffset: [5, 0],
          balloonCloseButton: true,
          balloonMinWidth: 450,
          balloonMaxWidth: 450,
          balloonMinHeught: 150,
          balloonMaxHeught: 200,
          iconImageHref: '/local/templates/.default/frontend/main/images/icon-geo.pn',
          iconImageSize: [60, 60],
          iconImageOffset: [-30, -30],
          iconLayout: 'default#imageWithContent',
          iconactive: '/local/templates/.default/frontend/main/images/icon-geo.png'
        });
        myClusterer.add(Placemark[index]);
      });
      map.geoObjects.add(myClusterer); //map.behaviors.disable("scrollZoom");
    });
  }
});