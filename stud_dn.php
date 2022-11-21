<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> <!-- ajax -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"><!-- fara  -->
</head>
<style>
.viewdt {
    /*used for styling the view list*/
    height: 65%;
    width: 80%;
    background-color: #D0D4DD;
    position: absolute;
    top: 3%;
    left: 10%;
    border-radius: 15px;
    border-style: dotted;
    text-transform: uppercase;
    display: none;
}
.edt{
    height: 25px;
    width: 45%;
    border-radius:15px;
}

</style>

<body><div style="margin-top:10%;">
<label for="srch">Search Student</label><input type="text" placeholder="Enter Name or Ref no:" id="srch"><input type="button" value="Search" onclick="crete_list()"><input type="button" value="refresh" onclick="rldk()">
<div class="bking_list" id="bking_listz"></div>
<div class="viewdt" id="idview">
            <!-- used for showing the details -->
            <h2 id="nme" style="position:absolute;left:10%;top:35px;"><span id="name">DON G MADAMANNIL</span>&nbsp;(<span id="stdid" style="color:red;">TJXLMZHV</span>)</h2><br>
            <h3 id="adress" style="position:absolute;left:10%;top:115px;">Email id:<span id="emaildw">dongeevarghese44@gmail.com</span></h3>
            <h3 id="ano" style="position:absolute;left:10%;top:195px;">Phno:<span id="ph" style="color:blue;">9874562456</span></h3>
            <h3 id="cdetails" style="position:absolute;left:10%;top:265px;text-transform:none;">Father Income<span id="fin" style="color:blue;">565456 </span><br><br><br>Mother Income:<span id="min" style="color:blue;">45644 </span></h3>
            <h3 id="cdetails" style="position:absolute;left:10%;top:305px;text-transform:none;">Total sibling income:<span id="sin" style="color:blue;">565456 </span></h3>
            <h3 id="adress" style="position:absolute;left:10%;top:450px;">Rank:<span id="rank" style="color:blue;">56</span> </h3>
            <h3 id="ano" style="position:absolute;left:10%;top:500px;">Mark<span id="mark" style="color:blue;">564</span></h3>
<div style="background-color:red;height:60%;width:50%;position:absolute;top:30%;left:40%;border-radius:15px;">
sdgsfg

</div>
            <input type="button" onclick="clossdiv()" value="X" style="position:absolute;left:96%;top:11px;background-color:#FF8A8A;border-radius:3px;cursor:pointer;">
            <input type="button" value="EDIT" onclick="edtfn()" style="position:absolute;top:92%;left:40%;height:40px;width:115px;border-radius:10px;cursor:pointer;">
            <input type="button" value="Select" onclick="rjt()" style="position:absolute;top:92%;left:55%;height:40px;width:115px;border-radius:10px;cursor:pointer;background-color:#6F8BBA;">
<input type="button" value="Download details" style="position:absolute;top:92%;left:25%;height:40px;width:145px;border-radius:10px;cursor:pointer;background-color:#6F8BBA;" onclick="csv_dwn()">
        </div>
        <input type="Button" value="Download Application List" onclick="csv_dwn()"><input type="Button" value="Download Selected Lst" onclick="csv_dn()"><input type="button" value="Submit to HOD" onclick="to_hod()"></div>
</body>
<script>
crete_list();
function csv_dwn()
{
window.location="print_csv.php";    
}
function csv_dn()
{
window.location="print_csv_sel_list.php";    
}
function edtfn()
{



}
function to_hod(){//used to transfer selected list to hod
    //alert('hello');
    $.ajax({
                url: "stud_dn_ajax.php",
                method: "POST",
                dataType: "JSON",
                data: {
                    idr: 9,
                },
                success: function(resobjri) {
                  if(resobjri==0)
                  {
                    alert("No student selected"); 
                  }
                  else
                  {
                    alert("Successfully forwarded "+resobjri+" selected students to HOD"); 
                 
                }
                }
            });

}
function viewclick(vonj) { //when click the view details button
           tst_id = vonj.getAttribute("data-stid");
            filldivplz(tst_id);
            document.getElementById("idview").style.display = "block";

        }
function filldivplz(reff_no_tst) {
            //used for fillng the test view div elements
                 //  alert(reff_no_tst); 
            $.ajax({
                url: "stud_dn_ajax.php",
                method: "POST",
                dataType: "JSON",
                data: {
                    idr: 3,
                    reff_dta: reff_no_tst,
                },
                success: function(resobjri) {
                  //  alert(resobjri[0]); 
                    document.getElementById("name").innerHTML = resobjri[0];
                    document.getElementById("stdid").innerHTML = resobjri[1];
                    document.getElementById("emaildw").innerHTML = resobjri[2];
                    document.getElementById("ph").innerHTML = resobjri[3];
                    document.getElementById("fin").innerHTML = resobjri[4];
                    document.getElementById("min").innerHTML = resobjri[5];
                    document.getElementById("sin").innerHTML = resobjri[6]+ resobjri[7];
                    document.getElementById("rank").innerHTML = resobjri[8];
                    document.getElementById("mark").innerHTML = resobjri[9];


                }
            });
        }

function rldk()
{
    document.getElementById("srch").value="";
    crete_list();

}
function crete_list() { //used for the creation of the list of bookings
           val1 = document.getElementById("srch").value; //date
           $.ajax({
                url: 'stud_dn_ajax.php',
                type: 'POST',
                dataType: "JSON",
                data: {
                    idr: 1,
                    srh:val1,
                
                },
                success: function(res1) {
                    $('#bking_listz').empty();
                    notfnd = `<h3 align='center' style='color:#EC8282;'>oobs,no details found</h3> `;
                  if (res1[0] != "NULL") {
                    txv = `
                            <div style='width:100%;height:25px;margin-top:5px;border-radius:15px;'class="card-body"><b style='color:black;margin-left:115px;font-size:20px;'><u>STUDID</U></b>   <b style="color:red;margin-left:115px;position:absolute;left:15%;"><u>FULL NAME<u></b> <b style="margin-left:115px;margin-right:115px;position:absolute;left:50%;"><u>ROLL NO:</u> </b></div><br>
                          `;

                            $('#bking_listz').append(txv);
                       
                        for (i = 0; i < res1.length; i++) {
                            idName = "stid" + i;
                            idLoca = "fname" + i;
                            tnamek = "roll" + i;
                            btnid = "sel" + i;
                            txv = `
                            <div id='` + i+ `' style='width:100%;height:65px;margin-top:5px;background-color:#E1E5EA;border-radius:15px;'class="card-body"><b id='` + idName + `' style='color:black;margin-left:115px;font-size:20px;'>STUDID</b>   <b style="color:red;margin-left:115px;position:absolute;left:15%;"id='` + idLoca + `'>FULL NAME</b> <b style="margin-left:115px;margin-right:115px;position:absolute;left:50%;">ROLL NO: <b id='` + tnamek + `'></b></b><input type="button" data-stid='` + res1[i].studid + `'  onclick="viewclick(this)" style="cursor:pointer;margin-right:35px;position:absolute;right:15%;" value="View & Edit Details"><input  data-std='` + res1[i].studid + `'  data-ammuid='` + btnid+ `' type="button" id='` + btnid + `'  onclick="sel(this)" style="cursor:pointer;background-color:#6F8BBA;height:35px;width:96px;border-radius:5px;margin-top:1px;position:absolute;right:25px;" value="Select"></div><br>
                          `;

                            $('#bking_listz').append(txv);
                        }
                        fillData(res1);
                    } else {
                        $('#bking_listz').append(notfnd);
                    }
              
               },
            
            });
        }


function sel(vonj){
    tst_id = vonj.getAttribute("data-std");
    idada= vonj.getAttribute("data-ammuid");
            updt(tst_id,idada);

            
}
function updt(ref,idt)
{//alert(ref);
    klms=document.getElementById(idt).value;
    $.ajax({
                url: 'stud_dn_ajax.php',
                type: 'POST',
                dataType: "JSON",
                data: {
                    idr: 2,
                    srh:ref,
                    selfn:klms,
                
                },
                success: function(res1) {
                   
                    if(res1==1)
    {
        document.getElementById(idt).style.backgroundColor ="#6F8BBA" ;
        document.getElementById(idt).value ="Select" ; 

    }
    if(res1==0)
    {
        document.getElementById(idt).style.backgroundColor ="green" ; 
        document.getElementById(idt).value ="Selected" ; 

    }

    crete_list();
               },
            
            });
}

        function fillData(kzm) { //used to fill data on the each booking div

for (i = 0; i < kzm.length; i++) {
    nameId = "stid" + i;
    locaId = "fname" + i;
    tnamerh = "roll" + i;
    btnammu = "sel" + i;
  //  dtr = "dt" + i;
      document.getElementById(nameId).innerHTML = kzm[i].studid;
    document.getElementById(locaId).innerHTML = kzm[i].fullname;
    document.getElementById(tnamerh ).innerHTML = kzm[i].rollno;
    if(kzm[i].selected=="")
    {
        document.getElementById(btnammu).style.backgroundColor ="#6F8BBA" ;
        document.getElementById(btnammu).value ="Select" ; 

    }
    if(kzm[i].selected=="selected")
    {
        document.getElementById(btnammu).style.backgroundColor ="green" ; 
        document.getElementById(btnammu).value ="Selected" ; 

    }
    if(kzm[i].selected=="rejected")
    {
        document.getElementById(btnammu).style.backgroundColor ="red" ; 
        document.getElementById(btnammu).value ="rejected" ; 

    }

}

}
function clossdiv() { //used for closing the div and refresh the list
            document.getElementById("idview").style.display = "none";
           // document.getElementById("divtst").style.display = "none";
            crete_list();
        }
    </script>
</html>