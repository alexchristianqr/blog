{{--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">--}}
<style>
    p {
        text-align: left;
        margin-top: 0;
        color: #74787E !important;
        font-size: 16px;
        line-height: 1.5em;
    }
    footer {
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        height: auto;
    }
    small {
        color: #74787E !important;
    }
    button, a {
        outline: 0 !important;
    }
    /* .btn */
    @media screen {
        .btn {
            display: inline-block;
            padding: 6px 12px;
            margin-bottom: 0;
            font-size: 14px;
            font-weight: normal;
            line-height: 1.42857143;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            -ms-touch-action: manipulation;
            touch-action: manipulation;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            background-image: none;
            border: 1px solid transparent;
            border-radius: 0;
        }
    }
    /* .btn-default */
    @media screen {
        .btn-default {
            color: #333;
            background-color: #fff;
            border-color: #ccc;
        }
        .btn-default:focus,
        .btn-default.focus {
            color: #333;
            background-color: #e6e6e6;
            border-color: #8c8c8c;
        }
        .btn-default:hover {
            color: #333;
            background-color: #e6e6e6;
            border-color: #adadad;
        }
        .btn-default:active,
        .btn-default.active,
        .open > .dropdown-toggle.btn-default {
            color: #333;
            background-color: #e6e6e6;
            border-color: #adadad;
        }
        .btn-default:active:hover,
        .btn-default.active:hover,
        .open > .dropdown-toggle.btn-default:hover,
        .btn-default:active:focus,
        .btn-default.active:focus,
        .open > .dropdown-toggle.btn-default:focus,
        .btn-default:active.focus,
        .btn-default.active.focus,
        .open > .dropdown-toggle.btn-default.focus {
            color: #333;
            background-color: #d4d4d4;
            border-color: #8c8c8c;
        }
        .btn-default:active,
        .btn-default.active,
        .open > .dropdown-toggle.btn-default {
            background-image: none;
        }
    }
    @media all {
        html {
            font-size: 10px;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
            margin: 0;
        }
        body {
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-size: 14px;
            line-height: 1.42857143;
            color: #333;
            background-color: #fff;
            margin: 0;
        }
        input,
        button,
        select,
        textarea {
            font-family: inherit;
            font-size: inherit;
            line-height: inherit;
        }
        a {
            color: #337ab7;
            text-decoration: none;
        }
        a:focus {
            outline: 5px auto -webkit-focus-ring-color;
            outline-offset: -2px;
        }
        hr {
            margin-top: 20px;
            margin-bottom: 20px;
            border: 0;
            border-top: 1px solid #eee;
        }
        [role="button"] {
            cursor: pointer;
        }
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        .h1,
        .h2,
        .h3,
        .h4,
        .h5,
        .h6 {
            font-family: inherit;
            font-weight: 500;
            line-height: 1.1;
            color: inherit;
        }
        h1 small,
        h2 small,
        h3 small,
        h4 small,
        h5 small,
        h6 small,
        .h1 small,
        .h2 small,
        .h3 small,
        .h4 small,
        .h5 small,
        .h6 small,
        h1 .small,
        h2 .small,
        h3 .small,
        h4 .small,
        h5 .small,
        h6 .small,
        .h1 .small,
        .h2 .small,
        .h3 .small,
        .h4 .small,
        .h5 .small,
        .h6 .small {
            font-weight: normal;
            line-height: 1;
            color: #777;
        }
        h1,
        .h1,
        h2,
        .h2,
        h3,
        .h3 {
            margin-top: 20px;
            margin-bottom: 10px;
        }
        h1 small,
        .h1 small,
        h2 small,
        .h2 small,
        h3 small,
        .h3 small,
        h1 .small,
        .h1 .small,
        h2 .small,
        .h2 .small,
        h3 .small,
        .h3 .small {
            font-size: 65%;
        }
        h4,
        .h4,
        h5,
        .h5,
        h6,
        .h6 {
            margin-top: 10px;
            margin-bottom: 10px;
        }
        h4 small,
        .h4 small,
        h5 small,
        .h5 small,
        h6 small,
        .h6 small,
        h4 .small,
        .h4 .small,
        h5 .small,
        .h5 .small,
        h6 .small,
        .h6 .small {
            font-size: 75%;
        }
        h1,
        .h1 {
            font-size: 36px;
        }
        h2,
        .h2 {
            font-size: 30px;
        }
        h3,
        .h3 {
            font-size: 24px;
        }
        h4,
        .h4 {
            font-size: 18px;
        }
        h5,
        .h5 {
            font-size: 14px;
        }
        h6,
        .h6 {
            font-size: 12px;
        }
        p {
            margin: 0 0 10px;
        }
        .lead {
            margin-bottom: 20px;
            font-size: 16px;
            font-weight: 300;
            line-height: 1.4;
        }
        @media (min-width: 768px) {
            .lead {
                font-size: 21px;
            }
        }
        small,
        .small {
            font-size: 85%;
        }
    }

    .alert {
        position: relative;
        padding: 0.75rem 1.25rem;
        margin-bottom: 1rem;
        border: 1px solid transparent;
        border-radius: 0.25rem;
    }

    .alert-heading {
        color: inherit;
    }

    .alert-link {
        font-weight: 700;
    }

    .alert-dismissible {
        padding-right: 4rem;
    }

    .alert-dismissible .close {
        position: absolute;
        top: 0;
        right: 0;
        padding: 0.75rem 1.25rem;
        color: inherit;
    }

    .alert-primary {
        color: #004085;
        background-color: #cce5ff;
        border-color: #b8daff;
    }

    .alert-primary hr {
        border-top-color: #9fcdff;
    }

    .alert-primary .alert-link {
        color: #002752;
    }

    .alert-secondary {
        color: #383d41;
        background-color: #e2e3e5;
        border-color: #d6d8db;
    }

    .alert-secondary hr {
        border-top-color: #c8cbcf;
    }

    .alert-secondary .alert-link {
        color: #202326;
    }

    .alert-success {
        color: #155724;
        background-color: #d4edda;
        border-color: #c3e6cb;
    }

    .alert-success hr {
        border-top-color: #b1dfbb;
    }

    .alert-success .alert-link {
        color: #0b2e13;
    }

    .alert-info {
        color: #0c5460;
        background-color: #d1ecf1;
        border-color: #bee5eb;
    }

    .alert-info hr {
        border-top-color: #abdde5;
    }

    .alert-info .alert-link {
        color: #062c33;
    }

    .alert-warning {
        color: #856404;
        background-color: #fff3cd;
        border-color: #ffeeba;
    }

    .alert-warning hr {
        border-top-color: #ffe8a1;
    }

    .alert-warning .alert-link {
        color: #533f03;
    }

    .alert-danger {
        color: #721c24;
        background-color: #f8d7da;
        border-color: #f5c6cb;
    }

    .alert-danger hr {
        border-top-color: #f1b0b7;
    }

    .alert-danger .alert-link {
        color: #491217;
    }

    .alert-light {
        color: #818182;
        background-color: #fefefe;
        border-color: #fdfdfe;
    }

    .alert-light hr {
        border-top-color: #ececf6;
    }

    .alert-light .alert-link {
        color: #686868;
    }

    .alert-dark {
        color: #1b1e21;
        background-color: #d6d8d9;
        border-color: #c6c8ca;
    }

    .alert-dark hr {
        border-top-color: #b9bbbe;
    }

    .alert-dark .alert-link {
        color: #040505;
    }

</style>