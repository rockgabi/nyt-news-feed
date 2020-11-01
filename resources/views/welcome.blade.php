<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>NYT News Feed</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        html,
        body,
        div,
        span,
        applet,
        object,
        iframe,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p,
        blockquote,
        pre,
        a,
        abbr,
        acronym,
        address,
        big,
        cite,
        code,
        del,
        dfn,
        em,
        img,
        ins,
        kbd,
        q,
        s,
        samp,
        small,
        strike,
        strong,
        sub,
        sup,
        tt,
        var,
        b,
        u,
        i,
        center,
        dl,
        dt,
        dd,
        ol,
        ul,
        li,
        fieldset,
        form,
        label,
        legend,
        table,
        caption,
        tbody,
        tfoot,
        thead,
        tr,
        th,
        td,
        article,
        aside,
        canvas,
        details,
        embed,
        figure,
        figcaption,
        footer,
        header,
        hgroup,
        menu,
        nav,
        output,
        ruby,
        section,
        summary,
        time,
        mark,
        audio,
        video {
            margin: 0;
            padding: 0;
            border: 0;
            font-size: 100%;
            /* Prevent font scaling in landscape while allowing user zoom */
            -ms-text-size-adjust: 100%;
            -moz-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
            text-size-adjust: 100%;
            font: inherit;
            vertical-align: baseline;
        }

        /* HTML5 display-role reset for older browsers */
        article,
        aside,
        details,
        figcaption,
        figure,
        footer,
        header,
        hgroup,
        menu,
        nav,
        section,
        summary,
        main {
            display: block;
        }

        body {
            line-height: 1;
        }

        ol,
        ul {
            list-style: none;
        }

        blockquote,
        q {
            quotes: none;
        }

        blockquote:before,
        blockquote:after,
        q:before,
        q:after {
            content: '';
            content: none;
        }

        table {
            border-collapse: collapse;
            border-spacing: 0;
        }
        /* end css reset */

        body {
            color: #333;
            background-color: white;
        }

        body.dark {
            color: #888;
            background-color: black;
        }

        body.transparent {
            color: white;
            background-color: deeppink;
        }

        audio,
        canvas,
        video {
            display: inline-block;
        }

        /* prevents modern browsers from displaying 'audio' without controls */
        audio:not([controls]) {
            display: none;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        figure {
            margin: 0;
        }

        img {
            height: auto;
            max-width: 100%;
            -ms-interpolation-mode: bicubic;
        }

        .image > img {
            display: block;
        }

        a img {
            border: none;
        }

        a {
            text-decoration: none;
            color: black;
        }

        iframe {
            border: none;
        }

        /* forms */

        form {
            margin: 0;
        }

        fieldset {
            border: none;
            padding: 0;
        }

        input,
        label,
        select,
        textarea {
            color: black;
        }

        button,
        input,
        select,
        textarea {
            margin: 0;
            font-size: 100%;
        }

        button,
        input,
        select {
            vertical-align: middle;
        }

        button,
        input {
            padding: 0;
            margin: 0;
            border: 0;
            border: none;
            line-height: normal; /* ff3 and 4 have !important on line-height in ua stylesheet */
        }

        button::-moz-focus-inner,
        input::-moz-focus-inner {
            /* inner padding and border oddities in ff3/4 */
            padding: 0;
            border: 0;
        }

        button:-moz-focusring {
            outline: 1px dotted; /* restores outline on focus moz bug 140562 */
        }

        button,
        input[type='button'],
        input[type='reset'],
        input[type='submit'] {
            cursor: pointer; /* cursors on all buttons applied consistently */
            -webkit-appearance: button; /* style clickable inputs in ios */
        }

        textarea {
            padding: 6px 10px;
            overflow: auto; /* remove vertical scrollbar in ie6-9 */
            vertical-align: top; /* readability and alignment cross-browser */
        }

        input[type='text'],
        input[type='password'],
        input[type='email'],
        textarea {
            border-radius: 3px;
            box-sizing: border-box;
            border: 0;
        }

        input[type='text']:focus,
        input[type='password']:focus,
        input[type='email']:focus,
        textarea:focus {
            /* box-shadow: inset 2px 3px 3px rgba(0, 0, 0, 0.1); */
            box-shadow: none;
            outline: none;
        }

        input[type='password'] {
            letter-spacing: 3px;
        }

        input[type='search'] {
            /* appearance in safari/chrome */
            box-sizing: content-box;
        }

        ::-ms-clear {
            display: none; /* removes clear icon ie10 adds to text inputs on focus */
        }

        /* using modernizr - some browsers will show a broken image icon if they dont support svg so lets hide them */
        .hasNoSvg img[src *= '.svg'] {
            /* performance ? */
            display: none !important;
        }

        html,
        body,
        main {
            height: 100%;
            margin: 0;
        }

        html {
            font: -apple-system-body;
            font-size: 100%;
        }

        body {
            overflow-x: hidden;
        }

        .NYTApp .NYTAppHideMasthead {
            display: none;
        }

        @media (max-width: 1040px) {
            .ReactModal__Body--open {
                overflow: hidden;
                position: fixed;
            }
        }

        /* Print styles */

        @media print {
            *,
            *::before,
            *::after {
                background: transparent !important;
                color: #000 !important;
                box-shadow: none !important;
                text-shadow: none !important;
            }

            p,
            h2,
            h3 {
                orphans: 3;
                widows: 3;
            }

            h2,
            h3 {
                page-break-after: avoid;
            }

            a,
            a:visited {
                text-decoration: none !important;
            }

            abbr[title]::after {
                content: ' (' attr(title) ')';
            }

            a[href^='#']::after,
            a[href^='javascript:']::after {
                content: '';
            }

            pre,
            blockquote {
                page-break-inside: avoid;
            }

            thead {
                display: table-header-group;
            }

            tr,
            img {
                page-break-inside: avoid;
            }

            img {
                max-width: 100% !important;
            }

        }

        /* Timeswire */
        .css-1v9sdfx {
            margin: 25px auto 40px;
            padding: 0 24px;
        }

        .css-1wa7u5r {
            margin: 0 auto;
            width: auto;
        }

        .css-1j8bfih {
            max-width: 1200px;
            padding: 40px 0 7px;
            border-bottom: 2px solid #121212;
        }

        @media (min-width: 740px) {
            .css-1j8bfih {
                display: -webkit-box;
                display: -webkit-flex;
                display: -ms-flexbox;
                display: flex;
                margin: 0 auto;
            }
        }

        .css-kicrxn {
            font-size: 24px;
            line-height: 30px;
            color: #121212;
            font-family: nyt-franklin,helvetica,arial,sans-serif;
            font-weight: 700;
            -webkit-letter-spacing: -0.02em;
            -moz-letter-spacing: -0.02em;
            -ms-letter-spacing: -0.02em;
            letter-spacing: -0.02em;
        }

        @media (min-width: 740px) {
            .css-kicrxn {
                font-size: 42px;
                line-height: 46px;
                margin-bottom: 0;
            }
        }

        .css-1op6wzy {
            font-size: 14px;
            line-height: 18px;
            font-family: nyt-franklin,helvetica,arial,sans-serif;
            color: #121212;
            -webkit-letter-spacing: 0;
            -moz-letter-spacing: 0;
            -ms-letter-spacing: 0;
            letter-spacing: 0;
            margin-top: 5px;
            margin-bottom: 12px;
        }

        @media (min-width: 740px) {
            .css-1op6wzy {
                width: 520px;
                margin-left: 18px;
                margin-top: 5px;
            }
        }

        .css-1khs0h5 {
            font-family: nyt-franklin,helvetica,arial,sans-serif;
            font-weight: 700;
            font-size: 14px;
            line-height: 18px;
            color: #326891;
        }

        .css-jj1ltg {
            margin: 0 auto 15px;
            max-width: 840px;
            padding: 40px 0;
        }

        .css-ye6x8s:nth-of-type(1) {
            border-top: 0 none;
            padding-top: 0;
        }
        .css-ye6x8s {
            border-top: 1px solid #e2e2e2;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            -ms-flex-pack: center;
            justify-content: center;
            margin-bottom: 20px;
            padding-top: 21px;
        }
        .css-1cp3ece {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-flex-direction: column;
            -ms-flex-direction: column;
            flex-direction: column;
            max-width: 800px;
            width: 100%;
        }

        @media (min-width: 600px) {
            .css-1cp3ece {
                -webkit-align-self: flex-start;
                -ms-flex-item-align: start;
                align-self: flex-start;
                -webkit-flex-direction: row;
                -ms-flex-direction: row;
                flex-direction: row;
                max-width: 840px;
            }
        }

        .css-1l4spti {
            margin-bottom: 2px;
            -webkit-order: 0;
            -ms-flex-order: 0;
            order: 0;
            width: 100%;
        }

        @media (min-width: 600px) {
            .css-1l4spti {
                margin-bottom: 0;
                -webkit-order: 2;
                -ms-flex-order: 2;
                order: 2;
            }
        }

        .css-79elbk {
            position: relative;
        }

        .css-ulz9xo {
            float: right;
            margin: 0 0 10px 10px;
            width: 150px;
        }

        @media (min-width: 600px) {
            .css-ulz9xo {
                margin: 0 0 0 40px;
            }
        }

        .css-79elbk {
            position: relative;
        }

        .css-11cwn6f {
            width: 100%;
            vertical-align: top;
        }

        .css-17ai7jg {
            color: #666;
            font-family: nyt-imperial,georgia,'times new roman',times,serif;
            margin: 10px 20px 0;
            text-align: left;
        }

        @media (min-width: 600px) {
            .css-17ai7jg {
                margin-left: 0;
            }
        }




        .css-1j9dxys {
            color: #000;
            font-feature-settings: 'kern';
            margin-bottom: 8px;
            max-width: 470px;
            font-family: nyt-cheltenham,georgia,'times new roman',times,serif;
            font-weight: 400;
            font-size: 17px;
            line-height: 20px;
        }

        @media (min-width: 740px) {
            .css-1j9dxys {
                font-size: 23px;
                line-height: 25px;
            }
        }

        .css-1echdzn {
            color: #333;
            font-family: nyt-imperial,georgia,'times new roman',times,serif;
            font-weight: 400;
            font-size: 13px;
            line-height: 18px;
        }

        @media (min-width: 740px) {
            .css-1echdzn {
                font-size: 14px;
                line-height: 20px;
            }
        }

        .css-1lc2l26 {
            -webkit-order: 0;
            -ms-flex-order: 0;
            order: 0;
            color: #999;
            font-family: nyt-franklin,helvetica,arial,sans-serif;
            font-size: 11px;
            font-weight: 400;
            line-height: 13px;
        }

        @media (min-width: 600px) {
            .css-1lc2l26 {
                min-width: 125px;
                -webkit-order: 1;
                -ms-flex-order: 1;
                order: 1;
            }
        }

        @media (min-width: 740px) {
            .css-1lc2l26 {
                margin: 8px 0 7px;
            }
        }



        .css-1t62hi8 {
            max-width: 780px;
            margin: auto;
            padding: 0 10px;
        }

        .css-1stvaey {
            background: radial-gradient( ellipse 50% 30px at 50% 100%,#ebebeb 0%,white 110% );
            display: inline-block;
            width: 100%;
            height: 45px;
            z-index: 0;
            margin: -30px 0 35px 0;
            padding: 0;
            border-top: none;
            text-align: center;
        }

        .css-1stvaey button {
            font-size: 0.6875rem;
            line-height: 0.8125rem;
            display: inline-block;
            height: 30px;
            min-width: 130px;
            margin: 30px 0 0;
            padding: 9px 9px 7px;
            background-color: #ebebeb;
            color: #333;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-weight: 700;
            font-family: nyt-franklin,helvetica,arial,sans-serif;
            text-transform: uppercase;
        }

    </style>
</head>
<body>
    <main id="site-content">
        <div class="css-1v9sdfx">
            <div class="css-1wa7u5r">

                <header class="css-1j8bfih">
                    <h1 class="css-kicrxn">NYT News Feed</h1>
                    <div class="css-1op6wzy">NYT News Feed (this page) is a clone of the NYT TimesWire page -- a display of the latest 200 articles published on NYTimes.com</div>
                </header>

                <div class="css-jj1ltg">
                    <ol aria-live="polite">
                        @foreach($articles as $article)
                            <li class="css-ye6x8s">
                                <div class="css-1cp3ece">
                                    <div class="css-1l4spti">
                                        <a href="{{ $article['url'] }}">
                                            <div class="css-79elbk">
                                                <figure class="css-ulz9xo" aria-label="media" role="group" itemscope=""
                                                        itemprop="associatedMedia"
                                                        itemid="{{ array_key_exists('thumbnail_standard', $article) ? $article['thumbnail_standard'] : '' }}?quality=100&amp;auto=webp 75w"
                                                        itemtype="http://schema.org/ImageObject">
                                                    <div class="css-79elbk">
                                                        <img alt="" class="css-11cwn6f"
                                                             src="{{ \App\Http\Controllers\FeedsController::getProperThumbnail($article) }}?quality=100&amp;auto=webp&amp;disable=upscale"
                                                             srcset="{{ \App\Http\Controllers\FeedsController::getImgSrcSet($article['multimedia']) }}"
                                                             sizes="(max-width: 600px) 120px, (max-width: 1024px) 165px, 205px" decoding="async" itemprop="url"
                                                             itemid="{{ \App\Http\Controllers\FeedsController::getProperThumbnail($article) }}?quality=100&amp;auto=webp&amp;disable=upscale">
                                                    </div>
                                                    <figcaption itemprop="caption description"
                                                                class="css-17ai7jg e18f7pbr0"></figcaption>
                                                </figure>
                                            </div>
                                            <h2 class="css-1j9dxys e1xfvim30">{{ $article['title'] }}</h2>
                                            <p class="css-1echdzn e1xfvim31">{{ $article['abstract'] }}</p></a></div>
                                    <div class="css-1lc2l26 e1xfvim33"><span data-testid="todays-date"
                                                                             aria-label="10 minutes ago" class="css-gwp4ii">{{ \Carbon\Carbon::createFromTimeStamp(strtotime($article['published_date']))->diffForHumans()  }}</span>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ol>
                    <div class="css-1t62hi8">
                        <div class="css-1stvaey">
                            <div>
                                <div
                                    style="border:0;clip:rect(0 0 0 0);height:1px;margin:-1px;overflow:hidden;white-space:nowrap;padding:0;width:1px;position:absolute"
                                    role="log" aria-live="assertive"></div>
                                <div
                                    style="border:0;clip:rect(0 0 0 0);height:1px;margin:-1px;overflow:hidden;white-space:nowrap;padding:0;width:1px;position:absolute"
                                    role="log" aria-live="assertive"></div>
                                <div
                                    style="border:0;clip:rect(0 0 0 0);height:1px;margin:-1px;overflow:hidden;white-space:nowrap;padding:0;width:1px;position:absolute"
                                    role="log" aria-live="polite"></div>
                                <div
                                    style="border:0;clip:rect(0 0 0 0);height:1px;margin:-1px;overflow:hidden;white-space:nowrap;padding:0;width:1px;position:absolute"
                                    role="log" aria-live="polite"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
