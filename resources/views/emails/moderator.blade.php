<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Hello {{$moderator}}</h1>
<div>
    <p>You have pending job post</p>
    <p>Title: {{$user->jobs()->first()->title}}</p>
    <p>Description: {{$user->jobs()->first()->description}}</p>
    <p>Email: {{$user->jobs()->first()->email}}</p>
    <p><a href="{{url('/admin/job-approve/'.$user->jobs()->first()->id)}}">Click here</a> to approve this post</p>
</div>
</body>
</html>