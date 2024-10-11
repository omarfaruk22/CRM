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
            <div class="container d-flex justify-content-center align-items-center mb-5">
                <div>
                    <h2 class="text-center">Search Knowledge Base Articles</h2>
                    <div class="search-box">
                        <form action="http://127.0.0.1:8000/customers/search" method="GET">
                            <div class="input-group">
                                <input type="search" name="keyword" id="search" class="form-control" placeholder="Search Customer..." value="">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="mx-2 mb-3">
                <div class="card">
                    <div class="card-body p-4">
                        <form class="row g-3 needs-validation" novalidate="">
                            No knowledge base articles found
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>

