<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>Terms and Conditions</title>
    </head>
    <body class="bg-light">

        <nav class="navbar navbar-expand-lg navbar-light bg-secondary mb-5">
            <div class="container">
                <a class="navbar-brand" href="{{ route('login') }}">Smart Software</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                <form class="d-flex ms-auto">
                    <a href="{{ route('setup.gdpr.right_to_be_informed.terms_and_Conditions.knowledge_base') }}" class="btn btn-primary me-2" type="submit">Knowledge Base</a>
                    <a href="{{ route('login') }}" class="btn btn-primary" type="submit">Login</a>
                </form>
                </div>
            </div>
        </nav>

        <div class="col-md-8 m-auto">
            <div class="card">
                <div class="card-header px-4 py-3">
                    <h5 class="mb-0">Privacy Policy</h5>
                </div>
                <div class="card-body p-4">
                    <form class="row g-3 needs-validation" novalidate="">
                        
                    </form>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>

