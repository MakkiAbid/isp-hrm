<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='https://fonts.googleapis.com/css?family=Lato:400,300,700' rel='stylesheet' type='text/css'>
    <title>Resume</title>
</head>
<body>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    html {
        height: 100%;
    }
    body {
        min-height: 100%;
        background: #eee;
        font-family: 'Lato', sans-serif;
        font-weight: 400;
        color: #222;
        font-size: 14px;
        line-height: 26px;
        padding-bottom: 50px;
    }
    .container {
        max-width: 700px;
        background: #fff;
        margin: 0px auto 0px;
        box-shadow: 1px 1px 2px #DAD7D7;
        border-radius: 3px;
        padding: 40px;
        margin-top: 50px;
    }
    .header {
        margin-bottom: 30px;
    }
    .full-name {
        font-size: 40px;
        text-transform: uppercase;
        margin-bottom: 5px;
    }
    .first-name {
        font-weight: 700;
    }
    .last-name {
        font-weight: 300;
    }
    .contact-info {
        margin-bottom: 20px;
    }
    .email , .phone {
        color: #999;
        font-weight: 300;
    }
    .separator {
        height: 10px;
        display: inline-block;
        border-left: 2px solid #999;
        margin: 0px 10px;
    }
    .position {
        font-weight: bold;
        display: inline-block;
        margin-right: 10px;
        text-decoration: underline;
    }
    .details {
        line-height: 20px;
    }
    .section {
        margin-bottom: 40px;
    }
    .section:last-of-type {
        margin-bottom: 0px;
    }
    .section__title {
        letter-spacing: 2px;
        color: #54AFE4;
        font-weight: bold;
        margin-bottom: 10px;
        text-transform: uppercase;
    }
    .section__list-item {
        margin-bottom: 40px;
    }
    .section__list-item:last-of-type {
        margin-bottom: 0;
    }
    .left , .right {
        vertical-align: top;
        display: inline-block;
    }
    .left {
        width: 60%;
    }
    .right {
        text-align: right;
        width: 39%;
    }
    .name {
        font-weight: bold;
    }
    a {
        text-decoration: none;
        color: #000;
        font-style: italic;
    }
    a:hover {
        text-decoration: underline;
        color: #000;
    }
    .skills {
    }
    .skills__item {
        margin-bottom: 10px;
    }
    .skills__item .right {
    input {
        display: none;
    }
    label {
        display: inline-block;
        width: 20px;
        height: 20px;
        background: #C3DEF3;
        border-radius: 20px;
        margin-right: 3px;
    }
    input:checked + label {
        background: #79A9CE;
    }
    }
</style>
    <div class="container">
    <div class="header">
        <div class="full-name">
            <span style="" class="first-name">{{ $user->name }}</span>
        </div>
        <div class="contact-info">
            <span class="email">Email: </span>
            <span class="email-val">{{ $user->email }}</span>
            <span class="separator"></span>
            <span class="phone">Phone: </span>
            <span class="phone-val">{{ $user->personal_info->phone }}</span>
            <span class="separator"></span>
            <span class="phone">CNIC: </span>
            <span class="phone-val">{{ $user->personal_info->cnic }}</span>
        </div>
        <div class="about">
{{--            <span class="position">Front-End Developer </span>--}}
            <span class="desc">
                {{ $user->personal_info->bio }}
            </span>
        </div>
    </div>
    <div class="details">
        <div class="section">
            <div class="section__title">
                General Information
            </div>
            <div class="section__list">
                <div class="section__list-item">
                    <div class="left">
                        <div class="name">Date of Birth: </div>
                        {{ date("jS F Y", strtotime($user->personal_info->dob)) }}
                        <div class="name">Gender: </div>
                        {{ $user->personal_info->gender }}
                        <div class="name">Marital Status: </div>
                        {{ $user->personal_info->marital_status }}
                        <div class="name">Nationality</div>
                        {{ $user->personal_info->nationality }}
                    </div>
                    <div class="right">
                        <div class="name">Religion</div>
                        {{ $user->personal_info->religion }}
                        <div class="name">City: </div>
                        {{ ucwords($user->personal_info->city) }}
                        <div class="name">Address: </div>
                        {{ $user->personal_info->address }}
                        <div class="name">Applied at</div>
                        {{ date('F j, Y h:i A', strtotime($user->created_at)) }}
                    </div>
                </div>
            </div>
        </div>
        <div class="section">
            <div class="section__title">Experience</div>
            <div class="section__list">
                @foreach($user->user_experience as $exp)
                <div class="section__list-item">
                    <div class="left">
                        <div class="name">{{ $exp->company }}</div>
                        <div class="duration">{{ date("jS F Y", strtotime($exp->start_date)) }} - {{ date("jS F Y", strtotime($exp->end_date)) }}</div>
                    </div>
                    <div class="right">
                        <div class="name">{{ $exp->designation }}</div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="section">
            <div class="section__title">Education</div>
            <div class="section__list">
                @foreach($user->user_education as $education)
                <div class="section__list-item">
                    <div class="left">
                        <div class="name">{{ $education->institute }}</div>
                        <div class="duration">{{ $education->year }}</div>
                    </div>
                    <div class="right">
                        <div class="name">{{ $education->education_type->education }}</div>
                        <div class="desc">{{ $education->obtained }} / {{ $education->total }} {{ $education->education_type->marks_type }}</div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
</div>
    </div>
</body>
</html>




