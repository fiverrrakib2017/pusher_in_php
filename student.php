<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>All Student List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h4>Student List</h4>
                    </div>
                    <div class="card-body">
                       <table class="table"  id="studentTable">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Password</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Rows for student data will go here -->
                        </tbody>
                       </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">
        /* Load existing student data from the server upon page load*/
        $.ajax({
            url: 'get_students.php', 
            method: 'GET',
            success: function(response){
                var students = JSON.parse(response);
                students.forEach(function(student){
                    $('#studentTable tbody').append('<tr><td>' + student.name + '</td><td>' + student.email + '</td><td>' + student.password + '</td></tr>');
                });
            }
        });
    Pusher.logToConsole = true;

    var pusher = new Pusher('a1db0e59c650abfd58b8', {
    cluster: 'mt1'
    });

    var channel = pusher.subscribe('snugly-canopy-602');
    channel.bind('add_student', function(data) {
        var student_name=data['message']['student_name'];
        var student_email=data['message']['student_email'];
        var student_password=data['message']['student_password'];
        $('#studentTable tbody').append('<tr><td>' + student_name + '</td><td>' + student_email + '</td><td>' + student_password + '</td></tr>');
    });
    </script>
  </body>
</html>
