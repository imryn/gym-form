
function buildThs(array){
    var row = '<tr>'
    array.forEach(function(item){
        row = row + '<th>'+item+'</th>';
    })
    return row + '</tr>';
}


function createTable(data){
    console.log(data)
    var tableElement = document.getElementById("kids-table");
    var table='';

    table = table + buildThs(['first_name','last_name','parent_name','phone_number']);

    data.forEach(function(item) {
        table = table + '<tr><td>'+item.first_name+'</td><td>' +item.last_name+'</td><td>'+item.parent_name +'</td><td>' + item.phone_number +'</td></tr>';
    });
    tableElement.innerHTML = table;
    console.log(table)
}

// function createKidForm(data,callback){
//     var date = new Date(data.bDate).getTime();
//     if(!isNaN(date)){
//         data.bDate = date;
//     }

//     if(idcheck(data['kidId'],createKidForm)){
//         data['route'] = 'create_kid';
//         httpPost("/Sadna/server/api.php",data,callback);
//     }
// }


createUser.error = function(msg){
    document.querySelector(".success-message").textContent = msg;
}

function idcheck(idcheck,errorFunction){
    if(idcheck.toString().length !=9){
        errorFunction.error("ID field must contain 9 digits");
        return false;
    }
    return true;
}



function emailcheck(emailcheck,errorFunction){
    var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    //var address = document.getElementById[email].value;
    if (reg.test(emailcheck) == false) 
    {
        errorFunction.error("Email field must contain @ and . or is invalid");
        return false;
    }
    return true;
}

function errorForUser(msg){
    document.querySelector(".success-message").textContent = msg;
}

function createUser(){
    var Data = getFormData("#registration-form");
    var checkid = idcheck(Data['userid'],createUser);
    var checkEmail = emailcheck(Data['email'],createUser);
    if(!checkid || !checkEmail){
        return;
    }
    
    Data['route'] = 'create_user';
            httpPost("/tihnot_zad_sharat/gym-form/server/api.php",Data,function(_response){
                if(_response.success){
                    bootpopup.alert("Form was saved successfully !!","Success",function(){
                        window.location.assign("/tihnot_zad_sharat/gym-form/index.php");
                    });
                }
                else{
                    errorForUser("One of the fields is wrong or already used");
                }
            });
 }

