define("place:widget/detailpoicard/detailpoicard.js",function(t,e,a){"use strict";var n=t("common:widget/callnatohere/callnatohere.js"),i={init:function(){this.bindCallNaEvent()},bindCallNaEvent:function(){$("a.callnatohere").on("touchend",function(){var t=this.href||"";t&&n.gotoHere(t,{stat:"callnatoheremapdetail"})})}};a.exports=i});
;define("place:widget/poicard/poicard.js",function(){});
;define("place:widget/helper/maphelper.js",function(require,exports,module){require.loadCss({url:"//webmap1.bdimg.com/mobile/simple/static/place/widget/adinfowindow/adpoiinfowindow_702f8d9.css"});var mapConst=require("common:static/js/mapconst.js"),url=require("core:widget/url/url.js"),uUtil=require("core:widget/util/url-util.js"),urlUtil=require("core:widget/util/url-util.js"),deviceUtil=require("common:widget/util/device-util.js"),mapUtil=require("common:widget/util/map-util.js"),searchData=require("common:static/js/searchdata.js"),stat=require("core:widget/stat/stat.js"),pbstat=require("core:widget/stat/pbstat.js"),margins=deviceUtil.isAndroid()?[0,0,113,0]:[20,0,113,0];module.exports={_selectedIndex:-999,_selectedADIndex:-999,polylineStyles:[{stroke:6,color:"#3a6bdb",opacity:.65},{stroke:6,color:"#3a6bdb",opacity:.75},{stroke:4,color:"#30a208",opacity:.65},{stroke:5,color:"#3a6bdb",opacity:.65},{stroke:6,color:"#3a6bdb",opacity:.5},{stroke:4,color:"#30a208",opacity:.5,strokeStyle:"dashed"},{stroke:4,color:"#575757",opacity:.65,strokeStyle:"dashed"}],poiMarkers:[],transitLines:[],roadPolylines:[],transitPolylines:[],stationPoints:[],stationMarkers:[],markersGroupon:"//webmap1.bdimg.com/mobile/simple/static/place/images/markers_groupon_67a250c.png",markersAd:"//webmap1.bdimg.com/mobile/simple/static/place/images/markers_ad_c243232.png",rtBusIcon:"//webmap1.bdimg.com/mobile/simple/static/place/images/markers_rtbus_acb9d73.png",viewOpts:{margins:margins,enableAnimation:!1},init:function(e,t,i,a){var s=this;if(this.noMapCard=i.result.noMapCard||0,this.mapView=e,this.BMap=t,this.map=this.mapView.getMap(),!this.noMapCard){if(!deviceUtil.isIPad())var n=new t.Size(52,135),r=new t.Size(8,206),o=new t.Size(8,127);s.mapView.scaleControl.setOffset(n),s.mapView.trafficControl.setOffset(r),s.mapView.geoControl.setOffset(new t.Size(8,127)),s.mapView.zoomControl.setOffset(o)}listener.once("common.page","switchstart",function(){if(!deviceUtil.isIPad())var e=new t.Size(52,22),i=new t.Size(8,93),a=new t.Size(8,14);s.mapView.scaleControl.setOffset(e),s.mapView.trafficControl.setOffset(i),s.mapView.geoControl.setOffset(new t.Size(8,14)),s.mapView.zoomControl.setOffset(a)}),this.data=a&&a.content?a:i,this._selectedIndex=-999;var l=url.get(),p=l.query,d=l.pageState,c=d.i||0;delete d.vt,delete d.i;var h=$.param(p)+"|"+$.param(d);this.mapView.clearOverlays(),this.addPoiOverlays(this.data,l),this.mapView.displayId=h,"string"==typeof c&&"uid"===c.split(",")[0]?this.selectHotspotMarker(c.split(",")[1]):this.selectPoiMarker(c),i&&!i.listInfo&&i.content&&i.content[0]&&2===i.content[0].poiType&&this.addRtBusMarker(i.content[0]),listener.on("common.slidePoiCard","slide",function(e,t){t.switchType&&"tap"==t.switchType||s.selectPoiMarker(t.index,{switchType:"slide"})})},addPoiOverlays:function(e,t){var i=this,a=this.BMap,s=this.map,n=this.mapView,r=t.query,o=e.listInfo?e.listInfo.isShowAll:void 0,l=this.processMapData(e,t.pageState,o);i.mapData=l;var p=l.currentCity?l.currentCity.code:1,d=[36,38,39];if(!l.isSharePoint&&l.points.length>0?(this.addPoiMarkers(l.points,l.content),l.biz&&l.biz.pois&&l.biz.pois.length>0&&this.addAdMarkers(l.biz),n.iwController.get(mapConst.IW_POI).setData(mapConst.IW_POI,{json:l.content,cityCode:p}).switchTo(0),listener.on("infowindow."+mapConst.IW_POI,"click",function(e,t){var i=t.id,a=t.data,s=t.instance;switch(i){case"iw-l":s.nbSearch(a.name,a.geo);break;case"iw-c":s.detailSearch(a.uid);break;case"iw-r":s.lineSearch(a.name,a.geo)}}),d.indexOf(l.resultType)>-1&&1===r.center_rank&&r.nb_x&&r.nb_y&&this.addCenterPoiMarker(new a.Point(r.nb_x,r.nb_y))):(i.poiMarkers=[],i.mapView.poiMarkers=[]),l.isSharePoint&&l.points.length>0&&(this.addSingleMarker(l.points[0],l.content[0]),n.iwController.get(mapConst.IW_SHR).setData(mapConst.IW_SHR,{json:l.content}).switchTo(0),listener.on("infowindow."+mapConst.IW_SHR,"click",function(e,t){var i=t.id,a=t.data,s=t.instance;switch(i){case"iw-l":s.nbSearch(a.name,a.geo);break;case"iw-c":s.detailSearch("uriapi",a);break;case"iw-r":s.lineSearch(a.name,a.geo)}})),this.noMapCard)n.setViewport(l.points);else{if(l.biz&&l.biz.pois&&l.biz.pois.length>0){var c=l.biz.pois,h=c.length;l.biz.point=[];for(var m=0;h>m;m++)l.biz.point[m]=mapUtil.getPointByStr([c[m].x,c[m].y].join(","));l.points=$.extend(l.points,l.biz.point)}n.setViewport(l.points,this.viewOpts),i.zoom=s.getZoom()}l.isSingle||this.addGRHotspotsLayer(this.data),this.transitLines=l.transitLines,s.addEventListener("onvectorclick",function(e){var t=e.iconInfo;t.uid&&t.name&&t.point&&i.switchSelectedMarker(-999)})},processMapData:function(e,t,i){function a(e,t){e._isAdPoi=!0;var i=e.ext.x||0,a=e.ext.y||0,s=i+","+a;e.name=e.ext.center_name,n.points.splice(t,0,mapUtil.getPointByStr(s)),n.content.splice(t,0,e)}if(e){var s=e.ecomAdData,n={points:[],content:[],transitLines:[],isSingle:!1,resultType:e.result.type,currentCity:e.current_city};n.biz=e.biz;var r;r="undefined"!=typeof i?i||!(!t||1!==parseInt(t.showall,10)):!(!t||1!==parseInt(t.showall)),11!==n.resultType&&(r=!0);var o=e.content;if(o instanceof Array)for(var l=0;l<o.length;l++){var p=o[l];if(r||1===p.acc_flag)if(p.poiType!==mapConst.POI_TYPE_BUSLINE&&p.poiType!==mapConst.POI_TYPE_SUBLINE){var d=mapUtil.parseGeo(p.geo);n.points.push(mapUtil.getPointByStr(d.points)),n.content.push(p)}else n.transitLines.push(p)}else{if(!o.geo&&o.point){var c=o.point.replace("|",",");o.geo="1|"+c+";"+c+"|"+c,o.poiType=mapConst.POI_TYPE_NORMAL,o.name=o.title,n.isSharePoint=!0}var h=mapUtil.parseGeo(o.geo);o.poiType!==mapConst.POI_TYPE_BUSLINE&&o.poiType!==mapConst.POI_TYPE_SUBLINE?(n.points.push(mapUtil.getPointByStr(h.points)),n.content.push(o)):n.transitLines.push(o),n.isSingle=!0}if(s){var m=s.adsResult,u=0;if(m.listFirstAD&&(u=0,a(m.listFirstAD,u)),m.listLastAD){var u=n.points.length+1;a(m.listFirstAD,u)}}return n}},addPoiMarkers:function(e,t){for(var i=this,a=this.BMap,s=this.map,n=this.mapView,r=[],o=0,l=e.length;l>o;o++)!function(){var l=o,p=t[l]._isAdPoi||"",d=t[l]._hasGroupon||"",c=p?i.markersAd:d?i.markersGroupon:mapConst.MARKERS_PATH,h=new a.Icon(c,new a.Size(22,32),{anchor:new a.Size(11,32),imageOffset:new a.Size(0,32*l)}),m=new n.CustomMarker(h,e[l],{isAdPoi:p,hasGroupon:d,className:"mkr_trans",isAnimation:!1,click:function(){stat.addStat(COM_STAT_CODE.MAP_POI_MARKER_CLICK),i.selectPoiMarker(l+i.transitLines.length)}});s.addOverlay(m),r.push(m)}();return i.poiMarkers=r,i.mapView.poiMarkers=r,r},addAdMarkers:function(e){for(var t=this,i=this.BMap,a=this.map,s=this.mapView,n=e.pois,r=[],o=n.length,l=[],p=0;o>p;p++)n[p].dom&&(l.push(n[p].adver_log),function(e){var o="//webmap1.bdimg.com/mobile/simple/static/place/images/bizpoi_955efa2.png",l=(new s.CustomMarker,new s.CustomIcon(o,{anchor:new i.Size(10,32)})),p=new s.CustomMarker(l,new i.Point(n[e].x,n[e].y),{className:"mkr_trans",isAnimation:!1,isAdPoi:!0,click:function(){pbstat.addStat(PB_STAT.REC_POI_CLICK,"click",{revda_log:n[e].adver_log}),t.selectAdMarker(e,n[e])}});a.addOverlay(p),r.push(p)}(p));return pbstat.addStat(PB_STAT.REC_POI_SHOW,"show",{revda_log:l.join(",")}),t.rePoiMarkers=r,t.mapView.rePoiMarkers=r,r},addGRHotspotsLayer:function(e){var t=this,i=this.mapView;e&&e.result&&e.result.type&&11!==e.result.type&&require.async("place:widget/genericre/genericre.js",function(a){t.grControl=i.grControl=a.init(),t.grControl.setMapView(i),t.grControl.setGRData(e),t.grControl.onGRHotspotClick=function(){stat.addStat(COM_STAT_CODE.MAP_GR_MARKER_CLICK),t.switchSelectedMarker(-999)}})},addCenterPoiMarker:function(e){var t=this,i=this.BMap,a=this.map,s=this.mapView,n=new i.Icon(mapConst.MARKERS_PATH,new i.Size(22,30),{anchor:new i.Size(11,30),imageOffset:new i.Size(29,384)}),r=new s.CustomMarker(n,e,{className:"mkr_trans",click:function(){stat.addStat(COM_STAT_CODE.MAP_POI_MARKER_CLICK),t.setCenterMarker(-999)}});return a.addOverlay(r),r.setZIndex(250),this.centerPoiMarker=r,r},addRtBusMarker:function(e){var t,i,a,s,n,r,o=this.BMap,l=this.mapView,p=this.map,d=this.rtBusIcon;for(a=0,s=e.stations;a<s.length;a++)n=s[a],n.rt_info&&n.rt_info.next_vehicle&&1===n.rt_info.next_vehicle.has_next_vehicle&&(t=new o.Icon(d,new o.Size(27,32),{anchor:new o.Size(14,32)}),i=new l.CustomMarker(t,new o.Point(n.rt_info.next_vehicle.vehicle_x,n.rt_info.next_vehicle.vehicle_y),{className:"rt_bus",isAnimation:!1}),p.addOverlay(i),i.setZIndex(350)),a===e.nearest_station_idx&&(r=mapUtil.geoToPoint(n.geo),l.iwController.get(mapConst.IW_BSL).setData(mapConst.IW_BSL,{json:[{content:'<div class="stop-name nearest-stop">'+this.getStopNameString(n)+"</div>",uid:n.uid}],points:[{p:r.lng+","+r.lat}]}).switchTo(0),this.hasNearestStop=!0)},removeNbCenterMarker:function(){this.centerPoiMarker&&(this.map.removeOverlay(this.centerPoiMarker),this.centerPoiMarker=null)},addSingleMarker:function(e,t){var i=this.BMap,a=this.map,s=this.mapView,n=new i.Icon(mapConst.MARKERS_PATH,new i.Size(23,32),{anchor:new i.Size(12,32),imageOffset:new i.Size(29,416)}),r=new s.CustomMarker(n,e,{className:"fix_gr_mk",click:function(){stat.addStat(COM_STAT_CODE.MAP_POI_MARKER_CLICK),s.iwController.get(mapConst.IW_POI).setData(mapConst.IW_POI,{json:t}).switchTo(0)}});return a.addOverlay(r),r},addTransitPolyline:function(e,t){var i=this,a={qt:"bsl",uid:e.uid,c:e.area};searchData.fetch(urlUtil.jsonToUrl(a),function(e){for(var a=0;a<i.stationMarkers.length;a++)i.removePoiOverlay(i.stationMarkers[a]);for(var s=0;s<i.transitPolylines.length;s++)i.removeTransitPolyline(i.transitPolylines[s]);var n=e.content[0],r=mapUtil.parseGeo(n.geo);if(r&&2===r.type){var o=i.addPolyline(r.points,mapConst.ROUTE_TYPE_BUS);i.transitPolylines.push(o)}if(n&&n.stations){i.stationPoints=[],i.stationMarkers=[];for(var l=n.stations,p=0,d=l.length;d>p;p++){var c=mapUtil.parseGeo(l[p].geo);if(1===c.type){var h=mapUtil.getPoiPoint(c.points);i.stationPoints.push(h);var m=i.addStationMarker(l[p]);i.stationMarkers.push(m)}}}t&&t({firstLine:n,stationPoints:i.stationPoints})})},removePoiOverlay:function(e){var t=this.map;t.removeOverlay(e),e=null},removeTransitPolyline:function(e){var t=(this.BMap,this.map),i=$.inArray(e,this.transitPolylines);i>-1&&this.transitPolylines.splice(i,1),t.removeOverlay(e),e=null},addPolyline:function(e,t){var i=this.BMap,a=this.map;"undefined"==typeof t&&(t=0);var s=this.polylineStyles[t];if(s){var n={strokeWeight:s.stroke,strokeColor:s.color,strokeOpacity:s.opacity,strokeStyle:s.strokeStyle},r=new i.Polyline(e,n);return r._routeType=t,a.addOverlay(r),pbstat.addStat(PB_STAT.ROUTE_DETAIL_MAP),r}},addStationMarker:function(e){var t,i,a=this,s=this.BMap,n=this.map,r=this.mapView;i=new s.Icon(mapConst.DEST_MKR_PATH,new s.Size(11,11),{anchor:new s.Size(5,5),imageOffset:new s.Size(80,15)}),t=mapUtil.getPoiPoint(mapUtil.parseGeo(e.geo).points);var o=new r.CustomMarker(i,t,{className:"dest_mkr",click:function(){r.iwController.get(mapConst.IW_BSL).setData(mapConst.IW_BSL,{json:[{content:'<div class="stop-name">'+a.getStopNameString(e)+"</div>",uid:e.uid}],points:[{p:t.lng+","+t.lat}]}).switchTo(0)}});return n.addOverlay(o),o},selectHotspotMarker:function(e){var t=this.mapView;this.grControl.setMapView(t),this.grControl.sendInfRequest(e)},selectAdMarker:function(index,recommendData){$(".poi-info-window")&&$(".poi-info-window").css("display","none"),$("#slider")&&$("#slider").css("display","none"),this.switchSelectedAdMarker(index);var _uid=recommendData.guid,adContainer=$(".place-widget-bizpoicard-container");if(adContainer&&adContainer.attr("data-uid")===_uid)return void adContainer.css("display","");adContainer&&adContainer.remove();var adPoiTpl=[function(_template_object){var _template_fun_array=[],fn=function(__data__){var _template_varName="";for(var name in __data__)_template_varName+="var "+name+'=__data__["'+name+'"];';eval(_template_varName),_template_fun_array.push('<div class="place-widget-bizpoicard-container styleguide" data-uid="',"undefined"==typeof data.guid?"":data.guid,'">    <style>        ',"undefined"==typeof data.dom.css?"":data.dom.css,"    </style>    ","undefined"==typeof data.dom.html?"":data.dom.html,"    <script>        ","undefined"==typeof data.dom.js?"":data.dom.js,"    </script></div>"),_template_varName=null}(_template_object);return fn=null,_template_fun_array.join("")}][0],html=adPoiTpl({data:recommendData});$("#wrapper").append(html)},selectPoiMarker:function(e,t){if($("#slider")&&$("#slider").css("display",""),$(".place-widget-bizpoicard-container")&&$(".place-widget-bizpoicard-container").css("display","none"),this.rePoiMarkers&&$.isArray(this.rePoiMarkers)&&this.rePoiMarkers.length>0)for(var i=this.rePoiMarkers.length,a=0;i>a;a++)$(this.rePoiMarkers[a]._div.children[0]).css("background-position","0px 0px");e=parseInt(e,10);var t=t||{};if(!isNaN(e)){var s=this.mapView;if(e-=this.transitLines.length,e=Math.min(e,this.poiMarkers.length-1),this._selectedIndex!==e){if(this.clearRoadPolylines(),this.grControl&&this.grControl.marker&&this.grControl.marker.hide(),e>-1){var n=s.iwController.get(mapConst.IW_POI),r=!0;n.switchTo(e,r),this.switchSelectedMarker(e),"slide"==t.switchType&&t.switchType||listener.trigger("place.switchSelectedMarker","tap",{index:e,switchType:"tap"});var o=n.getPoiData();o&&o.ty===mapConst.GEO_TYPE_LINE&&this.addRoadPolylines(o),this.setCenterMarker(e)}else{var l=e+this.transitLines.length;this.transitLines[l]&&this.addTransitPolyline(this.transitLines[l],function(e){s.setViewport(e.stationPoints)})}this._selectedIndex=e}}},setCenterMarker:function(e){if(this.centerPoiMarker)for(var t=0,i=this.poiMarkers.length;i>t;t++){var a=this.poiMarkers[t]._point,s=this.centerPoiMarker._point,n=a.lat.toString().slice(0,-1),r=a.lng.toString().slice(0,-1),o=s.lat.toString().slice(0,-1),l=s.lng.toString().slice(0,-1);if(n===o&&r===l)return void(void 0===e||e>-1&&e!==t?(this.centerPoiMarker.setZIndex(200),this.poiMarkers[t].setZIndex(150)):(this.centerPoiMarker.setZIndex(150),this.poiMarkers[t].setZIndex(200)))}},getDetailURL:function(e,t){var i="/mobile/webapp/place/detail/qt=s&",a={c:131,searchFlag:"bigBox",version:5,exptype:"dep",src_from:"webapp_all_bigbox",da_ref:"mapclk",da_qrtp:11,detail_from:"list",wd:e,uid:t};return i+=uUtil.jsonToUrl(a)},getLineSearchURL:function(e,t){var i="/mobile/webapp/place/linesearch/foo=bar/from=place&end=word="+e+"&",a={point:[t.x,t.y].join(","),uid:t.guid,tab:"line"};return i+=uUtil.jsonToUrl(a)},getStreetViewURL:function(e){var t="/mobile/webapp/index/streetview/",i={ss_id:e,ss_panoType:"street"};return t+=uUtil.jsonToUrl(i)},switchSelectedAdMarker:function(e){var t=this.BMap;if(this.rePoiMarkers){var i,a,s;if(this._selectedADIndex>=0&&(a=this.rePoiMarkers[this._selectedADIndex])&&$(this.rePoiMarkers[this._selectedADIndex]._div.children[0]).css("background-position","0px 0px"),0>e||e>=this.rePoiMarkers.length?this._selectedADIndex=-999:($(this.rePoiMarkers[e]._div.children[0]).css("background-position","0px -32px"),this._selectedADIndex=e),this.poiMarkers&&this.poiMarkers[this._selectedIndex]){var a=this.poiMarkers[this._selectedIndex],s=a._config.hasGroupon?this.markersGroupon:mapConst.MARKERS_PATH;s=a._config.isAdPoi?this.markersAd:s;var i=new t.Icon(s,new t.Size(22,32),{anchor:new t.Size(11,32),imageOffset:new t.Size(0,32*this._selectedIndex)});a._div.className="",a.setIcon(i),a.setZIndex(200),this._selectedIndex=-999}}},switchSelectedMarker:function(e){var t=this.BMap;if(this.poiMarkers){var i,a,s;this._selectedIndex>=0&&(a=this.poiMarkers[this._selectedIndex])&&(s=a._config.hasGroupon?this.markersGroupon:mapConst.MARKERS_PATH,s=a._config.isAdPoi?this.markersAd:s,i=new t.Icon(s,new t.Size(22,32),{anchor:new t.Size(11,32),imageOffset:new t.Size(0,32*this._selectedIndex)}),a._div.className="",a.setIcon(i),a.setZIndex(200)),0>e||e>=this.poiMarkers.length?this._selectedIndex=-999:(i=new t.Icon(mapConst.MARKERS_PATH,new t.Size(26,37),{anchor:new t.Size(13,37),imageOffset:new t.Size(58,40*e)}),this.poiMarkers[e]._div.className="mkr_trans",this.poiMarkers[e].setIcon(i),this.poiMarkers[e].setZIndex(300),this._selectedIndex=e)}},addRoadPolylines:function(e){var t=this,i={qt:"ext",uid:e.uid,c:e.area,l:18};searchData.fetch(urlUtil.jsonToUrl(i),function(e){if(e&&e.content&&e.content.geo){var i=mapUtil.parseGeo(e.content.geo);if(2===i.type)if("string"==typeof i.points)t.roadPolylines.push(t.addPolyline(i.points));else for(var a=0,s=i.points.length;s>a;a++)i.points[a]&&t.roadPolylines.push(t.addPolyline(i.points[a]))}})},clearRoadPolylines:function(){if(this.roadPolylines){for(var e=0,t=this.roadPolylines.length;t>e;e++)this.removeTransitPolyline(this.roadPolylines[e]),this.roadPolylines[e]=null;this.roadPolylines=[]}},getStopNameString:function(e){var t,i,a,s=e.subways,n="";if($.isArray(s))for(i=0,a=s.length;a>i;i++)t=s[i],n+='<span class="subway" style="background:'+t.background_color+'">'+t.name+"</span>";return e.name+n}}});