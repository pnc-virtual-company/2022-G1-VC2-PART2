<!DOCTYPE html>
<html>
<head>
    <title>ALUMNI MANAGEMENT APPLICATION</title>
</head>
<body>
    <div style="width: 90%; margin: auto; height: 50vh; background: #22bbea63; border-radius: 5px; padding-top: 3rem;">
        <div style="width: 70%; height: 80%; border-radius: 5px; background: white; margin:auto;">
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
            <div style="width:90%; margin:auto; margin-top: 2rem; ">
                <p>Hi, <strong>{{$details['first_name']}} {{$details['last_name']}},</strong></p>
                <p>You have forgot your password. Please use the verification code below to enter your new password and try to login again.</p>
                <p>verify code : <strong>{{$details['verifyCode']}}</strong></p>
            </div>
        </div>
    </div>
</body>
</html>