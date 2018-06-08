

 document.addEventListener("DOMContentLoaded", function(event) {
    document.querySelectorAll("templateHtml").forEach(function(item){
        var src= item.getAttribute("src");
        $.get(src,function(template) {
            item.innerHTML = template;
        })
    })
  });


function getFormData(formSelector){
    var form = document.querySelector(formSelector),
        data = {},
        inputs = form.querySelectorAll("input"),
        selectors = form.querySelectorAll("select"),
        textareas = form.querySelectorAll("textarea");

    var getData = function(item){
         var name = item.getAttribute("name");
         data[name] = item.value; 
    }

    if(inputs.length){
        inputs.forEach(function(input){
            
            var name = input.getAttribute("name");

            switch (input.getAttribute("type")) {
                case "checkbox":
                    data[name] = input.checked;
                    break;
                case "radio":
                    if(input.checked){
                        data[name] = input.value;
                    }
                    break;
                default:
                    data[name] = input.value;
                    break;
            }
        });
    }

    if(selectors.length){
        selectors.forEach(getData);
    }

    if(textareas.length){
        textareas.forEach(getData);
    }
    return data;
}


function setFormData(formId,data){
    for(var key in data){
        var item = document.querySelector(formId + " [name= " + key + "]");
        if(item){
            if(item.nodeName == "INPUT" || item.nodeName == "SELECT" || item.nodeName == "TEXTAREA"){
                var type = item.getAttribute("type");
                switch (type) {
                    case "checkbox":
                        if(data[key] == "1"){
                            item.checked = true;
                        }
                        break;
                    case "radio":
                        var item = document.querySelector(formId + " [name= " + key + "][value=" + data[key] + "]");
                        item.checked = true;
                        break;
                    default:
                        item.value = data[key];
                        break;
                }
            }
            else{
                item.innerText =  data[key];
            }
        }
    }
}

function timestampToDate(timestamp){
    var date = new Date(Number(timestamp));
    var month = date.getMonth() + 1;
    month =  month < 10 ? "0" + month  : month;
    var day =  date.getDate() < 10 ? ("0" + date.getDate() ) : date.getDate();
    return date.getFullYear() + "-" + month + "-" + day;
}

function httpGet(){
    var url,params,callback;
    for(var i in arguments){
        switch (typeof(arguments[i])) {
            case 'string':
                url = arguments[i];
                break;
            case 'object': 
                params = arguments[i];
                break;
            default:
                callback = arguments[i];
                break;
        }
    }
    $.get(url,params,function(response) {
        if(response){
            try {
                var responseData = JSON.parse(response);
                callback(responseData);
            }
            catch(err) {}
        }
    })
}


function httpPost(url,data,callback){
    $.post(url,data,function(response) {
        if(response){
            try {
                var responseData = JSON.parse(response);
                callback(responseData);
            }
            catch(err) {}
        }
        
    })
}

function putInfoInsideSelector(selectorId, data){
    var optionsString="";

    for(var i=0; i < data.length; i++){
      optionsString = optionsString + "<option value="+ i +">" + data[i] + "</option>";
    }

    document.querySelector(selectorId).innerHTML = optionsString;
}

 var city_id = "293397";
 var key = 'c6d2bb1ff69b72eb20130799f7be62fb';

 $.ajax({
     url: 'http://api.openweathermap.org/data/2.5/forecast',
     dataType: 'json',
     type: 'GET',
     data: { id:city_id, appid: key, units: 'metric'},

     success: function(data){
         $('.today_temp').html( "" + data.list[1].main.temp_min + " - " + data.list[1].main.temp_max );
         $('.today_icon').append( '<img src="http://openweathermap.org/img/w/' + data.list[1].weather[0].icon + '.png">' );
         $('.today_desc').html( "" + data.list[1].weather[0].description );

         $('.tomorrow_temp').html( "" + data.list[9].main.temp_min + " - " + data.list[9].main.temp_max );
         $('.tomorrow_icon').append( '<img src="http://openweathermap.org/img/w/' + data.list[9].weather[0].icon + '.png">' );
         $('.tomorrow_desc').html( "" + data.list[9].weather[0].description );

         $('.day3_temp').html( "" + data.list[16].main.temp_min + " - " + data.list[16].main.temp_max );
         $('.day3_icon').append( '<img src="http://openweathermap.org/img/w/' + data.list[16].weather[0].icon + '.png">' );
         $('.day3_desc').html( "" + data.list[16].weather[0].description );

         $('.day4_temp').html( "" + data.list[24].main.temp_min + " - " + data.list[24].main.temp_max );
         $('.day4_icon').append( '<img src="http://openweathermap.org/img/w/' + data.list[24].weather[0].icon + '.png">' );
         $('.day4_desc').html( "" + data.list[24].weather[0].description );
     }

 });