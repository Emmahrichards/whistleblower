<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Comment</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('{{ asset('images/d.jpg') }}') no-repeat center center fixed;
            background-size: cover;
        }
    </style>
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header text-center">
                    <h4><b>Whistleblower</b></h4>
                </div>
                <div class="card-body">

                  
                    <!-- Form Start -->
                    <form method="POST" action="{{ route('submit.comment') }}">
                       

                        <!-- Category Selection -->
                        <div class="mb-3">
                            <label for="category" class="form-label">Select Category</label>
                            <select name="category" id="category" class="form-select" required>
                                <option value="" disabled {{ old('category') ? '' : 'selected' }}>Select a category</option>
                                <option value="1" {{ old('category') == '1' ? 'selected' : '' }}>General</option>
                                <option value="2" {{ old('category') == '2' ? 'selected' : '' }}>Integrity</option>
                            </select>
                        </div>

                        <!-- Comment Box -->
                        <div class="mb-3">
                            <label for="comment" class="form-label">Your Comment</label>
                            <textarea name="comment" id="comment" class="form-control" rows="4" required></textarea>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                    <!-- Form End -->

                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/submit.js') }}"></script>
</body>
</html>
