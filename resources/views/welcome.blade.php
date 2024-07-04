<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MG Innovation</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            font-family: Arial, sans-serif;
        }
        spline-viewer {
            width: 100vw;
            height: 100vh;
            display: block;
        }
        .animated-section {
            opacity: 0;
            transform: translateY(50px);
            transition: opacity 0.5s, transform 0.5s;
            padding: 20px;
        }
        .animated-section.in-view {
            opacity: 1;
            transform: translateY(0);
        }
        .animated-text {
            text-align: center;
            margin-top: 20px;
            font-size: 18px;
        }
        .button {
            border-radius: 4px;
            background: linear-gradient(45deg, black, red);
            color: #FFFFFF;
            text-align: center;
            font-size: 16px;
            padding: 10px 20px;
            width: 150px;
            transition: all 0.5s;
            cursor: pointer;
            margin: 5px;
            position: fixed;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3), 0 1px 3px rgba(0, 0, 0, 0.1);
            border: 1px solid #444;
        }
        .button span {
            cursor: pointer;
            display: inline-block;
            position: relative;
            transition: 0.5s;
        }
        .button span:after {
            content: '\00bb';
            position: absolute;
            opacity: 0;
            top: 0;
            right: -20px;
            transition: 0.5s;
        }
        .button:hover span {
            padding-right: 25px;
        }
        .button:hover span:after {
            opacity: 1;
            right: 0;
        }
    </style>
</head>
<body>
    <script type="module" src="https://unpkg.com/@splinetool/viewer@1.8.1/build/spline-viewer.js"></script>
    
    <spline-viewer url="https://prod.spline.design/nsINiC0FgNWFrNLf/scene.splinecode"></spline-viewer>

    <button class="button" onclick="redirectToLogin()"><span>SZN Portal</span></button>

    <div class="animated-section">
        <!-- Content of animated section -->
    </div>

    <!-- Other sections with class "animated-section" -->

    <script>
        document.addEventListener('scroll', function() {
            const sections = document.querySelectorAll('.animated-section');
            const triggerBottom = window.innerHeight / 1.3;

            sections.forEach(section => {
                const sectionTop = section.getBoundingClientRect().top;
                if (sectionTop < triggerBottom) {
                    section.classList.add('in-view');
                } else {
                    section.classList.remove('in-view');
                }
            });
        });

        function redirectToLogin() {
            window.location.href = "/login";
        }
    </script>
</body>
</html>
