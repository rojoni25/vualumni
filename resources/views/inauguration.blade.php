<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>
        Alumni Association of Varendra University | AAVU
    </title>
    <link rel="stylesheet" href="{{ asset('fireworks/presets.min.css') }}">
    <script src="{{ asset('user/assets/js/libs/jquery-3.1.1.min.js') }}"></script>
    <style>
        #carbonads * {
            margin: initial;
            padding: initial;
        }

        #carbonads {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell,
                "Helvetica Neue", Helvetica, Arial, sans-serif;
        }

        #carbonads {
            display: flex;
            max-width: 330px;
            background-color: hsl(0, 0%, 98%);
            box-shadow: 0 1px 4px 1px hsla(0, 0%, 0%, 0.1);
            z-index: 100;
        }

        #carbonads a {
            color: inherit;
            text-decoration: none;
        }

        #carbonads a:hover {
            color: inherit;
        }

        #carbonads span {
            position: relative;
            display: block;
            overflow: hidden;
        }

        #carbonads .carbon-wrap {
            display: flex;
        }

        #carbonads .carbon-img {
            display: block;
            margin: 0;
            line-height: 1;
        }

        #carbonads .carbon-img img {
            display: block;
        }

        #carbonads .carbon-text {
            font-size: 13px;
            padding: 10px;
            margin-bottom: 16px;
            line-height: 1.5;
            text-align: left;
        }

        #carbonads .carbon-poweredby {
            display: block;
            padding: 6px 8px;
            background: #f1f1f2;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
            font-size: 8px;
            line-height: 1;
            border-top-left-radius: 3px;
            position: absolute;
            bottom: 0;
            right: 0;
        }
    </style>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    {{-- <script async="" src="https://www.clarity.ms/s/0.7.47/clarity.js"></script> --}}
    {{-- <script async="" src="https://www.clarity.ms/tag/8q4bxin4tm"></script> --}}
    {{-- <script async="" src="{{ asset('fireworks/clarity.js') }}"></script> --}}
    {{-- <script async="" src="{{ asset('fireworks/8q4bxin4tm.js') }}"></script> --}}
    {{-- <script async="" src="{{ asset('fireworks/js') }}"></script> --}}
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
        }

        #inauguration-section,
        #main-content {
            text-align: center;
        }

        #main-content {
            display: none;
        }

        #inauguration-button {
            padding: 15px 30px;
            font-size: 23px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 50px;
        }

        #inauguration-button:hover {
            background-color: #45a049;
        }

        #tsparticles {
            display: flex;
            justify-content: center;
        }

        #congrates-box {
            color: #00c1c1;
            text-shadow: #f1f1f2;
            line-height: 30px;
            font-size: 23px;
            width: 700px;
            background: #000b;
            padding: 20px;
            height: 300px;
            text-align: center;
            border-radius: 20px;
            box-shadow: 1px 0px 10px 0px white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            z-index: 999;
        }

        .well {
            max-width: 1200px;
        }
    </style>
</head>

<body>
    <div id="tsparticles" style="display:none;"><canvas data-generated="false"
            style="width: 100% !important; height: 100% !important; position: fixed !important; z-index: 0 !important; top: 0px !important; left: 0px !important; pointer-events: none; background-color: rgb(0, 0, 0);"
            aria-hidden="true" width="1920" height="947"></canvas>
        <div id="congrates-box">
            <div>
                <h1>Congratulations</h1>
            </div>
            <div>Congratulations to our honorable chairman for becoming the first alumni member of the Alumni
                Association of Varendra University!</div>
        </div>
    </div>
    <div id="inauguration-section" class="well">
        <h1 style="text-align: center; margin-bottom:50px; font-size:35px;">Message from the Honorable Chairman, VUT
        </h1>
        <p style="text-align: justify; line-height:35px; font-size:25px;">I feel glad to learn that AAVU is going to
            start its journey. Our alumni will be an integral part of the university that would contribute significantly
            in shaping the brand VU and represent our values, achievements and commitment to execellence. This platform
            aims to foster lasting connections among our graduates, enabling them to stay connected, Share knowledge,
            and contribute to the continued success of our community. As Chairman of the Trust I congratulate all the
            executive members and wish them all the best to build a strong global network of our alumni. We hope this
            platform serves as a bridge, bringing together our vibrant and
            diverse alumni network for future collaborations, mentorship opportunities, and personal growth.
            I encourage all of you to take part in this initiative, to strengthen the bonds with your alma mater, and to
            contribute to shaping the future of Varendra University.</p>
        <p style="text-align: justify; line-height:35px; font-size:25px; margin-top:15px; font-weight:800;">Welcome to
            the Alumni
            Association of Varendra University!</p>

        <div style="text-align: right; line-height:7px; font-size:23px;">
            <strong>
                Hafizur Rahman Khan
            </strong>
            <p>
                Chairman, Varendra University Trust
            </p>
        </div>
        <button id="inauguration-button" onclick="inug();">Become a Proud VUian</button>
    </div>

    {{-- <div id="main-content">
        <h1>Main Website Content</h1>
        <p>This is the main content of the website that becomes visible after the inauguration.</p>
    </div> --}}

    <script src="{{ asset('fireworks/tsparticles.preset.fireworks.bundle.min.js') }}"></script>
    <script type="text/javascript">
        function inug() {
            $("#inauguration-section").hide();
            $("#tsparticles").show();

            (async () => {
                await tsParticles.load({
                    id: "tsparticles",
                    options: {
                        preset: "fireworks"
                    }
                });
            })();
            setTimeout(() => {
                window.location.replace("{{ route('member.profile1') }}");
            }, 7000);
        }
    </script>
</body>

</html>
