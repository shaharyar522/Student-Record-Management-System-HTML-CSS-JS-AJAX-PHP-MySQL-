
<?php include('incs/connection.php');
//uay hamray pass user loggin karay ga tab uay show hnga 
 session_start();
 if(!isset($_SESSION['loggedin'])  || $_SESSION['loggedin']!=true){
     header("location:/taskone/login.php");
     exit;
 }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/left_form.css">
    <title>Task</title>
    <!-- this is the jquery links -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- uay hamray pass table data hian  ka code  hian -->
    <link rel="stylesheet" href="//cdn.datatables.net/2.2.1/css/dataTables.dataTables.min.css">
    <!-- our last maina code hian our us ko id ko hum nay table main dalle hnve hina  -->
</head>
<body>
    <?php include("incs/navbar.php") ?>
    <?php include("incs/main_form.php") ?>

    <script>
        // this is insertion code dfg  
        function add_student() {
            var sno = $('#list_students_tbody').find('.sno:last').html() || 0;
            sno = parseInt(sno) + 1;
            // var sno = $('#list_students_tbody').find('.sno:last').html() || 0;     
            var student_name = $('input[name="st_name"]').val();
            var student_fathername = $('input[name="st_fathername"]').val();
            var student_contact = $('input[name="st_contact"]').val();
            var student_email = $('input[name="st_email"]').val();
            var student_cnic = $('input[name="st_cnic"]').val();
            var update_student = $('input[name="update_student"]').val();
            //start ajex code 
            //ek our code hian jo hum use kar saktina hian form main id hum ny student_form di hain or agar opar vala code na lehkain tu 
            // tu hum es tahran lehk sktian jo ky sarya data ko ohta sakta hian 
            // var data = $(#student_form).serialize();   uay wala code hum type kar sktian hian 
            $.ajax({
                url: 'process.php',
                type: 'POST',
                data: 'st_name=' + student_name + '&st_fathername=' + student_fathername + '&st_contact=' + student_contact + '&st_email=' + student_email + '&st_cnic=' + student_cnic + '&update_student=' + update_student + '&students=insert',
                success: function(response) {
                    try {
                        const output = JSON.parse(response);
                        if (update_student > 0) {
                            sno =   $('#list_students_tbody').find('tr#student' + output.student_id).find('.sno').html();
                           
                        }
                        var new_students_row = '<tr id="student' + output.student_id + '"><td class="sno">' + sno + '</td><td>' + student_name + '</td><td>' + student_fathername + '</td><td>' + student_contact + '</td><td>' + student_email + '</td><td>' + student_cnic + '</td><td><a href="javascript:;" id="edit_button" onclick="fetch_student(\'' + output.student_id + '\')">Edit</a>| <a ref="javascript:;"  id="delete_button" onclick="delete_student(\'' + output.student_id + '\')">Delete</a></td></tr>';
                        if (update_student > 0) {
                            sno = parseInt(sno) - 1;
                            $('#list_students_tbody').find('tr#student' + output.student_id).replaceWith(new_students_row);
                        } else {
                            $('#list_students_tbody').append(new_students_row);
                        }
                     $('#reset').trigger('click');
                    } catch (e) {
                        console.log("Error parsing JSON:", e);
                        $("#response").html("Invalid JSON response");
                        alert(response);

                    }
                },
                error: function() {
                    alert('Error!');
                }
            });
        }
        // now this is deleted code 
        function delete_student(st_id) {
            if (confirm('Are you shure to delete!') == false) return false;
            //es ka matlab hian kay canceal halaat mainuay necay jain ga hi nhi
            $.ajax({
                url: 'process.php',
                type: 'POST',
                data: 'st_id=' + st_id + '&students=delete',
                success: function(response) {
                    if (response == 'deleted') {
                        $('#student' + st_id).hide();
                    } else {
                        alert('error!');
                    }
                },
                error: function() {
                    alert('Error!');
                }
            });
        }
        // uay harmay pass edit code code hian jis maina js and ajex hiabn 
        function fetch_student(st_id) {

            $.ajax({
                url: 'process.php',
                type: 'POST',
                data: 'st_id=' + st_id + '&students=fetch',
                success: function(response) {
                    const res = JSON.parse(response);
                    $('input[name="st_name"]').val(res.st_name);
                    $('input[name="st_fathername"]').val(res.st_fathername);
                    $('input[name="st_contact"]').val(res.st_contact);
                    $('input[name="st_email"]').val(res.st_email);
                    $('input[name="st_cnic"]').val(res.st_cnic);
                    $('input[name="update_student"]').val(res.st_id);
                },
                error: function() {
                    alert('Error!');
                }
            });
        }
    </script>
    <script src="js/form.js"></script>
    <!-- tabl data hian -->
    <!-- <script src="//cdn.datatables.net/2.2.1/js/dataTables.min.js"></script>
  uay rahian ek  id ko hum alag seprate main paste karian hian mtlab alag script main -->
 <script src="//cdn.datatables.net/2.2.1/js/dataTables.min.js"></script>
    <script>
        let table = new DataTable('#myTable');
    </script> 
</body>

</html>