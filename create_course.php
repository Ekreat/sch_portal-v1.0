<?php include "includes/header.php"; ?>
<?php include "includes/navbar.php"; ?>
<?php include "includes/sidebar.php"; ?>

<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title mb-0">Course Table <?= $term_syntax; ?>[<?= $log_session; ?>]</p>
                    <?php if($created_course_count > 0){ ?>
                    <div class="table-responsive">
                        <table id="myTable" class="table table-striped table-borderless">
                            <thead>
                                <tr>
                                    <th>Course</th>
                                    <th>Code</th>
                                    <th>Questions</th>
                                    <th>Duration[Exam|Test|Ass.]</th>
                                    <th>Mark[Exam|Test|Ass.]</th>
                                    <th>Session</th>
                                    <th colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while($row = $callCourses->fetch_object()):?>
                                <tr>
                                    <td><?= $row->course; ?></td>
                                    <td class="font-weight-bold"><?= $row->course_code; ?></td>
                                    <td><?= $row->no_of_quest; ?></td>
                                    <td>Exam:<?= $row->exam_duration; ?> | Test:<?= $row->test_duration; ?> |
                                        Ass:<?= $row->ass_duration; ?>
                                    </td>
                                    <td>Exam:<?= $row->exam_unit; ?> | Test:<?= $row->test_unit; ?> |
                                        Ass:<?= $row->ass_unit; ?></td>
                                    <td><?= $row->session; ?></td>
                                    <td>
                                        <i class="mdi mdi-pen text-primary" style="font-size:25px;"></i>
                                    </td>
                                    <td>
                                        <i class="mdi mdi-delete text-danger" style="font-size:25px;"></i>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                    <?php }else{ ?>
                    <div class="alert alert-danger mt-5">This table is empty!</div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card position-relative">
                <div class="card-body">
                    <h4 class="card-title">Create Course</h4>
                    <form action="<?= $add_course;?>" class="forms-sample" method="POST" onsubmit="return addCourse()">
                        <div class="row mt-3 mb-3">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Course[Subject] title</label>
                                    <input type="text" class="form-control" id="course" name="course"
                                        placeholder="Enter course title">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Course code</label> <span class="cCA text-danger"
                                        style="display:none;"><small>No space; no symbol; 6 characters e.g MAT101
                                        </small></span>
                                    <input type="text" class="form-control" id="course_code" name="course_code"
                                        placeholder="Enter course code">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Department</label>
                                    <select name="department" id="department" class="form-control">
                                        <option value="">Choose department</option>
                                        <option value="general">General</option>
                                        <option value="Art">Art</option>
                                        <option value="Science">Science</option>
                                        <option value="Commercial">Commercial</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">How many question will you upload?</label>
                                    <select name="no_of_quest" id="no_of_quest" class="form-control">
                                        <option value="">Make your choice</option>
                                        <option value="5">5</option>
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="30">30</option>
                                        <option value="40">40</option>
                                        <option value="50">50</option>
                                        <option value="60">60</option>
                                        <option value="70">70</option>
                                        <option value="80">80</option>
                                        <option value="90">90</option>
                                        <option value="100">100</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mark/question[Exam]</label>
                                    <input type="text" class="form-control" id="exam_unit" name="exam_unit"
                                        placeholder="Enter exam mark/question">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mark/question[Test]</label>
                                    <input type="text" class="form-control" id="test_unit" name="test_unit"
                                        placeholder="Enter test mark/question">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mark/question[Assignment]</label>
                                    <input type="text" class="form-control" id="ass_unit" name="ass_unit"
                                        placeholder="Enter assignment mark/question">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Exam duration in minutes</label>
                                    <input type="text" class="form-control" id="exam_duration" name="exam_duration"
                                        placeholder="Enter exam duration">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Test duration in minutes</label>
                                    <input type="text" class="form-control" id="test_duration" name="test_duration"
                                        placeholder="Enter test duration">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Assignment duration in minutes</label>
                                    <input type="text" class="form-control" id="ass_duration" name="ass_duration"
                                        placeholder="Enter assignment duration">
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mr-2" name="pushCourse">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 stretch-card grid-margin">
            <div class="card">
                <div class="card-body">
                    <p class="card-title mb-0">Upload Questions</p>
                    <div class="mt-2">
                        <div class="container">
                            <p>Click the green button to download the question format as an Excel CSV file.</p>
                            <a href="functions/export.php?table=<?= $question_tbl_a; ?>&token=<?= $token; ?>"
                                class="btn btn-success"><i class="mdi mdi-download"></i>Excel Format</a>
                        </div>
                        <hr>
                        <div class="container mt-3">
                            <form action="exam/functions/uploader.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="">Question Category</label>
                                            <input type="file" name="file" class="form-control btn btn-dark" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Question Category</label>
                                            <select name="quest_type" id="quest_type" class="form-control" required>
                                                <option value="">Choose question type</option>
                                                <option value="Exam">Exam</option>
                                                <option value="Test">Test</option>
                                                <option value="Ass">Assignment</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Course code</label>
                                            <select name="course_code" id="course_code" class="form-control" required>
                                                <option value="">Course code</option>
                                                <?php while($sel = $selCourses->fetch_object()):?>
                                                <option value="<?= $sel->course_code; ?>">
                                                    <?= $sel->course_code; ?> [<?= $sel->course; ?>]
                                                </option>
                                                <?php endwhile; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <button type="submit" name="push_exam" class="btn btn-primary"><i
                                                class="mdi mdi-upload"></i> Upload</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 stretch-card grid-margin">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title">Uploaded Courses</p>
                            <div class="table-responsive">
                                <table id="myTable" class="table table-striped table-borderless">
                                    <thead>
                                        <tr>
                                            <th>Course</th>
                                            <th>Type</th>
                                            <th>No. of Q</th>
                                            <th>Department</th>
                                            <th colspan="2">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $coursesT=$conn->query("SELECT * FROM $course_tbl WHERE term='$log_term' AND session='$log_session'");
                                                while($row = $coursesT->fetch_object()):
                                                    $cCode = $row->course_code;
                                                $selectUpload = $conn->query("SELECT * FROM $question_tbl_a WHERE course_code='$cCode' AND session='$log_session' LIMIT 1");
                                        ?>
                                        <tr>
                                            <?php while($sel = $selectUpload->fetch_object()){ ?>
                                            <td><?= $row->course; ?>[<?= $sel->course_code; ?>]</td>
                                            <td><?= $sel->quest_type; ?></td>
                                            <td><?= $row->no_of_quest; ?></td>
                                            <td><?= $row->department; ?></td>
                                            <td></td>

                                        </tr>
                                        <?php } ?>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">Advanced Table</p>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="example" class="display expandable-table" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Quote#</th>
                                            <th>Product</th>
                                            <th>Business type</th>
                                            <th>Policy holder</th>
                                            <th>Premium</th>
                                            <th>Status</th>
                                            <th>Updated at</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
<!-- content-wrapper ends -->

<?php include "includes/footer.php"; ?>