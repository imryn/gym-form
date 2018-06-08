
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

function createKidForm(data,callback){
    var date = new Date(data.bDate).getTime();
    if(!isNaN(date)){
        data.bDate = date;
    }

    if(idcheck(data['kidId'],createKidForm)){
        data['route'] = 'create_kid';
        httpPost("/Sadna/server/api.php",data,callback);
    }
}

createKidForm.error= function(msg){
    document.querySelector(".success-message2").textContent = msg;
}

createParentUser.error = function(msg){
    document.querySelector(".success-message").textContent = msg;
}

function idcheck(idcheck,errorFunction){
    if(idcheck.toString().length !=9){
        errorFunction.error("ID field must contain 9 digits");
        return false;
    }
    return true;
}

function kindercodecheck(kindercodecheck,errorFunction){
    if(kindercodecheck.toString().length !=5){
        errorFunction.error("Kindergarten code field must contain 5 digits");
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

function createParentUser(){
    var parentData = getFormData("#registration-parent");
    var kidData = getFormData("#registration-kid");
    kidData['parentId'] = parentData['parentId'];
    parentData['kidId'] = kidData['kidId'];
    kidData['lastname'] = parentData['lastname'];
    parentData['lastname'] = kidData['lastname'];
    var checkkindercode = kindercodecheck(parentData['kindergartenid'],createParentUser);
    var checkKid = idcheck(kidData['kidId'],createKidForm);
    var checkParent = idcheck(parentData['parentId'],createParentUser);
    var checkEmailParent = emailcheck(parentData['email'],createParentUser);
    if(!checkkindercode || !checkKid || !checkParent || !checkEmailParent){
        return;
    }
    createKidForm(kidData,function(response){
        if(response.success){
            parentData['route'] = 'create_user';
            httpPost("/Sadna/server/api.php",parentData,function(_response){
                if(_response.success){
                    bootpopup.alert("Form was saved successfully !!","Success",function(){
                        window.location.assign("/Sadna/index.php");
                    });
                }
                else{
                    errorForUser("One of the fields is wrong or already used");
                }
            })
        }
        else{
            errorForUser("One of the fields is wrong or already used");
        }
    });
}

