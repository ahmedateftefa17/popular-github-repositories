<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Popular GitHub Repositories</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Popular GitHub Repositories</h1>
        <form class="mb-4" method="GET">
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label" for="date">Created after</label>
                        <input class="form-control" id="date" name="date" type="date"
                            value="{{ request()->date }}" placeholder="Start Date">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label" for="limit">Top</label>
                        <select class="form-control" id="limit" name="limit">
                            <option value="10" {{ request()->limit == '10' ? 'selected' : '' }}>10</option>
                            <option value="50" {{ request()->limit == '50' ? 'selected' : '' }}>50</option>
                            <option value="100" {{ request()->limit == '100' ? 'selected' : '' }}>100</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label" for="language">Langauge</label>
                        <input class="form-control" id="language" name="language" type="text"
                            value="{{ request()->language }}" placeholder="Language">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <button class="btn btn-primary" name="action" type="submit" value="filter">Filter</button>
                </div>
            </div>
        </form>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Repository Name</th>
                    <th>Stars</th>
                    <th>Language</th>
                    <th>URL</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($repositories as $repo)
                    <tr>
                        <td>{{ $repo->name }}</td>
                        <td>{{ $repo->stargazers_count }}</td>
                        <td>{{ $repo->language }}</td>
                        <td><a href="{{ $repo->html_url }}" target="_blank">{{ $repo->html_url }}</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
