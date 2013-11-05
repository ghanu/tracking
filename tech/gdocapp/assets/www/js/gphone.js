//add listener when device ready
            

                
database = openDatabase('gbase', '1.0', 'Patients infodb', 5*1024*1024);
if (database) {
    database.transaction(function(tx) {
        //tx.executeSql('drop table patient_details ');
        //tx.executeSql('drop table patient_history ');
        tx.executeSql('CREATE TABLE IF NOT EXISTS patient_details (id INTEGER PRIMARY KEY AUTOINCREMENT, name TEXT NOT NULL, address TEXT,mobile_no text,alt_mobile_no text,refered_by text,first_visit_date date,no_of_visits integer,complaint text)');
            
        tx.executeSql('CREATE TABLE IF NOT EXISTS patient_history (id INTEGER PRIMARY KEY AUTOINCREMENT, patient_id int, complaint text,medicine text,visit_date date)');


    });
}

            
            
function addPatients() {
                
     var patient = {
        "name": $('#fullname').val(),
        "address": $('#address').val(),
        "mobile_no": $('#mobile').val(),
        "alt_mobile_no": $('#alt_mobile').val(),
        "refered_by": $('#refered_by').val(),
        "first_visit_date":$('#first_visit').val(),
        "complaint":$('#complaint').val(),
        "no_of_visits": '1'
    };
    database.transaction(function(tx) {
        tx.executeSql('INSERT INTO patient_details (name,address,mobile_no,first_visit_date,no_of_visits,complaint,refered_by,alt_mobile_no) values (?, ?,?, ? ,?,?,?,?)', [patient.name, patient.address,patient.mobile_no, patient.first_visit_date,patient.no_of_visits,patient.complaint,patient.refered_by,patient.alt_mobile_no],function(tx, rs) {
        }, function(tx, error) {
            alert(error.message);    
        });
    });
    patient.value = "";
    $.mobile.changePage( "index.html", {
        transition: "slideup"
    } );
                
}
function showPatients(){
   database.transaction(function(tx) {
        tx.executeSql('SELECT id,name,mobile_no,alt_mobile_no, (select count(1)+1 as no_of_visits from patient_history where patient_id=patient_details.id) as no_of_visits FROM patient_details', [], function (tx, results) {
            var len = results.rows.length
            for (var i = 0; i < len; i++) {
                $('#patient_list').append($('<li/>', {    
                    'data-filtertext':results.rows.item(i).name+' '+results.rows.item(i).mobile_no+' '+results.rows.item(i).alt_mobile_no
                }).append($('<a/>', {    
                    'href': 'patient_info.html?id='+results.rows.item(i).id,
                    'rel':'external',
                    'data-transition': 'slide',
                    'html': results.rows.item(i).name+'<span class="ui-li-count">'+parseInt(results.rows.item(i).no_of_visits)+'</span>'                    
                })
                ));
                    
            }
            $('#patient_list').listview("refresh");
        });        
    });
}
      
      
function addVisit(){
    var complaint=$('#complaint').val();
    var treatment=$('#treatment').val();
    var visit_date=$('#visit_date').val();

    var patient_visit = {
    
        "patient_id": $('#patient_id').val(),
        "diagnosis": complaint,
        "medicine": treatment,
        "visit_date":visit_date
    };
    
    database.transaction(function(tx) {
        tx.executeSql('INSERT INTO patient_history (patient_id, complaint ,medicine ,visit_date ) values (?, ?, ? ,?)', [patient_visit.patient_id, patient_visit.diagnosis,patient_visit.medicine, patient_visit.visit_date],function(tx, rs) {}, function(tx, error) {
            alert(error.message);
        });
    });
             
    patient_visit.value = "";
    $.mobile.changePage( "patient_info.html?"+$('#patient_id').val(), { transition: "slideup"} );
}
      
      
function getPatientInfo(id){
      
    database.transaction(function(tx) {
        tx.executeSql("SELECT visit_date,complaint,medicine FROM patient_history where patient_id="+id+' order by visit_date desc', [], function (tx, results) {
            var len = results.rows.length
            var d='';
                        
            for (var i = 0; i < len; i++) {

                d=results.rows.item(i).visit_date.split('-');
                $('#patient_visit_list').append($('<li/>', {    //here appendin `<li>`
                    'data-role': "list-divider",
                    'role':'header',
                    'text':d[2]+"/"+d[1]+"/"+d[0]
                })).append($('<li/>', {    //here appendin `<li>`
                    
                    'html':'<p><label>Complaint</label> : '+results.rows.item(i).complaint+'</p><p><label>Treatment </label>:'+results.rows.item(i).medicine+'</p>'
                }));

            }
                        
            $('#patient_visit_list').listview("refresh")
        });        
    });
      
}
function getParameterByName(name)
{
  name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
  var regexS = "[\\?&]" + name + "=([^&#]*)";
  var regex = new RegExp(regexS);
  var results = regex.exec(window.location.search);
  if(results == null)
    return "";
  else
    return decodeURIComponent(results[1].replace(/\+/g, " "));
}
            

            
            
            