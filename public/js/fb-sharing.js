function  fb_share(path)
        {
            //alert('in fb_share');
            //alert(path);
            
                FB.init({
                appId      : '533087080215469',
                xfbml      : true,
                version    : 'v2.7',
                status     : true,
                cookie     : true
                });
                FB.ui(
                {
                    method: 'feed',
                    picture: path,
                    href: 'dev.makingshitfunny.com',
                    link: 'makingshitfunny.com',
                },
                function(response) 
                {
                    console.log("FB Response: "+typeof(response));
                    if(typeof(response) !== "undefined" && typeof(response) !== undefined && response)
                    {
                    }
                });

        }