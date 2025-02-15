<!-- section one  -->
<div id="section-one">
    <!-- one div -->
    <div id="left-side">
        <div class="student-table-container">
            <h2>STUDENT FORM</h2>
            <?php
            $error = "";
            if ($error) {
                echo '<P>' . $error . '</p>';
            }
            // uay main ny es leuy lehka hina takay mian form kay andar bar bar value ko fill na karun 
            ?>
            <form id="student_form" action="javascript:;" method="POST" onsubmit="add_student()">
                <label for="name">Name</label>
                <?php if (!isset($st_name)) $st_name = ""; ?>
                <input type="text" value="<?php echo $st_name ?>" id="name" name="st_name" pattern="[A-Za-z\s]+" title="Only letters (A-Z, a-z) are allowed" placeholder="Enter Your Name">

                <label for="father_name">Father's Name</label>
                <?php if (!isset($st_fathername)) $st_fathername = ""; ?>
                <input type="text" value="<?php echo $st_fathername ?>" id="father_name" name="st_fathername" pattern="[A-Za-z\s]+" title="Only letters (A-Z, a-z) are allowed" placeholder=" Enter Your Father Name" required>

                <label for="contact">Contact</label>
                <?php if (!isset($st_contact)) $st_contact = ""; ?>
                <input type="text" value="<?php echo $st_contact ?>" id="contact" name="st_contact" pattern="92-\d{3}-\d{7}" title="Format: 92-300-1234567" placeholder="92-34**-*******" required oninput="formatPhoneNumber(this)">

                <label for="email">Email</label>
                <?php if (!isset($st_email)) $st_email = ""; ?>
                <input type="email" value="<?php echo $st_email ?>" id="email" name="st_email" placeholder="Abc@gmail.com" required>

                <label for="cnic">CNIC</label>
                <?php if (!isset($st_cnic)) $st_cnic = ""; ?>
                <input type="text" value="<?php echo $st_cnic ?>" id="cnic" name="st_cnic" placeholder="XXXXX-XXXXXXX-X" required maxlength="15" oninput="formatCNIC(this)" />
                <!-- Hidden input for student ID (for edit purposes) -->
                <input type="hidden" name="st_id" id="st_id" value="">
                <div>
                    <button type="submit">Submit</button>
                    <input type="hidden" name="students" value="insert">
                    <!-- ab hum uya code update ka leuy lehkain guy -->
                    <input type="hidden" name="update_student" value="0">
                    <button type="reset" id="reset">Reset</button>
                </div>
            </form>
        </div>
    </div>
    <!-- second div -->
  
    <div id="center-area">
        <table class="student-table" id="myTable">
            <h2 id="left-side">STUDENTS RECORDS</h2>
    </div>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Fathe Name</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>CNIC</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="list_students_tbody">
                <?php
                // Query to select all students
                $select_query = "SELECT * FROM students";
                $students_query = $conn->query($select_query);
                // Initialize the list_students array
                $list_students = array();
                // Check if query executed successfully
                if ($students_query) {
                    while ($res = $students_query->fetch_object()) {
                        $list_students[] = $res;

                        // Check if a student ID is being edited
                        if (isset($_GET['st_id']) && $_GET['st_id'] != "" && $_GET['st_id'] == $res->st_id) {
                            $edit_id = $res->st_id;

                            // Dynamically create variables for the selected student
                            foreach ($res as $key => $value) {
                                $$key = $value; // Create variables like $st_name, $st_fathername, etc.
                            }
                        }
                    }
                } else {
                    echo "Error: " . $conn->error; // Debugging for query failure
                }
                // this is the edit button 
                $s = 0;
                foreach ($list_students as $y):
                    $s++;
                ?>
                    <tr id="student<?php echo  $y->st_id; ?>">
                        <!-- main ny ek class di hain seriral number ko  -->
                        <td class="sno"><?= $s; ?></td>
                        <td><?= $y->st_name; ?></td>
                        <td><?= $y->st_fathername; ?></td>
                        <td><?= $y->st_contact; ?></td>
                        <td><?= $y->st_email; ?></td>
                        <td><?= $y->st_cnic; ?></td>
                        <td>
                            <!-- uay hamray pass edit ka button-->
                            <a href="javascript:;" onclick="fetch_student('<?php echo $y->st_id; ?>')"><button id="edit_button">Edit</button></a>

                            <!--  delete ka button hian -->
                            <a ref="javascript:;" onclick="delete_student('<?php echo  $y->st_id; ?>')"><button id="delete_button">Delete</button></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>


        <script>
            var target_date = new Date().getTime() + (1000 * 3600 * 48); // set the countdown date
            var days, hours, minutes, seconds; // variables for time units
            var countdown = document.getElementById("tiles"); // get tag element
            getCountdown();
            setInterval(function() {
                getCountdown();
            }, 1000);

            function getCountdown() {
                // find the amount of "seconds" between now and target
                var current_date = new Date().getTime();
                var seconds_left = (target_date - current_date) / 1000;
                days = pad(parseInt(seconds_left / 86400));
                seconds_left = seconds_left % 86400;
                hours = pad(parseInt(seconds_left / 3600));
                seconds_left = seconds_left % 3600;
                minutes = pad(parseInt(seconds_left / 60));
                seconds = pad(parseInt(seconds_left % 60));
                // format countdown string + set tag value
                countdown.innerHTML = "<span>" + days + "</span><span>" + hours + "</span><span>" + minutes + "</span><span>" + seconds + "</span>";
            }

            function pad(n) {
                return (n < 10 ? '0' : '') + n;
            }
        </script>

        <!-- add google liknk etc -->
        <div class="links-container">
            <ul class="links-list">
                <li>
                    <a href="https://www.google.com" target="_blank" class="link">
                        <img src="image/google.jpeg" alt="Google" class="icon">
                        <h4>Google</h4>
                    </a>
                </li>
                <li>
                    <a href="https://www.facebook.com" target="_blank" class="link">
                        <img src="image/fb.jpeg" alt="Facebook" class="icon">
                        <h4>Facebook</h4>
                    </a>
                </li>
                <li>
                    <a href="https://www.twitter.com" class="link">
                        <img src="image/twiiter.png" alt="Link 3" class="icon">
                        <h4>twiiter</h4>
                    </a>
                </li>
                <li>
                    <a href="" class="link">
                        <img src="image/webtec.webp" alt="Link 4" class="icon">
                        <h4>WebtecFusion</h4>
                    </a>
                </li>
            </ul>
        </div>
    </div>












</div>