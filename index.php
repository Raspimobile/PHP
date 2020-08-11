<?php include('sql_conn.php'); // connexion Ã  la base de donnÃ©e Home ?> 
<?php include('sql_select.php'); // recherche dans la base ?> 
<?php include('index_if.php'); // fonctions ?> 


<html>
<head>
<title>DonnÃ©es du camping-car</title>
<meta http-equiv="refresh" content="60"/>
<meta charset="utf-8" />
<script type="text/javascript" src="fusioncharts/fusioncharts.js"></script>
<script type="text/javascript" src="fusioncharts/fusioncharts.theme.fint.js?cacheBust=56"></script>

<style type="text/css">
/* CSS3 Create

*/

a{
     
     color:#000005;
     text-shadow:0  0 black;  
     text-decoration:none;              
}
a:hover,a:focus{
     background:rgba(0,0,0,.1);
     text-decoration:underline;
     box-shadow:0  0 rgba(255,255,255,.4);
     

}
a span2{
     color:#FFFFFF;
     position:absolute; 
     margin-top:23px;
     margin-left:-35px; 
     transform:scale(0) rotate(-12deg);
     background:rgba(0,0,0,.9);
     padding:15px;
     border-radius:3px;
     box-shadow:0 0 rgba(0,0,0,.5);   
     transition:all .25s;  
     opacity:0;         
}
a:hover span2, a:focus span2{
     transform:scale(1) rotate(0);  
     opacity:1;      
}
        
      
</style>

<script>
      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: <?php echo ($latitude)?>, lng: <?php echo ($longitude)?>},
          zoom: 20,
          mapTypeId: 'satellite'
        });
        map.setTilt(45);
      }
</script>

<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBterfxH0so_xofCtJc8_3RPWisjmo73u8&callback=initMap">
</script>

   
<script type="text/javascript">
  FusionCharts.ready(function(){
    var batterie = new FusionCharts({
    type: 'angulargauge',
    renderAt: 'c_batterie',
    width: '350',
    height: '250',
    dataFormat: 'json',
    dataSource: {
        "chart": {
            "valueFontSize": "20",
            "caption": "Batterie cellule",
            "subcaption": " <?php echo heure_H($batterie[time]) ?>",
            "lowerLimit": "10",
            "upperLimit": "16",
            "showValue": "1",
            "showBorder": "1",
            "numberSuffix": " Volts",                    
            "valueAbovePointer": "1",    
            "valueBelowPivot": "1",
            "gaugeFillMix": "{dark-40},{light-40},{dark-20}",
            "theme": "fint"
        },
        "colorRange": {
            "color": [{
                "minValue": "10.8",
                "maxValue": "11",
                "code": "#A20202"
            }, {
                "minValue": "11",
                "maxValue": "12.8",
                "code": "#f8bd19"
            }, {
                "minValue": "12",
                "maxValue": "13.8",
                "code": "#6baa01"
            }, {
                "minValue": "13.8",
                "maxValue": "15",
                "code": "#e44a00"
            },
               {
                "minValue": "15",
                "maxValue": "16",
                "code": "#A20202"
            }]
        },
        "dials": {
            "dial": [{
                "value": "<?php echo $batterie[tension] ?>, Volts"
            }]
        },
        "trendpoints": {
            "point": [{
                "startValue": "13.8",
                "displayValue": "Floating",
                "color": "#0075c2",
                "thickness": "2",
                "radius": "160",
                "innerRadius": "60",
                "alpha": "100"
            }]
        }
    }
}
);
    batterie.render();
});

  FusionCharts.ready(function(){
    var batterieP = new FusionCharts({
    type: 'angulargauge',
    renderAt: 'P_batterie',
    width: '350',
    height: '250',
    dataFormat: 'json',
    dataSource: {
        "chart": {
            "valueFontSize": "20",
            "caption": "Batterie Moteur",
            "subcaption": "<?php echo heure_H($batterieP[time]) ?>",
            "lowerLimit": "10",
            "upperLimit": "16",
            "showValue": "1",
            "showBorder": "1",
            "numberSuffix": " Volts",                    
            "valueAbovePointer": "1",    
            "valueBelowPivot": "1",
            "gaugeFillMix": "{dark-40},{light-40},{dark-20}",
            "theme": "fint"
        },
        "colorRange": {
            "color": [{
                "minValue": "10.8",
                "maxValue": "11",
                "code": "#A20202"
            }, {
                "minValue": "11",
                "maxValue": "12.8",
                "code": "#f8bd19"
            }, {
                "minValue": "12",
                "maxValue": "13.8",
                "code": "#6baa01"
            }, {
                "minValue": "13.8",
                "maxValue": "16",
                "code": "#e44a00"
            },  {
                "minValue": "15",
                "maxValue": "16",
                "code": "#A20202"
            }]
        },
        "dials": {
            "dial": [{
                "value": "<?php echo $batterieP[tension] ?> "
            }]
        },
        "trendpoints": {
            "point": [{
                "startValue": "13.8",
                "displayValue": "Floating",
                "color": "#0075c2",
                "thickness": "2",
                "radius": "160",
                "innerRadius": "60",
                "alpha": "100"
            }]
        }
    }
}
);
    batterieP.render();
});
</script>


<script type="text/javascript">
FusionCharts.ready(function () {
    var panneau_2  = new FusionCharts({
        type: 'hlineargauge',
        renderAt: 'c_panneau2',
        id: 'cs-linear-gauge',
        width: '350',
        height: '165',
        dataFormat: 'json',
        dataSource: {
            "chart": {
                "valueFontSize": "20",
                "caption": "Panneau solaire 2",
                "subcaption":  " <?php echo heure_H($batterie['time']) ?>", 
                "captionFontColor": "#000000",
                "subcaptionFontBold": "0",
                "bgColor": "#ffffff",
                "showBorder": "1",
                "lowerLimit": "0",
                "upperLimit": "18",
                "numberSuffix": " Volts",                    
                "valueAbovePointer": "1",                    
                "showShadow": "1",
                "gaugeFillMix": "{light}",
                "valueBgColor": "#ffffff",  
                "valueBgAlpha":"60",
                "valueFontColor":"#000000",
                "pointerBgColor": "#ffffff",
                "pointerBgAlpha": "50",
                "baseFontColor": "#ffffff"
            },
            "colorRange": {
                "color": [
                    
                    {
                        "minValue": "0",
                        "maxValue": "2",
                        "label": " ",
                        "code": "#A20202"
                    }, 
                    {
                        "minValue": "2",
                        "maxValue": "12.8",
                        "label": "Pas assez de soleil",
                        "code": "#e44a00"
                    }, 
                    {
                        "minValue": "12.8",
                        "maxValue": "14",
                        "label": "",
                        "code": "#f8bd19"
                    }, 
                    {
                        "minValue": "14",
                        "maxValue": "18",
                        "label": "OK",
                        "code": "#6baa01"
                    }
                ]
            },
            "pointers": {
                "pointer": [
                    {
                        "value": "<?php echo $batterie['Sol2'] ?> Volts",
                        "borderColor": "#333333",
                        "borderThickness": "2",
                        "borderAlpha": "60",
                        "bgColor": "#0075c2",
                        "bgAlpha": "75",
                        "radius": "6",
                        "sides": "4",
                        "toolText": "test",
                       
             
                    }
                ]
            }
        },
         "dials": {
            "dial": [{
                "value":  "<?php echo $batterie['Sol2'] ?> Volts"
            }]
        },
    })
    panneau_2.render();
});
</script>


<script type="text/javascript">
  FusionCharts.ready(function () {
    var panneau_1  = new FusionCharts({
        type: 'hlineargauge',
        renderAt: 'c_panneau1',
        id: 'cs-linear-gauge',
        width: '350',
        height: '165',
        dataFormat: 'json',
        dataSource: {
            "chart": {
                "valueFontSize": "20",
                "caption": "Panneau solaire 1 (MOOVE)",
                "subcaption": "<?php echo heure_H($batterie[time]) ?>", 
                "captionFontColor": "#000000",
                "subcaptionFontBold": "0",
                "bgColor": "#ffffff",
                "lowerLimit": "0",
                "upperLimit": "18", 
                "showBorder": "1",
                "numberSuffix": "Volts",                    
                "valueAbovePointer": "1",                    
                "showShadow": "1",
                "gaugeFillMix": "{light}",
                "valueBgColor": "#ffffff",  
                "valueBgAlpha":"60",
                "valueFontColor":"#000000",
                "pointerBgColor": "#ffffff",
                "pointerBgAlpha": "50",
                "baseFontColor": "#ffffff"
            },
            "colorRange": {
                "color": [
                    
                    {
                        "minValue": "0",
                        "maxValue": "2",
                        "label": "",
                        "code": "#A20202"
                    }, 
                    {
                        "minValue": "2",
                        "maxValue": "12.8",
                        "label": "Pas assez de soleil",
                        "code": "#e44a00"
                    }, 
                    {
                        "minValue": "12.8",
                        "maxValue": "14",
                        "label": "",
                        "code": "#f8bd19"
                    }, 
                    {
                        "minValue": "14",
                        "maxValue": "18",
                        "label": "OK",
                        "code": "#6baa01"
                    }
                ]
            },
            "pointers": {
                "pointer": [
                    {
                        "value": "<?php echo $batterie[Sol1] ?> Volts",
                        "borderColor": "#333333",
                        "borderThickness": "2",
                        "borderAlpha": "60",
                        "bgColor": "#0075c2",
                        "bgAlpha": "75",
                        "radius": "6",
                        "sides": "4"
                    }
                ]
            }
        },
         "dials": {
            "dial": [{
                "value":  "<?php echo $batterie[Sol1] ?> Volts"
            }]
        },
    })
    panneau_1.render();
});
</script>


<script type="text/javascript">
FusionCharts.ready(function(){
    var tempint = new FusionCharts({
    type: 'thermometer',
    renderAt: 'c_tempInt',
    id: 'Temp1',
    width: '200',
    height: '300',
    dataFormat: 'json',
    dataSource: {
        "chart": {
            "caption":    "IntÃ©rieure Cellule",
            "subcaption": "<?php echo heure_H($temperatures[time]) ?>",
            "lowerLimit": "-15",
            "upperLimit": "50",
            "decimals": "1",
            "numberSuffix": "Â°C",
            "showhovereffect": "2",
            "gaugeFillColor":"<?php echo color($temperatures [tempInt]) ?>",
            "showGaugeBorder": "2",
            "showBorder": "1",
            "gaugeBorderColor": "<?php echo color($temperatures [tempInt]) ?>",
            "gaugeBorderThickness": "1",
            "gaugeBorderAlpha": "30",
            "thmOriginX": "100",
            "chartBottomMargin": "10",
            "valueFontColor": "#000000",
	    "valueFontSize": "21",
            "theme": "fint"
        },
        "value": <?php echo $temperatures [tempInt] ?>,
        //All annotations are grouped under this element
        "annotations": {
            "showbelow": "1",
            "groups": [{
                //Each group needs a unique ID
                "id": "indicator",
                "items": [
                    //Showing Annotation
                    {
                        "id": "background",
                    }
                ]
            }]
        },
    },
    "events": {
        "initialized": function(evt, arg) {
            evt.sender.dataUpdate = setInterval(function() {
                var value,
                    prevTemp = evt.sender.getData(),                  
                    value = <?php echo $temperatures [tempInt] ?>;
                    evt.sender.feedData("&value=" + value);

            }, 3000);
            updateAnnotation = function(evtObj, argObj) {
               // var code,
                    chartObj = evtObj.sender,
                    val = chartObj.getData(),
                    annotations = chartObj.annotations;
                    //code = "#FF0000";
                    annotations.update("background", {
                    //"fillColor": code
                });			
            };
        },
        'renderComplete': function(evt, arg) {
            updateAnnotation(evt, arg);
        },
        'realtimeUpdateComplete': function(evt, arg) {
            updateAnnotation(evt, arg);
        },
        'disposed': function(evt, arg) {
            clearInterval(evt.sender.dataUpdate);
        }
    }
}
);
    tempint.render();
});
</script>

<script type="text/javascript">
FusionCharts.ready(function(){
    var tempint2 = new FusionCharts({
    type: 'thermometer',
    renderAt: 'c_tempInt2',
    id: 'Temp2',
    width: '200',
    height: '300',
    dataFormat: 'json',
    dataSource: {
        "chart": {
            "caption":    "IntÃ©rieure Cabine",
            "subcaption": "<?php echo heure_H($temp_home4[time]) ?>",
            "lowerLimit": "-15",
            "upperLimit": "50",
            "decimals": "1",
            "numberSuffix": "Â°C",
            "showhovereffect": "2",
            "gaugeFillColor":"<?php echo color($temp_home4[S4]) ?>",
            "backgroundFillColor" :"<?php echo color($temp_home4[S4]) ?>",
            "showGaugeBorder": "2",
            "showBorder": "1",
            "gaugeBorderColor": "<?php echo color($temp_home4[S4]) ?>",
            "gaugeBorderThickness": "1",
            "gaugeBorderAlpha": "30",
            "thmOriginX": "100",
            "chartBottomMargin": "10",
            "valueFontColor": "#000000",
            "valueFontSize": "21",
            "theme": "fint"
        },
        "value": <?php echo $temp_home4[S4] ?>,
        //All annotations are grouped under this element
        "annotations": {
            "showbelow": "0",
            "groups": [{
                //Each group needs a unique ID
                "id": "indicator",
                "items": [
                    //Showing Annotation
                    {
                        "id": "background",
                    }
                ]
            }]
        },
    },
    "events": {
        "initialized": function(evt, arg) {
            evt.sender.dataUpdate = setInterval(function() {
                var value,
                    prevTemp = evt.sender.getData(),                  
                    value = <?php echo $temp_home4 [S4] ?>;
                    evt.sender.feedData("&value=" + value);

            }, 3000);
            updateAnnotation = function(evtObj, argObj) {
               // var code,
                    chartObj = evtObj.sender,
                    val = chartObj.getData(),
                    annotations = chartObj.annotations;
                    //code = "#FF0000";
                    annotations.update("background", {
                    //"fillColor": code
                });			
            };
        },
        'renderComplete': function(evt, arg) {
            updateAnnotation(evt, arg);
        },
        'realtimeUpdateComplete': function(evt, arg) {
            updateAnnotation(evt, arg);
        },
        'disposed': function(evt, arg) {
            clearInterval(evt.sender.dataUpdate);
        }
    }
}
);
    tempint2.render();
});
</script>

<script type="text/javascript">
FusionCharts.ready(function(){
    var tempInt3 = new FusionCharts({
    type: 'thermometer',
    renderAt: 'c_tempInt3',
    id: 'Temp3',
    width: '200',
    height: '300',
    dataFormat: 'json',
    dataSource: {
        "chart": {
            "caption":    "IntÃ©rieure Salon",
            "subcaption": "<?php echo heure_H($temp_home5[time]) ?>",
            "lowerLimit": "-15",
            "upperLimit": "50",
            "decimals": "1",
            "numberSuffix": "Â°C",
            "showhovereffect": "2",
            "thmFillColor": "#E46800", 
            "gaugeFillColor":"<?php echo color($temp_home5[S5]); ?>",
            "backgroundFillColor" :"<?php echo color($temp_home5[S5]); ?>",
            "showGaugeBorder": "2",
            "showBorder": "1",
            "gaugeBorderColor": "<?php echo color($temp_home5[S5]); ?>",
            "gaugeBorderThickness": "1",
            "gaugeBorderAlpha": "30",
            "thmOriginX": "100",
            "chartBottomMargin": "10",
            "valueFontColor": "#000000",
			"valueFontSize": "21",
            "theme": "fint"
        },
        "value": <?php echo $temp_home5[S5] ?>,
        //All annotations are grouped under this element
        "annotations": {
            "showbelow": "0",
            "groups": [{
                //Each group needs a unique ID
                "id": "indicator",
                "items": [
                    //Showing Annotation
                    {
                        "id": "background",
                    }
                ]
            }]
        },
    },
    "events": {
        "initialized": function(evt, arg) {
            evt.sender.dataUpdate = setInterval(function() {
                var value,
                    prevTemp = evt.sender.getData(),                  
                    value = <?php echo $temp_home5 [S5] ?>;
                    evt.sender.feedData("&value=" + value);

            }, 3000);
            updateAnnotation = function(evtObj, argObj) {
               // var code,
                    chartObj = evtObj.sender,
                    val = chartObj.getData(),
                    annotations = chartObj.annotations;
                    //code = "#FF0000";
                    annotations.update("background", {
                    //"fillColor": code
                });			
            };
        },
        'renderComplete': function(evt, arg) {
            updateAnnotation(evt, arg);
        },
        'realtimeUpdateComplete': function(evt, arg) {
            updateAnnotation(evt, arg);
        },
        'disposed': function(evt, arg) {
            clearInterval(evt.sender.dataUpdate);
        }
    }
}
);
    tempInt3.render();
});
</script>

<script type="text/javascript">
FusionCharts.ready(function(){
    var tempExt = new FusionCharts({
    type: 'thermometer',
    renderAt: 'c_tempExt',
    id: 'Temp4',
    width: '200',
    height: '300',
    dataFormat: 'json',
    dataSource: {
        "chart": {
            "caption":    "ExtÃ©rieure",
            "subcaption": "<?php echo heure_H($temperatures[time]) ?>",
            "lowerLimit": "-15",
            "upperLimit": "50",
            "decimals": "1",
            "numberSuffix": "Â°C",
            "showhovereffect": "1",
            "backgroundFillColor" :"<?php echo color($temperatures[tempExt]); ?>",
            "thmFillColor": "<?php echo color($temperatures[tempExt]); ?>",
            "gaugeFillColor":"<?php echo color($temperatures[tempExt]); ?>",
            "showGaugeBorder": "1",
            "showBorder": "1",
            "gaugeBorderColor": "<?php echo color($temperatures[tempExt]); ?>",
            "gaugeBorderThickness": "2",
            "gaugeBorderAlpha": "30",
            "thmOriginX": "100",
            "chartBottomMargin": "10",
            "valueFontColor": "#000000",
			"valueFontSize": "21",
            "theme": "fint"
        },
        "value": <?php echo $temperatures [tempExt] ?>,
        //All annotations are grouped under this element
        "annotations": {
            "showbelow": "0",
            "groups": [{
                //Each group needs a unique ID
                "id": "indicator",
                "items": [
                    //Showing Annotation
                    {
                        "id": "background",
                    }
                ]
            }]
        },
    },
    "events": {
        "initialized": function(evt, arg) {
            evt.sender.dataUpdate = setInterval(function() {
                var value,
                    prevTemp = evt.sender.getData(),                  
                    value = <?php echo $temperatures [tempExt] ?>;
                    evt.sender.feedData("&value=" + value);

            }, 3000);
            updateAnnotation = function(evtObj, argObj) {
               // var code,
                    chartObj = evtObj.sender,
                    val = chartObj.getData(),
                    annotations = chartObj.annotations;
                    //code = "#FF0000";
                    annotations.update("background", {
                    //"fillColor": code
                });			
            };
        },
        'renderComplete': function(evt, arg) {
            updateAnnotation(evt, arg);
        },
        'realtimeUpdateComplete': function(evt, arg) {
            updateAnnotation(evt, arg);
        },
        'disposed': function(evt, arg) {
            clearInterval(evt.sender.dataUpdate);
        }
    }
}
);
    tempExt.render();
});
</script>

<script type="text/javascript">
FusionCharts.ready(function(){
    var tempFrigo = new FusionCharts({
    type: 'thermometer',
    renderAt: 'c_tempFrigo',
    id: 'Temp5',
    width: '200',
    height: '300',
    dataFormat: 'json',
    dataSource: {
        "chart": {
            "caption":    "Frigo",
            "subcaption": "<?php echo heure_H($temperatures[time]) ?>",
            "lowerLimit": "-15",
            "upperLimit": "50",
            "decimals": "1",
            "numberSuffix": "Â°C",
            "showhovereffect": "2",
            "thmFillColor": "<?php echo F_color($temperatures[tempFrig]) ?>",
            "showGaugeBorder": "2",
            "showBorder": "1",
            "gaugeFillColor":"<?php echo F_color($temperatures[tempFrig]) ?>",
            "gaugeBorderColor": "<?php echo F_color($temperatures[tempFrig]) ?>",
            "gaugeBorderThickness": "1",
            "gaugeBorderAlpha": "30",
            "thmOriginX": "100",
            "chartBottomMargin": "10",
            "valueFontColor": "<?php echo colorF($temperatures[tempFrig]) ?>",
	    "valueFontSize": "21",
            "theme": "fint"
        },
        "value": <?php echo $temperatures[tempFrig] ?>,
        //All annotations are grouped under this element
        "annotations": {
            "showbelow": "0",
            "groups": [{
                //Each group needs a unique ID
                "id": "indicator",
                "items": [
                    //Showing Annotation
                    {
                        "id": "background",
                    }
                ]
            }]
        },
    },
    "events": {
        "initialized": function(evt, arg) {
            evt.sender.dataUpdate = setInterval(function() {
                var value,
                    prevTemp = evt.sender.getData(),                  
                    value = <?php echo $temperatures[tempFrig] ?>;
                    evt.sender.feedData("&value=" + value);

            }, 3000);
            updateAnnotation = function(evtObj, argObj) {
               // var code,
                    chartObj = evtObj.sender,
                    val = chartObj.getData(),
                    annotations = chartObj.annotations;
                    //code = "#FF0000";
                    annotations.update("background", {
                    //"fillColor": code
                });			
            };
        },
        'renderComplete': function(evt, arg) {
            updateAnnotation(evt, arg);
        },
        'realtimeUpdateComplete': function(evt, arg) {
            updateAnnotation(evt, arg);
        },
        'disposed': function(evt, arg) {
            clearInterval(evt.sender.dataUpdate);
        }
    }
}
);
    tempFrigo.render();
});


FusionCharts.ready(function(){
    var tempCongel = new FusionCharts({
    type: 'thermometer',
    renderAt: 'c_tempCongel',
    id: 'Temp4',
    width: '200',
    height: '300',
    dataFormat: 'json',
    dataSource: {
        "chart": {
            "caption":    "CongÃ©lateur",
            "subcaption": "<?php echo heure_H($temperatures['time']) ?>",
            "lowerLimit": "-15",
            "upperLimit": "50",
            "decimals": "1",
            "numberSuffix": "Â°C",
            "showhovereffect": "2",
            "showBorder": "1",
            "gaugeFillColor":"<?php echo C_color($temperatures [tempCong]) ?>",
            "thmFillColor": "<?php echo C_color($temperatures [tempCong]) ?>",
            "showGaugeBorder": "2",
            "gaugeBorderColor": "<?php echo C_color($temperatures [tempCong]) ?>",
            "gaugeBorderThickness": "1",
            "gaugeBorderAlpha": "30",
            "thmOriginX": "100",
            "chartBottomMargin": "10",
            "valueFontColor": "<?php echo colorC($temperatures[tempCong]) ?>",
	    "valueFontSize": "21",
            "theme": "fint"
        },
        "value": <?php echo $temperatures [tempCong] ?>,
        //All annotations are grouped under this element
        "annotations": {
            "showbelow": "0",
            "groups": [{
                //Each group needs a unique ID
                "id": "indicator",
                "items": [
                    //Showing Annotation
                    {
                        "id": "background",
                    }
                ]
            }]
        },
    },
    "events": {
        "initialized": function(evt, arg) {
            evt.sender.dataUpdate = setInterval(function() {
                var value,
                    prevTemp = evt.sender.getData(),                  
                    value = <?php echo $temperatures[tempCong] ?>;
                    evt.sender.feedData("&value=" + value);

            }, 3000);
            updateAnnotation = function(evtObj, argObj) {
               // var code,
                    chartObj = evtObj.sender,
                    val = chartObj.getData(),
                    annotations = chartObj.annotations;
                    //code = "#FF0000";
                    annotations.update("background", {
                    //"fillColor": code
                });			
            };
        },
        'renderComplete': function(evt, arg) {
            updateAnnotation(evt, arg);
        },
        'realtimeUpdateComplete': function(evt, arg) {
            updateAnnotation(evt, arg);
        },
        'disposed': function(evt, arg) {
            clearInterval(evt.sender.dataUpdate);
        }
    }
}
);
    tempCongel.render();
});
</script>


<style type="text/css">
.Date {font-size: 12px;}
.Lien {color: #666;}
.Maxi {font-size: 16px; color: #930;}
.Maxi {	text-align: center;}
.Maxi {	font-weight: bold;}
.Mini {	font-size: 16px; color: #03C; text-align: center;}
.Titre { font-size: 24px;}
.Valeures_tab {	color: #E5E5E5;}
.Maxi strong {font-size: 18px;}
.Titre {font-size: 24px;}
.Titre .Titre .Titre {font-size: 36px;}

</style>
</head>
<body>
  <table width="46%" border="0" align="center">
    <tr>
      <strong><span class="Lien"><th height="20" colspan="4" valign="center" bgcolor="#FFFFFF"  scope="row"><h4>| 

<a href="map_V4.php" onclick="window.open(this.href, 'Carte', 'height=680, width=850, top=100, left=100, toolbar=no, menubar=no, location=no, resizable=yes, scrollbars=no, status=no'); return false;"  >Carte GPS</a> |  
<a href="street.php">Street View</a> | <a href="altitude.php">Altitude</a>| 
<a href="dy_frigo_freezer.php" onclick="window.open(this.href, 'TempÃ©ratures', 'height=680, width=850, top=100, left=100, toolbar=no, menubar=no, location=no, resizable=yes, scrollbars=no, status=no'); return false;" >TempÃ©ratures</a> | 
<a href="dy_bat_sol.php" onclick="window.open(this.href, 'Batterie cellule', 'height=680, width=850, top=100, left=100, toolbar=no, menubar=no, location=no, resizable=yes, scrollbars=no, status=no'); return false;"  >Tensions</a> | 
<a href="dy_eau.php" onclick="window.open(this.href, 'Niveaux Eaux', 'height=680, width=850, top=100, left=100, toolbar=no, menubar=no, location=no, resizable=yes, scrollbars=no, status=no'); return false;"  >Niveaux d'eau</a> | 
<a href="tab.php"> Tableau</a> |</span> 
<a href="home.php"><span2>Sonde</span2>Home</a> |</h4></strong></th>

    </tr>
    <tr>
      <th colspan="4" bgcolor="#FFFFFF" class="Titre" scope="col"><p class="Titre"><span class="Titre">Camping-Car</span></p>
        <div align="center" class="Lien">
          <div align="center" class="Date"><strong> Derniers relevÃ©s de tensions : <?php echo comp_date($batterie['time'], $batterieP['time']); ?></strong></div>
          <div align="center" class="Date"></div>
        </div></th>
    </tr>
      <tr>
      <th height="36" colspan="2" bgcolor="#FFFFFF" scope="col"></div>
      <div align="center" class="Maxi"></strong></div></th>
   
    </tr>
    <tr>
      <th height="82" colspan="2" bgcolor="#FFFFFF" scope="col"><div id="c_panneau1"></div></th>
      <th height="82" colspan="2"bgcolor="#FFFFFF" scope="col"><div id="c_panneau2"></div></th> 
    </tr>

    <tr>     
      <th height="82" colspan="2" bgcolor="#FFFFFF" scope="col"><a href="dy_batC.php" onclick="window.open(this.href, 'Batterie cellule', 'height=680, width=850, top=100, left=100, toolbar=no, menubar=no, location=no, resizable=yes, scrollbars=no, status=no'); return false;">
      <div id="c_batterie"></div>
      <div align="center" class="Maxi"><strong><div id="batterie">
      <?php echo $t_batterie; ?></strong></div></a></th>
      <th height="82" colspan="2" bgcolor="#FFFFFF" scope="col"><a href="dy_batM.php" onclick="window.open(this.href, 'Batterie moteur', 'height=680, width=850, top=100, left=100, toolbar=no, menubar=no, location=no, resizable=yes, scrollbars=no, status=no'); return false;">
      <div id="P_batterie"></div>
      <div align="center" class="Maxi"><strong><?php echo $t_batterieP; ?></strong></div></a></th>
    </tr>
    <tr>
       <tr>
      <th colspan="4" valign="center" bgcolor="#FFFFFF" class="Date" scope="row">&nbsp;</th>
    </tr>
      <p class="Lien">&nbsp;</p></th>
      <th height="30" colspan="4" valign="top" valign="center" bgcolor="#E7ECEE" class="Date" scope="row"><strong><div align="center" class="gps"><?php echo $route; ?></strong></div><?php echo $Adresse['adresse']; ?>
       - Altitude : <?php echo $gps['altitude']; ?>m <div align="center" class="gps">DernÃ¨re vitesse<strong> <?php echo $vitesse; ?></strong> Km/h</div>
    </tr>    
    <tr>
      <th colspan="4" valign="center" bgcolor="#FFFFFF" class="Date" scope="row">&nbsp;</th>
    </tr>
    <tr>
      <th colspan="4" valign="center" bgcolor="#FFFFFF" class="Date" scope="row"><p><strong>Derniers relevÃ©s des tempÃ©ratures : <?php echo comp_date($temperatures['time'], $temp_home4[time]); ?> </strong><br class="Valeures_tab">
</p></th>
    </tr>
<tr>
     <th height="10" colspan="5" valign="center" bgcolor="#FFFFFF" class="Lien" scope="row"><strong>  Pression atmosphÃ©rique : <?php echo $pression[Pression]; ?> Pa  <strong>le <?php echo date_J($pression[time]); ?> : <?php echo $temps; ?></strong></strong></th>
    </tr>
   <tr>
      <th colspan="4" valign="center" bgcolor="#FFFFFF" class="Date" scope="row">&nbsp;</th>
    </tr>
    <tr>
      <th width="190" height="79" scope="row"><div id="c_tempInt"></div></th>
      <th width="190" height="79" scope="row"><div id="c_tempInt2"></div></th>
      <th width="190" height="79" scope="row"><div id="c_tempInt3"></div></th>
</tr>
<tr>
      <th  width="190" height="79" scope="row"><a href="dy_Frig.php" onclick="window.open(this.href, 'TempÃ©rature du frigo', 'height=680, width=850, top=100, left=100, toolbar=no, menubar=no, location=no, resizable=yes, scrollbars=no, status=no'); return false;">
<div align="center" id="c_tempFrigo"></div></a>
      <th  width="190" height="79" scope="row"><a href="dy_freezer.php" onclick="window.open(this.href, 'TempÃ©rature du congÃ©lateur', 'height=680, width=850, top=100, left=100, toolbar=no, menubar=no, location=no, resizable=yes, scrollbars=no, status=no'); return false;">
<div align="center" id="c_tempCongel"></div></a></th>
      <th  width="190" height="79" scope="row"><a href="dy_tempExt.php" onclick="window.open(this.href, 'TempÃ©rature extÃ©rieure', 'height=680, width=850, top=100, left=100, toolbar=no, menubar=no, location=no, resizable=yes, scrollbars=no, status=no'); return false;">
<div align="center" id="c_tempExt"></div></a></th>
</tr>
<tr>
      <th  width="190" height="10" scope="row">
      <div align="center" class="Maxi"><strong><a href="dy_frigo.php" onclick="window.open(this.href, 'TempÃ©rature du frigo', 'height=680, width=850, top=100, left=100, toolbar=no, menubar=no, location=no, resizable=yes, scrollbars=no, status=no'); return false;">
<span2>Le <?php echo date_J($Temp_Select_F[time]) ?> &agrave; <?php echo heure_H($Temp_Select_F[time]) ?></span2><?php echo $Res_test_Frigo; ?><br><?php echo Tempsrest($Temp_Select_F[time]); ?></br></strong></div></th>
      <th  width="190" height="10" scope="row">
      <div align="center" class="Maxi"><strong><a href="dy_Freez.php" onclick="window.open(this.href, 'TempÃ©rature du frigo', 'height=680, width=850, top=100, left=100, toolbar=no, menubar=no, location=no, resizable=yes, scrollbars=no, status=no'); return false;">
<span2>Le <?php echo date_J($Temp_Select[time]) ?> &agrave; <?php echo heure_H($Temp_Select[time]) ?></span2><?php echo $Res_test;  ?><br><?php echo Tempsrest($Temp_Select[time]); ?></br></strong></div></th>    
</tr>
  </table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html> 