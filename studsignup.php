<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/studform.css">
    </head>
    <body>
        <div class="container">
            <div class="header">
                Create Student Account
            </div>
            <form id="form" class="form" action="connectstudsignup.php" method="POST" onsubmit="return checkInputs()">
                <div class="userdet">
                    <div class="form-control">
                        <label for="fullname" class="det">Name</label>
                        <input type="text" placeholder="Riya" id="fullname" name="name" required/>
                        <i class="fas fa-check-circle"></i>
                        <i class="fas fa-exclamation-circle"></i>
                        <small>Error message</small>
                    </div>
                    
                    <div class="form-control">
                        <label for="username" class="det">Username</label>
                        <input type="text" placeholder="florinpop17" id="username" name="username" required />
                        <i class="fas fa-check-circle"></i>
                        <i class="fas fa-exclamation-circle"></i>
                        <small>Error message</small>
                    </div>
                    
                    <div class="form-control">
                        <label for="email" class="det">Email</label>
                        <!-- <input type="email" placeholder="a@florin-pop.com" id="email" name="email" required /> -->
                        <input type="email" name = "email" placeholder="cb.en.u4cse20xxx@cb.students.amrita.edu" id="email" pattern="cb\.en\.u4cse20\d{3}@cb\.students\.amrita\.edu" required oninvalid="this.setCustomValidity('The format of the email should be cb.en.u4cse20xxx@cb.students.amrita.edu, where xxx is any three-digit number.')"/>

                        <i class="fas fa-check-circle"></i>
                        <i class="fas fa-exclamation-circle"></i>
                        <small>Error message</small>
                    </div>
    
                    <div class="form-control">
                        <label for="password" class="det">Password</label>
                        <input type="password" placeholder="Password" id="password" name="password" required/>
                        <i class="fas fa-check-circle"></i>
                        <i class="fas fa-exclamation-circle"></i>
                        <small>Error message</small>
                    </div>
                </div>
    
                <div class="gender-details">
                    <input type="radio" name="gender" id="dot-1" value="male">
                    <input type="radio" name="gender" id="dot-2" value="female">
                    <input type="radio" name="gender" id="dot-3" value="prefernottosay">
                    <span class="gender-title">Gender</span>
                    <div class="category">
                        <label for="dot-1">
                            <span class="dot one"></span>
                            <span class="gender">Male</span>
                        </label>
                        <label for="dot-2">
                            <span class="dot two"></span>
                            <span class="gender">Female</span>
                        </label>
                        <label for="dot-3">
                            <span class="dot three"></span>
                            <span class="gender">Prefer not to say</span>
                        </label>
                    </div>
                </div>
                
                <div class="button">
                    <input type="submit" value="Signup">
                </div>
    
                <a href="studlogin.html" class="no-underline" style="width: 170%; color: black; font-size: 110%;"><b>Already have an account?</b></a>
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                <a href="loginas.html" class="no-underline" style="width: 170%; color: black; font-size: 110%;"><b>← BACK</b></a>
            </form>
        </div>
        <script src="formjs.js"></script>
    </body>
</html>
