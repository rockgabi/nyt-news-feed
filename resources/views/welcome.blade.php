<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>NYT News Feed</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

    <link data-rh="true" rel="shortcut icon" href="/favicon.ico"/>

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

        /* Header */

        .css-1r6wvpq {
            opacity: 1;
            visibility: visible;
            -webkit-animation-name: animation-5j8bii;
            animation-name: animation-5j8bii;
            -webkit-animation-duration: 300ms;
            animation-duration: 300ms;
            -webkit-animation-delay: 0ms;
            animation-delay: 0ms;
            -webkit-animation-timing-function: ease-out;
            animation-timing-function: ease-out;
        }

        .css-ui9rw0 {
            background: #fff;
            /*border-bottom: 1px solid #e2e2e2;*/
            height: 36px;
            padding: 8px 15px 3px;
            position: relative;
        }

        @media (min-width: 740px) {
            .css-ui9rw0 {
                background: #fff;
                padding: 10px 15px 6px;
            }
        }

        .css-10698na {
            text-align: center;
        }

        @media (min-width: 740px) {
            .css-10698na {
                padding-top: 0;
            }
        }

        .css-t66y1h {
            display: block;
            width: 150px;
            height: 21px;
            margin: 7px auto 0;
        }

        @media (min-width: 375px) {
            .css-t66y1h {
                width: 189px;
                height: 26px;
                margin: 5px auto 0;
            }
        }

        @media (min-width: 740px) {
            .css-t66y1h {
                width: 225px;
                height: 31px;
                margin: 4px auto 0;
            }
        }

        .css-7uzm1n {
            display: flex;
            justify-content: space-around;
            position: absolute;
            right: 10px;
            top: 9px;
        }

        .css-1kj7lfb {
            display: inline-block;
            margin-right: 7px;
        }

        .css-13xu0ly {
            border-radius: 3px;
            cursor: pointer;
            font-family: nyt-franklin, helvetica, arial, sans-serif;
            transition: all 0.6s ease 0s;
            white-space: nowrap;
            vertical-align: middle;
            background-color: rgb(86, 123, 149);
            border: 1px solid rgb(50, 104, 145);
            color: rgb(255, 255, 255);
            font-size: 11px;
            line-height: 11px;
            font-weight: 700;
            letter-spacing: 0.05em;
            padding: 11px 12px 8px;
            text-transform: uppercase;
        }

        @media (min-width: 1024px) {
            .css-13xu0ly {
                padding: 11px 12px 8px;
            }
        }



        /* Timeswire */
        #site-content {
            height: auto;
        }

        .css-1v9sdfx {
            margin: 25px auto 40px;
            padding: 0 24px;
        }

        .css-1wa7u5r {
            margin: 0 auto;
            width: auto;
        }

        .css-1j8bfih {
            position: relative;
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

        .css-gwp4ii {
            color: rgb(208, 1, 27);
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

        /** Footer **/
        .css-kdur8l::before {
            background-color: #fff;
            border-bottom: 1px solid #e2e2e2;
            border-top: 2px solid #e2e2e2;
            content: '';
            display: block;
            height: 1px;
            margin-top: 0;
        }

        @media (min-width: 1150px) {
            .css-kdur8l {
                margin: 0 auto;
                max-width: 1200px;
                padding: 0 3% 9px;
            }
        }

        .css-1dv1kvn {
            border: 0;
            -webkit-clip: rect(0 0 0 0);
            clip: rect(0 0 0 0);
            height: 1px;
            margin: -1px;
            overflow: hidden;
            padding: 0;
            position: absolute;
            width: 1px;
        }

        .css-uw59u {
            padding: 0px 20px;
        }

        @media (min-width: 740px) {
            .css-uw59u {
                padding: 0px 3%;
            }
        }

        @media (min-width: 1150px) {
            .css-uw59u {
                padding: 0px;
            }
        }

        .css-jxzr5i {
            display: flex;
            flex-flow: row;
        }

        .css-oylsik {
            display: block;
            height: 44px;
            vertical-align: middle;
            width: 184px;
        }

        .css-1otr2jl {
            margin: 18px 0px 0px auto;
        }

        .css-184m8ie {
            color: rgb(86, 123, 149);
            font-family: nyt-franklin, helvetica, arial, sans-serif;
            font-size: 11px;
            font-style: normal;
            font-weight: 400;
            line-height: 11px;
            text-decoration: none;
        }

        .css-qtw155 {
            display: block;
        }

        @media (min-width: 1150px) {
            .css-qtw155 {
                display: none;
            }
        }

        .css-1a5mdf6 {
            cursor: pointer;
            margin: 0px;
            border-top: 1px solid rgb(235, 235, 235);
            color: rgb(51, 51, 51);
            font-family: nyt-franklin, helvetica, arial, sans-serif;
            font-size: 13px;
            font-weight: 700;
            height: 44px;
            letter-spacing: 0.04rem;
            line-height: 44px;
            text-transform: uppercase;
        }

        .css-1hyfx7x {
            display: none;
        }

        .css-1gprdgz {
            list-style: none;
            margin: 0px;
            columns: auto 2;
            padding: 0px 0px 15px;
        }

        .css-10t7hia {
            height: 34px;
            line-height: 34px;
            list-style-type: none;
        }

        .css-e9w26l {
            color: rgb(51, 51, 51);
            display: block;
            font-family: nyt-franklin, helvetica, arial, sans-serif;
            font-size: 15px;
            font-weight: 500;
            height: 34px;
            line-height: 34px;
            text-decoration: none;
            text-transform: capitalize;
        }

        .css-v0l3hm {
            display: none;
        }

        @media (min-width: 1150px) {
            .css-v0l3hm {
                display: block;
            }
        }

        .css-g4gku8 {
            display: flex;
            margin-top: 10px;
            min-width: 600px;
        }

        .css-1rr4qq7 {
            flex: 1 1 0%;
        }

        .css-1onhbft {
            color: rgb(51, 51, 51);
            font-size: 13px;
            font-weight: 700;
            font-family: nyt-franklin, helvetica, arial, sans-serif;
            height: 25px;
            line-height: 15px;
            margin: 0px;
            text-transform: uppercase;
            width: 150px;
        }

        .css-1iruc8t {
            list-style: none;
            margin: 0px;
            padding: 0px;
        }

        .css-wbbhzv {
            color: rgb(0, 0, 0);
            display: inline-block;
            font-family: nyt-franklin, helvetica, arial, sans-serif;
            text-decoration: none;
            text-transform: capitalize;
            width: 150px;
            font-size: 14px;
            font-weight: 500;
            height: 23px;
            line-height: 16px;
        }

        .css-6xhk3s {
            border-left: 1px solid rgb(226, 226, 226);
            flex: 1 1 0%;
            padding-left: 15px;
        }

        .css-tj0ten {
            margin-bottom: 5px;
            white-space: nowrap;
        }

        .css-r5ic95 {
            display: inline-block;
            height: 13px;
            width: 13px;
            margin-right: 7px;
            vertical-align: middle;
        }

        .css-1jmp9xk {
            color: rgb(0, 0, 0);
            display: inline-block;
            font-family: nyt-franklin, helvetica, arial, sans-serif;
            text-decoration: none;
            text-transform: capitalize;
            width: 150px;
            font-size: 11px;
            font-weight: 500;
            height: 23px;
            line-height: 21px;
        }

        .css-6td9kr {
            list-style: none;
            margin: 2px 0px 0px;
            padding: 10px 0px 0px;
            border-top: 1px solid rgb(226, 226, 226);
        }

        .css-1e1s8k7 {
            font-size: 11px;
            text-align: center;
            padding-bottom: 25px;
        }

        @media (min-width: 1024px) {
            .css-1e1s8k7 {
                padding: 0 3% 9px;
            }
        }

        @media (min-width: 1150px) {
            .css-1e1s8k7 {
                margin: 0 auto;
                max-width: 1200px;
            }
        }

        .css-15uy5yv {
            border-top: 1px solid #ebebeb;
            padding-top: 9px;
        }

        .css-1ho5u4o {
            list-style: none;
            margin: 0 0 15px;
            padding: 0;
        }

        @media (min-width: 600px) {
            .css-1ho5u4o {
                display: inline-block;
            }
        }

        .css-jq1cx6 {
            color: #666;
            font-family: nyt-franklin,helvetica,arial,sans-serif;
            padding: 10px 0;
            -webkit-text-decoration: none;
            text-decoration: none;
            white-space: nowrap;
        }

        .css-13o0c9t {
            list-style: none;
            line-height: 8px;
            margin: 0 0 20px;
            padding: 0;
        }

        @media (min-width: 600px) {
            .css-13o0c9t {
                display: inline-block;
            }
        }

        .css-a7htku:first-child {
            border-left: none;
        }

        .css-a7htku {
            display: inline-block;
            line-height: 20px;
            padding: 0 10px;
        }

        .nyt-logo-attribution {
            margin: 0 0 35px;
        }




    </style>
</head>
<body>
    {{--<div class="NYTAppHideMasthead css-1r6wvpq e1suatyy0">
        <header class="css-1bymuyk e1suatyy1">
            <section class="css-ui9rw0 e1suatyy2">
                <div class="css-eph4ug er09x8g0">
                    <div class="css-6n7j50">
                        <button aria-haspopup="true" aria-expanded="false" aria-label="Sections Navigation &amp; Search"
                                class="er09x8g1 css-1uqx5yl" data-testid="nav-button" type="button">
                            <svg class="css-1fe7a5q" viewBox="0 0 16 16">
                                <rect x="1" y="3" fill="#333" width="14" height="2"></rect>
                                <rect x="1" y="7" fill="#333" width="14" height="2"></rect>
                                <rect x="1" y="11" fill="#333" width="14" height="2"></rect>
                            </svg>
                        </button>
                    </div>
                    <button id="desktop-sections-button" data-testid="desktop-section-button"
                            aria-label="Sections Navigation" class="css-1o0yzqm er09x8g2"><span
                            class="css-1dv1kvn">Sections</span>
                        <svg class="css-1fe7a5q" viewBox="0 0 16 16">
                            <rect x="1" y="3" fill="#333" width="14" height="2"></rect>
                            <rect x="1" y="7" fill="#333" width="14" height="2"></rect>
                            <rect x="1" y="11" fill="#333" width="14" height="2"></rect>
                        </svg>
                    </button>
                    <div class="css-10488qs">
                        <button class="css-fnhm75 ewfai8r0" data-test-id="search-button"><span
                                class="css-1dv1kvn">SEARCH</span>
                            <svg class="css-1fe7a5q" viewBox="0 0 16 16">
                                <path fill="#333"
                                      d="M11.3,9.2C11.7,8.4,12,7.5,12,6.5C12,3.5,9.5,1,6.5,1S1,3.5,1,6.5S3.5,12,6.5,12c1,0,1.9-0.3,2.7-0.7l3.3,3.3c0.3,0.3,0.7,0.4,1.1,0.4s0.8-0.1,1.1-0.4c0.6-0.6,0.6-1.5,0-2.1L11.3,9.2zM6.5,10.3c-2.1,0-3.8-1.7-3.8-3.8c0-2.1,1.7-3.8,3.8-3.8c2.1,0,3.8,1.7,3.8,3.8C10.3,8.6,8.6,10.3,6.5,10.3z"></path>
                            </svg>
                        </button>
                    </div>
                    <a class="css-1f8er69" href="#site-content">Skip to content</a><a class="css-1f8er69" href="#site-index">Skip to site index</a>
                </div>

                <div class="css-10698na e1huz5gh0">
                    <a data-testid="masthead-mobile-logo" aria-label="New York Times Logo. Click to visit the homepage" class="css-t66y1h e1huz5gh1" href="/">
                        <svg viewBox="0 0 184 25" fill="#000">
                            <path d="M13.8 2.9c0-2-1.9-2.5-3.4-2.5v.3c.9 0 1.6.3 1.6 1 0 .4-.3 1-1.2 1-.7 0-2.2-.4-3.3-.8C6.2 1.4 5 1 4 1 2 1 .6 2.5.6 4.2c0 1.5 1.1 2 1.5 2.2l.1-.2c-.2-.2-.5-.4-.5-1 0-.4.4-1.1 1.4-1.1.9 0 2.1.4 3.7.9 1.4.4 2.9.7 3.7.8v3.1L9 10.2v.1l1.5 1.3v4.3c-.8.5-1.7.6-2.5.6-1.5 0-2.8-.4-3.9-1.6l4.1-2V6l-5 2.2C3.6 6.9 4.7 6 5.8 5.4l-.1-.3c-3 .8-5.7 3.6-5.7 7 0 4 3.3 7 7 7 4 0 6.6-3.2 6.6-6.5h-.2c-.6 1.3-1.5 2.5-2.6 3.1v-4.1l1.6-1.3v-.1l-1.6-1.3V5.8c1.5 0 3-1 3-2.9zm-8.7 11l-1.2.6c-.7-.9-1.1-2.1-1.1-3.8 0-.7 0-1.5.2-2.1l2.1-.9v6.2zm10.6 2.3l-1.3 1 .2.2.6-.5 2.2 2 3-2-.1-.2-.8.5-1-1V9.4l.8-.6 1.7 1.4v6.1c0 3.8-.8 4.4-2.5 5v.3c2.8.1 5.4-.8 5.4-5.7V9.3l.9-.7-.2-.2-.8.6-2.5-2.1L18.5 9V.8h-.2l-3.5 2.4v.2c.4.2 1 .4 1 1.5l-.1 11.3zM34 15.1L31.5 17 29 15v-1.2l4.7-3.2v-.1l-2.4-3.6-5.2 2.8v6.6l-1 .8.2.2.9-.7 3.4 2.5 4.5-3.6-.1-.4zm-5-1.7V8.5l.2-.1 2.2 3.5-2.4 1.5zM53.1 2c0-.3-.1-.6-.2-.9h-.2c-.3.8-.7 1.2-1.7 1.2-.9 0-1.5-.5-1.9-.9l-2.9 3.3.2.2 1-.9c.6.5 1.1.9 2.5 1v8.3L44 3.2c-.5-.8-1.2-1.9-2.6-1.9-1.6 0-3 1.4-2.8 3.6h.3c.1-.6.4-1.3 1.1-1.3.5 0 1 .5 1.3 1v3.3c-1.8 0-3 .8-3 2.3 0 .8.4 2 1.6 2.3v-.2c-.2-.2-.3-.4-.3-.7 0-.5.4-.9 1.1-.9h.5v4.2c-2.1 0-3.8 1.2-3.8 3.2 0 1.9 1.6 2.8 3.4 2.7v-.2c-1.1-.1-1.6-.6-1.6-1.3 0-.9.6-1.3 1.4-1.3.8 0 1.5.5 2 1.1l2.9-3.2-.2-.2-.7.8c-1.1-1-1.7-1.3-3-1.5V5l8 14h.6V5c1.5-.1 2.9-1.3 2.9-3zm7.3 13.1L57.9 17l-2.5-2v-1.2l4.7-3.2v-.1l-2.4-3.6-5.2 2.8v6.6l-1 .8.2.2.9-.7 3.4 2.5 4.5-3.6-.1-.4zm-5-1.7V8.5l.2-.1 2.2 3.5-2.4 1.5zM76.7 8l-.7.5-1.9-1.6-2.2 2 .9.9v7.5l-2.4-1.5V9.6l.8-.5-2.3-2.2-2.2 2 .9.9V17l-.3.2-2.1-1.5v-6c0-1.4-.7-1.8-1.5-2.3-.7-.5-1.1-.8-1.1-1.5 0-.6.6-.9.9-1.1v-.2c-.8 0-2.9.8-2.9 2.7 0 1 .5 1.4 1 1.9s1 .9 1 1.8v5.8l-1.1.8.2.2 1-.8 2.3 2 2.5-1.7 2.8 1.7 5.3-3.1V9.2l1.3-1-.2-.2zm18.6-5.5l-1 .9-2.2-2-3.3 2.4V1.6h-.3l.1 16.2c-.3 0-1.2-.2-1.9-.4l-.2-13.5c0-1-.7-2.4-2.5-2.4s-3 1.4-3 2.8h.3c.1-.6.4-1.1 1-1.1s1.1.4 1.1 1.7v3.9c-1.8.1-2.9 1.1-2.9 2.4 0 .8.4 2 1.6 2V13c-.4-.2-.5-.5-.5-.7 0-.6.5-.8 1.3-.8h.4v6.2c-1.5.5-2.1 1.6-2.1 2.8 0 1.7 1.3 2.9 3.3 2.9 1.4 0 2.6-.2 3.8-.5 1-.2 2.3-.5 2.9-.5.8 0 1.1.4 1.1.9 0 .7-.3 1-.7 1.1v.2c1.6-.3 2.6-1.3 2.6-2.8s-1.5-2.4-3.1-2.4c-.8 0-2.5.3-3.7.5-1.4.3-2.8.5-3.2.5-.7 0-1.5-.3-1.5-1.3 0-.8.7-1.5 2.4-1.5.9 0 2 .1 3.1.4 1.2.3 2.3.6 3.3.6 1.5 0 2.8-.5 2.8-2.6V3.7l1.2-1-.2-.2zm-4.1 6.1c-.3.3-.7.6-1.2.6s-1-.3-1.2-.6V4.2l1-.7 1.4 1.3v3.8zm0 3c-.2-.2-.7-.5-1.2-.5s-1 .3-1.2.5V9c.2.2.7.5 1.2.5s1-.3 1.2-.5v2.6zm0 4.7c0 .8-.5 1.6-1.6 1.6h-.8V12c.2-.2.7-.5 1.2-.5s.9.3 1.2.5v4.3zm13.7-7.1l-3.2-2.3-4.9 2.8v6.5l-1 .8.1.2.8-.6 3.2 2.4 5-3V9.2zm-5.4 6.3V8.3l2.5 1.8v7.1l-2.5-1.7zm14.9-8.4h-.2c-.3.2-.6.4-.9.4-.4 0-.9-.2-1.1-.5h-.2l-1.7 1.9-1.7-1.9-3 2 .1.2.8-.5 1 1.1v6.3l-1.3 1 .2.2.6-.5 2.4 2 3.1-2.1-.1-.2-.9.5-1.2-1V9c.5.5 1.1 1 1.8 1 1.4.1 2.2-1.3 2.3-2.9zm12 9.6L123 19l-4.6-7 3.3-5.1h.2c.4.4 1 .8 1.7.8s1.2-.4 1.5-.8h.2c-.1 2-1.5 3.2-2.5 3.2s-1.5-.5-2.1-.8l-.3.5 5 7.4 1-.6v.1zm-11-.5l-1.3 1 .2.2.6-.5 2.2 2 3-2-.2-.2-.8.5-1-1V.8h-.1l-3.6 2.4v.2c.4.2 1 .3 1 1.5v11.3zM143 2.9c0-2-1.9-2.5-3.4-2.5v.3c.9 0 1.6.3 1.6 1 0 .4-.3 1-1.2 1-.7 0-2.2-.4-3.3-.8-1.3-.4-2.5-.8-3.5-.8-2 0-3.4 1.5-3.4 3.2 0 1.5 1.1 2 1.5 2.2l.1-.2c-.3-.2-.6-.4-.6-1 0-.4.4-1.1 1.4-1.1.9 0 2.1.4 3.7.9 1.4.4 2.9.7 3.7.8V9l-1.5 1.3v.1l1.5 1.3V16c-.8.5-1.7.6-2.5.6-1.5 0-2.8-.4-3.9-1.6l4.1-2V6l-5 2.2c.5-1.3 1.6-2.2 2.6-2.9l-.1-.2c-3 .8-5.7 3.5-5.7 6.9 0 4 3.3 7 7 7 4 0 6.6-3.2 6.6-6.5h-.2c-.6 1.3-1.5 2.5-2.6 3.1v-4.1l1.6-1.3v-.1L140 8.8v-3c1.5 0 3-1 3-2.9zm-8.7 11l-1.2.6c-.7-.9-1.1-2.1-1.1-3.8 0-.7.1-1.5.3-2.1l2.1-.9-.1 6.2zm12.2-12h-.1l-2 1.7v.1l1.7 1.9h.2l2-1.7v-.1l-1.8-1.9zm3 14.8l-.8.5-1-1V9.3l1-.7-.2-.2-.7.6-1.8-2.1-2.9 2 .2.3.7-.5.9 1.1v6.5l-1.3 1 .1.2.7-.5 2.2 2 3-2-.1-.3zm16.7-.1l-.7.5-1.1-1V9.3l1-.8-.2-.2-.8.7-2.3-2.1-3 2.1-2.3-2.1L154 9l-1.8-2.1-2.9 2 .1.3.7-.5 1 1.1v6.5l-.8.8 2.3 1.9 2.2-2-.9-.9V9.3l.9-.6 1.5 1.4v6l-.8.8 2.3 1.9 2.2-2-.9-.9V9.3l.8-.5 1.6 1.4v6l-.7.7 2.3 2.1 3.1-2.1v-.3zm8.7-1.5l-2.5 1.9-2.5-2v-1.2l4.7-3.2v-.1l-2.4-3.6-5.2 2.8v6.8l3.5 2.5 4.5-3.6-.1-.3zm-5-1.7V8.5l.2-.1 2.2 3.5-2.4 1.5zm14.1-.9l-1.9-1.5c1.3-1.1 1.8-2.6 1.8-3.6v-.6h-.2c-.2.5-.6 1-1.4 1-.8 0-1.3-.4-1.8-1L176 9.3v3.6l1.7 1.3c-1.7 1.5-2 2.5-2 3.3 0 1 .5 1.7 1.3 2l.1-.2c-.2-.2-.4-.3-.4-.8 0-.3.4-.8 1.2-.8 1 0 1.6.7 1.9 1l4.3-2.6v-3.6h-.1zm-1.1-3c-.7 1.2-2.2 2.4-3.1 3l-1.1-.9V8.1c.4 1 1.5 1.8 2.6 1.8.7 0 1.1-.1 1.6-.4zm-1.7 8c-.5-1.1-1.7-1.9-2.9-1.9-.3 0-1.1 0-1.9.5.5-.8 1.8-2.2 3.5-3.2l1.2 1 .1 3.6z"></path>
                        </svg>
                    </a>
                </div>



            </section>
        </header>
    </div>--}}

    <main id="site-content">
        <div class="css-1v9sdfx">
            <div class="css-1wa7u5r">

                <header class="css-1j8bfih">
                    <h1 class="css-kicrxn">NYTNotifier</h1>
                    <div class="css-1op6wzy">Get notified every time the New York Times publishes a story.</div>

                    <div class="css-7uzm1n ez4a0qj1">
                        <a href="{{ url('/') }}" class="css-1kj7lfb">
                            <button data-testid="login-button" class="css-13xu0ly ez4a0qj0">Refresh</button>
                        </a>{{--
                    <div class="css-6n7j50">
                        <button aria-haspopup="true" aria-expanded="false" aria-label="Account" class="ez4a0qj4 css-1o2c7rh"
                                data-testid="user-settings-button" type="button">
                            <svg class="css-10m9xeu" viewBox="0 0 16 16" fill="#333">
                                <path d="M8,10c-2.5,0-7,1.1-7,3.5V16h14v-2.5C15,11.1,10.5,10,8,10z"></path>
                                <circle cx="8" cy="4" r="4"></circle>
                            </svg>
                        </button>
                    </div>--}}
                    </div>
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

                </div>
            </div>
        </div>
    </main>

    <nav class="css-kdur8l" id="site-index" aria-labelledby="site-index-label" data-testid="site-index">
        <h2 class="css-1dv1kvn" id="site-index-label">Site Index</h2>
        <div class="css-uw59u">
            <header class="css-jxzr5i" data-testid="site-index-header">
                <a aria-label="New York Times" href="/">
                    <svg class="css-oylsik" viewBox="0 0 184 25" fill="#000">
                        <path d="M13.8 2.9c0-2-1.9-2.5-3.4-2.5v.3c.9 0 1.6.3 1.6 1 0 .4-.3 1-1.2 1-.7 0-2.2-.4-3.3-.8C6.2 1.4 5 1 4 1 2 1 .6 2.5.6 4.2c0 1.5 1.1 2 1.5 2.2l.1-.2c-.2-.2-.5-.4-.5-1 0-.4.4-1.1 1.4-1.1.9 0 2.1.4 3.7.9 1.4.4 2.9.7 3.7.8v3.1L9 10.2v.1l1.5 1.3v4.3c-.8.5-1.7.6-2.5.6-1.5 0-2.8-.4-3.9-1.6l4.1-2V6l-5 2.2C3.6 6.9 4.7 6 5.8 5.4l-.1-.3c-3 .8-5.7 3.6-5.7 7 0 4 3.3 7 7 7 4 0 6.6-3.2 6.6-6.5h-.2c-.6 1.3-1.5 2.5-2.6 3.1v-4.1l1.6-1.3v-.1l-1.6-1.3V5.8c1.5 0 3-1 3-2.9zm-8.7 11l-1.2.6c-.7-.9-1.1-2.1-1.1-3.8 0-.7 0-1.5.2-2.1l2.1-.9v6.2zm10.6 2.3l-1.3 1 .2.2.6-.5 2.2 2 3-2-.1-.2-.8.5-1-1V9.4l.8-.6 1.7 1.4v6.1c0 3.8-.8 4.4-2.5 5v.3c2.8.1 5.4-.8 5.4-5.7V9.3l.9-.7-.2-.2-.8.6-2.5-2.1L18.5 9V.8h-.2l-3.5 2.4v.2c.4.2 1 .4 1 1.5l-.1 11.3zM34 15.1L31.5 17 29 15v-1.2l4.7-3.2v-.1l-2.4-3.6-5.2 2.8v6.6l-1 .8.2.2.9-.7 3.4 2.5 4.5-3.6-.1-.4zm-5-1.7V8.5l.2-.1 2.2 3.5-2.4 1.5zM53.1 2c0-.3-.1-.6-.2-.9h-.2c-.3.8-.7 1.2-1.7 1.2-.9 0-1.5-.5-1.9-.9l-2.9 3.3.2.2 1-.9c.6.5 1.1.9 2.5 1v8.3L44 3.2c-.5-.8-1.2-1.9-2.6-1.9-1.6 0-3 1.4-2.8 3.6h.3c.1-.6.4-1.3 1.1-1.3.5 0 1 .5 1.3 1v3.3c-1.8 0-3 .8-3 2.3 0 .8.4 2 1.6 2.3v-.2c-.2-.2-.3-.4-.3-.7 0-.5.4-.9 1.1-.9h.5v4.2c-2.1 0-3.8 1.2-3.8 3.2 0 1.9 1.6 2.8 3.4 2.7v-.2c-1.1-.1-1.6-.6-1.6-1.3 0-.9.6-1.3 1.4-1.3.8 0 1.5.5 2 1.1l2.9-3.2-.2-.2-.7.8c-1.1-1-1.7-1.3-3-1.5V5l8 14h.6V5c1.5-.1 2.9-1.3 2.9-3zm7.3 13.1L57.9 17l-2.5-2v-1.2l4.7-3.2v-.1l-2.4-3.6-5.2 2.8v6.6l-1 .8.2.2.9-.7 3.4 2.5 4.5-3.6-.1-.4zm-5-1.7V8.5l.2-.1 2.2 3.5-2.4 1.5zM76.7 8l-.7.5-1.9-1.6-2.2 2 .9.9v7.5l-2.4-1.5V9.6l.8-.5-2.3-2.2-2.2 2 .9.9V17l-.3.2-2.1-1.5v-6c0-1.4-.7-1.8-1.5-2.3-.7-.5-1.1-.8-1.1-1.5 0-.6.6-.9.9-1.1v-.2c-.8 0-2.9.8-2.9 2.7 0 1 .5 1.4 1 1.9s1 .9 1 1.8v5.8l-1.1.8.2.2 1-.8 2.3 2 2.5-1.7 2.8 1.7 5.3-3.1V9.2l1.3-1-.2-.2zm18.6-5.5l-1 .9-2.2-2-3.3 2.4V1.6h-.3l.1 16.2c-.3 0-1.2-.2-1.9-.4l-.2-13.5c0-1-.7-2.4-2.5-2.4s-3 1.4-3 2.8h.3c.1-.6.4-1.1 1-1.1s1.1.4 1.1 1.7v3.9c-1.8.1-2.9 1.1-2.9 2.4 0 .8.4 2 1.6 2V13c-.4-.2-.5-.5-.5-.7 0-.6.5-.8 1.3-.8h.4v6.2c-1.5.5-2.1 1.6-2.1 2.8 0 1.7 1.3 2.9 3.3 2.9 1.4 0 2.6-.2 3.8-.5 1-.2 2.3-.5 2.9-.5.8 0 1.1.4 1.1.9 0 .7-.3 1-.7 1.1v.2c1.6-.3 2.6-1.3 2.6-2.8s-1.5-2.4-3.1-2.4c-.8 0-2.5.3-3.7.5-1.4.3-2.8.5-3.2.5-.7 0-1.5-.3-1.5-1.3 0-.8.7-1.5 2.4-1.5.9 0 2 .1 3.1.4 1.2.3 2.3.6 3.3.6 1.5 0 2.8-.5 2.8-2.6V3.7l1.2-1-.2-.2zm-4.1 6.1c-.3.3-.7.6-1.2.6s-1-.3-1.2-.6V4.2l1-.7 1.4 1.3v3.8zm0 3c-.2-.2-.7-.5-1.2-.5s-1 .3-1.2.5V9c.2.2.7.5 1.2.5s1-.3 1.2-.5v2.6zm0 4.7c0 .8-.5 1.6-1.6 1.6h-.8V12c.2-.2.7-.5 1.2-.5s.9.3 1.2.5v4.3zm13.7-7.1l-3.2-2.3-4.9 2.8v6.5l-1 .8.1.2.8-.6 3.2 2.4 5-3V9.2zm-5.4 6.3V8.3l2.5 1.8v7.1l-2.5-1.7zm14.9-8.4h-.2c-.3.2-.6.4-.9.4-.4 0-.9-.2-1.1-.5h-.2l-1.7 1.9-1.7-1.9-3 2 .1.2.8-.5 1 1.1v6.3l-1.3 1 .2.2.6-.5 2.4 2 3.1-2.1-.1-.2-.9.5-1.2-1V9c.5.5 1.1 1 1.8 1 1.4.1 2.2-1.3 2.3-2.9zm12 9.6L123 19l-4.6-7 3.3-5.1h.2c.4.4 1 .8 1.7.8s1.2-.4 1.5-.8h.2c-.1 2-1.5 3.2-2.5 3.2s-1.5-.5-2.1-.8l-.3.5 5 7.4 1-.6v.1zm-11-.5l-1.3 1 .2.2.6-.5 2.2 2 3-2-.2-.2-.8.5-1-1V.8h-.1l-3.6 2.4v.2c.4.2 1 .3 1 1.5v11.3zM143 2.9c0-2-1.9-2.5-3.4-2.5v.3c.9 0 1.6.3 1.6 1 0 .4-.3 1-1.2 1-.7 0-2.2-.4-3.3-.8-1.3-.4-2.5-.8-3.5-.8-2 0-3.4 1.5-3.4 3.2 0 1.5 1.1 2 1.5 2.2l.1-.2c-.3-.2-.6-.4-.6-1 0-.4.4-1.1 1.4-1.1.9 0 2.1.4 3.7.9 1.4.4 2.9.7 3.7.8V9l-1.5 1.3v.1l1.5 1.3V16c-.8.5-1.7.6-2.5.6-1.5 0-2.8-.4-3.9-1.6l4.1-2V6l-5 2.2c.5-1.3 1.6-2.2 2.6-2.9l-.1-.2c-3 .8-5.7 3.5-5.7 6.9 0 4 3.3 7 7 7 4 0 6.6-3.2 6.6-6.5h-.2c-.6 1.3-1.5 2.5-2.6 3.1v-4.1l1.6-1.3v-.1L140 8.8v-3c1.5 0 3-1 3-2.9zm-8.7 11l-1.2.6c-.7-.9-1.1-2.1-1.1-3.8 0-.7.1-1.5.3-2.1l2.1-.9-.1 6.2zm12.2-12h-.1l-2 1.7v.1l1.7 1.9h.2l2-1.7v-.1l-1.8-1.9zm3 14.8l-.8.5-1-1V9.3l1-.7-.2-.2-.7.6-1.8-2.1-2.9 2 .2.3.7-.5.9 1.1v6.5l-1.3 1 .1.2.7-.5 2.2 2 3-2-.1-.3zm16.7-.1l-.7.5-1.1-1V9.3l1-.8-.2-.2-.8.7-2.3-2.1-3 2.1-2.3-2.1L154 9l-1.8-2.1-2.9 2 .1.3.7-.5 1 1.1v6.5l-.8.8 2.3 1.9 2.2-2-.9-.9V9.3l.9-.6 1.5 1.4v6l-.8.8 2.3 1.9 2.2-2-.9-.9V9.3l.8-.5 1.6 1.4v6l-.7.7 2.3 2.1 3.1-2.1v-.3zm8.7-1.5l-2.5 1.9-2.5-2v-1.2l4.7-3.2v-.1l-2.4-3.6-5.2 2.8v6.8l3.5 2.5 4.5-3.6-.1-.3zm-5-1.7V8.5l.2-.1 2.2 3.5-2.4 1.5zm14.1-.9l-1.9-1.5c1.3-1.1 1.8-2.6 1.8-3.6v-.6h-.2c-.2.5-.6 1-1.4 1-.8 0-1.3-.4-1.8-1L176 9.3v3.6l1.7 1.3c-1.7 1.5-2 2.5-2 3.3 0 1 .5 1.7 1.3 2l.1-.2c-.2-.2-.4-.3-.4-.8 0-.3.4-.8 1.2-.8 1 0 1.6.7 1.9 1l4.3-2.6v-3.6h-.1zm-1.1-3c-.7 1.2-2.2 2.4-3.1 3l-1.1-.9V8.1c.4 1 1.5 1.8 2.6 1.8.7 0 1.1-.1 1.6-.4zm-1.7 8c-.5-1.1-1.7-1.9-2.9-1.9-.3 0-1.1 0-1.9.5.5-.8 1.8-2.2 3.5-3.2l1.2 1 .1 3.6z"></path>
                    </svg>
                </a>
                <div class="css-1otr2jl" data-testid="go-to-homepage">
                    <a class="css-184m8ie" href="/">Go to Home Page »</a>
                </div>
            </header>

            <div class="css-qtw155" data-testid="site-index-accordion">
                <div class=" " role="tablist" aria-multiselectable="true" data-testid="accordion">
                    <div class="" data-testid="accordion-item">
                        <header aria-controls="body-siteindex-0" id="item-siteindex-0" class="css-1a5mdf6" role="tab"
                                tabindex="0" aria-expanded="false" data-testid="accordion-item-header">news
                        </header>
                        <div class="css-1hyfx7x" id="body-siteindex-0" aria-labelledby="item-siteindex-0"
                             role="tabpanel" data-testid="accordion-item-body">
                            <ul class="css-1gprdgz" data-testid="site-index-accordion-list">
                                <li class="css-10t7hia"><a class="css-e9w26l" href="https://www.nytimes.com"
                                                           data-testid="accordion-item-list-link">Home Page</a></li>
                                <li class="css-10t7hia"><a class="css-e9w26l"
                                                           href="https://www.nytimes.com/section/world"
                                                           data-testid="accordion-item-list-link">World</a></li>
                                <li class="css-10t7hia"><a class="css-e9w26l" href="https://www.nytimes.com/section/us"
                                                           data-testid="accordion-item-list-link">U.S.</a></li>
                                <li class="css-10t7hia"><a class="css-e9w26l"
                                                           href="https://www.nytimes.com/section/politics"
                                                           data-testid="accordion-item-list-link">Politics</a></li>
                                <li class="css-10t7hia"><a class="css-e9w26l"
                                                           href="https://www.nytimes.com/interactive/2020/11/03/us/elections/results-president.html"
                                                           data-testid="accordion-item-list-link">Election Results</a>
                                </li>
                                <li class="css-10t7hia"><a class="css-e9w26l"
                                                           href="https://www.nytimes.com/section/nyregion"
                                                           data-testid="accordion-item-list-link">New York</a></li>
                                <li class="css-10t7hia"><a class="css-e9w26l"
                                                           href="https://www.nytimes.com/section/business"
                                                           data-testid="accordion-item-list-link">Business</a></li>
                                <li class="css-10t7hia"><a class="css-e9w26l"
                                                           href="https://www.nytimes.com/section/technology"
                                                           data-testid="accordion-item-list-link">Tech</a></li>
                                <li class="css-10t7hia"><a class="css-e9w26l"
                                                           href="https://www.nytimes.com/section/science"
                                                           data-testid="accordion-item-list-link">Science</a></li>
                                <li class="css-10t7hia smartphone"><a class="css-e9w26l"
                                                                      href="https://www.nytimes.com/section/climate"
                                                                      data-testid="accordion-item-list-link">Climate</a>
                                </li>
                                <li class="css-10t7hia"><a class="css-e9w26l"
                                                           href="https://www.nytimes.com/section/sports"
                                                           data-testid="accordion-item-list-link">Sports</a></li>
                                <li class="css-10t7hia"><a class="css-e9w26l"
                                                           href="https://www.nytimes.com/section/obituaries"
                                                           data-testid="accordion-item-list-link">Obituaries</a></li>
                                <li class="css-10t7hia smartphone"><a class="css-e9w26l"
                                                                      href="https://www.nytimes.com/section/upshot"
                                                                      data-testid="accordion-item-list-link">The
                                        Upshot</a></li>
                                <li class="css-10t7hia smartphone"><a class="css-e9w26l"
                                                                      href="https://www.nytimes.com/international/?action=click&amp;region=MobileNav&amp;pgtype=Homepage"
                                                                      data-testid="accordion-item-list-link">International</a>
                                </li>
                                <li class="css-10t7hia smartphone"><a class="css-e9w26l"
                                                                      href="https://www.nytimes.com/ca/?action=click&amp;region=MobileNav&amp;pgtype=Homepage"
                                                                      data-testid="accordion-item-list-link">Canada</a>
                                </li>
                                <li class="css-10t7hia smartphone"><a class="css-e9w26l"
                                                                      href="https://www.nytimes.com/es/"
                                                                      data-testid="accordion-item-list-link">Español</a>
                                </li>
                                <li class="css-10t7hia smartphone"><a class="css-e9w26l" href="https://cn.nytimes.com/"
                                                                      data-testid="accordion-item-list-link">中文网</a>
                                </li>
                                <li class="css-10t7hia"><a class="css-e9w26l"
                                                           href="https://www.nytimes.com/section/todayspaper"
                                                           data-testid="accordion-item-list-link">Today's Paper</a></li>
                                <li class="css-10t7hia"><a class="css-e9w26l"
                                                           href="https://www.nytimes.com/section/corrections"
                                                           data-testid="accordion-item-list-link">Corrections</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="" data-testid="accordion-item">
                        <header aria-controls="body-siteindex-1" id="item-siteindex-1" class="css-1a5mdf6" role="tab"
                                tabindex="0" aria-expanded="false" data-testid="accordion-item-header">Opinion
                        </header>
                        <div class="css-1hyfx7x" id="body-siteindex-1" aria-labelledby="item-siteindex-1"
                             role="tabpanel" data-testid="accordion-item-body">
                            <ul class="css-1gprdgz" data-testid="site-index-accordion-list">
                                <li class="css-10t7hia"><a class="css-e9w26l"
                                                           href="https://www.nytimes.com/section/opinion"
                                                           data-testid="accordion-item-list-link">Today's Opinion</a>
                                </li>
                                <li class="css-10t7hia"><a class="css-e9w26l"
                                                           href="https://www.nytimes.com/section/opinion/columnists"
                                                           data-testid="accordion-item-list-link">Op-Ed Columnists</a>
                                </li>
                                <li class="css-10t7hia"><a class="css-e9w26l"
                                                           href="https://www.nytimes.com/section/opinion/editorials"
                                                           data-testid="accordion-item-list-link">Editorials</a></li>
                                <li class="css-10t7hia"><a class="css-e9w26l"
                                                           href="https://www.nytimes.com/section/opinion/contributors"
                                                           data-testid="accordion-item-list-link">Op-Ed Contributors</a>
                                </li>
                                <li class="css-10t7hia"><a class="css-e9w26l"
                                                           href="https://www.nytimes.com/section/opinion/letters"
                                                           data-testid="accordion-item-list-link">Letters</a></li>
                                <li class="css-10t7hia"><a class="css-e9w26l"
                                                           href="https://www.nytimes.com/section/opinion/sunday"
                                                           data-testid="accordion-item-list-link">Sunday Review</a></li>
                                <li class="css-10t7hia"><a class="css-e9w26l"
                                                           href="https://www.nytimes.com/video/opinion"
                                                           data-testid="accordion-item-list-link">Video: Opinion</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="" data-testid="accordion-item">
                        <header aria-controls="body-siteindex-2" id="item-siteindex-2" class="css-1a5mdf6" role="tab"
                                tabindex="0" aria-expanded="false" data-testid="accordion-item-header">Arts
                        </header>
                        <div class="css-1hyfx7x" id="body-siteindex-2" aria-labelledby="item-siteindex-2"
                             role="tabpanel" data-testid="accordion-item-body">
                            <ul class="css-1gprdgz" data-testid="site-index-accordion-list">
                                <li class="css-10t7hia"><a class="css-e9w26l"
                                                           href="https://www.nytimes.com/section/arts"
                                                           data-testid="accordion-item-list-link">Today's Arts</a></li>
                                <li class="css-10t7hia"><a class="css-e9w26l"
                                                           href="https://www.nytimes.com/section/arts/design"
                                                           data-testid="accordion-item-list-link">Art &amp; Design</a>
                                </li>
                                <li class="css-10t7hia"><a class="css-e9w26l"
                                                           href="https://www.nytimes.com/section/books"
                                                           data-testid="accordion-item-list-link">Books</a></li>
                                <li class="css-10t7hia"><a class="css-e9w26l"
                                                           href="https://www.nytimes.com/section/arts/dance"
                                                           data-testid="accordion-item-list-link">Dance</a></li>
                                <li class="css-10t7hia"><a class="css-e9w26l"
                                                           href="https://www.nytimes.com/section/movies"
                                                           data-testid="accordion-item-list-link">Movies</a></li>
                                <li class="css-10t7hia"><a class="css-e9w26l"
                                                           href="https://www.nytimes.com/section/arts/music"
                                                           data-testid="accordion-item-list-link">Music</a></li>
                                <li class="css-10t7hia"><a class="css-e9w26l"
                                                           href="https://www.nytimes.com/spotlight/pop-culture"
                                                           data-testid="accordion-item-list-link">Pop Culture</a></li>
                                <li class="css-10t7hia"><a class="css-e9w26l"
                                                           href="https://www.nytimes.com/section/arts/television"
                                                           data-testid="accordion-item-list-link">Television</a></li>
                                <li class="css-10t7hia"><a class="css-e9w26l"
                                                           href="https://www.nytimes.com/section/theater"
                                                           data-testid="accordion-item-list-link">Theater</a></li>
                                <li class="css-10t7hia smartphone"><a class="css-e9w26l"
                                                                      href="https://www.nytimes.com/spotlight/what-to-watch"
                                                                      data-testid="accordion-item-list-link">What to
                                        Watch</a></li>
                                <li class="css-10t7hia"><a class="css-e9w26l" href="https://www.nytimes.com/video/arts"
                                                           data-testid="accordion-item-list-link">Video: Arts</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="" data-testid="accordion-item">
                        <header aria-controls="body-siteindex-3" id="item-siteindex-3" class="css-1a5mdf6" role="tab"
                                tabindex="0" aria-expanded="false" data-testid="accordion-item-header">Living
                        </header>
                        <div class="css-1hyfx7x" id="body-siteindex-3" aria-labelledby="item-siteindex-3"
                             role="tabpanel" data-testid="accordion-item-body">
                            <ul class="css-1gprdgz" data-testid="site-index-accordion-list">
                                <li class="css-10t7hia"><a class="css-e9w26l"
                                                           href="https://www.nytimes.com/spotlight/at-home"
                                                           data-testid="accordion-item-list-link">At Home</a></li>
                                <li class="css-10t7hia"><a class="css-e9w26l"
                                                           href="https://www.nytimes.com/section/automobiles"
                                                           data-testid="accordion-item-list-link">Automobiles</a></li>
                                <li class="css-10t7hia"><a class="css-e9w26l" href="https://www.nytimes.com/games"
                                                           data-testid="accordion-item-list-link">Games</a></li>
                                <li class="css-10t7hia"><a class="css-e9w26l"
                                                           href="https://www.nytimes.com/section/education"
                                                           data-testid="accordion-item-list-link">Education</a></li>
                                <li class="css-10t7hia"><a class="css-e9w26l"
                                                           href="https://www.nytimes.com/section/food"
                                                           data-testid="accordion-item-list-link">Food</a></li>
                                <li class="css-10t7hia"><a class="css-e9w26l"
                                                           href="https://www.nytimes.com/section/health"
                                                           data-testid="accordion-item-list-link">Health</a></li>
                                <li class="css-10t7hia"><a class="css-e9w26l"
                                                           href="https://www.nytimes.com/section/jobs"
                                                           data-testid="accordion-item-list-link">Jobs</a></li>
                                <li class="css-10t7hia"><a class="css-e9w26l"
                                                           href="https://www.nytimes.com/section/fashion/weddings"
                                                           data-testid="accordion-item-list-link">Love</a></li>
                                <li class="css-10t7hia"><a class="css-e9w26l"
                                                           href="https://www.nytimes.com/section/magazine"
                                                           data-testid="accordion-item-list-link">Magazine</a></li>
                                <li class="css-10t7hia"><a class="css-e9w26l"
                                                           href="https://www.nytimes.com/section/parenting"
                                                           data-testid="accordion-item-list-link">Parenting</a></li>
                                <li class="css-10t7hia"><a class="css-e9w26l"
                                                           href="https://www.nytimes.com/section/realestate"
                                                           data-testid="accordion-item-list-link">Real Estate</a></li>
                                <li class="css-10t7hia"><a class="css-e9w26l" href="https://cooking.nytimes.com/"
                                                           data-testid="accordion-item-list-link">Recipes</a></li>
                                <li class="css-10t7hia"><a class="css-e9w26l"
                                                           href="https://www.nytimes.com/section/style"
                                                           data-testid="accordion-item-list-link">Style</a></li>
                                <li class="css-10t7hia"><a class="css-e9w26l"
                                                           href="https://www.nytimes.com/section/t-magazine"
                                                           data-testid="accordion-item-list-link">T Magazine</a></li>
                                <li class="css-10t7hia"><a class="css-e9w26l"
                                                           href="https://www.nytimes.com/section/travel"
                                                           data-testid="accordion-item-list-link">Travel</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="" data-testid="accordion-item">
                        <header aria-controls="body-siteindex-4" id="item-siteindex-4" class="css-1a5mdf6" role="tab"
                                tabindex="0" aria-expanded="false" data-testid="accordion-item-header">Listings &amp;
                            More
                        </header>
                        <div class="css-1hyfx7x" id="body-siteindex-4" aria-labelledby="item-siteindex-4"
                             role="tabpanel" data-testid="accordion-item-body">
                            <ul class="css-1gprdgz" data-testid="site-index-accordion-list">
                                <li class="css-10t7hia"><a class="css-e9w26l"
                                                           href="https://www.nytimes.com/section/reader-center"
                                                           data-testid="accordion-item-list-link">Reader Center</a></li>
                                <li class="css-10t7hia"><a class="css-e9w26l" href="https://www.nytimes.com/wirecutter/"
                                                           data-testid="accordion-item-list-link">Wirecutter</a></li>
                                <li class="css-10t7hia"><a class="css-e9w26l" href="https://timesevents.nytimes.com/"
                                                           data-testid="accordion-item-list-link">Live Events</a></li>
                                <li class="css-10t7hia"><a class="css-e9w26l"
                                                           href="https://www.nytimes.com/section/learning"
                                                           data-testid="accordion-item-list-link">The Learning
                                        Network</a></li>
                                <li class="css-10t7hia"><a class="css-e9w26l"
                                                           href="http://www.nytimes.com/marketing/tools-and-services"
                                                           data-testid="accordion-item-list-link">Tools &amp;
                                        Services</a></li>
                                <li class="css-10t7hia"><a class="css-e9w26l"
                                                           href="https://www.nytimes.com/section/multimedia"
                                                           data-testid="accordion-item-list-link">Multimedia</a></li>
                                <li class="css-10t7hia"><a class="css-e9w26l"
                                                           href="https://www.nytimes.com/section/lens"
                                                           data-testid="accordion-item-list-link">Photography</a></li>
                                <li class="css-10t7hia"><a class="css-e9w26l" href="https://www.nytimes.com/video"
                                                           data-testid="accordion-item-list-link">Video</a></li>
                                <li class="css-10t7hia"><a class="css-e9w26l" href="https://www.nytimes.com/newsletters"
                                                           data-testid="accordion-item-list-link">Newsletters</a></li>
                                <li class="css-10t7hia"><a class="css-e9w26l"
                                                           href="https://timesmachine.nytimes.com/browser"
                                                           data-testid="accordion-item-list-link">TimesMachine</a></li>
                                <li class="css-10t7hia"><a class="css-e9w26l" href="https://store.nytimes.com/"
                                                           data-testid="accordion-item-list-link">NYT Store</a></li>
                                <li class="css-10t7hia"><a class="css-e9w26l"
                                                           href="https://www.nytimes.com/times-journeys"
                                                           data-testid="accordion-item-list-link">Times Journeys</a>
                                </li>
                                <li class="css-10t7hia"><a class="css-e9w26l" href="https://myaccount.nytimes.com/seg"
                                                           data-testid="accordion-item-list-link">Manage My Account</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="css-v0l3hm" data-testid="site-index-sections">
                <div class="css-g4gku8" data-testid="site-index-section">
                    <section class="css-1rr4qq7" aria-labelledby="site-index-section-label-0"><h3 class="css-1onhbft"
                                                                                                  id="site-index-section-label-0">
                            news</h3>
                        <ul class="css-1iruc8t" data-testid="site-index-section-list">
                            <li class="css-ist4u3"><a class="css-wbbhzv" href="https://www.nytimes.com"
                                                      data-testid="site-index-section-list-link">Home Page</a></li>
                            <li class="css-ist4u3"><a class="css-wbbhzv" href="https://www.nytimes.com/section/world"
                                                      data-testid="site-index-section-list-link">World</a></li>
                            <li class="css-ist4u3"><a class="css-wbbhzv" href="https://www.nytimes.com/section/us"
                                                      data-testid="site-index-section-list-link">U.S.</a></li>
                            <li class="css-ist4u3"><a class="css-wbbhzv" href="https://www.nytimes.com/section/politics"
                                                      data-testid="site-index-section-list-link">Politics</a></li>
                            <li class="css-ist4u3"><a class="css-wbbhzv"
                                                      href="https://www.nytimes.com/interactive/2020/11/03/us/elections/results-president.html"
                                                      data-testid="site-index-section-list-link">Election Results</a>
                            </li>
                            <li class="css-ist4u3"><a class="css-wbbhzv" href="https://www.nytimes.com/section/nyregion"
                                                      data-testid="site-index-section-list-link">New York</a></li>
                            <li class="css-ist4u3"><a class="css-wbbhzv" href="https://www.nytimes.com/section/business"
                                                      data-testid="site-index-section-list-link">Business</a></li>
                            <li class="css-ist4u3"><a class="css-wbbhzv"
                                                      href="https://www.nytimes.com/section/technology"
                                                      data-testid="site-index-section-list-link">Tech</a></li>
                            <li class="css-ist4u3"><a class="css-wbbhzv" href="https://www.nytimes.com/section/science"
                                                      data-testid="site-index-section-list-link">Science</a></li>
                            <li class="css-ist4u3 smartphone"><a class="css-wbbhzv"
                                                                 href="https://www.nytimes.com/section/climate"
                                                                 data-testid="site-index-section-list-link">Climate</a>
                            </li>
                            <li class="css-ist4u3"><a class="css-wbbhzv" href="https://www.nytimes.com/section/sports"
                                                      data-testid="site-index-section-list-link">Sports</a></li>
                            <li class="css-ist4u3"><a class="css-wbbhzv"
                                                      href="https://www.nytimes.com/section/obituaries"
                                                      data-testid="site-index-section-list-link">Obituaries</a></li>
                            <li class="css-ist4u3 smartphone"><a class="css-wbbhzv"
                                                                 href="https://www.nytimes.com/section/upshot"
                                                                 data-testid="site-index-section-list-link">The
                                    Upshot</a></li>
                            <li class="css-ist4u3 smartphone"><a class="css-wbbhzv"
                                                                 href="https://www.nytimes.com/international/?action=click&amp;region=MobileNav&amp;pgtype=Homepage"
                                                                 data-testid="site-index-section-list-link">International</a>
                            </li>
                            <li class="css-ist4u3 smartphone"><a class="css-wbbhzv"
                                                                 href="https://www.nytimes.com/ca/?action=click&amp;region=MobileNav&amp;pgtype=Homepage"
                                                                 data-testid="site-index-section-list-link">Canada</a>
                            </li>
                            <li class="css-ist4u3 smartphone"><a class="css-wbbhzv" href="https://www.nytimes.com/es/"
                                                                 data-testid="site-index-section-list-link">Español</a>
                            </li>
                            <li class="css-ist4u3 smartphone"><a class="css-wbbhzv" href="https://cn.nytimes.com/"
                                                                 data-testid="site-index-section-list-link">中文网</a></li>
                            <li class="css-ist4u3"><a class="css-wbbhzv"
                                                      href="https://www.nytimes.com/section/todayspaper"
                                                      data-testid="site-index-section-list-link">Today's Paper</a></li>
                            <li class="css-ist4u3"><a class="css-wbbhzv"
                                                      href="https://www.nytimes.com/section/corrections"
                                                      data-testid="site-index-section-list-link">Corrections</a></li>
                        </ul>
                    </section>
                    <section class="css-1rr4qq7" aria-labelledby="site-index-section-label-1"><h3 class="css-1onhbft"
                                                                                                  id="site-index-section-label-1">
                            Opinion</h3>
                        <ul class="css-1iruc8t" data-testid="site-index-section-list">
                            <li class="css-ist4u3"><a class="css-wbbhzv" href="https://www.nytimes.com/section/opinion"
                                                      data-testid="site-index-section-list-link">Today's Opinion</a>
                            </li>
                            <li class="css-ist4u3"><a class="css-wbbhzv"
                                                      href="https://www.nytimes.com/section/opinion/columnists"
                                                      data-testid="site-index-section-list-link">Op-Ed Columnists</a>
                            </li>
                            <li class="css-ist4u3"><a class="css-wbbhzv"
                                                      href="https://www.nytimes.com/section/opinion/editorials"
                                                      data-testid="site-index-section-list-link">Editorials</a></li>
                            <li class="css-ist4u3"><a class="css-wbbhzv"
                                                      href="https://www.nytimes.com/section/opinion/contributors"
                                                      data-testid="site-index-section-list-link">Op-Ed Contributors</a>
                            </li>
                            <li class="css-ist4u3"><a class="css-wbbhzv"
                                                      href="https://www.nytimes.com/section/opinion/letters"
                                                      data-testid="site-index-section-list-link">Letters</a></li>
                            <li class="css-ist4u3"><a class="css-wbbhzv"
                                                      href="https://www.nytimes.com/section/opinion/sunday"
                                                      data-testid="site-index-section-list-link">Sunday Review</a></li>
                            <li class="css-ist4u3"><a class="css-wbbhzv" href="https://www.nytimes.com/video/opinion"
                                                      data-testid="site-index-section-list-link">Video: Opinion</a></li>
                        </ul>
                    </section>
                    <section class="css-1rr4qq7" aria-labelledby="site-index-section-label-2"><h3 class="css-1onhbft"
                                                                                                  id="site-index-section-label-2">
                            Arts</h3>
                        <ul class="css-1iruc8t" data-testid="site-index-section-list">
                            <li class="css-ist4u3"><a class="css-wbbhzv" href="https://www.nytimes.com/section/arts"
                                                      data-testid="site-index-section-list-link">Today's Arts</a></li>
                            <li class="css-ist4u3"><a class="css-wbbhzv"
                                                      href="https://www.nytimes.com/section/arts/design"
                                                      data-testid="site-index-section-list-link">Art &amp; Design</a>
                            </li>
                            <li class="css-ist4u3"><a class="css-wbbhzv" href="https://www.nytimes.com/section/books"
                                                      data-testid="site-index-section-list-link">Books</a></li>
                            <li class="css-ist4u3"><a class="css-wbbhzv"
                                                      href="https://www.nytimes.com/section/arts/dance"
                                                      data-testid="site-index-section-list-link">Dance</a></li>
                            <li class="css-ist4u3"><a class="css-wbbhzv" href="https://www.nytimes.com/section/movies"
                                                      data-testid="site-index-section-list-link">Movies</a></li>
                            <li class="css-ist4u3"><a class="css-wbbhzv"
                                                      href="https://www.nytimes.com/section/arts/music"
                                                      data-testid="site-index-section-list-link">Music</a></li>
                            <li class="css-ist4u3"><a class="css-wbbhzv"
                                                      href="https://www.nytimes.com/spotlight/pop-culture"
                                                      data-testid="site-index-section-list-link">Pop Culture</a></li>
                            <li class="css-ist4u3"><a class="css-wbbhzv"
                                                      href="https://www.nytimes.com/section/arts/television"
                                                      data-testid="site-index-section-list-link">Television</a></li>
                            <li class="css-ist4u3"><a class="css-wbbhzv" href="https://www.nytimes.com/section/theater"
                                                      data-testid="site-index-section-list-link">Theater</a></li>
                            <li class="css-ist4u3 smartphone"><a class="css-wbbhzv"
                                                                 href="https://www.nytimes.com/spotlight/what-to-watch"
                                                                 data-testid="site-index-section-list-link">What to
                                    Watch</a></li>
                            <li class="css-ist4u3"><a class="css-wbbhzv" href="https://www.nytimes.com/video/arts"
                                                      data-testid="site-index-section-list-link">Video: Arts</a></li>
                        </ul>
                    </section>
                    <section class="css-1rr4qq7" aria-labelledby="site-index-section-label-3"><h3 class="css-1onhbft"
                                                                                                  id="site-index-section-label-3">
                            Living</h3>
                        <ul class="css-1iruc8t" data-testid="site-index-section-list">
                            <li class="css-ist4u3"><a class="css-wbbhzv"
                                                      href="https://www.nytimes.com/spotlight/at-home"
                                                      data-testid="site-index-section-list-link">At Home</a></li>
                            <li class="css-ist4u3"><a class="css-wbbhzv"
                                                      href="https://www.nytimes.com/section/automobiles"
                                                      data-testid="site-index-section-list-link">Automobiles</a></li>
                            <li class="css-ist4u3"><a class="css-wbbhzv" href="https://www.nytimes.com/games"
                                                      data-testid="site-index-section-list-link">Games</a></li>
                            <li class="css-ist4u3"><a class="css-wbbhzv"
                                                      href="https://www.nytimes.com/section/education"
                                                      data-testid="site-index-section-list-link">Education</a></li>
                            <li class="css-ist4u3"><a class="css-wbbhzv" href="https://www.nytimes.com/section/food"
                                                      data-testid="site-index-section-list-link">Food</a></li>
                            <li class="css-ist4u3"><a class="css-wbbhzv" href="https://www.nytimes.com/section/health"
                                                      data-testid="site-index-section-list-link">Health</a></li>
                            <li class="css-ist4u3"><a class="css-wbbhzv" href="https://www.nytimes.com/section/jobs"
                                                      data-testid="site-index-section-list-link">Jobs</a></li>
                            <li class="css-ist4u3"><a class="css-wbbhzv"
                                                      href="https://www.nytimes.com/section/fashion/weddings"
                                                      data-testid="site-index-section-list-link">Love</a></li>
                            <li class="css-ist4u3"><a class="css-wbbhzv" href="https://www.nytimes.com/section/magazine"
                                                      data-testid="site-index-section-list-link">Magazine</a></li>
                            <li class="css-ist4u3"><a class="css-wbbhzv"
                                                      href="https://www.nytimes.com/section/parenting"
                                                      data-testid="site-index-section-list-link">Parenting</a></li>
                            <li class="css-ist4u3"><a class="css-wbbhzv"
                                                      href="https://www.nytimes.com/section/realestate"
                                                      data-testid="site-index-section-list-link">Real Estate</a></li>
                            <li class="css-ist4u3"><a class="css-wbbhzv" href="https://cooking.nytimes.com/"
                                                      data-testid="site-index-section-list-link">Recipes</a></li>
                            <li class="css-ist4u3"><a class="css-wbbhzv" href="https://www.nytimes.com/section/style"
                                                      data-testid="site-index-section-list-link">Style</a></li>
                            <li class="css-ist4u3"><a class="css-wbbhzv"
                                                      href="https://www.nytimes.com/section/t-magazine"
                                                      data-testid="site-index-section-list-link">T Magazine</a></li>
                            <li class="css-ist4u3"><a class="css-wbbhzv" href="https://www.nytimes.com/section/travel"
                                                      data-testid="site-index-section-list-link">Travel</a></li>
                        </ul>
                    </section>
                    <section class="css-1rr4qq7" aria-labelledby="site-index-section-label-4"><h3 class="css-1onhbft"
                                                                                                  id="site-index-section-label-4">
                            More</h3>
                        <ul class="css-1iruc8t" data-testid="site-index-section-list">
                            <li class="css-ist4u3"><a class="css-wbbhzv"
                                                      href="https://www.nytimes.com/section/reader-center"
                                                      data-testid="site-index-section-list-link">Reader Center</a></li>
                            <li class="css-ist4u3"><a class="css-wbbhzv" href="https://www.nytimes.com/wirecutter/"
                                                      data-testid="site-index-section-list-link">Wirecutter</a></li>
                            <li class="css-ist4u3"><a class="css-wbbhzv" href="https://timesevents.nytimes.com/"
                                                      data-testid="site-index-section-list-link">Live Events</a></li>
                            <li class="css-ist4u3"><a class="css-wbbhzv" href="https://www.nytimes.com/section/learning"
                                                      data-testid="site-index-section-list-link">The Learning
                                    Network</a></li>
                            <li class="css-ist4u3"><a class="css-wbbhzv"
                                                      href="http://www.nytimes.com/marketing/tools-and-services"
                                                      data-testid="site-index-section-list-link">Tools &amp;
                                    Services</a></li>
                            <li class="css-ist4u3"><a class="css-wbbhzv"
                                                      href="https://www.nytimes.com/section/multimedia"
                                                      data-testid="site-index-section-list-link">Multimedia</a></li>
                            <li class="css-ist4u3"><a class="css-wbbhzv" href="https://www.nytimes.com/section/lens"
                                                      data-testid="site-index-section-list-link">Photography</a></li>
                            <li class="css-ist4u3"><a class="css-wbbhzv" href="https://www.nytimes.com/video"
                                                      data-testid="site-index-section-list-link">Video</a></li>
                            <li class="css-ist4u3"><a class="css-wbbhzv" href="https://www.nytimes.com/newsletters"
                                                      data-testid="site-index-section-list-link">Newsletters</a></li>
                            <li class="css-ist4u3"><a class="css-wbbhzv" href="https://timesmachine.nytimes.com/browser"
                                                      data-testid="site-index-section-list-link">TimesMachine</a></li>
                            <li class="css-ist4u3"><a class="css-wbbhzv" href="https://store.nytimes.com/"
                                                      data-testid="site-index-section-list-link">NYT Store</a></li>
                            <li class="css-ist4u3"><a class="css-wbbhzv" href="https://www.nytimes.com/times-journeys"
                                                      data-testid="site-index-section-list-link">Times Journeys</a></li>
                            <li class="css-ist4u3"><a class="css-wbbhzv" href="https://myaccount.nytimes.com/seg"
                                                      data-testid="site-index-section-list-link">Manage My Account</a>
                            </li>
                        </ul>
                    </section>
                    <div class="css-6xhk3s" aria-labelledby="site-index-subscribe-label"><h3 class="css-1onhbft"
                                                                                             id="site-index-subscribe-label">
                            Subscribe</h3>
                        <ul class="css-1iruc8t" data-testid="site-index-subscribe-list">
                            <li class="css-tj0ten"><a class="css-1oyjjn8" href="https://www.nytimes.com/hdleftnav"
                                                      data-testid="site-index-subscribe-list-link">
                                    <svg class="css-r5ic95" viewBox="0 0 14 13" fill="#000">
                                        <path
                                            d="M13.1,11.7H3.5V1.2h9.6V11.7zM13.1,0.4H3.5C3,0.4,2.6,0.8,2.6,1.2v2.2H0.9C0.4,3.4,0,3.8,0,4.3v5.2v1.5c0,0.8,0.8,1.5,1.8,1.5h1.7h0h7.4h2.2c0.5,0,0.9-0.4,0.9-0.9V1.2C14,0.8,13.6,0.4,13.1,0.4"></path>
                                        <polygon points="10.9,3 5.2,3 5.2,3.9 11.4,3.9 11.4,3"></polygon>
                                        <rect x="5.2" y="4.7" width="6.1" height="0.9"></rect>
                                        <rect x="5.2" y="6.5" width="6.1" height="0.9"></rect>
                                    </svg>
                                    Home Delivery</a></li>
                            <li class="css-tj0ten"><a class="css-1oyjjn8" href="https://www.nytimes.com/digitalleftnav"
                                                      data-testid="site-index-subscribe-list-link">
                                    <svg class="css-r5ic95" viewBox="0 0 10 13">
                                        <path fill="#000"
                                              d="M9.9,8c-0.4,1.1-1.2,1.9-2.3,2.4V8l1.3-1.2L7.6,5.7V4c1.2-0.1,2-1,2-2c0-1.4-1.3-1.9-2.1-1.9c-0.2,0-0.3,0-0.6,0.1v0.1c0.1,0,0.2,0,0.3,0c0.5,0,0.9,0.2,0.9,0.7c0,0.4-0.3,0.7-0.8,0.7C6,1.7,4.5,0.6,2.8,0.6c-1.5,0-2.5,1.1-2.5,2.2C0.3,4,1,4.3,1.6,4.6l0-0.1C1.4,4.4,1.3,4.1,1.3,3.8c0-0.5,0.5-0.9,1-0.9C3.7,2.9,6,4,7.4,4h0.1v1.7L6.2,6.8L7.5,8v2.4c-0.5,0.2-1.1,0.3-1.7,0.3c-2.2,0-3.6-1.3-3.6-3.5c0-0.5,0.1-1,0.2-1.5l1.1-0.5V10l2.2-1v-5L2.5,5.5c0.3-1,1-1.7,1.8-2l0,0C2.2,3.9,0.1,5.6,0.1,8c0,2.9,2.4,4.8,5.2,4.8C8.2,12.9,9.9,10.9,9.9,8L9.9,8z"></path>
                                    </svg>
                                    Digital Subscriptions</a></li>
                            <li class="css-tj0ten"><a class="css-1oyjjn8"
                                                      href="https://www.nytimes.com/subscription/games?campaignId=9LRLQ "
                                                      data-testid="site-index-subscribe-list-link">
                                    <svg class="css-r5ic95" viewBox="0 0 13 13" fill="#000">
                                        <polygon points="0,-93.6 0,-86.9 6.6,-93.6"></polygon>
                                        <polygon points="0.9,-86 7.5,-86 7.5,-92.6"></polygon>
                                        <polygon points="0,-98 0,-94.8 8.8,-94.8 8.8,-86 12,-86 12,-98"></polygon>
                                        <path
                                            d="M11.9-40c-0.4,1.1-1.2,1.9-2.3,2.4V-40l1.3-1.2l-1.3-1.2V-44c1.2-0.1,2-1,2-2c0-1.4-1.3-1.9-2.1-1.9c-0.2,0-0.3,0-0.6,0.1v0.1c0.1,0,0.2,0,0.3,0c0.5,0,0.9,0.2,0.9,0.7c0,0.4-0.3,0.7-0.8,0.7c-1.3,0-2.8-1.1-4.5-1.1c-1.5,0-2.5,1.1-2.5,2.2c0,1.1,0.6,1.5,1.3,1.7l0-0.1c-0.2-0.1-0.4-0.4-0.4-0.7c0-0.5,0.5-0.9,1-0.9C5.7-45.1,8-44,9.4-44h0.1v1.7l-1.3,1.1L9.5-40v2.4c-0.5,0.2-1.1,0.3-1.7,0.3c-2.2,0-3.6-1.3-3.6-3.5c0-0.5,0.1-1,0.2-1.5l1.1-0.5v4.9l2.2-1v-5l-3.3,1.5c0.3-1,1-1.7,1.8-2l0,0c-2.2,0.5-4.3,2.1-4.3,4.6c0,2.9,2.4,4.8,5.2,4.8C10.2-35.1,11.9-37.1,11.9-40L11.9-40z"></path>
                                        <path
                                            d="M12.2-23.7c-0.2,0-0.4,0.2-0.4,0.4v0.4L0.4-19.1v2.3l3,1l-0.2,0.6c-0.3,0.8,0.1,1.8,0.9,2.1l1.7,0.7c0.2,0.1,0.4,0.1,0.6,0.1c0.6,0,1.3-0.4,1.5-1l0.4-0.9l3.5,1.2v0.4c0,0.2,0.2,0.4,0.4,0.4c0.2,0,0.4-0.2,0.4-0.4v-10.7C12.6-23.5,12.4-23.7,12.2-23.7M7.1-13.6c-0.2,0.4-0.6,0.6-1,0.4l-1.7-0.7c-0.4-0.2-0.6-0.6-0.4-1l0.3-0.7l3.3,1.1L7.1-13.6z"></path>
                                        <path
                                            d="M13.1-60.3H3.5v-10.5h9.6V-60.3zM13.1-71.6H3.5c-0.5,0-0.9,0.4-0.9,0.9v2.2H0.9c-0.5,0-0.9,0.4-0.9,0.9v5.2v1.5c0,0.8,0.8,1.5,1.8,1.5h1.7h0h7.4h2.2c0.5,0,0.9-0.4,0.9-0.9v-10.5C14-71.2,13.6-71.6,13.1-71.6"></path>
                                        <polygon points="10.9,-69 5.2,-69 5.2,-68.1 11.4,-68.1 11.4,-69"></polygon>
                                        <rect x="5.2" y="-67.3" width="6.1" height="0.9"></rect>
                                        <rect x="5.2" y="-65.5" width="6.1" height="0.9"></rect>
                                        <path
                                            d="M12,6.5H6.5V12H1V6.5h5.5V1H12V6.5zM12,0H1C0.4,0,0,0.5,0,1v11c0,0.6,0.4,1,1,1h11c0.5,0,1-0.4,1-1V1C13,0.5,12.5,0,12,0"></path>
                                    </svg>
                                    Games</a></li>
                            <li class="css-tj0ten"><a class="css-1oyjjn8"
                                                      href="https://www.nytimes.com/subscription/cooking.html"
                                                      data-testid="site-index-subscribe-list-link">
                                    <svg class="css-r5ic95" viewBox="0 0 13 13" fill="#000">
                                        <path
                                            d="M12,2.9L9.6,5.2c-0.1,0.1-0.3,0.1-0.4,0C9.1,5.2,9.1,5,9.3,4.9l2.4-2.4c-0.2-0.2-0.3-0.3-0.5-0.5L8.7,4.3c-0.1,0.1-0.3,0.1-0.4,0C8.2,4.3,8.2,4.1,8.4,4l2.4-2.4c-0.3-0.3-0.5-0.5-0.5-0.5L7.6,3.4C7.1,4,6.8,5.1,7.1,5.8c-1.4,1-4.6,3.5-5.1,4c-0.8,0.8-0.4,1.8-0.3,1.9c0,0,0,0,0,0c0,0,0,0,0,0c0.1,0.1,1.1,0.5,1.9-0.3c0.4-0.4,2.9-3.6,3.9-5C8.4,6.9,9.6,6.6,10.2,6l2.3-2.6C12.5,3.4,12.3,3.2,12,2.9z"></path>
                                        <path
                                            d="M0.8,1.9l0.3-0.3c0.9-0.9,3.2,1.1,3.8,1.7s0.9,1.8,0.4,2.6c1.4,1.1,4.6,3.5,5,3.9c0.8,0.8,0.4,1.8,0.3,1.9c0,0,0,0,0,0c0,0,0,0,0,0c-0.1,0.1-1.1,0.5-1.9-0.3c-0.4-0.4-2.9-3.7-4-5.1C3.9,6.7,2.9,6.4,2.3,5.8S-0.2,2.9,0.8,1.9z"></path>
                                    </svg>
                                    Cooking</a></li>
                        </ul>
                        <ul class="css-1iruc8t" data-testid="site-index-corporate-links">
                            <li><a class="css-1jmp9xk" href="https://www.nytimes.com/newsletters">Email Newsletters</a>
                            </li>
                            <li><a class="css-1jmp9xk" href="https://www.nytimes.com/corporateleftnav">Corporate
                                    Subscriptions</a></li>
                            <li><a class="css-1jmp9xk" href="https://www.nytimes.com/educationleftnav">Education
                                    Rate</a></li>
                        </ul>
                        <ul class="css-6td9kr" data-testid="site-index-alternate-links">
                            <li><a class="css-1jmp9xk" href="http://www.nytimes.com/services/mobile/index.html">Mobile
                                    Applications</a></li>
                            <li><a class="css-1jmp9xk" href="http://eedition.nytimes.com/cgi-bin/signup.cgi?cc=37FYY">Replica
                                    Edition</a></li>
                            <li><a class="css-1jmp9xk"
                                   href="https://www.nytimes.com/international/?action=click&amp;region=Footer&amp;pgtype=Homepage">International</a>
                            </li>
                            <li><a class="css-1jmp9xk"
                                   href="https://www.nytimes.com/ca/?action=click&amp;region=Footer&amp;pgtype=Homepage">Canada</a>
                            </li>
                            <li><a class="css-1jmp9xk"
                                   href="https://www.nytimes.com/es/?action=click&amp;region=Footer&amp;pgtype=Homepage">Español</a>
                            </li>
                            <li><a class="css-1jmp9xk" href="https://cn.nytimes.com/">中文网</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <footer class="css-1e1s8k7" role="contentinfo">
        <nav data-testid="footer" class="css-15uy5yv">
            <h2 class="css-1dv1kvn">Site Information Navigation</h2>
            <ul class="css-1ho5u4o e5u916q0">
                <li data-testid="copyright">
                    <a class="css-jq1cx6" href="https://help.nytimes.com/hc/en-us/articles/115014792127-Copyright-notice">©&nbsp;<span>2020</span>&nbsp;<span>The New York Times Company</span></a>
                </li>
            </ul>
            <ul class="css-13o0c9t e5u916q1">
                <li class="css-a7htku e5u916q2">
                    <a data-testid="footer-link" class="css-jq1cx6" href="https://www.nytco.com/">NYTCo</a>
                </li>
                <li class="css-a7htku e5u916q2">
                    <a data-testid="footer-link" class="css-jq1cx6" href="https://help.nytimes.com/hc/en-us/articles/115015385887-Contact-Us">Contact Us</a>
                </li>
                <li class="css-a7htku e5u916q2">
                    <a data-testid="footer-link" class="css-jq1cx6" href="https://www.nytco.com/careers/">Work with us</a>
                </li>
                <li class="css-a7htku e5u916q2">
                    <a data-testid="footer-link" class="css-jq1cx6" href="https://nytmediakit.com/">Advertise</a>
                </li>
                <li class="css-a7htku e5u916q2">
                    <a data-testid="footer-link" class="css-jq1cx6" href="http://www.tbrandstudio.com/">T Brand Studio</a>
                </li>
                <li class="css-a7htku e5u916q2">
                    <a data-testid="footer-link" class="css-jq1cx6" href="https://www.nytimes.com/privacy/cookie-policy#how-do-i-manage-trackers">Your Ad Choices</a>
                </li>
                <li class="css-a7htku e5u916q2">
                    <a data-testid="footer-link" class="css-jq1cx6" href="https://www.nytimes.com/privacy/privacy-policy">Privacy Policy</a>
                </li>
                <li class="css-a7htku e5u916q2">
                    <a data-testid="footer-link" class="css-jq1cx6" href="https://help.nytimes.com/hc/en-us/articles/115014893428-Terms-of-service">Terms of Service</a>
                </li>
                <li class="css-a7htku e5u916q2">
                    <a data-testid="footer-link" class="css-jq1cx6" href="https://help.nytimes.com/hc/en-us/articles/115014893968-Terms-of-sale">Terms of Sale</a>
                </li>
                <li class="css-a7htku e5u916q2">
                    <a data-testid="footer-link" class="css-jq1cx6" href="https://spiderbites.nytimes.com">Site Map</a>
                </li>
                <li class="css-a7htku e5u916q2">
                    <a data-testid="footer-link" class="css-jq1cx6" href="https://help.nytimes.com/hc/en-us">Help</a>
                </li>
                <li class="css-a7htku e5u916q2">
                    <a data-testid="footer-link" class="css-jq1cx6" href="https://www.nytimes.com/subscription?campaignId=37WXW">Subscriptions</a>
                </li>
            </ul>

            <a href="https://developer.nytimes.com/"><img src="{{ asset('poweredby_nytimes_200c.png') }}" alt="Powered by nytimes" class="nyt-logo-attribution"></a>
        </nav>
    </footer>
</body>
</html>
