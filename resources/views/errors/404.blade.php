<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>404 Not found</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Style-Type" content="text/css" />
    <link href="/css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div id="main">
        <!-- header -->
        <div id="header">
            <h1>No pages here as you see!<span>404 error - not found.</span></h1>
        </div>

        <!-- content -->
        <div id="content">
            <ul class="nav">
                <li class="home"><a href="{{ route('app.index') }}">Home Page</a></li>
                <li class="site_map"><a href="http://tier5.in">Site Map</a></li>
                <li class="search"><a href="https://www.google.com">Website Search</a></li>
            </ul>
            <p><storeng>Unless creepy emptiness was what you were looking for, this place has nothing that you want.<br />
                    So please go to our <a href="{{ route('app.index') }}">homepage</a></storeng> </p>
        </div>
        <!-- footer -->
        <div id="footer">
            Designed by Tier5 <a href="http://tier5.us" target="_blank" rel="nofollow">Tier5</a>
        </div>
    </div>
</body>
</html>