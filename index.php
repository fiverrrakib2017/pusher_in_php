<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create New Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h4>Registration Student</h4>
                        <?php
                        if (isset($_GET['success'])) {
                            echo '<script>alert("Successfully")</script>';
                        }
                        ?>
                    </div>
                    <div class="card-body">
                        <form action="process.php" method="POST">
                            <div class="form-group mb-3">
                                <label for="">Student Name</label>
                                <input type="text" class="form-control" placeholder="Enter Student Name" name="student_name">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Student Email</label>
                                <input type="email" class="form-control" placeholder="Enter Student Email" name="student_email">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Student Password</label>
                                <input type="password" class="form-control" placeholder="Enter Student Password" name="student_password">
                            </div>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  </body>
</html>