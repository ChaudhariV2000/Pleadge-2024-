<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pledge</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="pledgelogo.png">
    <!-- FontAwesome JS-->
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,300italic,400italic' rel='stylesheet'
        type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

    <!-- Global CSS -->
    <link href="css/myvals.min.css" rel="stylesheet">
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="assets/plugins/prism/prism.css">
    <style>
        .parallax {
            /* The image used */
            background-image: url("pexels-pixabay-45842.jpg");

            /* Set a specific height */
            min-height: 500px;

            /* Create the parallax scrolling effect */
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <!--REGISTER MODAL-->
</head>

<body>
    <?php
    include_once("connect.php");
    $sql = "SELECT * FROM org_login";
    $resultset = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));

    ?>
    <div class="container"><br><br><br>
        <h2>Organizations </h2><br><br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Location</th>
                    <th>Description</th>
                    <th>Phone no</th>
                    <th>Website</th>
                </tr>
            </thead>

            <tbody>
                <?php
                if ($resultset->num_rows > 0) {
                    while ($row = $resultset->fetch_assoc()) { ?>

                        <tr>
                            <td>
                                <?php echo $row['Id'];

                                ?>
                            </td>
                            <td>
                                <?php echo $row['Name']; ?>
                            </td>

                            <td>
                                <?php echo $row['Location']; ?>
                            </td>

                            <td>
                                <?php echo $row['Description']; ?>
                            </td>

                            <td>
                                <?php echo $row['Phone_no']; ?>
                            </td>
                            <td>
                                <?php echo $row['Website']; ?>
                            </td>

                            <td>
                                <a class="btn btn-danger" href="AdminOrgDel.php?id=<?php echo $row['Id']; ?>">Delete</a>
                            </td>

                        </tr>


                    <?php }

                }

                ?>

            </tbody>

        </table>
        <?php
        include_once("connect.php");
        $sql = "SELECT `Id`,`Event_name`,`Event_location`,`Event_date`,`Event_organizer_id`,`Event_description` FROM `org_event_post`";
        $resultset = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));

        ?>
        <h2>Events </h2><br><br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Location</th>
                    <th>Date</th>
                    <th>Organizer</th>
                    <th>Description</th>
                </tr>
            </thead>

            <tbody>
                <?php
                if ($resultset->num_rows > 0) {
                    while ($row = $resultset->fetch_assoc()) { ?>
                        <form action="Adminopt.php">
                            <tr>
                                <td>
                                    <?php echo $row['Id']; ?>
                                </td>
                                <td>
                                    <?php echo $row['Event_name']; ?>
                                </td>

                                <td>
                                    <?php echo $row['Event_location']; ?>
                                </td>

                                <td>
                                    <?php echo $row['Event_date']; ?>
                                </td>

                                <td>
                                    <?php echo $row['Event_organizer_id']; ?>
                                </td>
                                <td>
                                    <?php echo $row['Event_description']; ?>
                                </td>

                                <td>
                                    <a class="btn  btn-warning " href="AdminEventUp.php?id=<?php echo $row['Id']; ?>">Edit</a>
                                    <a href="AdminEventDel.php?id=<?php echo $row['Id']; ?>" class="btn btn-danger">Delete</a>
                                </td>

                            </tr>
                        </form>

                    <?php }

                }

                ?>

            </tbody>

        </table>

    </div>
</body>

</html>