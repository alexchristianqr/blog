<style>

    p {
        margin-top: 0;
        margin-bottom: 1rem;
    }

    .container {
        width: 100%;
        padding-right: 15px;
        padding-left: 15px;
        margin-right: auto;
        margin-left: auto;
    }

    .container-fluid {
        width: 100%;
        padding-right: 15px;
        padding-left: 15px;
        margin-right: auto;
        margin-left: auto;
    }

    .row {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        margin-right: -15px;
        margin-left: -15px;
    }

    .btn {
        cursor: pointer !important;
        display: inline-block;
        font-weight: 400;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        border: 1px solid transparent;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        line-height: 1.5;
        border-radius: 0.25rem;
        transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .btn:hover, .btn:focus {
        text-decoration: none;
    }

    .btn:focus, .btn.focus {
        outline: 0;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }

    .btn.disabled, .btn:disabled {
        opacity: 0.65;
    }

    .btn:not(:disabled):not(.disabled) {
        cursor: pointer;
    }

    .btn:not(:disabled):not(.disabled):active, .btn:not(:disabled):not(.disabled).active {
        background-image: none;
    }

    a.btn.disabled,
    fieldset:disabled a.btn {
        pointer-events: none;
    }

    .btn-primary {
        color: #fff;
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        color: #fff;
        background-color: #0069d9;
        border-color: #0062cc;
    }

    .btn-primary:focus, .btn-primary.focus {
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.5);
    }

    .btn-primary.disabled, .btn-primary:disabled {
        color: #fff;
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-secondary {
        color: #fff;
        background-color: #6c757d;
        border-color: #6c757d;
    }

    .btn-secondary:hover {
        color: #fff;
        background-color: #5a6268;
        border-color: #545b62;
    }

    .btn-secondary:focus, .btn-secondary.focus {
        box-shadow: 0 0 0 0.2rem rgba(108, 117, 125, 0.5);
    }

    .btn-secondary.disabled, .btn-secondary:disabled {
        color: #fff;
        background-color: #6c757d;
        border-color: #6c757d;
    }

    .btn-success {
        color: #fff;
        background-color: #28a745;
        border-color: #28a745;
    }

    .btn-success:hover {
        color: #fff;
        background-color: #218838;
        border-color: #1e7e34;
    }

    .btn-success:focus, .btn-success.focus {
        box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.5);
    }

    .btn-success.disabled, .btn-success:disabled {
        color: #fff;
        background-color: #28a745;
        border-color: #28a745;
    }

    .btn-info {
        color: #fff;
        background-color: #17a2b8;
        border-color: #17a2b8;
    }

    .btn-info:hover {
        color: #fff;
        background-color: #138496;
        border-color: #117a8b;
    }

    .btn-info:focus, .btn-info.focus {
        box-shadow: 0 0 0 0.2rem rgba(23, 162, 184, 0.5);
    }

    .btn-info.disabled, .btn-info:disabled {
        color: #fff;
        background-color: #17a2b8;
        border-color: #17a2b8;
    }

    .btn-warning {
        color: #212529;
        background-color: #ffc107;
        border-color: #ffc107;
    }

    .btn-warning:hover {
        color: #212529;
        background-color: #e0a800;
        border-color: #d39e00;
    }

    .btn-warning:focus, .btn-warning.focus {
        box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.5);
    }

    .btn-warning.disabled, .btn-warning:disabled {
        color: #212529;
        background-color: #ffc107;
        border-color: #ffc107;
    }

    .btn-danger {
        color: #fff;
        background-color: #dc3545;
        border-color: #dc3545;
    }

    .btn-danger:hover {
        color: #fff;
        background-color: #c82333;
        border-color: #bd2130;
    }

    .btn-danger:focus, .btn-danger.focus {
        box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.5);
    }

    .btn-danger.disabled, .btn-danger:disabled {
        color: #fff;
        background-color: #dc3545;
        border-color: #dc3545;
    }

    .btn-light {
        color: #212529;
        background-color: #f8f9fa;
        border-color: #f8f9fa;
    }

    .btn-light:hover {
        color: #212529;
        background-color: #e2e6ea;
        border-color: #dae0e5;
    }

    .btn-light:focus, .btn-light.focus {
        box-shadow: 0 0 0 0.2rem rgba(248, 249, 250, 0.5);
    }

    .btn-light.disabled, .btn-light:disabled {
        color: #212529;
        background-color: #f8f9fa;
        border-color: #f8f9fa;
    }

    .btn-dark {
        color: #fff;
        background-color: #343a40;
        border-color: #343a40;
    }

    .btn-dark:hover {
        color: #fff;
        background-color: #23272b;
        border-color: #1d2124;
    }

    .btn-dark:focus, .btn-dark.focus {
        box-shadow: 0 0 0 0.2rem rgba(52, 58, 64, 0.5);
    }

    .btn-dark.disabled, .btn-dark:disabled {
        color: #fff;
        background-color: #343a40;
        border-color: #343a40;
    }

    .btn-outline-primary {
        color: #007bff;
        background-color: transparent;
        background-image: none;
        border-color: #007bff;
    }

    .btn-outline-primary:hover {
        color: #fff;
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-outline-primary:focus, .btn-outline-primary.focus {
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.5);
    }

    .btn-outline-primary.disabled, .btn-outline-primary:disabled {
        color: #007bff;
        background-color: transparent;
    }

    .btn-outline-secondary {
        color: #6c757d;
        background-color: transparent;
        background-image: none;
        border-color: #6c757d;
    }

    .btn-outline-secondary:hover {
        color: #fff;
        background-color: #6c757d;
        border-color: #6c757d;
    }

    .btn-outline-secondary:focus, .btn-outline-secondary.focus {
        box-shadow: 0 0 0 0.2rem rgba(108, 117, 125, 0.5);
    }

    .btn-outline-secondary.disabled, .btn-outline-secondary:disabled {
        color: #6c757d;
        background-color: transparent;
    }

    .btn-outline-success {
        color: #28a745;
        background-color: transparent;
        background-image: none;
        border-color: #28a745;
    }

    .btn-outline-success:hover {
        color: #fff;
        background-color: #28a745;
        border-color: #28a745;
    }

    .btn-outline-success:focus, .btn-outline-success.focus {
        box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.5);
    }

    .btn-outline-success.disabled, .btn-outline-success:disabled {
        color: #28a745;
        background-color: transparent;
    }

    .btn-outline-info {
        color: #17a2b8;
        background-color: transparent;
        background-image: none;
        border-color: #17a2b8;
    }

    .btn-outline-info:hover {
        color: #fff;
        background-color: #17a2b8;
        border-color: #17a2b8;
    }

    .btn-outline-info:focus, .btn-outline-info.focus {
        box-shadow: 0 0 0 0.2rem rgba(23, 162, 184, 0.5);
    }

    .btn-outline-info.disabled, .btn-outline-info:disabled {
        color: #17a2b8;
        background-color: transparent;
    }

    .btn-outline-warning {
        color: #ffc107;
        background-color: transparent;
        background-image: none;
        border-color: #ffc107;
    }

    .btn-outline-warning:hover {
        color: #212529;
        background-color: #ffc107;
        border-color: #ffc107;
    }

    .btn-outline-warning:focus, .btn-outline-warning.focus {
        box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.5);
    }

    .btn-outline-warning.disabled, .btn-outline-warning:disabled {
        color: #ffc107;
        background-color: transparent;
    }

    .btn-outline-danger {
        color: #dc3545;
        background-color: transparent;
        background-image: none;
        border-color: #dc3545;
    }

    .btn-outline-danger:hover {
        color: #fff;
        background-color: #dc3545;
        border-color: #dc3545;
    }

    .btn-outline-danger:focus, .btn-outline-danger.focus {
        box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.5);
    }

    .btn-outline-danger.disabled, .btn-outline-danger:disabled {
        color: #dc3545;
        background-color: transparent;
    }

    .btn-outline-light {
        color: #f8f9fa;
        background-color: transparent;
        background-image: none;
        border-color: #f8f9fa;
    }

    .btn-outline-light:hover {
        color: #212529;
        background-color: #f8f9fa;
        border-color: #f8f9fa;
    }

    .btn-outline-light:focus, .btn-outline-light.focus {
        box-shadow: 0 0 0 0.2rem rgba(248, 249, 250, 0.5);
    }

    .btn-outline-light.disabled, .btn-outline-light:disabled {
        color: #f8f9fa;
        background-color: transparent;
    }

    .btn-outline-dark {
        color: #343a40;
        background-color: transparent;
        background-image: none;
        border-color: #343a40;
    }

    .btn-outline-dark:hover {
        color: #fff;
        background-color: #343a40;
        border-color: #343a40;
    }

    .btn-outline-dark:focus, .btn-outline-dark.focus {
        box-shadow: 0 0 0 0.2rem rgba(52, 58, 64, 0.5);
    }

    .btn-outline-dark.disabled, .btn-outline-dark:disabled {
        color: #343a40;
        background-color: transparent;
    }

    .btn-link {
        font-weight: 400;
        color: #007bff;
        background-color: transparent;
    }

    .btn-link:hover {
        color: #0056b3;
        text-decoration: underline;
        background-color: transparent;
        border-color: transparent;
    }

    .btn-link:focus, .btn-link.focus {
        text-decoration: underline;
        border-color: transparent;
        box-shadow: none;
    }

    .btn-link:disabled, .btn-link.disabled {
        color: #6c757d;
    }

    .btn-block {
        display: block;
        width: 100%;
    }

    .card {
        position: relative;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid rgba(0, 0, 0, 0.125);
        border-radius: 0.25rem;
    }

    .card > hr {
        margin-right: 0;
        margin-left: 0;
    }

    .card > .list-group:first-child .list-group-item:first-child {
        border-top-left-radius: 0.25rem;
        border-top-right-radius: 0.25rem;
    }

    .card > .list-group:last-child .list-group-item:last-child {
        border-bottom-right-radius: 0.25rem;
        border-bottom-left-radius: 0.25rem;
    }

    .card-body {
        -webkit-box-flex: 1;
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
        padding: 1.25rem;
    }

    .card-title {
        margin-bottom: 0.75rem;
    }

    .card-subtitle {
        margin-top: -0.375rem;
        margin-bottom: 0;
    }

    .card-text:last-child {
        margin-bottom: 0;
    }

    .card-link:hover {
        text-decoration: none;
    }

    .card-link + .card-link {
        margin-left: 1.25rem;
    }

    .card-header {
        padding: 0.75rem 1.25rem;
        margin-bottom: 0;
        background-color: rgba(0, 0, 0, 0.03);
        border-bottom: 1px solid rgba(0, 0, 0, 0.125);
    }

    .card-header:first-child {
        border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0;
    }

    .card-header + .list-group .list-group-item:first-child {
        border-top: 0;
    }

    .card-footer {
        padding: 0.75rem 1.25rem;
        background-color: rgba(0, 0, 0, 0.03);
        border-top: 1px solid rgba(0, 0, 0, 0.125);
    }

    .card-footer:last-child {
        border-radius: 0 0 calc(0.25rem - 1px) calc(0.25rem - 1px);
    }

    .card-header-tabs {
        margin-right: -0.625rem;
        margin-bottom: -0.75rem;
        margin-left: -0.625rem;
        border-bottom: 0;
    }

    .card-header-pills {
        margin-right: -0.625rem;
        margin-left: -0.625rem;
    }

    .card-img-overlay {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        padding: 1.25rem;
    }

    .card-img {
        width: 100%;
        border-radius: calc(0.25rem - 1px);
    }

    .card-img-top {
        width: 100%;
        border-top-left-radius: calc(0.25rem - 1px);
        border-top-right-radius: calc(0.25rem - 1px);
    }

    .card-img-bottom {
        width: 100%;
        border-bottom-right-radius: calc(0.25rem - 1px);
        border-bottom-left-radius: calc(0.25rem - 1px);
    }

    .card-deck {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
    }

    .card-deck .card {
        margin-bottom: 15px;
    }

    .card-group {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
    }

    .card-group > .card {
        margin-bottom: 15px;
    }

    .card-columns .card {
        margin-bottom: 0.75rem;
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

    .table {
        width: 100%;
        max-width: 100%;
        margin-bottom: 1rem;
        background-color: transparent;
    }

    .table th,
    .table td {
        padding: 0.75rem;
        vertical-align: top;
        border-top: 1px solid #dee2e6;
    }

    .table thead th {
        vertical-align: bottom;
        border-bottom: 2px solid #dee2e6;
    }

    .table tbody + tbody {
        border-top: 2px solid #dee2e6;
    }

    .table .table {
        background-color: #fff;
    }

    .table-sm th,
    .table-sm td {
        padding: 0.3rem;
    }

    .table-bordered {
        border: 1px solid #dee2e6;
    }

    .table-bordered th,
    .table-bordered td {
        border: 1px solid #dee2e6;
    }

    .table-bordered thead th,
    .table-bordered thead td {
        border-bottom-width: 2px;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0, 0, 0, 0.05);
    }

    .table-hover tbody tr:hover {
        background-color: rgba(0, 0, 0, 0.075);
    }

    .table-primary,
    .table-primary > th,
    .table-primary > td {
        background-color: #b8daff;
    }

    .table-hover .table-primary:hover {
        background-color: #9fcdff;
    }

    .table-hover .table-primary:hover > td,
    .table-hover .table-primary:hover > th {
        background-color: #9fcdff;
    }

    .table-secondary,
    .table-secondary > th,
    .table-secondary > td {
        background-color: #d6d8db;
    }

    .table-hover .table-secondary:hover {
        background-color: #c8cbcf;
    }

    .table-hover .table-secondary:hover > td,
    .table-hover .table-secondary:hover > th {
        background-color: #c8cbcf;
    }

    .table-success,
    .table-success > th,
    .table-success > td {
        background-color: #c3e6cb;
    }

    .table-hover .table-success:hover {
        background-color: #b1dfbb;
    }

    .table-hover .table-success:hover > td,
    .table-hover .table-success:hover > th {
        background-color: #b1dfbb;
    }

    .table-info,
    .table-info > th,
    .table-info > td {
        background-color: #bee5eb;
    }

    .table-hover .table-info:hover {
        background-color: #abdde5;
    }

    .table-hover .table-info:hover > td,
    .table-hover .table-info:hover > th {
        background-color: #abdde5;
    }

    .table-warning,
    .table-warning > th,
    .table-warning > td {
        background-color: #ffeeba;
    }

    .table-hover .table-warning:hover {
        background-color: #ffe8a1;
    }

    .table-hover .table-warning:hover > td,
    .table-hover .table-warning:hover > th {
        background-color: #ffe8a1;
    }

    .table-danger,
    .table-danger > th,
    .table-danger > td {
        background-color: #f5c6cb;
    }

    .table-hover .table-danger:hover {
        background-color: #f1b0b7;
    }

    .table-hover .table-danger:hover > td,
    .table-hover .table-danger:hover > th {
        background-color: #f1b0b7;
    }

    .table-light,
    .table-light > th,
    .table-light > td {
        background-color: #fdfdfe;
    }

    .table-hover .table-light:hover {
        background-color: #ececf6;
    }

    .table-hover .table-light:hover > td,
    .table-hover .table-light:hover > th {
        background-color: #ececf6;
    }

    .table-dark,
    .table-dark > th,
    .table-dark > td {
        background-color: #c6c8ca;
    }

    .table-hover .table-dark:hover {
        background-color: #b9bbbe;
    }

    .table-hover .table-dark:hover > td,
    .table-hover .table-dark:hover > th {
        background-color: #b9bbbe;
    }

    .table-active,
    .table-active > th,
    .table-active > td {
        background-color: rgba(0, 0, 0, 0.075);
    }

    .table-hover .table-active:hover {
        background-color: rgba(0, 0, 0, 0.075);
    }

    .table-hover .table-active:hover > td,
    .table-hover .table-active:hover > th {
        background-color: rgba(0, 0, 0, 0.075);
    }

    .table .thead-dark th {
        color: #fff;
        background-color: #212529;
        border-color: #32383e;
    }

    .table .thead-light th {
        color: #495057;
        background-color: #e9ecef;
        border-color: #dee2e6;
    }

    .table-dark {
        color: #fff;
        background-color: #212529;
    }

    .table-dark th,
    .table-dark td,
    .table-dark thead th {
        border-color: #32383e;
    }

    .table-dark.table-bordered {
        border: 0;
    }

    .table-dark.table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(255, 255, 255, 0.05);
    }

    .table-dark.table-hover tbody tr:hover {
        background-color: rgba(255, 255, 255, 0.075);
    }

    .table-responsive {
        display: block;
        width: 100%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        -ms-overflow-style: -ms-autohiding-scrollbar;
    }

    .table-responsive > .table-bordered {
        border: 0;
    }

    .col-1, .col-2, .col-3, .col-4, .col-5, .col-6, .col-7, .col-8, .col-9, .col-10, .col-11, .col-12, .col,
    .col-auto, .col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm,
    .col-sm-auto, .col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11, .col-md-12, .col-md,
    .col-md-auto, .col-lg-1, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg,
    .col-lg-auto, .col-xl-1, .col-xl-2, .col-xl-3, .col-xl-4, .col-xl-5, .col-xl-6, .col-xl-7, .col-xl-8, .col-xl-9, .col-xl-10, .col-xl-11, .col-xl-12, .col-xl,
    .col-xl-auto {
        position: relative;
        width: 100%;
        min-height: 1px;
        padding-right: 15px;
        padding-left: 15px;
    }

    .col {
        -ms-flex-preferred-size: 0;
        flex-basis: 0;
        -webkit-box-flex: 1;
        -ms-flex-positive: 1;
        flex-grow: 1;
        max-width: 100%;
    }

    .col-auto {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 auto;
        flex: 0 0 auto;
        width: auto;
        max-width: none;
    }

    .col-1 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 8.333333%;
        flex: 0 0 8.333333%;
        max-width: 8.333333%;
    }

    .col-2 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 16.666667%;
        flex: 0 0 16.666667%;
        max-width: 16.666667%;
    }

    .col-3 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 25%;
        flex: 0 0 25%;
        max-width: 25%;
    }

    .col-4 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 33.333333%;
        flex: 0 0 33.333333%;
        max-width: 33.333333%;
    }

    .col-5 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 41.666667%;
        flex: 0 0 41.666667%;
        max-width: 41.666667%;
    }

    .col-6 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 50%;
        flex: 0 0 50%;
        max-width: 50%;
    }

    .col-7 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 58.333333%;
        flex: 0 0 58.333333%;
        max-width: 58.333333%;
    }

    .col-8 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 66.666667%;
        flex: 0 0 66.666667%;
        max-width: 66.666667%;
    }

    .col-9 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 75%;
        flex: 0 0 75%;
        max-width: 75%;
    }

    .col-10 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 83.333333%;
        flex: 0 0 83.333333%;
        max-width: 83.333333%;
    }

    .col-11 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 91.666667%;
        flex: 0 0 91.666667%;
        max-width: 91.666667%;
    }

    .col-12 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 100%;
        flex: 0 0 100%;
        max-width: 100%;
    }

    h1, h2, h3, h4, h5, h6 {
        margin-top: 0;
        margin-bottom: 0.5rem;
    }

    h1, h2, h3, h4, h5, h6,
    .h1, .h2, .h3, .h4, .h5, .h6 {
        margin-bottom: 0.5rem;
        font-family: inherit;
        font-weight: 500;
        line-height: 1.2;
        color: inherit;
    }

    h1, .h1 {
        font-size: 2.5rem;
    }

    h2, .h2 {
        font-size: 2rem;
    }

    h3, .h3 {
        font-size: 1.75rem;
    }

    h4, .h4 {
        font-size: 1.5rem;
    }

    h5, .h5 {
        font-size: 1.25rem;
    }

    h6, .h6 {
        font-size: 1rem;
    }
</style>