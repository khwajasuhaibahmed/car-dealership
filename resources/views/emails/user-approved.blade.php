<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Approved | Elite Motors</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@400;700;900&display=swap');
        
        body { 
            font-family: 'Kanit', 'Helvetica Neue', Helvetica, Arial, sans-serif; 
            line-height: 1.6; 
            color: #1a1a1a; 
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .wrapper {
            width: 100%;
            table-layout: fixed;
            background-color: #f4f4f4;
            padding-bottom: 60px;
        }
        .container { 
            max-width: 600px; 
            margin: 0 auto; 
            background-color: #ffffff;
            box-shadow: 0 20px 50px rgba(0,0,0,0.1);
        }
        .header { 
            background-color: #050b16; 
            padding: 50px 40px; 
            text-align: center;
            border-bottom: 4px solid #cc0000;
        }
        .logo { 
            font-size: 28px; 
            font-weight: 900; 
            letter-spacing: -0.02em; 
            color: #ffffff !important; 
            text-decoration: none;
            text-transform: uppercase;
            font-style: italic;
        }
        .content {
            padding: 50px 40px;
        }
        h1 {
            font-size: 32px;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: -0.03em;
            margin-bottom: 25px;
            color: #050b16;
            line-height: 1.1;
        }
        p {
            font-size: 16px;
            color: #4a4a4a;
            margin-bottom: 25px;
        }
        .btn-wrapper {
            margin: 40px 0;
            text-align: center;
        }
        .btn { 
            display: inline-block; 
            background-color: #050b16; 
            color: #ffffff !important; 
            padding: 18px 45px; 
            text-decoration: none; 
            font-weight: 700; 
            text-transform: uppercase; 
            letter-spacing: 0.2em; 
            font-size: 14px;
            border: 2px solid #050b16;
        }
        .btn:hover {
            background-color: #ffffff;
            color: #050b16 !important;
        }
        .footer { 
            padding: 40px;
            background-color: #fafafa;
            border-top: 1px solid #eeeeee;
            font-size: 11px; 
            color: #999999; 
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 0.1em;
        }
        .accent-text {
            color: #cc0000;
            font-weight: 700;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <div class="header">
                <a href="{{ config('app.url') }}" class="logo">ELITE MOTORS</a>
            </div>
            
            <div class="content">
                <h1>WELCOME TO THE<br><span class="accent-text">INNER CIRCLE.</span></h1>
                
                <p>Hello <strong>{{ $user->name }}</strong>,</p>
                
                <p>We are delighted to inform you that your registration at <span class="accent-text">Elite Motors</span> has been officially <strong>APPROVED</strong> by our executive team.</p>
                
                <p>You now have full access to our premium digital showroom. Explore our curated inventory, manage your inquiries, and experience the future of automotive luxury.</p>
                
                <div class="btn-wrapper">
                    <a href="{{ route('login') }}" class="btn">Access Dashboard</a>
                </div>
                
                <p style="font-size: 14px; color: #888;">If you encounters any issues accessing your account, please contact our 24/7 support concierge.</p>
            </div>
            
            <div class="footer">
                &copy; {{ date('Y') }} Elite Motors Dealership. Excellence in Motion.<br>
                This is an automated concierge message.
            </div>
        </div>
    </div>
</body>
</html>
