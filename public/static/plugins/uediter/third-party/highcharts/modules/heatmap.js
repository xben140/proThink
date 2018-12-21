/*
+---------------------------------------------------------------------+
| iThink        | [ WE CAN DO IT JUST THINK ]                         |
+---------------------------------------------------------------------+
| Official site | http://www.ithinkphp.org/                           |
+---------------------------------------------------------------------+
| Author        | hello wf585858@yeah.net                             |
+---------------------------------------------------------------------+
| Repository    | https://gitee.com/wf5858585858/iThink               |
+---------------------------------------------------------------------+
| Licensed      | http://www.apache.org/licenses/LICENSE-2.0 )        |
+---------------------------------------------------------------------+
*/

(function(b){var k=b.seriesTypes,l=b.each;k.heatmap=b.extendClass(k.map,{colorKey:"z",useMapGeometry:!1,pointArrayMap:["y","z"],translate:function(){var c=this,b=c.options,i=Number.MAX_VALUE,j=Number.MIN_VALUE;c.generatePoints();l(c.data,function(a){var e=a.x,f=a.y,d=a.z,g=(b.colsize||1)/2,h=(b.rowsize||1)/2;a.path=["M",e-g,f-h,"L",e+g,f-h,"L",e+g,f+h,"L",e-g,f+h,"Z"];a.shapeType="path";a.shapeArgs={d:c.translatePath(a.path)};typeof d==="number"&&(d>j?j=d:d<i&&(i=d))});c.translateColors(i,j)},getBox:function(){}})})(Highcharts);
