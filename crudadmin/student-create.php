<?php
session_start();
 require 'dbcon.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Faculty Create</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Faculty Add 
                            <a href="index.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">


                               <!--  <div class="mb-3">
                                <label>Faculty ID</label>
                                <input type="text" name="id" class="form-control">
                            </div>-->
                            <div class="mb-3">
                                <label>Faculty ID</label>
                                <input type="text" name="id" id="id" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Password</label>
                                <input type="text" name="pass" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Faculty Type</label>
                                <select required id="faculty_type" name="faculty_type" onchange="facultytype()">
                                <option disabled selected>Select option</option>
                                <option>Advisor</option>
                                <option>HOD</option>
                                <option>SCH</option>
                            </select>
                            </div>
                           <div class="mb-3">
                            <label>Branch</label>
                            <select required id="branch" name="branch">
                                <option value="" selected="selected">Select branch</option>
                            </select>
                        </div>
                        <div class="mb-3" id=semdiv>
                            <label>Semester</label>
                            <select required id="sem" name="sem">
                                <option value="0" selected="selected">Select semester</option>
                              
                            </select>
                        </div>
                        
                        <div class="mb-3" id="batchdiv">

                            <label>Batch</label>
                            <select required id="batch" name="batch">
                                <option value="nill" selected="selected">Select batch</option>
                            </select>
                        </div>
                            <div class="mb-3">
                                <label>year</label>
                                <input type="text" name="year" class="form-control">
                            </div>
                              <div class="mb-3">
                                <label>email</label>
                                <input type="text" name="email" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="save_faculty" class="btn btn-primary">Save Faculty</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var branchObject = {
  "CS": {
    "1": ["A","B","C"],
    "2": ["A","B","C"],
    "3": ["A","B","C"],
    "4": ["A","B","C"], 
    "5": ["A","B","C"], 
    "6": ["A","B","C"],   
    "7": ["A","B","C"], 
    "8": ["A","B","C"] 
  },
  "MS": {
    "1": ["A","B","C"],
    "2": ["A","B","C"],
    "3": ["A","B","C"],
    "4": ["A","B","C"], 
    "5": ["A","B","C"], 
    "6": ["A","B","C"],   
    "7": ["A","B","C"], 
    "8": ["A","B","C"] 
  },
   "CS": {
    "1": ["A","B","C"],
    "2": ["A","B","C"],
    "3": ["A","B","C"],
    "4": ["A","B","C"], 
    "5": ["A","B","C"], 
    "6": ["A","B","C"],   
    "7": ["A","B","C"], 
    "8": ["A","B","C"]
  },
  "EEE": {
    "1": ["A","B","C"],
    "2": ["A","B","C"],
    "3": ["A","B","C"],
    "4": ["A","B","C"], 
    "5": ["A","B","C"], 
    "6": ["A","B","C"],   
    "7": ["A","B","C"], 
    "8": ["A","B","C"] 
  },
  "C": {
    "1": ["A","B","C"],
    "2": ["A","B","C"],
    "3": ["A","B","C"],
    "4": ["A","B","C"], 
    "5": ["A","B","C"], 
    "6": ["A","B","C"],   
    "7": ["A","B","C"], 
    "8": ["A","B","C"] 
  },
  "MCA": {
    "1": ["A"],
    "2": ["A"],
    "3": ["A"],
    "4": ["A"]
 
  },
  "CHEM": {
    "1": ["A","B","C"],
    "2": ["A","B","C"],
    "3": ["A","B","C"],
    "4": ["A","B","C"], 
    "5": ["A","B","C"], 
    "6": ["A","B","C"],   
    "7": ["A","B","C"], 
    "8": ["A","B","C"]
  },
  "MTECH": {
    "1": ["A"],
    "2": ["A"],
    "3": ["A"],
    "4": ["A"] 
  },
  "MPLAN": {
    "1": ["A"],
    "2": ["A"],
    "3": ["A"],
    "4": ["A"] 
  },
  "ARCH": {
    "1": ["A","B","C"],
    "2": ["A","B","C"],
    "3": ["A","B","C"],
    "4": ["A","B","C"], 
    "5": ["A","B","C"], 
    "6": ["A","B","C"],   
    "7": ["A","B","C"], 
    "8": ["A","B","C"],
    "9": ["A","B","C"],
    "10": ["A","B","C"]
  },
  "MARCH": {
    "1": ["A","B","C"],
    "2": ["A","B","C"],
    "3": ["A","B","C"],
    "4": ["A","B","C"]
  }
}
window.onload = function() {
  var branchSel = document.getElementById("branch");
  var semSel = document.getElementById("sem");
  var batchSel = document.getElementById("batch");
  for (var x in branchObject) {
    branchSel.options[branchSel.options.length] = new Option(x, x);
  }
  branchSel.onchange = function() {
    //empty Chapters- and Topics- dropdowns
    semSel.length = 1;
    batchSel.length = 1;
    //display correct values
    for (var y in branchObject[this.value]) {
      semSel.options[semSel.options.length] = new Option(y, y);
    }
  }
  semSel.onchange = function() {
    //empty Chapters dropdown
    batchSel.length = 1;
    //display correct values
    var z = branchObject[branchSel.value][this.value];
    for (var i = 0; i < z.length; i++) {
      batchSel.options[batchSel.options.length] = new Option(z[i], z[i]);
    }
  }
}
function facultytype()
{
    var status=document.getElementById("faculty_type").value;
            if(status=="HOD")
            {
                document.getElementById("batchdiv").style.display="none";
                document.getElementById("semdiv").style.display="none";
            }
            else if(status=="SCH")
            {   
                document.getElementById("batchdiv").style.display="none";
                document.getElementById("semdiv").style.display="none";
            }
            else
            {
                document.getElementById("batchdiv").style.display="block";
                document.getElementById("semdiv").style.display="block";
            }
    
}

</script>
</body>
</html>
