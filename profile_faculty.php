<!DOCTYPE html>
<head> <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
<style>
    input , textarea {     
       
        outline: none;
        padding: 3px 0px 3px 3px;
        margin: 5px 1px 3px 0px;
        border: 1px solid #DDDDDD;
        border-radius: 1mm;
      }
       
      input :focus, textarea:focus {
        box-shadow: 0 0 5px rgba(81, 203, 238, 1);
        padding: 3px 0px 3px 3px;
        margin: 5px 1px 3px 0px;
        border: 2px solid rgb(50, 105, 156);
        border-radius: 1mm;
      }
</style>
<title>Faculty</title>
</head>
<body style="background-color: rgb(42, 180, 180);">
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right" style="background-color: rgb(94, 103, 106);">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="tea.png"><span
                class="font-weight-bold"><?php echo isset($_GET['name']) ? $_GET['name'] : ''; ?></span><span class="text-black-50"><?php echo isset($_GET['email']) ? $_GET['email'] : ''; ?></span><span> </span></div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">My Profile</h4>
                </div>
                <form action ="connect_profile_faculty.php" method="post">
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Name</label><input type="text" class="form-control" placeholder="first name" value="<?php echo isset($_GET['name']) ? $_GET['name'] : ''; ?>" name ="name"></div>
                    <div class="col-md-6"><label class="labels">Username</label><input type="text" class="form-control" placeholder="surname" value="<?php echo isset($_GET['username']) ? $_GET['username'] : ''; ?>" name="username"></div>
                </div>
                <div class="row mt-3">
                    <!-- <label for="user-input">New Academic Achievements :</label>
                    <textarea id="user-input" name="user-input" rows="3" cols="45"></textarea> -->
                    <div class="col-md-12"><label class="labels">Email</label><input type="text" class="form-control" placeholder="cb.en.u4cse20xxx@cb.students.amrita.edu" value="<?php echo isset($_GET['email']) ? $_GET['email'] : ''; ?>" name="email"></div>
                    <div class="col-md-12"><label class="labels">Major/Specification</label><input type="text" class="form-control" name="major"></div>
              
                    <div class="col-md-12"><label class="labels">Certifications</label><br><textarea id="user-input" name="certifications" rows="1" cols="64"></textarea></div>
                    <div class="col-md-12"><label class="labels">Projects</label><br><textarea id="user-input" name="projects" rows="1" cols="64"></textarea></div>
                    <div class="col-md-12"><label class="labels">Work Experience</label><br><textarea id="user-input" name="workexperience" rows="1" cols="64"></textarea></div>
                    <div class="col-md-12"><label class="labels">Research Experience</label><textarea id="user-input" name="researchexperience" rows="1" cols="64"></textarea></div>


                </div>
                <!-- <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">Country</label><input type="text" class="form-control" placeholder="country" value=""></div>
                    <div class="col-md-6"><label class="labels">State/Region</label><input type="text" class="form-control" value="" placeholder="state"></div>
                </div> -->
               
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">
                <!-- <div class="d-flex justify-content-between align-items-center experience"><span>Edit Experience</span><span class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;Experience</span></div><br> -->
                <div class="col-md-12"><label class="labels">Technical Skills</label><br><textarea id="user-input" name="technicalskills" rows="1" cols="49"></textarea></div>
                <div class="col-md-12"><label class="labels">Area of Interest</label><br><textarea id="user-input" name="areaofinterest" rows="1" cols="49"></textarea></div>

            </div> 
            <div class="mt-5 text-center">
                <button class="btn btn-primary profile-button" type="submit">Save Profile</button>
               
              </div>
        </div>
        
    </div>
</div>
</div>
</div>
    </form>
<!-- <script>
    function redirectToPage() {
      // Redirect to another HTML page
      window.location.href = "another-page.html";
    }
  </script> -->
</body>
</html>