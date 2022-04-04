<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/faq.css">
    <title>Frequently Ask Questions</title>
</head>
<body>
    <header>
        <h1>Work Immersion <br>Monitoring System</h1>
        <p>This Web Application allows everyone for a less hustle, more hygiene contact less monitoring system</p>
        <a href="../index.php"><img src="../img/previous.png" alt="previous"> Back</a>
    </header>

    <main>
        <section class="mainSection">
            <div class="card titleAbout">
                <img src="../img/qanda.png" alt="teamwork">
                <p>Question and Answer</p>
            </div>
        </section>

        <article class="mainArticle">
            <div class="wrapper">
                <div class="accordion">
                    <h1>Whats the use of this Web application?</h1>
                </div>
                <div class="panel">
                    <p>This web application offers an attendace or time log management system to assist companies that
                        offers work immersion for students, it also have a separate log in for both admin and student 
                        to track daily time records.
                    </p>
                </div>
            </div>

            <div class="wrapper">
                <div class="accordion">
                    <h1>Can i access WIMS throught any devices?</h1>
                </div>
                <div class="panel">
                    <p>Yes! make sure that you are connected with the same wifi/router type your IPv4 address to
                        the url in you browser, Example <span>192.168.1.6/WIMS</span> didnt know your IPv4 address?
                        go to your command prompt then type ipconfig you should see your IPv4 address.
                    </p>
                </div>
            </div>

            <div class="wrapper">
                <div class="accordion">
                    <h1>WIMS showing error when sending a request for forgot password</h1>
                </div>
                <div class="panel">
                    <p>WIMS is ung PHP Mailer to send SMTP request and some antivirus are blocking this authentication request,
                    when you need to urgently recover your account try accessing WIMS into your mobile phones there you can request for
                    forgot password.
                    </p>
                </div>
            </div>
        </article>

        <div class="video">
            <p>Space reserved for video about the system</p>
        </div>
    </main>

    <footer>
        <div id="copyright">
            &copy; All right reserved 2020
        </div>
    </footer>

    <script>
        let acc = document.getElementsByClassName('accordion');
        let len = acc.length;
        for(let i = 0; i < len; i++){
            acc[i].addEventListener('click', function () {
                this.classList.toggle('active');
                let panel = this.nextElementSibling;
                if(panel.style.maxHeight){
                    panel.style.maxHeight = null;
                }else{
                    panel.style.maxHeight = panel.scrollHeight + 'px';
                }
            })
        }
    </script>
</body>
</html>