<?php include 'connection.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">


<title>Task Details - Bootdey.com</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style type="text/css">
        body{
            background-color: #f6f6f6;
            margin-top:20px;
        }

        .card {
            background-color: #fff;
            border-radius: 10px;
            border: none;
            position: relative;
            margin-bottom: 30px;
            box-shadow: 0 0.46875rem 2.1875rem rgba(90,97,105,0.1), 0 0.9375rem 1.40625rem rgba(90,97,105,0.1), 0 0.25rem 0.53125rem rgba(90,97,105,0.12), 0 0.125rem 0.1875rem rgba(90,97,105,0.1);
        }

        .card .card-header {
            border-bottom-color: #f9f9f9;
            line-height: 30px;
            -ms-grid-row-align: center;
            align-self: center;
            width: 100%;
            padding: 10px 25px;
            display: flex;
            align-items: center;
        }

        .card .card-header, .card .card-body, .card .card-footer {
            background-color: transparent;
            padding: 20px 25px;
        }
        .card-header:first-child {
            border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;
        }
        .card-header {
            padding: .75rem 1.25rem;
            margin-bottom: 0;
            background-color: rgba(0,0,0,.03);
            border-bottom: 1px solid rgba(0,0,0,.125);
        }

        .table:not(.table-sm) thead th {
            border-bottom: none;
            background-color: #e9e9eb;
            color: #666;
            padding-top: 15px;
            padding-bottom: 15px;
        }

        .table .table-img img {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            border: 2px solid #bbbbbb;
            -webkit-box-shadow: 5px 6px 15px 0px rgba(49,47,49,0.5);
            -moz-box-shadow: 5px 6px 15px 0px rgba(49,47,49,0.5);
            -ms-box-shadow: 5px 6px 15px 0px rgba(49,47,49,0.5);
            box-shadow: 5px 6px 15px 0px rgba(49,47,49,0.5);
            text-shadow: 0 0 black;
        }

        .table .team-member-sm {
            width: 32px;
            -webkit-transition: all 0.25s ease;
            -o-transition: all 0.25s ease;
            -moz-transition: all 0.25s ease;
            transition: all 0.25s ease;
        }
        .table .team-member {
            position: relative;
            width: 30px;
            white-space: nowrap;
            border-radius: 1000px;
            vertical-align: bottom;
            display: inline-block;
        }

        .table .order-list li img {
            border: 2px solid #ffffff;
            box-shadow: 4px 3px 6px 0 rgba(0,0,0,0.2);
        }
        .table .team-member img {
            width: 100%;
            max-width: 100%;
            height: auto;
            border: 0;
            border-radius: 1000px;
        }
        .rounded-circle {
            border-radius: 50% !important;
        }

        .table .order-list li+li {
            margin-left: -14px;
            background: transparent;
        }
        .avatar.avatar-sm {
            font-size: 12px;
            height: 30px;
            width: 30px;
        }
        .avatar {
            background: #6777ef;
            border-radius: 50%;
            color: #e3eaef;
            display: inline-block;
            font-size: 16px;
            font-weight: 300;
            margin: 0;
            position: relative;
            vertical-align: middle;
            line-height: 1.28;
            height: 45px;
            width: 45px;
        }

        .table .order-list li .badge {
            background: rgba(228,222,222,0.8);
            color: #6b6f82;
            margin-bottom: 6px;
        }

        .badge {
            vertical-align: middle;
            padding: 7px 12px;
            font-weight: 600;
            letter-spacing: 0.3px;
            border-radius: 30px;
            font-size: 12px;
        }

        .progress-bar {
            display: -ms-flexbox;
            display: -webkit-box;
            display: flex;
            -ms-flex-direction: column;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            flex-direction: column;
            -ms-flex-pack: center;
            -webkit-box-pack: center;
            justify-content: center;
            overflow: hidden;
            color: #fff;
            text-align: center;
            white-space: nowrap;
            background-color: #007bff;
            -webkit-transition: width .6s ease;
            transition: width .6s ease;
        }

        .bg-success {
            background-color: #54ca68 !important;
        }

        .bg-purple {
            background-color: #9c27b0 !important;
            color: #fff;
        }

        .bg-cyan {
            background-color: #10cfbd !important;
            color: #fff;
        }

        .bg-red {
            background-color: #f44336 !important;
            color: #fff;
        }

        .progress {
            -webkit-box-shadow: 0 0.4rem 0.6rem rgba(0,0,0,0.15);
            box-shadow: 0 0.4rem 0.6rem rgba(0,0,0,0.15);
        }

        .btn-action {
            color: #fff !important;
            line-height: 25px;
            font-size: 12px;
            min-width: 35px;
            min-height: 35px;
        }
        .error-label {
            display: block;
            color: red;
            margin-bottom: 10px;
        }

    </style>
</head>
<body>
<?php
    $conn->query("DELETE FROM notes WHERE `remember_date` < CURDATE()");
?>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
    <div class="container">
        <div class="col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                <h4>Task Details</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                        <tbody>
                            <tr>
                                <th class="text-center">
                                    <!-- 
                                    <div class="custom-checkbox custom-checkbox-table custom-control">
                                        <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                        <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                    </div> 
                                    -->
                                </th>

                                <th>Task Name</th>
                                <th>Creation Date</th>
                                <th>Deadline</th>
                                <th>Action</th>

                            </tr>
                                <!-- TASK MODULES -->
                                <?php 
                                $result = $conn->query("SELECT `id`,`title`, `description`,`remember_date`,`creation_date` FROM `notes`");
                               
                                if ($result->num_rows > 0) {
                                
                                  while($row = $result->fetch_assoc()) {
                                    echo '<tr>';
                                    echo '<td class="p-0 text-center"style="position:relative;top:5px">';
                                    echo '<a class="btn btn-success btn-action mr-1" data-toggle="tooltip" title data-original-title="Done">';
                                    echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">';
                                    echo '<path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>';
                                    echo '</svg>';
                                    echo '</a>';
                                    echo '</td>';
                                    echo '<td>' . $row["title"] . '</td>';
                                    echo '<td class="align-middle">';
                                    echo '<a>' . $row["creation_date"] . '</a>';
                                    echo '</td>';
                                    echo '<td>' . $row["remember_date"] . '</td>';
                                    echo '<td>';
                                    echo '<a class="btn btn-primary btn-action mr-1 change" type="button" data-toggle="modal" data-notes-id=' . $row["id"] . ' data-target="#change"><i class="fas fa-pencil-alt"></i></a>';
                                    echo '<a class="btn btn-danger btn-action" data-toggle="delete" data-notes-id=' . $row["id"] . '><i class="fas fa-trash"></i></a>';
                                    echo '</td>';
                                    echo '</tr>';
                                  }
                                
                                
                                } else {
                                  echo "No notes found for current user and type.";
                                }
                                ?>

                            </tr>
                        </tbody></table>
                    </div>

                    <!-- ADD TASK -->
                    <div style="display: flex;justify-content: right;">
                        <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary">Add Task</button>
                    </div>

                </div>
            </div>
        </div>
        


    <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Task</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="cancel" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="task_creation">
                    <div class="modal-body">
                            <!-- TITLE -->
                            <div class="form-group">
                                <label for="title-name" class="col-form-label">Title<strong>*</strong></label>
                                <input type="text" data-min-length="15" class="form-control" id="title-name" name="title">
                            </div>
                            <!-- DESCRIPTION -->
                            <div class="form-group">
                                <label for="description-text" class="col-form-label">Description(Optional)</label>
                                <textarea class="form-control" id="description-text" name="description"></textarea>
                            </div>
                            <!-- DATETIME PICKER -->
                            <div class="form-group">
                                <label for="remember_date" class="col-form-label">Time:<strong>*</strong></label><br>
                                <input type="datetime-local" class="col-md-3" data-required="true" id="remember_date" name="remember_date"><br>
                            </div>
                            
                    </div>
                    <!-- Submit and Cancel buttons -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary cancel" data-dismiss="modal">Cancel</button>
                        <input type="submit" class="btn btn-primary" value="Save">
                    </div>

                </form>
            </div>
        </div>
    </div>
    </div>
    <script src="js/validation.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript"></script>

    <script>

         $(function () {
           $('[data-toggle="delete"]').each(function() {
                console.log('Task');
                var notesId = $(this).data('notes-id');

                (this).setAttribute("id", notesId); 
            });
            // On .cancel class click
            $(".cancel").click(function(event){
                history.pushState(null, null, "index.php");
            });
            // On .btn-danger class click
            $(".btn-danger").click(function(event){
                var isAdmin = confirm("Are you sure?");
                if (isAdmin){
                    window.location.href = "delete.php?note_id=" + note;
                }
                else{
                    event.stopPropagation();
                }
           });
         });
            $(".change").click(function(event){
                note = $(this).data('notes-id');
                console.log(note);
                
                history.pushState(null, null, "index.php?change_id=" + note);
            });
      </script>
        <?php
        $change_id = $_GET['change_id'];

        $result = $conn->query("SELECT `title`, `description`, `remember_date` FROM `notes` WHERE `id` = '$change_id'");
        $result_t = $result->fetch_assoc();

                echo '
                <div class="modal fade bd-example-modal-lg" id="change" tabindex="-1" role="dialog" aria-labelledby="changeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="changeModalLabel">Your Task</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span class="cancel" aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form id="task_editing">
                                <div class="modal-body">
                                        <!-- TITLE -->
                                        <div class="form-group">
                                            <label for="title-name" class="col-form-label">Title<strong>*</strong></label>
                                            <input type="text" data-min-length="15" class="form-control title" id="title-name" name="title" value="' . $result_t["title"] . '">
                                        </div>
                                        <!-- DESCRIPTION -->
                                        <div class="form-group">
                                            <label for="description-text" class="col-form-label">Description(Optional)</label>
                                            <textarea class="form-control description" id="description-text" name="description" value="' . $result_t["description"] . '"></textarea>
                                        </div>
                                        <!-- DATETIME PICKER -->
                                        <div class="form-group">
                                            <label for="time" class="col-form-label">Time:<strong>*</strong></label><br>
                                            <input type="datetime-local" class="col-md-3 datetime" data-required="true" id="time" name="time" value="' . $result_t["remember_date"] . '"><br>
                                        </div>
                                        
                                </div>
                                
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary cancel" data-dismiss="modal">Cancel</button>
                                    <input type="submit" class="btn btn-primary" value="Save">
                                </div>
            
                            </form>
                        </div>
                    </div>
                </div>
                ';
        ?>
</body>
</html>