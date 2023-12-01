
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Extratik Hospital</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

</head>

<body>

<div class="page-wrapper">
    <div class="page-content">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h1 class="page-title dripicons-bold card-title" style="text-align: center">Patients</h1>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="table-light">
                            <tr>
                                <th class="border-top-0">Name</th>
                                <th class="border-top-0">Id Card</th>
                                <th class="border-top-0">Condition</th>
                                <th class="border-top-0">Detail</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($patients as $patient)
                                <tr>
                                    <td>{{ $patient['Name'] ?? '' }} {{ $patient['Surname'] ?? '' }}</td>
                                    <td>{{ $patient['IdCard'] ?? '' }}</td>
                                    <td>
                                        @foreach($patient['Medical']['Conditions'] as $contiditon)
                                            {{ $contiditon['Name'] }}
                                        @endforeach

                                    </td>
                                    <td>
                                        <button class="btn btn-success" onclick="showDetail({{ json_encode($patient) }})">Details</button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-lg show" id="showModal" role="dialog" aria-labelledby="myLargeModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel" style="text-align: center">Patient Detail</h4>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body invoice-head">
                        <div class="row">
                            <div class="col-md-6 align-self-center">
                                <h4 id="patientName"></h4>
                                <p class="mt-2 mb-0 text-muted">IdCard : <span id="idCard"></span> </p>
                            </div>
                            <div class="col-md-3">
                                <p class="mt-2 text-lg-start">Phone</p>
                                <p class="text-muted mb-0">Phone 1 : <span id="contactNumber1"></span></p>
                                <p class="text-muted mb-0">Phone 2 : <span id="contactNumber2"></span></p>
                            </div>
                            <div class="col-md-3">
                                <p class="mt-2 text-lg-start">Address</p>
                                <p class="text-muted mb-0" id="address"></p>
                                <p class="text-muted mb-0"> PK:<span id="postcode"></span></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="card-header">
                                <strong class="font-14">Conditions</strong><br>
                            </div>
                            <div class="card-body table-responsive project-invoice">
                                <table class="table table-bordered mb-0">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>Name</th>
                                        <th>Not</th>
                                    </tr>
                                    </thead>
                                    <tbody id="conditionBody">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card-header">
                                <strong class="font-14">Alergies</strong><br>
                            </div>
                            <div class="card-body table-responsive project-invoice">
                                <table class="table table-bordered mb-0">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>Name</th>
                                        <th>Not</th>
                                    </tr>
                                    </thead>
                                    <tbody id="alergyBody"></tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card-header">
                                <strong class="font-14">Medication</strong><br>
                            </div>
                            <div class="card-body table-responsive project-invoice">
                                <table class="table table-bordered mb-0">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>Medication</th>
                                        <th>Not</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                    </tr>
                                    </thead>
                                    <tbody id="medicationBody">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card-header">
                                <strong class="font-14">Next Of Kin</strong><br>
                            </div>
                            <div class="card-body">
                                <div class="row" id="nextOfKinDiv">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</body>
<script type="text/javascript" src='https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.3.min.js'></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script>
    function showDetail(patient) {
        console.info(patient);
        $("#patientName").html(patient.Name + ' ' + patient.Surname);
        $("#idCard").html(patient.IdCard + '<br>' + patient.Gender + '<br>' + patient.DateOfBirth);
        $("#contactNumber1").html(patient.ContactNumber1);
        $("#contactNumber2").html(patient.ContactNumber2);
        $("#address").html(patient.Address);
        $("#postcode").html(patient.Postcode);


        var medication = '';
        patient.Medical.Medication.forEach(function (med) {
            medication += '<tr><td>'+med.Name+'</td><td>'+med.Notes+'</td><td>'+med.StartDate+'</td><td>';
            if (med.EndDate != null)
                medication += med.EndDate;
            medication += '</td></tr>';
        });
        $("#medicationBody").html(medication);
        var alergy = '';
        patient.Medical.Alergies.forEach(function (e) {
            alergy += '<tr><td>'+e.Name+'</td><td>'+e.Notes+'</td></tr>';
        });
        $("#alergyBody").html(alergy);
        var cond = '';
        patient.Medical.Conditions.forEach(function (e) {
            cond += '<tr><td>'+e.Name+'</td><td>'+e.Notes+'</td></tr>';
        });
        $("#conditionBody").html(cond);
        var nextOfKin = '';
        patient.NextOfKin.forEach(function (kin) {
            nextOfKin += '<div class="col-md-3"><div class="table-responsive project-invoice"><table class="table table-bordered mb-0">'+
                '<thead class="thead-light"><tr><th colspan="2">' + kin.Name + ' ' +kin.Surname + '</th></tr></thead><tbody>' +
                '<tr><td>Phone 1 </td><td>' + kin.ContactNumber1 + '</td></tr><tr>'+
                '<tr><td>Phone 2 </td><td>' + kin.ContactNumber2 + '</td></tr><tr>'+
                '</tr></tbody></table></div></div>';
        });
        $("#nextOfKinDiv").html(nextOfKin);
        $("#showModal").modal("show");
    }
</script>
</html>
