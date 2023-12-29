<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #2F4F4F;
            color: white;
            padding-top: 50px;
        }

        .container {
            background-color: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .approval-section {
            margin-top: 20px;
        }

        .btn-approve, .btn-reject {
            width: 100px;
        }
    </style>
</head>
<body>

 <div class="container">
    <h2 class="text-center">Admin Profile</h2>

    <!-- Pending Vet Registrations -->
    <div class="approval-section">
        <h3>Pending Vet Registrations</h3>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'connect.php';

                // Replace the following with actual database queries to fetch pending vet registrations
                $q = "SELECT * FROM temp_vet";
                $result = mysqli_query($con, $q);

                while ($vet = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    echo '<td>' . $vet['v_id'] . '</td>';
                    echo '<td>' . $vet['f_name'] . '</td>';
                    echo '<td>' . $vet['l_name'] . '</td>';
                    echo '<td>
<a href="approve_vet.php?v_id=' . urlencode($vet['v_id']) . '" class="btn btn-danger btn-reject">Approve</a>
<a href="reject_vet.php?v_id=' . urlencode($vet['v_id']) . '" class="btn btn-danger btn-reject">Reject</a>
</td>';

                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>