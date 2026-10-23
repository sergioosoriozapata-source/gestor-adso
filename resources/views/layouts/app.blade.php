<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>@yield('title','Gestor ADSO')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        *{box-sizing:border-box}
        body{max-width:1000px;margin:0 auto;font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,sans-serif;background:#f8f9fa;color:#212529;line-height:1.5;padding:24px}
        header{display:flex;justify-content:space-between;align-items:center;padding-bottom:16px;border-bottom:1px solid #e9ecef;margin-bottom:24px}
        header h1{margin:0;font-size:1.5rem;font-weight:600;color:#212529}
        nav a{color:#0d6efd;text-decoration:none;font-weight:500;padding:8px 16px;border:1px solid #0d6efd;border-radius:6px;transition:all .2s}
        nav a:hover{background:#0d6efd;color:#fff}
        .flash{background:#d1e7dd;color:#0f5132;padding:12px 16px;border-radius:8px;margin-bottom:20px;border:1px solid #badbcc}
        .card{background:#fff;border-radius:12px;box-shadow:0 2px 8px rgba(0,0,0,.06);border:1px solid #e9ecef;overflow:hidden}
        .card-header{padding:16px 20px;border-bottom:1px solid #e9ecef;background:#f8f9fa;display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:12px}
        .card-header h2{margin:0;font-size:1.1rem;font-weight:600}
        .card-body{padding:0}
        .card-footer{padding:16px 20px;border-top:1px solid #e9ecef;background:#f8f9fa}
        .btn{display:inline-flex;align-items:center;gap:6px;padding:10px 18px;font-size:.9rem;font-weight:500;border-radius:8px;border:none;cursor:pointer;transition:all .2s;text-decoration:none}
        .btn-primary{background:#0d6efd;color:#fff}
        .btn-primary:hover{background:#0b5ed7}
        .btn-secondary{background:#6c757d;color:#fff}
        .btn-secondary:hover{background:#5c636a}
        .btn-outline{background:transparent;border:1px solid #0d6efd;color:#0d6efd}
        .btn-outline:hover{background:#0d6efd;color:#fff}
        .search-form{display:flex;gap:8px;flex-wrap:wrap}
        .search-form input{flex:1;min-width:250px;padding:10px 14px;border:1px solid #ced4da;border-radius:8px;font-size:.9rem}
        .search-form input:focus{outline:none;border-color:#0d6efd;box-shadow:0 0 0 3px rgba(13,110,253,.15)}
        table{width:100%;border-collapse:collapse}
        th,td{padding:14px 20px;text-align:left;border-bottom:1px solid #e9ecef}
        th{background:#f8f9fa;font-weight:600;font-size:.85rem;text-transform:uppercase;letter-spacing:.5px;color:#6c757d}
        tr:hover td{background:#f8f9fa}
        tr:last-child td{border-bottom:none}
        .empty{text-align:center;padding:40px 20px;color:#6c757d}
        .pagination{display:flex;gap:4px;justify-content:center;margin:0;padding:20px;list-style:none;flex-wrap:wrap}
        .page-item{display:inline-block}
        .page-link{display:inline-block;padding:8px 14px;border:1px solid #dee2e6;border-radius:8px;text-decoration:none;color:#0d6efd;background:#fff;transition:all .2s;font-weight:500}
        .page-link:hover{background:#0d6efd;color:#fff;border-color:#0d6efd}
        .page-item.active .page-link{background:#0d6efd;color:#fff;border-color:#0d6efd}
        .page-item.disabled .page-link{color:#adb5bd;pointer-events:none;background:#fff;border-color:#dee2e6}
        .form-group{margin-bottom:20px}
        label{display:block;margin-bottom:6px;font-weight:500;font-size:.9rem;color:#495057}
        input[type="text"],input[type="email"],input[type="number"]{width:100%;padding:12px 14px;border:1px solid #ced4da;border-radius:8px;font-size:1rem;transition:border .2s,box-shadow .2s}
        input:focus{outline:none;border-color:#0d6efd;box-shadow:0 0 0 3px rgba(13,110,253,.15)}
        .invalid-feedback{color:#dc3545;font-size:.85rem;margin-top:4px;display:block}
        .required::after{content:" *";color:#dc3545}
        .page-title{margin:0 0 8px;font-size:1.5rem;font-weight:600}
        .page-subtitle{margin:0 0 24px;color:#6c757d}
        .form-row{display:grid;grid-template-columns:1fr 1fr;gap:20px}
        @media(max-width:640px){.form-row{grid-template-columns:1fr}}
        .actions{display:flex;gap:12px;margin-top:8px}
    </style>
</head>
<body>
    <header>
        <h1>@yield('title','Gestor ADSO')</h1>
        <nav>
            <a href="{{ route('aprendices.index') }}">Aprendices</a>
        </nav>
    </header>
    @if(session('ok'))<div class="flash">{{ session('ok') }}</div>@endif
    @yield('content')
</body>
</html>
