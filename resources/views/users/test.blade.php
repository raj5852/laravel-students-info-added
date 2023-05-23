<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="col-md-6">
        <div class="mb-3">
            <label for="">Designation</label>
            <select name="designation" class="form-control" id="">
                <option value="">Select Designation</option>
                <option value="Registration Directorate">Registration Directorate</option>
                <option value="District Registrar">District Registrar</option>
                <option value="Sub Registrar">Sub Registrar</option>
                <option value="Attach to Registration Dir">Attach to Registration Dir</option>
            </select>
        </div>

        <div id="Registration_Directorate" class="mb-3" style="display: none">
            <label for="">Last name</label>
            <select name="designation" class="form-control" id="">
                <option value="">Select Last name</option>
                <option value="IGR">IGR</option>
                <option value="AIGR">AIGR</option>
                <option value="DIGR">DIGR</option>
                <option value="IRO">IRO</option>
                <option value="Office stuff">Office stuff</option>
            </select>
        </div>
    </div>


</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $("select[name='designation']").change(function() {
            var selectedValue = $(this).val();
            $("#Registration_Directorate").css("display", "none");

            if (selectedValue == 'Registration Directorate') {
                $("#Registration_Directorate").css("display", "block");

            }
        });
    });
</script>

</html>
