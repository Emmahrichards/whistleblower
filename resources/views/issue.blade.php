<!-- resources/views/issue.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Issues</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Issues</h2>

    <!-- Table to display comments -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Category</th>
                <th>Comment</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            
                <tr>
                    <td></td>
                    <td> </td>
                    <td></td>
                    <td></td>
                </tr>
            
                
        </tbody>
    </table>

    <!-- Buttons for download -->
    <div class="d-flex justify-content-between">
        <a href="{{ route('download.excel') }}" class="btn btn-success">Download Excel</a>
        <a href="{{ route('download.pdf') }}" class="btn btn-danger">Download PDF</a>
        
    </div>
</div>

</body>
</html>
