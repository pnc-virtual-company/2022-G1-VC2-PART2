<!DOCTYPE html>
<html>
<head>
    <title>Real Programmer</title>
</head>
<body>
    <div style="width: 90%; margin: auto; height: 50vh; background: #22bbea63; border-radius: 5px; padding-top: 2rem;">
        <div style="width: 70%; height: 88%; border-radius: 5px; background: white; margin:auto;">
            <header style="display:flex; justify-content:space-between;">
                <div style="width: 30%; margin-top:12px;  margin-left:15px;">
                    <img style="width: 6rem;height: 2.2rem; margin-top:5px;" src="https://www.google.com/u/0/ac/images/logo.gif?uid=100318532160336258666&service=google_gsuite" alt="">
                </div>
                <div style="width:50%;  display:flex; justify-content:cemter;">
                    <h2 style="margin-top:23px;margin-left:2rem;">PNC ALUMNI APP</h2>    
                </div>
                <div style="width: 20%; display:flex; justify-content:flex-end;" >
                    <img style="width: 6rem; " src="https://www.passerellesnumeriques.org/wp-content/uploads/2019/03/PN-Cambodia-Alumni-Association.png" alt="">
                </div>
            </header>
            <div style="width:90%; margin:auto; margin-top: 1rem; ">
                <p>Dear Alumni,</p>
                <p>You are invited into PNC ALUMNI APPLICATION, please use the email and password below for login to your account</p>
                <p>Email : <a href="#"  style="text-decoration: none; color:black;"><strong>{{$details['email']}} </strong></a></p>
                <p>Name : <strong>{{$details['password']}}</strong></p>
                <p><strong><a href="http://localhost:5173/" style="text-decoration: none;">Login here</a></strong></p>
            </div>
        </div>
    </div>
</body>
</html>